<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Exceptions\DecoderException;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'max:50',
                Rule::unique('users', 'username'),
            ],
            'full_name' => ['required', 'string', 'max:100'],
        ]);

        $user = new User();
        $user->username = $validated['username'];
        $user->full_name = $validated['full_name'];
        $user->created_at = now();
        $user->save();

        return redirect()
            ->route('users')
            ->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'max:50',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            'full_name' => ['required', 'string', 'max:100'],
            'avatar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
                'dimensions:max_width=6000,max_height=6000',
            ],
        ]);

        $oldAvatar = $user->avatar;
        $newAvatar = null;

        if ($request->hasFile('avatar')) {
            $manager = new ImageManager(new Driver());

            try {
                $image = $manager->read(
                    $request->file('avatar')->getRealPath()
                );

                $thumbnail = $image
                    ->cover(256, 256)
                    ->toPng();
            } catch (DecoderException $exception) {
                throw ValidationException::withMessages([
                    'avatar' => 'This image could not be processed. Please choose another image.',
                ]);
            }

            $newAvatar = 'avatars/' . Str::uuid() . '.png';

            $stored = Storage::disk('public')->put(
                $newAvatar,
                (string) $thumbnail
            );

            if (! $stored) {
                throw ValidationException::withMessages([
                    'avatar' => 'The image could not be saved. Please try again.',
                ]);
            }
        }

        $user->username = $validated['username'];
        $user->full_name = $validated['full_name'];

        if ($newAvatar !== null) {
            $user->avatar = $newAvatar;
        }

        try {
            $user->save();
        } catch (\Throwable $exception) {
            if ($newAvatar !== null) {
                Storage::disk('public')->delete($newAvatar);
            }

            throw $exception;
        }

        if ($newAvatar !== null && $oldAvatar) {
            Storage::disk('public')->delete($oldAvatar);
        }

        return redirect()
            ->route('users')
            ->with('success', 'User updated successfully.');
    }
}

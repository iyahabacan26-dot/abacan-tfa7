@extends('layouts.app')

@section('title', 'Edit User | POS Management System')
@section('page-title', 'Edit User')

@section('content')

    <p style="color: #8E7C87; font-size: 14px; margin-bottom: 24px;">
        Update the user’s details below. Fields marked * are required.
    </p>

    <div class="table-card" style="max-width: 720px;">
        <div class="table-header">
            <h3>User Details</h3>
            <p>Edit an existing system user account.</p>
        </div>

        <form
            action="{{ route('users.update', $user) }}"
            method="POST"
            enctype="multipart/form-data"
            style="padding: 24px;"
            novalidate
        >
            @method('PUT')

            <div style="margin-bottom: 24px;">
                <label for="avatar"
                       style="display: block; margin-bottom: 8px;">
                    Profile Picture
                </label>

                <img
                    src="{{ $user->avatar
                        ? asset('storage/' . $user->avatar)
                        : asset('images/avatar-placeholder.svg') }}"
                    alt="Current profile picture"
                    width="96"
                    height="96"
                    style="display: block; object-fit: cover;
                           border-radius: 12px; margin-bottom: 12px;"
                >

                <input
                    type="file"
                    id="avatar"
                    name="avatar"
                    accept="image/jpeg,image/png,image/webp"
                    style="display: block; max-width: 100%;"
                >

                <p style="color: #8E7C87; font-size: 13px; margin-top: 8px;">
                    JPG, PNG, or WebP. Maximum 2 MB and 6000 × 6000 pixels.
                    Leave empty to keep the current picture.
                </p>

                @error('avatar')
                    <p style="color: #B42318; font-size: 13px; margin-top: 6px;">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            @include('users._form', ['buttonText' => 'Update User'])
        </form>
    </div>

@endsection
@extends('layouts.app')

@section('title', 'User Accounts | POS Management System')
@section('page-title', 'User Accounts')

@section('content')

@if (session('success'))
<div style="background: #EAF7ED; color: #256337;
                    padding: 14px 18px; border-radius: 8px;
                    margin-bottom: 20px;">
    {{ session('success') }}
</div>
@endif

<div style="margin-bottom: 24px;">
    <a href="{{ route('users.create') }}"
        style="display: inline-block; background: #A64D79;
                  color: white; padding: 12px 20px;
                  border-radius: 8px; text-decoration: none;">
        Add User
    </a>
</div>

<p style="color: #8E7C87; font-size: 14px; margin-bottom: 28px;">
    View and manage system user records.
</p>

<div class="table-card">
    <div class="table-header">
        <h3>User List</h3>
        <p>List of system user accounts stored in the database.</p>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Avatar</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        <img
                            src="{{ $user->avatar
            ? asset('storage/' . $user->avatar)
            : asset('images/avatar-placeholder.svg') }}"
                            alt="Profile picture of {{ $user->full_name }}"
                            width="48"
                            height="48"
                            style="display: block; object-fit: cover; border-radius: 50%;">
                    </td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user) }}"
                            style="color: #A64D79; font-weight: 600;
                                          text-decoration: none;">
                            Edit
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">No user records found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
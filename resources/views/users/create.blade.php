@extends('layouts.app')

@section('title', 'Create User | POS Management System')
@section('page-title', 'Create User')

@section('content')

    <p style="color: #8E7C87; font-size: 14px; margin-bottom: 24px;">
        Enter the user’s details below. Fields marked * are required.
    </p>

    <div class="table-card" style="max-width: 720px;">
        <div class="table-header">
            <h3>User Details</h3>
            <p>Add a new system user account.</p>
        </div>

        <form
            action="{{ route('users.store') }}"
            method="POST"
            style="padding: 24px;"
            novalidate
        >
            @include('users._form', ['buttonText' => 'Save User'])
        </form>
    </div>

@endsection
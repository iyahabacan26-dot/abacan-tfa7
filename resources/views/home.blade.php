@extends('layouts.app')

@section('title', 'Home | POS Management System')
@section('breadcrumb', 'Home')
@section('page-title', 'Home')

@section('content')

    <section class="hero-card">
        <h2>Welcome to the POS Management System!</h2>

        <p>
            A simple web-based application developed using
            Laravel to organize and display customer and
            user account information.
        </p>
    </section>

    <div class="page-heading">
        <h2>Explore the System</h2>
        <p>Select a page to view its account records.</p>
    </div>

    <div class="card-grid">

        <div class="card">
            <div class="card-icon">♡</div>

            <h3>Customer Accounts</h3>

            <p>
                View customer names, contact information,
                and account statuses.
            </p>

            <br>

            <a href="{{ route('customers') }}" class="btn">
                View Customers
            </a>
        </div>

        <div class="card">
            <div class="card-icon">♙</div>

            <h3>User Accounts</h3>

            <p>
                View system users, assigned roles,
                and account statuses.
            </p>

            <br>

            <a href="{{ route('users') }}" class="btn">
                View Users
            </a>
        </div>

    </div>

@endsection
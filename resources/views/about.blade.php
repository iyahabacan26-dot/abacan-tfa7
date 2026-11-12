@extends('layouts.app')

@section('title', 'About | POS Management System')
@section('page-title', 'About the System')

@section('content')

<p style="color: #8E7C87; font-size: 14px; margin-bottom: 28px;">
    View the customer records registered in the POS Management System.
</p>

<div class="card">
    <h3>System Overview</h3>

    <p>
        The POS Management System is a simple web-based
        application developed using the Laravel framework.
        It provides an organized way to view customer
        and user account information.
    </p>
</div>

<br>

<div class="card">
    <h3>Purpose of the System</h3>

    <p>
        This application demonstrates the use of
        Laravel's Model-View-Controller (MVC) architecture,
        routing, controllers, Blade templates, and
        static PHP arrays to display sample records.
    </p>
</div>

@endsection
@extends('layouts.app')

@section('title', 'Customer Accounts | POS Management System')
@section('page-title', 'Customer Accounts')

@section('content')

@if (session('success'))
<div style="background: #EAF7ED; color: #256337;
                padding: 14px 18px; border-radius: 8px;
                margin-bottom: 20px;">
    {{ session('success') }}
</div>
@endif

<div style="margin-bottom: 24px;">
    <a href="{{ route('customers.create') }}"
        style="display: inline-block; background: #A64D79;
              color: white; padding: 12px 20px;
              border-radius: 8px; text-decoration: none;">
        Add Customer
    </a>
</div>

<p style="color: #8E7C87; font-size: 14px; margin-bottom: 28px;">
    View customer records retrieved from the database.
</p>

<!-- Customer Records Table -->
<div class="table-card">

    <div class="table-header">
        <h3>Customer List</h3>
        <p>List of customer accounts stored in the database.</p>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->full_name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone ?? 'N/A' }}</td>
                    <td>{{ $customer->created_at }}</td>
                    <td>
    <a href="{{ route('customers.edit', $customer) }}"
       style="color: #A64D79; font-weight: 600; text-decoration: none;">
        Edit
    </a>
</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">No customer records found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
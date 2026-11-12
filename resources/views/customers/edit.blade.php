@extends('layouts.app')

@section('title', 'Edit Customer | POS Management System')
@section('page-title', 'Edit Customer')

@section('content')

<p style="color: #8E7C87; font-size: 14px; margin-bottom: 24px;">
    Update the customer’s details below. Fields marked * are required.
</p>

<div class="table-card" style="max-width: 720px;">
    <div class="table-header">
        <h3>Customer Details</h3>
        <p>Edit an existing customer account.</p>
    </div>

    <form
        action="{{ route('customers.update', $customer) }}"
        method="POST"
        style="padding: 24px;"
        novalidate>
        @csrf
        @method('PUT')

        <div style="margin-bottom: 20px;">
            <label for="full_name"
                style="display: block; margin-bottom: 8px;">
                Full Name *
            </label>

            <input
                type="text"
                id="full_name"
                name="full_name"
                value="{{ old('full_name', $customer->full_name) }}"
                maxlength="100"
                required
                style="width: 100%; box-sizing: border-box;
                           padding: 12px; border: 1px solid #DCCED5;
                           border-radius: 8px;">

            @error('full_name')
            <p style="color: #B42318; font-size: 13px; margin-top: 6px;">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label for="email"
                style="display: block; margin-bottom: 8px;">
                Email Address *
            </label>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $customer->email) }}"
                maxlength="100"
                required
                style="width: 100%; box-sizing: border-box;
                           padding: 12px; border: 1px solid #DCCED5;
                           border-radius: 8px;">

            @error('email')
            <p style="color: #B42318; font-size: 13px; margin-top: 6px;">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div style="margin-bottom: 24px;">
            <label for="phone"
                style="display: block; margin-bottom: 8px;">
                Phone Number
            </label>

            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone', $customer->phone) }}"
                maxlength="20"
                style="width: 100%; box-sizing: border-box;
                           padding: 12px; border: 1px solid #DCCED5;
                           border-radius: 8px;">

            @error('phone')
            <p style="color: #B42318; font-size: 13px; margin-top: 6px;">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div style="display: flex; gap: 16px; align-items: center;">
            <button
                type="submit"
                style="background: #A64D79; color: white;
                           border: none; border-radius: 8px;
                           padding: 12px 20px; cursor: pointer;
                           font: inherit;">
                Update Customer
            </button>

            <a href="{{ route('customers') }}"
                style="color: #8E526D; text-decoration: none;">
                Cancel
            </a>
        </div>
    </form>
</div>

@endsection
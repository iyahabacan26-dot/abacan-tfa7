<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'POS Management System')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="app-container">

        <!-- Sidebar Navigation -->
        <aside class="sidebar">

            <div class="brand">
                <div class="brand-icon">P</div>
                <div class="brand-name">
                    POS<span> System</span>
                </div>
            </div>

            <nav class="sidebar-nav">

                <a href="{{ route('home') }}"
                   class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    <span class="nav-icon">⌂</span>
                    Home
                </a>

                <a href="{{ route('about') }}"
                   class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                    <span class="nav-icon">ⓘ</span>
                    About
                </a>

                <a href="{{ route('customers') }}"
                   class="nav-link {{ request()->routeIs('customers') ? 'active' : '' }}">
                    <span class="nav-icon">♡</span>
                    Customer Accounts
                </a>

                <a href="{{ route('users') }}"
                   class="nav-link {{ request()->routeIs('users') ? 'active' : '' }}">
                    <span class="nav-icon">♙</span>
                    User Accounts
                </a>

            </nav>

        </aside>

        <!-- Page Content -->
        <div class="main-content">

            <header class="topbar">
                <h1 class="topbar-title">
                    @yield('page-title', 'Home')
                </h1>
            </header>

            <main>
                @yield('content')
            </main>

        </div>

    </div>

</body>
</html>

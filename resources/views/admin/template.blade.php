<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Web Profile')</title>

    <!-- CSS Bootstrap CDN -->
    <link href="https://jsdelivr.net" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.css">
    <script>
        const API_TOKEN = '{{ session('api_token') }}';
    </script>
</head>

<style>
    body {
        background-color: #f8f9fa;
    }

    .sidebar {
        width: 220px;
        min-height: 100vh;
        background-color: #343a40;
        position: fixed;
        top: 56px;
        left: 0;
    }

    .sidebar a {
        display: block;
        color: #fff;
        padding: 10px 15px;
        text-decoration: none;
    }

    .sidebar a:hover {
        background-color: #495057;
    }

    .content {
        margin-top: 70px;
        margin-left: 220px;
        padding: 20px;
    }

    .card {
        border: 0;
        border-radius: 10px;
    }
</style>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning fixed-top shadow-sm px-3">

        <div class="container-fluid">

            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center"
                href="{{ route('admin.dashboard') }}">

                <img src="{{ asset('bootstrap-5.3.8-dist/images/logo.jpg') }}"
                    alt="Logo"
                    height="45"
                    class="me-2 rounded">
            </a>

            <!-- Toggle -->
            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">

                            {{ Auth::user()->name }}

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end"
                            aria-labelledby="navbarDropdown">

                            <li class="dropdown-item-text text-muted">
                                <small>{{ Auth::user()->email }}</small>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form method="POST"
                                    action="{{ route('admin.logout') }}">

                                    @csrf

                                    <button type="submit"
                                        class="dropdown-item">

                                        Logout

                                    </button>

                                </form>
                            </li>

                        </ul>

                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <!-- Sidebar -->
    <div class="sidebar shadow-sm">

        <h5 class="text-center text-white py-3">
            Admin Menu
        </h5>

        <a href="{{ route('admin.dashboard') }}">
            Dashboard
        </a>

        <a href="{{ route('projects.index') }}">
            Data Project
        </a>

        <a href="{{ route('admin.users') }}">
            Data Users
        </a>

    </div>

    <!-- Content -->
    <div class="content">

        @yield('content')

    </div>

    <!-- Footer -->
    <footer class="bg-white text-dark text-center border-top py-3 mt-5">

        <p class="mb-0">
            &copy; 2026 My Profile. All rights reserved.
        </p>

    </footer>




    <!-- JS Bootstrap CDN -->
<script src="https://jsdelivr.net"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>

@yield('scripts')


</body>

</html>
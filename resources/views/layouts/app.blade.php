<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Web Profile')</title>

    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">

            <a class="navbar-brand" href="{{ route('home') }}">My Profile</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('projects') ? 'active' : '' }}"
                            href="{{ route('projects') }}">
                            Projects
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                            href="{{ route('about') }}">
                            About
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                            href="{{ route('contact') }}">
                            Contact
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                            href="{{ route('admin.dashboard') }}">
                            Admin
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <main class="container-fluid mt-5 pt-5">
    @yield('content')
</main>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        &copy; 2026 My Profile. All rights reserved.
    </footer>

    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>$(document).ready(function () {
    $('#table_project').DataTable();
    });
</script>
</body>

</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Bansos', 'Sistem Bansos Pendidikan') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #1e3a8a;
            --dark-blue: #1e40af;
            --light-blue: #3b82f6;
            --accent-blue: #2563eb;
            --text-gray: #374151;
            --light-gray: #f8fafc;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8fafc;
        }

        /* Sidebar desktop & mobile */
        .sidebar,
        .sidebar-mobile {
            min-height: 100vh;
            background: var(--primary-blue);
            border-radius: 0 20px 20px 0;
        }

        /* Make sidebar a column so inner elements can be pushed to bottom */
        .sidebar {
            display: flex;
            flex-direction: column;
        }

        .sidebar .sidebar-inner {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        /* Make sidebar fixed on medium and larger screens and shift main content */
        @media (min-width: 768px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                width: 250px;
                /* fixed sidebar width */
                height: 100vh;
                overflow-y: auto;
                padding-top: 20px;
                padding-bottom: 20px;
                z-index: 1020;
            }

            .sidebar-mobile {
                display: none !important;
            }

            .main-content {
                margin-left: 250px;
                /* reserve space for fixed sidebar */
            }

            nav.col-md-3.col-lg-2.d-none.d-md-block.sidebar.collapse {
                /* Prevent Bootstrap's collapse interfering with fixed positioning */
                display: block !important;
            }
        }

        .sidebar .nav-link,
        .sidebar-mobile .nav-link {
            color: white;
            padding: 10px 16px;
            margin: 6px 12px;
            border-radius: 10px;
            transition: all 0.18s ease;
            font-weight: 500;
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active,
        .sidebar-mobile .nav-link:hover,
        .sidebar-mobile .nav-link.active {
            color: var(--primary-blue);
            background-color: white;
            transform: translateX(5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Navbar mobile */
        .bg-primary {
            background: var(--primary-blue) !important;
        }

        /* Card */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        /* Button */
        .btn-primary {
            background: var(--accent-blue);
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: var(--dark-blue);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        /* Tabel */
        .table th {
            background: var(--primary-blue);
            color: white;
        }

        /* Logo Pertamina */
        .logo-pertamina {
            height: 70px;
            margin-bottom: 15px;
        }

        /* Sidebar header */
        .sidebar-header h4 {
            font-weight: bold;
            color: white;
            font-size: 30px;
        }

        .sidebar-header h6 {
            font-weight: italic;
            color: rgb(250, 250, 250);
            font-size: 12px;
        }

        /* Alerts */
        .alert-success {
            border-left: 5px solid #10b981;
        }

        .alert-danger {
            border-left: 5px solid #ef4444;
        }

        /* Main content area */
        .main-content {
            background: white;
            border-radius: 20px 0 0 20px;
            min-height: 100vh;
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
        }
    </style>

</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar desktop -->
            <nav class="col-md-3 col-lg-2 d-none d-md-block sidebar collapse">
                @include('partials.sidebar')
            </nav>

            <!-- Sidebar mobile (Offcanvas) -->
            <div class="d-md-none p-2 bg-primary text-white d-flex justify-content-between align-items-center">
                <button class="btn btn-light btn-sm" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
                    <i class="fas fa-bars"></i>
                </button>
                <span>{{ config('Bansos', 'Berbagi Asa') }}</span>
            </div>
            <div class="offcanvas offcanvas-start sidebar-mobile text-white" tabindex="-1" id="mobileSidebar">
                <div class="offcanvas-header">
                    <h5>Menu</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body p-0">
                    @include('partials.sidebar')
                </div>
            </div>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                <div class="pt-4 pb-3">
                    <h1 class="h2 mb-4" style="color: var(--text-gray); font-weight: 700;">@yield('title', 'Dashboard')</h1>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @stack('scripts')
</body>

</html>

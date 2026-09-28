<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard SB Admin 2 - Katalog Pustaka</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-book-reader"></i></div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>
            <hr class="sidebar-divider my-0">

            <!-- Dashboard -->
            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard Summary</span>
                </a>
            </li>

            <hr class="sidebar-divider my-0">
            <div class="sidebar-heading mt-3">Modul Utama</div>

            <!-- Kategori -->
            <li class="nav-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Kategori Buku</span>
                </a>
            </li>

            <!-- Buku -->
            <li class="nav-item {{ request()->routeIs('books.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('books.index') }}">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Manajemen Buku</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <span class="font-weight-bold text-primary">Sistem Informasi Katalog Buku & REST API</span>
                </nav>
                @yield('content')
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Training Webdev 2026</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/js/sb-admin-2.min.js"></script>
</body>
</html>
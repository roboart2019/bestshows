<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Best Shows Entertainment') - Best Shows Entertainment</title>
    <style>
        :root {
            --primary: #e50914;
            --primary-dark: #b20710;
            --dark: #141414;
            --darker: #0a0a0a;
            --gray: #333;
            --gray-light: #555;
            --gray-lighter: #888;
            --white: #fff;
            --gold: #f5c518;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: var(--dark);
            color: var(--white);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        a { color: var(--white); text-decoration: none; }
        a:hover { color: var(--primary); }

        /* Navigation */
        .navbar {
            background: var(--darker);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 3px solid var(--primary);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary) !important;
            padding: 1rem 0;
            letter-spacing: 1px;
        }

        .navbar-nav {
            display: flex;
            list-style: none;
            gap: 0;
        }

        .navbar-nav a {
            padding: 1rem 1.2rem;
            display: block;
            transition: background 0.2s;
            font-size: 0.95rem;
        }

        .navbar-nav a:hover, .navbar-nav a.active {
            background: var(--primary);
            color: var(--white) !important;
        }

        .navbar-right { display: flex; align-items: center; gap: 0.5rem; }

        .btn {
            display: inline-block;
            padding: 0.5rem 1.2rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all 0.2s;
            text-align: center;
        }

        .btn-primary { background: var(--primary); color: var(--white); }
        .btn-primary:hover { background: var(--primary-dark); color: var(--white); }
        .btn-secondary { background: var(--gray); color: var(--white); }
        .btn-secondary:hover { background: var(--gray-light); color: var(--white); }
        .btn-danger { background: #dc3545; color: var(--white); }
        .btn-danger:hover { background: #c82333; color: var(--white); }
        .btn-success { background: #28a745; color: var(--white); }
        .btn-sm { padding: 0.3rem 0.8rem; font-size: 0.85rem; }

        /* Header Ad Placement */
        .header-ad {
            background: var(--darker);
            text-align: center;
            padding: 0.5rem;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
            width: 100%;
        }

        /* Alert Messages */
        .alert {
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1.5rem;
        }

        .alert-success { background: rgba(40, 167, 69, 0.2); border: 1px solid #28a745; }
        .alert-danger { background: rgba(220, 53, 69, 0.2); border: 1px solid #dc3545; }

        /* Cards */
        .card {
            background: var(--gray);
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.2s;
        }

        .card:hover { transform: translateY(-4px); }

        .card-body { padding: 1rem; }

        .card-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        /* Grid */
        .grid { display: grid; gap: 1.5rem; }
        .grid-2 { grid-template-columns: repeat(2, 1fr); }
        .grid-3 { grid-template-columns: repeat(3, 1fr); }
        .grid-4 { grid-template-columns: repeat(4, 1fr); }
        .grid-6 { grid-template-columns: repeat(6, 1fr); }

        /* Show Card */
        .show-card .poster {
            width: 100%;
            aspect-ratio: 2/3;
            background: var(--gray-light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-lighter);
            font-size: 0.85rem;
        }

        .show-card .poster img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .show-card .rating-badge {
            display: inline-block;
            background: var(--gold);
            color: #000;
            padding: 0.15rem 0.5rem;
            border-radius: 3px;
            font-weight: bold;
            font-size: 0.85rem;
        }

        .show-card .type-badge {
            display: inline-block;
            background: var(--primary);
            padding: 0.15rem 0.5rem;
            border-radius: 3px;
            font-size: 0.75rem;
            text-transform: uppercase;
        }

        /* Footer */
        .footer {
            background: var(--darker);
            border-top: 3px solid var(--primary);
            padding: 2rem;
            text-align: center;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 1rem;
            list-style: none;
        }

        .footer-links a { color: var(--gray-lighter); font-size: 0.9rem; }
        .footer-links a:hover { color: var(--white); }

        .footer-copy { color: var(--gray-lighter); font-size: 0.85rem; }

        /* Forms */
        .form-group { margin-bottom: 1rem; }

        .form-group label {
            display: block;
            margin-bottom: 0.4rem;
            font-weight: 500;
            color: var(--gray-lighter);
        }

        .form-control {
            width: 100%;
            padding: 0.6rem 0.8rem;
            background: var(--darker);
            border: 1px solid var(--gray-light);
            border-radius: 4px;
            color: var(--white);
            font-size: 0.95rem;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
        }

        textarea.form-control { min-height: 120px; resize: vertical; }

        select.form-control {
            appearance: auto;
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-error {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 0.25rem;
        }

        /* Table */
        .table-responsive { overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid var(--gray);
        }

        th { background: var(--darker); font-weight: 600; }

        tr:hover { background: rgba(255,255,255,0.05); }

        /* Pagination */
        .pagination {
            display: flex;
            gap: 0.25rem;
            justify-content: center;
            margin-top: 2rem;
            list-style: none;
        }

        .pagination a, .pagination span {
            padding: 0.5rem 0.8rem;
            background: var(--gray);
            border-radius: 4px;
            font-size: 0.9rem;
        }

        .pagination .active span {
            background: var(--primary);
        }

        /* Section Titles */
        .section-title {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--primary);
        }

        /* Intensity Bar */
        .intensity-bar-container { margin-bottom: 0.5rem; }

        .intensity-label {
            display: flex;
            justify-content: space-between;
            font-size: 0.85rem;
            margin-bottom: 0.2rem;
        }

        .intensity-bar {
            height: 8px;
            background: var(--gray-light);
            border-radius: 4px;
            overflow: hidden;
        }

        .intensity-fill {
            height: 100%;
            border-radius: 4px;
            transition: width 0.3s;
        }

        .intensity-low { background: #28a745; }
        .intensity-med { background: var(--gold); }
        .intensity-high { background: #dc3545; }

        /* Star Rating */
        .stars { color: var(--gold); font-size: 1.2rem; letter-spacing: 2px; }

        /* Sidebar */
        .layout-with-sidebar {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 2rem;
        }

        .sidebar .ad-slot {
            background: var(--gray);
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .grid-4 { grid-template-columns: repeat(3, 1fr); }
            .grid-6 { grid-template-columns: repeat(3, 1fr); }
            .layout-with-sidebar { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .grid-3 { grid-template-columns: repeat(2, 1fr); }
            .grid-4 { grid-template-columns: repeat(2, 1fr); }
            .navbar { flex-direction: column; padding: 0.5rem 1rem; }
            .navbar-nav { flex-wrap: wrap; justify-content: center; }
            .main-content { padding: 1rem; }
        }

        @media (max-width: 480px) {
            .grid-2, .grid-3, .grid-4 { grid-template-columns: 1fr; }
        }

        /* Admin Sidebar */
        .admin-layout {
            display: grid;
            grid-template-columns: 220px 1fr;
            min-height: calc(100vh - 70px);
        }

        .admin-sidebar {
            background: var(--darker);
            padding: 1.5rem 0;
            border-right: 1px solid var(--gray);
        }

        .admin-sidebar a {
            display: block;
            padding: 0.7rem 1.5rem;
            color: var(--gray-lighter);
            transition: all 0.2s;
        }

        .admin-sidebar a:hover, .admin-sidebar a.active {
            background: var(--primary);
            color: var(--white);
        }

        .admin-sidebar h3 {
            padding: 0 1.5rem;
            margin-bottom: 1rem;
            color: var(--primary);
            font-size: 1.1rem;
        }

        .admin-content {
            padding: 2rem;
        }

        .stat-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--gray);
            padding: 1.5rem;
            border-radius: 8px;
            text-align: center;
        }

        .stat-card .number {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary);
        }

        .stat-card .label {
            color: var(--gray-lighter);
            font-size: 0.9rem;
        }
    </style>
    @php
        $gaId = \App\Models\SiteSetting::get('google_analytics_id');
        $gaEnabled = \App\Models\SiteSetting::get('google_analytics_enabled', '0');
    @endphp
    @if($gaEnabled === '1' && $gaId)
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gaId }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ $gaId }}');
    </script>
    @endif
</head>
<body>
    <!-- Header Ad -->
    @php $headerAds = \App\Models\Adword::getActiveByPlacement('header'); @endphp
    @if($headerAds->count())
    <div class="header-ad">
        @foreach($headerAds as $ad)
            {!! $ad->ad_code !!}
        @endforeach
    </div>
    @endif

    <!-- Navigation -->
    <nav class="navbar">
        <a href="{{ route('home') }}" class="navbar-brand">BEST SHOWS ENTERTAINMENT</a>
        <ul class="navbar-nav">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('shows.movies') }}" class="{{ request()->routeIs('shows.movies') ? 'active' : '' }}">Movies</a></li>
            <li><a href="{{ route('shows.tv') }}" class="{{ request()->routeIs('shows.tv') ? 'active' : '' }}">TV Shows</a></li>
            <li><a href="{{ route('shows.index') }}" class="{{ request()->routeIs('shows.index') ? 'active' : '' }}">Browse All</a></li>
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
        </ul>
        <div class="navbar-right">
            @auth
                <span style="color: var(--gray-lighter); font-size: 0.9rem;">Hi, {{ Auth::user()->name }}</span>
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-secondary">Admin</a>
                @endif
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-secondary">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-sm btn-secondary">Login</a>
                <a href="{{ route('register') }}" class="btn btn-sm btn-primary">Join Free</a>
            @endauth
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Footer Ad -->
    @php $footerAds = \App\Models\Adword::getActiveByPlacement('footer'); @endphp
    @if($footerAds->count())
    <div class="header-ad">
        @foreach($footerAds as $ad)
            {!! $ad->ad_code !!}
        @endforeach
    </div>
    @endif

    <!-- Footer -->
    <footer class="footer">
        <ul class="footer-links">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('shows.movies') }}">Movies</a></li>
            <li><a href="{{ route('shows.tv') }}">TV Shows</a></li>
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
            <li><a href="{{ route('terms') }}">Terms of Service</a></li>
        </ul>
        <p class="footer-copy">&copy; {{ date('Y') }} Best Shows Entertainment. All rights reserved.</p>
    </footer>
</body>
</html>

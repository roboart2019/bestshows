<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - @yield('title') - Best Shows Entertainment</title>
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
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; background: var(--dark); color: var(--white); }
        a { color: var(--white); text-decoration: none; }
        a:hover { color: var(--primary); }

        .admin-header {
            background: var(--darker);
            padding: 0.8rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid var(--primary);
        }
        .admin-header h1 { font-size: 1.2rem; color: var(--primary); }
        .admin-header-right { display: flex; gap: 1rem; align-items: center; }

        .admin-layout { display: grid; grid-template-columns: 220px 1fr; min-height: calc(100vh - 55px); }

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
            font-size: 0.95rem;
        }
        .admin-sidebar a:hover, .admin-sidebar a.active { background: var(--primary); color: var(--white); }
        .admin-sidebar .section-label {
            padding: 1rem 1.5rem 0.3rem;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--gray-lighter);
        }

        .admin-content { padding: 2rem; }

        .btn { display: inline-block; padding: 0.5rem 1.2rem; border: none; border-radius: 4px; cursor: pointer; font-size: 0.9rem; transition: all 0.2s; text-align: center; }
        .btn-primary { background: var(--primary); color: var(--white); }
        .btn-primary:hover { background: var(--primary-dark); color: var(--white); }
        .btn-secondary { background: var(--gray); color: var(--white); }
        .btn-danger { background: #dc3545; color: var(--white); }
        .btn-success { background: #28a745; color: var(--white); }
        .btn-sm { padding: 0.3rem 0.8rem; font-size: 0.85rem; }

        .alert { padding: 1rem; border-radius: 4px; margin-bottom: 1.5rem; }
        .alert-success { background: rgba(40, 167, 69, 0.2); border: 1px solid #28a745; }
        .alert-danger { background: rgba(220, 53, 69, 0.2); border: 1px solid #dc3545; }

        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; margin-bottom: 0.4rem; font-weight: 500; color: var(--gray-lighter); }
        .form-control { width: 100%; padding: 0.6rem 0.8rem; background: var(--darker); border: 1px solid var(--gray-light); border-radius: 4px; color: var(--white); font-size: 0.95rem; }
        .form-control:focus { outline: none; border-color: var(--primary); }
        textarea.form-control { min-height: 120px; resize: vertical; }
        select.form-control { appearance: auto; }
        .form-check { display: flex; align-items: center; gap: 0.5rem; }
        .form-error { color: #dc3545; font-size: 0.85rem; margin-top: 0.25rem; }

        .table-responsive { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 0.75rem; text-align: left; border-bottom: 1px solid var(--gray); }
        th { background: var(--darker); font-weight: 600; }
        tr:hover { background: rgba(255,255,255,0.05); }

        .stat-cards { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem; margin-bottom: 2rem; }
        .stat-card { background: var(--gray); padding: 1.5rem; border-radius: 8px; text-align: center; }
        .stat-card .number { font-size: 2rem; font-weight: bold; color: var(--primary); }
        .stat-card .label { color: var(--gray-lighter); font-size: 0.9rem; }

        .section-title { font-size: 1.5rem; margin-bottom: 1.5rem; padding-bottom: 0.5rem; border-bottom: 2px solid var(--primary); }

        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

        .pagination { display: flex; gap: 0.25rem; justify-content: center; margin-top: 2rem; list-style: none; }
        .pagination a, .pagination span { padding: 0.5rem 0.8rem; background: var(--gray); border-radius: 4px; font-size: 0.9rem; }
        .pagination .active span { background: var(--primary); }

        .badge { display: inline-block; padding: 0.15rem 0.5rem; border-radius: 3px; font-size: 0.8rem; }
        .badge-success { background: #28a745; }
        .badge-danger { background: #dc3545; }
        .badge-warning { background: var(--gold); color: #000; }
    </style>
</head>
<body>
    <header class="admin-header">
        <h1>BEST SHOWS ADMIN</h1>
        <div class="admin-header-right">
            <a href="{{ route('home') }}">View Site</a>
            <span style="color: var(--gray-lighter);">{{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-sm btn-secondary">Logout</button>
            </form>
        </div>
    </header>

    <div class="admin-layout">
        <nav class="admin-sidebar">
            <div class="section-label">Main</div>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>

            <div class="section-label">Content</div>
            <a href="{{ route('admin.shows.index') }}" class="{{ request()->routeIs('admin.shows.*') ? 'active' : '' }}">Shows</a>

            <div class="section-label">Revenue</div>
            <a href="{{ route('admin.adwords.index') }}" class="{{ request()->routeIs('admin.adwords.*') ? 'active' : '' }}">Ad Placements</a>

            <div class="section-label">Settings</div>
            <a href="{{ route('admin.settings') }}" class="{{ request()->routeIs('admin.settings') ? 'active' : '' }}">Site Settings</a>
            <a href="{{ route('admin.messages.index') }}" class="{{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">Messages</a>
        </nav>

        <main class="admin-content">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error) <p>{{ $error }}</p> @endforeach
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>

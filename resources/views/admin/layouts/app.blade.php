<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel Admin')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" referrerpolicy="no-referrer" />
    @stack('styles')
</head>
<body class="admin-layout">
    <div class="admin-shell">
        @include('admin.partials.sidebar')

        <div class="admin-workspace">
            <header class="admin-topbar">
                <div class="topbar-title">
                    <h1>@yield('page-title', 'Dashboard')</h1>
                    <p>@yield('page-subtitle', 'Kelola informasi Kecamatan Cilebar')</p>
                </div>
                <div class="topbar-user">
                    @php
                        $adminUser = auth()->user();
                        $adminName = $adminUser?->name ?? 'Admin';
                        $initial = strtoupper(mb_substr($adminName, 0, 2, 'UTF-8'));
                    @endphp
                    <div class="topbar-avatar">{{ $initial }}</div>
                    <span>{{ $adminName }}</span>
                </div>
            </header>

            <main class="admin-main">
                @if(session('success'))
                    <p class="success-message">
                        {{ session('success') }}
                    </p>
                @endif

                @if(session('error'))
                    <div class="auth-alert">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="auth-alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    @stack('scripts')
</body>
</html>


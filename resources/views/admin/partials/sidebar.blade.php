@php
    $activeMenu = $activeMenu ?? request()->route()?->getName();

    $menuItems = [
        [
            'key' => 'admin.dashboard',
            'label' => 'Dashboard',
            'icon' => 'fa-solid fa-chart-line',
            'route' => route('admin.dashboard'),
        ],
        [
            'key' => 'admin.news',
            'label' => 'Berita',
            'icon' => 'fa-solid fa-newspaper',
            'route' => route('admin.news.index'),
        ],
        [
            'key' => 'admin.announcements',
            'label' => 'Pengumuman',
            'icon' => 'fa-solid fa-bullhorn',
            'route' => route('admin.announcements.index'),
        ],
        [
            'key' => 'admin.services',
            'label' => 'Layanan',
            'icon' => 'fa-solid fa-file-invoice',
            'route' => route('admin.services.index'),
        ],
        [
            'key' => 'admin.gallery',
            'label' => 'Galeri',
            'icon' => 'fa-solid fa-images',
            'route' => route('admin.gallery.index'),
        ],
        [
            'key' => 'admin.employees',
            'label' => 'Data Pegawai',
            'icon' => 'fa-solid fa-users',
            'route' => route('admin.employees.index'),
        ],
        [
            'key' => 'admin.welcome',
            'label' => 'Sambutan',
            'icon' => 'fa-solid fa-hand-holding-heart',
            'route' => route('admin.welcome'),
        ],
        [
            'key' => 'admin.wilayah',
            'label' => 'Wilayah',
            'icon' => 'fa-solid fa-map-marked-alt',
            'route' => route('admin.wilayah'),
        ],
        [
            'key' => 'admin.profile',
            'label' => 'Profil',
            'icon' => 'fa-solid fa-id-card-clip',
            'route' => route('admin.profile'),
        ],
        [
            'key' => 'admin.settings',
            'label' => 'Pengaturan',
            'icon' => 'fa-solid fa-gear',
            'route' => route('admin.settings'),
        ],
        [
            'key' => 'admin.inbox',
            'label' => 'Kotak Masuk',
            'icon' => 'fa-solid fa-envelope',
            'route' => route('admin.inbox.index'),
        ],
    ];
@endphp

<aside class="admin-sidebar">
    <div class="sidebar-brand">
        <div class="brand-logo">KC</div>
        <div class="brand-copy">
            <span>Kec. Cilebar</span>
            <small>Panel Admin</small>
        </div>
    </div>

    <nav class="admin-nav">
        @foreach ($menuItems as $item)
            @php
                $isActive = $activeMenu === $item['key'] || str_starts_with($activeMenu, $item['key'] . '.');
            @endphp
            <a class="admin-nav-link {{ $isActive ? 'is-active' : '' }}" href="{{ $item['route'] }}">
                <span class="nav-icon"><i class="{{ $item['icon'] }}"></i></span>
                <span>{{ $item['label'] }}</span>
            </a>
        @endforeach
    </nav>

    <div class="sidebar-footer">
        <form method="post" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="admin-nav-link admin-nav-link--logout">
                <span class="nav-icon"><i class="fa-solid fa-right-from-bracket"></i></span>
                <span>Keluar</span>
            </button>
        </form>
    </div>
</aside>


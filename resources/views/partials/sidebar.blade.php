<aside class="menu sidebar">
    <div class="sidebar-header py-2 px-4">
        <img src="https://via.placeholder.com/40" alt="Logo Yayasan" class="sidebar-logo">
        <span class="sidebar-yayasan-name has-text-weight-bold ml-2">Nama Yayasan</span>
    </div>

    <p class="menu-label has-text-white">
        Navigasi Menu
    </p>
    <ul class="menu-list">
        <li><a href="{{ route('dashboard.index') }}" class="{{ request()->is('dashboard') ? 'is-active' : '' }}"><span class="icon"><i class="fas fa-tachometer-alt"></i></span> Dashboard</a></li>
    </ul>

    <p class="menu-label has-text-white">
        Master Data
    </p>
    <ul class="menu-list">
        {{-- Tampilkan menu pasien untuk semua user yang sudah login --}}
        <li><a href="{{ route('patients.index') }}" class="{{ request()->is('patients*') ? 'is-active' : '' }}"><span class="icon"><i class="fas fa-user-injured"></i></span> Pasien</a></li>

        {{-- Hanya tampilkan menu caregiver, activities, dan medicines JIKA user adalah admin --}}
        @if (Auth::check() && Auth::user()->isAdmin())
            <li><a href="{{route('caregivers.index')}}"><span class="icon"><i class="fas fa-user-md"></i></span> Caregiver</a></li>
            <li><a href="{{ route('activities.index') }}" class="{{ request()->is('activities*') ? 'is-active' : '' }}"><span class="icon"><i class="fas fa-running"></i></span> Kegiatan</a></li>
            <li><a href="{{route('medicines.index')}}"><span class="icon"><i class="fas fa-pills"></i></span> Obat</a></li>
        @endif
    </ul>

    <p class="menu-label has-text-white">
        Kegiatan
    </p>
    <ul class="menu-list">
        <li><a href="#"><span class="icon"><i class="fas fa-clipboard-list"></i></span> Catatan Harian</a></li>
        <li><a href="#"><span class="icon"><i class="fas fa-prescription"></i></span> Pemberian Obat</a></li>
    </ul>

    <p class="menu-label has-text-white">
        Laporan
    </p>
    <ul class="menu-list">
        <li><a href="#"><span class="icon"><i class="fas fa-chart-line"></i></span> Perkembangan Pasien</a></li>
        <li><a href="#"><span class="icon"><i class="fas fa-file-medical-alt"></i></span> Lap Pemberian Obat</a></li>
    </ul>
</aside>

<style>
    /* Custom CSS untuk sidebar */
    .sidebar {
        background-color: #2D6A4F; /* Warna hijau utama */
        height: 100vh;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        overflow-y: auto;
        /* padding-top: diatur oleh javascript */
        z-index: 100; /* Tambahkan z-index */
        transition: padding-top 0.3s ease;
    }

    .sidebar::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100px; /* Tinggi awal, akan diubah oleh JS */
        background-color: #2D6A4F; /* Warna hijau sidebar */
        z-index: -1; /* Di belakang konten sidebar */
    }

    .sidebar-header {
        background-color: #2D6A4F;
        width: 100%;
        position: relative; /* Tambahkan position: relative; */
        z-index: 101; /* Di atas ::before */

    }
    .sidebar a {
        color: white;
        padding: 0.75rem 1rem;
        display: block;
        transition: background-color 0.2s;
    }

    .sidebar a:hover,
    .sidebar a.is-active {
        background-color: #40916C;
        color: white;
    }
    .menu-label{
        color:#95D5B2 !important;
    }

    /* Ikon */
    .sidebar a .icon {
        margin-right: 0.5rem;
        width: 1.25em;
        text-align: center;
    }
</style>

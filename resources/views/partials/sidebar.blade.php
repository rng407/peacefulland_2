<aside class="menu sidebar">
    <p class="menu-label">
        Navigasi Menu
    </p>
    <ul class="menu-list">
        <li><a href="#" class="{{ request()->is('dashboard') ? 'is-active' : '' }}"><span class="icon"><i class="fas fa-tachometer-alt"></i></span> Dashboard</a></li>
    </ul>
    <p class="menu-label">
        Master Data
    </p>
    <ul class="menu-list">
        <li><a href="#" class="{{ request()->is('patients*') ? 'is-active' : '' }}"><span class="icon"><i class="fas fa-user-injured"></i></span> Pasien</a></li>  <li><a href="#"><span class="icon"><i class="fas fa-user-md"></i></span> Staf</a></li>
        <li><a href="{{ route('activities.index') }}" class="{{ request()->is('activities*') ? 'is-active' : '' }}"><span class="icon"><i class="fas fa-running"></i></span> Kegiatan</a></li>
        <li><a href="#"><span class="icon"><i class="fas fa-pills"></i></span> Obat</a></li>
    </ul>

    <p class="menu-label">
        Kegiatan
    </p>
    <ul class="menu-list">
        <li><a href="#"><span class="icon"><i class="fas fa-clipboard-list"></i></span> Catatan Harian</a></li>
        <li><a href="#"><span class="icon"><i class="fas fa-prescription"></i></span> Pemberian Obat</a></li>
    </ul>

    <p class="menu-label">
        Laporan
    </p>
    <ul class="menu-list">
        <li><a href="#"><span class="icon"><i class="fas fa-chart-line"></i></span> Perkembangan Pasien</a></li>
        <li><a href="#"><span class="icon"><i class="fas fa-file-medical-alt"></i></span> Lap Pemberian Obat</a></li>
    </ul>
</aside>

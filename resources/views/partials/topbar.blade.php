<nav class="navbar" role="navigation" aria-label="main navigation" style="background-color: #f8f9fa; box-shadow: 0 2px 4px rgba(0,0,0,0.1);"> {{-- Tambahkan style inline --}}
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            {{--  Logo dan teks "My App" sudah dihapus --}}
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            {{-- menu home sudah di hapus --}}
        </div>

        <div class="navbar-end">
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    <span class="icon">
                        <i class="fas fa-user"></i>
                    </span>
                    <span>Selamat Datang, (Nama Staff)</span>
                </a>

                <div class="navbar-dropdown">
                    <a href="#" class="navbar-item">
                        <span class="icon">
                            <i class="fas fa-user-circle"></i>
                        </span>
                        Profil Saya
                    </a>
                    <a href="#" class="navbar-item">
                         <span class="icon">
                            <i class="fas fa-cog"></i>
                        </span>
                        Pengaturan
                    </a>
                    <hr class="navbar-divider">
                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="button is-light" type="submit">Logout</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>

<nav class="navbar is-light" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            My App
        </a>
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
    <div id="navbarBasicExample" class="navbar-menu is-hidden-tablet">
        <div class="navbar-start">
            <a class="navbar-item" href="{{ route('activities.index') }}">
                Activities
            </a>
        </div>
    </div>

    <div class="navbar-end">
        <div class="navbar-item">
            <div class="buttons">
                Selamat Datang, (Nama Staff)
            </div>
            <span class="icon">
                <i class="fas fa-user-circle"></i>
             </span>
        </div>

    </div>
</nav>

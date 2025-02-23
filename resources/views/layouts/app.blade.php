<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    @if(file_exists(public_path('css/app.css')))
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .main-content {
            margin-left: 250px; /* Lebar sidebar */
            transition: margin-left 0.3s ease;
            /* Atur tinggi main-content agar footer tetap di bawah */
        }
        .sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh; /* 100% dari tinggi viewport */
            overflow-y: auto; /* Jika kontennya lebih panjang dari tinggi layar */
            background-color: #f8f9fa; /* Warna latar belakang sidebar */
            padding-top: 1rem; /* Nanti di override oleh JS */
        }
        .footer {
            margin-left: 250px;
            padding: 1.5rem;
            text-align: center;
            transition: margin-left 0.3s ease;

        }
        /* Tambahan style untuk mobile */
        @media screen and (max-width: 768px) { /* Sesuaikan breakpoint sesuai kebutuhan */
            .main-content {
                margin-left: 0; /* Hilangkan margin saat mobile */
            }
            .sidebar {
                width: 100%; /* Sidebar full width saat mobile */
                position: static; /* Sidebar jadi static saat mobile */
                height: auto;
                overflow-y: visible;
                padding-top: 0; /* Reset padding-top saat mobile */
            }

            .footer{
                margin-left: 0;
            }

            .navbar-menu{
                display: block !important;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
@include('partials.topbar')

<div class="columns">

    <div class="column is-narrow is-hidden-mobile">
        @include('partials.sidebar')
    </div>


    <div class="column">
        <main class="main-content">
            @yield('content')
        </main>
    </div>

</div>

<footer class="footer">
    <div class="content has-text-centered">
        <p>
            &copy; {{ date('Y') }} My App. All rights reserved.
        </p>
    </div>
</footer>
<script>
    document.addEventListener('DOMContentLoaded', () => {

        // Fungsi untuk mengatur padding-top sidebar dan tinggi ::before
        function adjustSidebar() {
            const topbarHeight = document.querySelector('.navbar').offsetHeight;
            const sidebar = document.querySelector('.sidebar');
            const sidebarBefore = window.getComputedStyle(sidebar, '::before'); // Ambil style ::before

            sidebar.style.paddingTop = `${topbarHeight}px`;
            //document.querySelector('.sidebar::before').style.height = `${topbarHeight}px`; // Atur tinggi ::before
            // Ubah cara mengatur tinggi ::before:
            sidebar.style.setProperty('--before-height', `${topbarHeight}px`);

        }

        // Panggil fungsi saat halaman pertama kali dimuat
        adjustSidebar();

        // Panggil fungsi lagi saat ukuran jendela berubah
        window.addEventListener('resize', adjustSidebar);

        // ... kode untuk navbar burger (tidak berubah) ...
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        $navbarBurgers.forEach( el => {
            el.addEventListener('click', () => {
                const target = el.dataset.target;
                const $target = document.getElementById(target);
                el.classList.toggle('is-active');
                $target.classList.toggle('is-active');

                // Panggil fungsi lagi setelah navbar burger di-klik (untuk kasus mobile)
                adjustSidebar();
            });
        });
    });
</script>
@stack('scripts')

</body>
</html>

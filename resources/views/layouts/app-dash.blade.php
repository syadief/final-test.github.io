<html>

<head>
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0/css/all.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dash.css') }}">
</head>

<body>
    <div class="sidebar" id="sidebar">
        <a href="">
            <img alt="Company Logo" height="100" src="{{ asset('images/logo.png') }}" width="100" />
            <hr>
            <ul>
                <li>
                    <a href="/dashboard">
                        <i class="fa-solid fa-table-columns"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="/level-user">
                        <i class="fa-solid fa-users"></i>
                        Level User
                    </a>
                </li>
                <li>
                    <a href="/user">
                        <i class="fa-solid fa-user"></i>
                        User
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-book-atlas"></i>
                        Book
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i>
                        Deposit
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-brands fa-dashcube"></i>
                        Profiling
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-user-plus"></i>
                        Cek Kepribadian
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-regular fa-credit-card"></i>
                        Metode Pembayaran
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-arrow-right-arrow-left"></i>
                        Transaksi
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-brain"></i>
                        Brain Activation
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-ban"></i>
                        Blokir kata-kata
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-gear"></i>
                        Setting
                        <i class="set fa-solid fa-chevron-down"></i>
                    </a>
                </li>
            </ul>
    </div>
    <div class="header" id="header">
        <div class="menu-icon" id="menu-icon">
            <i class="fas fa-bars"></i>
        </div>

        <div class="user-info">
            <div class="bell">
                <i class="fa-regular fa-bell"></i>
            </div>
            <div>
                <a href="">
                    <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('images/default.jpg') }}"
                        alt="Foto Profil" width="40">
                </a>
            </div>
            <div class="container">
                <div class="dropdown">
                    <a class="dropdown-toggle text-dark" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <!-- Tombol Profile -->
                        <form action="{{ route('profile.edit') }}" method="GET" style="margin: 0;">
                            <button type="submit" class="dropdown-item"
                                style="border: none; background: none; width: 100%; text-align: left;">
                                Profile
                            </button>
                        </form>

                        <!-- Tombol Log Out -->
                        <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                            @csrf
                            <button type="submit" class="dropdown-item"
                                style="border: none; background: none; width: 100%; text-align: left;">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="content" id="content">
        @yield('content')
    </div>
    <script>
        document.getElementById('menu-icon').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            var header = document.getElementById('header');
            var content = document.getElementById('content');
            sidebar.classList.toggle('hidden');
            header.classList.toggle('full-width');
            content.classList.toggle('full-width');
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

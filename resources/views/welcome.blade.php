<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Farma Ortiz</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        /* General Body Styles */
        body {
            font-family: 'figtree', sans-serif;
            background-color: #ffffff;
            color: #333;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Navbar Styles */
        nav {
            background-color: #28a745;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
            border-radius: 5px;
            margin-right: 10px;
        }

        nav a:hover {
            background-color: #218838;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        /* Hero Section Styles */
        .hero {
            background-image: url('hero-bg.jpg');
            background-size: cover;
            background-position: center;
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #ffffff;
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(40, 167, 69, 0.5);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 600px;
            margin: 0 auto;
        }

        .hero-content h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }

        .btn-primary {
            background-color: #FF2D20;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #FF493D;
        }

        /* Services Section Styles */
        .services {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 50px 0;
            background-color: #e9ecef;
        }

        .service-item {
            text-align: center;
            max-width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            transition: transform 0.3s ease;
        }

        .service-item:hover {
            transform: translateY(-10px);
        }

        .service-item img {
            max-width: 100px;
            margin-bottom: 10px;
        }

        .service-item h2 {
            color: #28a745;
        }

        /* About Us Section Styles */
        .about-us {
            text-align: center;
            padding: 50px 20px;
            background-color: #f7f9fc;
        }

        .about-us h2 {
            color: #28a745;
        }

        /* Footer Styles */
        footer {
            background-color: #28a745;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <nav>
        <div class="logo">Farma Ortiz</div>
        <div>
            <ul class="navbar-nav ms-auto">
                @guest
                    @if (Route::has('login'))
                        <a class="nav-link" href="{{ route('login') }}">Log in</a>
                    @endif
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    @endif
                @else
                    @if(Auth::user()->isAdmin())
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ Auth::user()->name }}</a>
                    @else
                        <a class="nav-link" href="{{ route('seller.dashboard') }}">{{ Auth::user()->name }}</a>
                    @endif
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @endguest
            </ul>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <h1>Bienvenido a Farma Ortiz</h1>
            <p>Somos tu aliado en salud y bienestar. Encuentra aquí los productos y servicios que necesitas.</p>
            <a href="{{ Route::has('login') ? route('login') : '#' }}" class="btn btn-primary">Explora Nuestros Productos</a>
        </div>
    </section>

    <section class="services">
        <div class="service-item">
            <img src="service-icon-1.png" alt="Servicio 1">
            <h2>Servicio 1</h2>
            <p>Descripción breve del servicio.</p>
        </div>
        <div class="service-item">
            <img src="service-icon-2.png" alt="Servicio 2">
            <h2>Servicio 2</h2>
            <p>Descripción breve del servicio.</p>
        </div>
        <div class="service-item">
            <img src="service-icon-3.png" alt="Servicio 3">
            <h2>Servicio 3</h2>
            <p>Descripción breve del servicio.</p>
        </div>
    </section>

    <section class="about-us">
        <h2>Acerca de Nosotros</h2>
        <p>Somos una farmacia comprometida con la salud y el bienestar de nuestros clientes. Desde [año de fundación], hemos estado ofreciendo productos de calidad y servicios profesionales.</p>
    </section>

    <footer>
        <p>&copy; 2024 Farma Ortiz. Todos los derechos reservados.</p>
    </footer>

</body>

</html>

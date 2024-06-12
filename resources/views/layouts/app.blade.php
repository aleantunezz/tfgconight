<!DOCTYPE html>
<html>
<head>
    <title>CONNIGHT</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <div class="logo-container">
            <a href="{{ route('index') }}">
                <img src="{{ asset('images/logo.png') }}" alt="CONNIGHT Logo">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('profile') }}">Perfil</a></li>
                @auth
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" style="background: none; border: none; color: white; cursor: pointer; padding: 0;">Cerrar Sesión</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                @endauth
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <a href="{{ route('index') }}"><img src="{{ asset('images/logo.png') }}" alt="CONNIGHT Logo" style="width: 150px;"></a>
            </div>
            <div class="footer-section">
                <h3>Enlaces</h3>
                <ul>
                    <li><a href="{{ route('index') }}">Inicio</a></li>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('profile') }}">Perfil</a></li>
                    @auth
                        <li>
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" style="background: none; border: none; color: white; cursor: pointer; padding: 0;">Cerrar Sesión</button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                    @endauth
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contacto</h3>
                <p>contacto@connight.com</p>
                <p>Teléfono: +34 123 456 789</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 CONNIGHT. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>

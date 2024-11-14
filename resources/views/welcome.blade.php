<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f9f9f9;
            color: #333;
        }

        header {
            background: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .hero {
            background-image: url('{{ asset('images/hero.jpg') }}');
            height: 400px;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 0px 0px 8px #000;
            font-size: 2.5em;
            font-weight: bold;
        }

        .carousel h2 {
            color: #b82f14;
            text-shadow: 6px 6px 0px rgba(83, 155, 194, 0.5);
            font-size: 80px;
            font-family: 'Sancreek', cursive;
            text-align: center;
        }

        .activityCarousel {
            display: flex;
            overflow-x: scroll;
            width: 100%;
        }

        .activityCarousel::-webkit-scrollbar {
            height: 12px;
        }

        .activityCarousel::-webkit-scrollbar-thumb {
            background-color: #cf0000;
            border-radius: 5px;
        }

        .carousel img {
            width: 300px;
            height: auto;
            border-radius: 8px;
            margin: 5px;
        }

        .about,
        .schedule {
            padding: 20px;
            margin: 20px auto;
            max-width: 80%;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .about h2,
        .schedule h2 {
            color: #333;
            font-size: 1.5em;
        }

        .map-container iframe {
            width: 100%;
            height: 200px;
            border: none;
            margin-top: 20px;
        }

        .footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .footer p {
            margin: 0;
            font-size: 0.9em;
        }
    </style>

</head>

<body>
    <header>

        @if (Route::has('login'))
            <nav>
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <!-- Sección Hero con Slogan -->
    <section class="hero">
        <div>Descubre el espíritu de las penyes!</div>
    </section>

    <!-- Carrusel de Actividades -->
    <section class="carousel">
        <h2>Actividades Pasadas</h2>
        <div class="activityCarousel">
            <img src="{{ asset('images/actividad1.jpg') }}" alt="Actividad 1">
            <img src="{{ asset('images/actividad2.jpg') }}" alt="Actividad 2">
            <img src="{{ asset('images/actividad1.jpg') }}" alt="Actividad 3">
            <img src="{{ asset('images/actividad2.jpg') }}" alt="Actividad 4">
            <img src="{{ asset('images/actividad1.jpg') }}" alt="Actividad 5">
            <img src="{{ asset('images/actividad2.jpg') }}" alt="Actividad 6">
            <img src="{{ asset('images/actividad1.jpg') }}" alt="Actividad 7">
            <img src="{{ asset('images/actividad2.jpg') }}" alt="Actividad 8">
            <img src="{{ asset('images/actividad1.jpg') }}" alt="Actividad 9">
        </div>
    </section>

    <!-- Sección de Actividades -->
    <section class="schedule">
        <h2>Horario de actividades</h2>
        <p>Explora una variedad de actividades y eventos pensados para toda la familia!</p>
        <ul>
            <li>Concurso de Paellas - Sábado 12:00h</li>
            <li>Fiesta de la Espuma - Domingo 16:00h</li>
            <li>Espectáculo Musical - Sábado 20:00h</li>
            <li>Correfoc - Viernes 22:00h</li>
        </ul>
    </section>

    <!-- Sección de Horarios -->
    <section class="about">
        <h2>About</h2>
        <p>Este es el horario general de las actividades principales de las fiestas.</p>
        <ul>
            <li>Lunes - Viernes: 10:00h - 22:00h</li>
            <li>Sábado y Domingo: 09:00h - 23:00h</li>
        </ul>
    </section>

    <section id="contacto">
        <h3>Contactos</h3>
        <p><i class="fas fa-envelope"></i> Correo electrónico: <a
                href="mailto:info@ecoblog.com">info@techsolutions.com</a></p>
        <p><i class="fas fa-phone"></i> Teléfono: +34 123 456 789</p>
        <p><i class="fas fa-map-marker-alt"></i> Dirección: Calle Falsa 123, Ciudad Ejemplo</p>
        <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3064.37793062309!2d-0.22695052475247732!3d39.82094349168681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd600faa5ce4c981%3A0x6435a11e74fdf3c2!2sIES%20BENIGASL%C3%93!5e0!3m2!1ses!2ses!4v1731092388175!5m2!1ses!2ses"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <!-- Footer con Ubicaciones -->
    <footer class="footer">
        <p>Penyes App | Las Fiestas de Penyes en tu ciudad</p>
        <p>Ubicación principal: Plaza Mayor, Ciudad de las Penyes</p>
    </footer>

</body>

</html>
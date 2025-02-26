<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

        .contact-container {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            margin: 40px 20px;
        }

        .contacts,
        .contact-form {
            width: 48%;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .contact-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .contact-form form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .contact-form label {
            font-size: 0.9em;
            font-weight: bold;
            color: #333;
        }

        .contact-form input,
        .contact-form textarea {
            padding: 8px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 0.9em;
            width: 100%;
            transition: border-color 0.3s;
        }

        .contact-form input:focus,
        .contact-form textarea:focus {
            border-color: #3498db;
            outline: none;
        }

        .contact-form textarea {
            resize: vertical;
            min-height: 100px;
        }

        .contact-form button {
            padding: 8px 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .contact-form button:hover {
            background-color: #2980b9;
        }

        .imageAboveFooter {
            height: 5rem;
            width: 100%;
            background: url("/images/vaca.png") no-repeat center;
            background-size: contain;
        }

        .footer-form {
            position: relative;
            background: #333;
            text-align: center;
            padding: 1rem;
            color: white;
            clip-path: url(#cuernosPath);
            animation: formChange 2s ease-in-out infinite, colorChange 5s ease-in-out infinite alternate;
        }

        @keyframes formChange {
            0% {
                clip-path: polygon(0 0%, 100% 0%, 100% 100%, 0 100%);
            }

            50% {
                clip-path: polygon(0 20%, 10% 0%, 30% 20%, 50% 0%, 70% 20%, 90% 0%, 100% 20%, 100% 100%, 0 100%);
            }

            100% {
                clip-path: polygon(0 0%, 100% 0%, 100% 100%, 0 100%);
            }
        }

        @keyframes colorChange {
            0% {
                background-color: #333;
            }

            50% {
                background-color: #6c2c6e;
            }

            100% {
                background-color: #333;
            }
        }

        @media (max-width: 768px) {
            .contact-container {
                flex-direction: column;
                gap: 20px;
            }

            .contacts,
            .contact-form {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    {{-- Mostrar mensaje de éxito --}}
    @if (session('success'))
        <div id="successMessage" class="fixed top-5 right-5 bg-green-500 text-white p-4 rounded-lg shadow-lg z-50">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(function() {
                document.getElementById('successMessage').style.display = 'none';
            }, 5000); 
        </script>
    @endif
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

    <section class="schedule">
        <h2>📅 Programación de Fiestas 2024</h2>
        <p>Descubre los eventos, conciertos, toros, verbenas y mucho más que hacen vibrar a Vall de Uxó.</p>
        <ul>
            <li><strong>Marzo - Fiestas de San José</strong></li>
            <ul>
                <li>🔥 Encendido de la hoguera</li>
                <li>🎶 Conciertos y espectáculos en vivo</li>
                <li>🍽️ Comida popular y concursos gastronómicos</li>
            </ul>
            <li><strong>Junio - Fiestas de San Juan</strong></li>
            <ul>
                <li>🎆 Espectáculo de fuegos artificiales</li>
                <li>🏇 Encierros y festejos taurinos</li>
                <li>🏆 Competiciones deportivas y juegos tradicionales</li>
            </ul>
            <li><strong>Septiembre - Fiestas Patronales en Honor a la Sagrada Familia y el Santísimo Cristo</strong></li>
            <ul>
                <li>🎡 Feria y atracciones</li>
                <li>🐂 Bous al carrer</li>
                <li>🎤 Actuaciones musicales y verbenas</li>
            </ul>
        </ul>
        <p>📌 <em>Consulta nuestra web y redes sociales para actualizaciones y novedades de última hora.</em></p>
    </section>

    <!-- Sección About -->
    <section class="about">
        <h2>Sobre Nosotros</h2>
        <p>Las peñas de Vall de Uxó representan el espíritu festivo, la unión y la alegría de nuestra gente. Formadas por grupos de amigos y familias, cada peña es parte fundamental de nuestras celebraciones, organizando eventos, participando en concursos y manteniendo vivas nuestras tradiciones.</p>
        
        <h3>🌟 ¿Qué hacemos?</h3>
        <ul>
            <li>🎭 Organizamos actividades culturales, deportivas y gastronómicas.</li>
            <li>🎉 Participamos en los festejos populares de la ciudad.</li>
            <li>👨‍👩‍👧‍👦 Fomentamos la convivencia y el compañerismo entre los vecinos.</li>
        </ul>

        <h3>💬 ¿Quieres formar parte de una peña o crear la tuya?</h3>
        <p>Ponte en contacto con nosotros y únete a la fiesta. ¡Te esperamos con los brazos abiertos!</p>
    </section>

    <section id="contacto">
        <div class="contact-container">
            <div class="contacts">
                <h3>
                    <span style="margin-left: 10px; font-size: 1.3em; color: #333;">Contactos</span>
                </h3>
                <br />
                <p><i class="fas fa-envelope"></i> Correo electrónico: <a
                        href="mailto:info@ecoblog.com">info@techsolutions.com</a></p>
                <p><i class="fas fa-phone"></i> Teléfono: +34 123 456 789</p>
                <p><i class="fas fa-map-marker-alt"></i> Dirección: Calle Falsa 123, Ciudad Ejemplo</p>
            </div>

            <div class="contact-form">
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre: </label>
                        <input type="text" name="name" id="name" placeholder="Tu nombre completo" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico: </label>
                        <input type="email" name="email" id="email" placeholder="Tu correo electrónico"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="message">Mensaje: </label>
                        <textarea name="message" id="message" placeholder="Escribe tu mensaje aquí..." required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3064.37793062309!2d-0.22695052475247732!3d39.82094349168681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd600faa5ce4c981%3A0x6435a11e74fdf3c2!2sIES%20BENIGASL%C3%93!5e0!3m2!1ses!2ses!4v1731092388175!5m2!1ses!2ses"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <div class="imageAboveFooter"></div>
    <!-- Footer con Ubicaciones -->
    <footer class="footer-form text-center text-white h-20 flex flex-col justify-center">
        <p class="mb-1">Penyes App | Las Fiestas de Penyes en tu ciudad</p>
        <p>Ubicación principal: Plaza Mayor, Ciudad de las Penyes</p>
    </footer>

    <svg xmlns="http://www.w3.org/2000/svg" width="0" height="0">
        <defs>
            <!-- Define el clipPath para la forma de cuernos de toro -->
            <clipPath id="cuernosPath" clipPathUnits="objectBoundingBox">
                <path d="M0,0.2 C0.1,0.1, 0.3,0, 0.5,0 C0.7,0, 0.9,0.1, 1,0.2 L1,1 L0,1 Z" />
            </clipPath>
        </defs>
    </svg>

</body>

</html>

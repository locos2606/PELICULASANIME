<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Attack on Titan - ANIMEDJ</title>

    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="{{ asset('css/styles1.css') }}">
    @livewireStyles
</head>
<body>

    <header>
        <h1>ANIMEDJ</h1>
        <nav>
            <ul>
                <li><a href="{{ route('index') }}">Inicio</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="anime-info">
            <h2>Attack on Titan</h2>
            <img src="https://m.media-amazon.com/images/M/MV5BNjY4MDQxZTItM2JjMi00NjM5LTk0MWYtOTBlNTY2YjBiNmFjXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg" 
                 alt="Attack on Titan" loading="lazy">
            
            <p>En un mundo donde la humanidad lucha contra los titanes, Eren Yeager jura venganza y se une a la lucha.</p>

            <div id="anime-player">
                <h3>Reproductor de Episodios</h3>
                <iframe width="640" height="480" 
                        src="https://drive.google.com/file/d/1oZ8h_GEaaH6txiVbY2nJU9rP1AMRY-l5/preview" 
                        frameborder="0" allow="autoplay" allowfullscreen loading="lazy">
                </iframe>
            </div>

            <!-- Botón para agregar a favoritos -->
            <button id="saveMangaButton" data-manga-title="attack on titan">
                <img src="/Assets/add_mark_like_save_label_book_bookmark_icon_219290.ico" alt="Guardar" class="button-icon">
                Agregar a lista de favoritos
            </button>
        </section>

        <!-- Comentarios con Livewire -->
        @livewire('comment-component', ['mangaId' => 5])
    </main>

    <footer>
        <p>&copy; 2025 ANIMEDJ - Todos los derechos reservados</p>

        <!-- Carrusel de texto -->
        <div id="carousel-container" style="overflow: hidden; width: 100%;">
            <div id="carousel" style="display: flex; transition: transform 0.5s ease;">
                <div class="carousel-item" style="flex: 0 0 100%;">Estamos para entretener.</div>
                <div class="carousel-item" style="flex: 0 0 100%;">Disfruta de nuestras películas.</div>
                <div class="carousel-item" style="flex: 0 0 100%;">Síguenos en nuestras redes sociales.</div>
            </div>
        </div>
    </footer>

    <!-- Carrusel automático -->
    <script>
        let currentIndex = 0;
        const items = document.querySelectorAll('.carousel-item');
        const totalItems = items.length;

        function moveCarousel() {
            currentIndex = (currentIndex + 1) % totalItems;
            const carousel = document.getElementById('carousel');
            const offset = -currentIndex * 100;
            carousel.style.transform = `translateX(${offset}%)`;
        }

        setInterval(moveCarousel, 3000);
    </script>

    <script src="{{ asset('js/temaclaro.js') }}" defer></script>
    <script src="{{ asset('js/detalles.js') }}"></script>
    @livewireScripts
</body>
</html>

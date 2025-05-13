<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bleach - ANIMEDJ</title>

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
            <h2>Bleach</h2>
            <img src="https://pics.filmaffinity.com/Bleach_Serie_de_TV-235942666-large.jpg" alt="Bleach" loading="lazy">
            <p>La serie narra las aventuras de un adolescente llamado Ichigo Kurosaki, un estudiante de quince años que tiene la habilidad de interactuar con los espíritus. Una noche, Ichigo se encuentra con una Shinigami llamada Rukia Kuchiki.</p>

            <div id="anime-player">
                <h3>Reproductor de Episodios</h3>
                <iframe width="640" height="480" src="https://drive.google.com/file/d/1oZ8h_GEaaH6txiVbY2nJU9rP1AMRY-l5/preview" 
                        frameborder="0" allow="autoplay" allowfullscreen loading="lazy">
                </iframe>
            </div>

            <!-- Botón para agregar a favoritos -->
            <button id="saveMangaButton" data-manga-title="bleach">
                <img src="/Assets/add_mark_like_save_label_book_bookmark_icon_219290.ico" alt="Guardar" class="button-icon">
                Agregar a lista de favoritos
            </button>
        </section>

        <!-- Comentarios con Livewire -->
        @livewire('comment-component', ['mangaId' => 3])
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

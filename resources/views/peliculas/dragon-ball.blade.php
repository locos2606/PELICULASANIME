<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRAGON BALL - ANIMEDJ</title>
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
            <h2>DRAGON BALL SUPER: SUPER HERO</h2>
            <img src="https://upload.wikimedia.org/wikipedia/en/b/bb/Dragon_Ball_Super_Super_Hero_poster.png" alt="DRAGON BALL SUPER: SUPER HERO" loading="lazy">
            <p>La Patrulla Roja, una vez destruida por Goku en el pasado, ha sido revivida por un grupo de personas que crearon a los androides Gamma 1 y Gamma 2 para vengarse. Piccolo y Gohan deben enfrentarse a esta nueva amenaza y salvar al mundo de un peligro que crece en las sombras.</p>

            <div id="anime-player">
                <h3>Reproductor de Episodios</h3>
                <iframe width="640" height="480" src="https://drive.google.com/file/d/1GhCjqBeaLFey6AzRCupAfV29Ul0O_tLA/preview" 
                        frameborder="0" allow="autoplay" allowfullscreen loading="lazy"></iframe>
            </div>
        </section>

        <button id="saveMangaButton" data-manga-title="DRAGON BALL SUPER: SUPER HERO">
            <img src="/Assets/add_mark_like_save_label_book_bookmark_icon_219290.ico" alt="Icono de guardar" class="button-icon">
            Agregar a lista de favoritos
        </button>
    </main>

    @livewire('comment-component', ['mangaId' => 7])

    <footer>
        <p>&copy; 2025 ANIMEDJ - Todos los derechos reservados</p>
        <div id="carousel-container" style="overflow: hidden; width: 100%;">
            <div id="carousel" style="display: flex; transition: transform 0.5s ease;">
                <div class="carousel-item" style="flex: 0 0 100%;">Estamos para entretener.</div>
                <div class="carousel-item" style="flex: 0 0 100%;">Disfruta de nuestras películas.</div>
                <div class="carousel-item" style="flex: 0 0 100%;">Síguenos en nuestras redes sociales.</div>
            </div>
        </div>
    </footer>

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

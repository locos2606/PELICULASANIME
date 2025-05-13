<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUZUME - ANIMEDJ</title>
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
            <h2>SUZUME</h2>
            <img src="https://i0.wp.com/stewarthotston.com/wp-content/uploads/2024/10/images.jpeg?fit=452%2C678&ssl=1" alt="SUZUME" loading="lazy">
            <p>"Suzume" cuenta la historia de una joven que abre accidentalmente una puerta mágica que desata desastres naturales por todo Japón. Junto a un misterioso joven, Suzume debe embarcarse en una misión para cerrar las puertas y restaurar el equilibrio, enfrentándose a sus miedos y al pasado.</p>

            <div id="anime-player">
                <h3>Reproductor de Episodios</h3>
                <iframe width="640" height="480" src="https://drive.google.com/file/d/1IMmp6EvVdNrg8zG1gjgE6QpmSh2AV4wN/preview" 
                        frameborder="0" allow="autoplay" allowfullscreen loading="lazy"></iframe>
            </div>
        </section>

        <button id="saveMangaButton" data-manga-title="SUZUME">
            <img src="/Assets/add_mark_like_save_label_book_bookmark_icon_219290.ico" alt="Icono de guardar" class="button-icon">
            Agregar a lista de favoritos
        </button>
    </main>

    @livewire('comment-component', ['mangaId' => 11])

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

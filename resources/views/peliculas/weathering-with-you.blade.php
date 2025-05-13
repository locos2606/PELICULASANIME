<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEATHERING WITH YOU - ANIMEDJ</title>
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
            <h2>WEATHERING WITH YOU</h2>
            <img src="https://imgs.search.brave.com/1G08VlbJnbFR1H6e1sRD1ZrGt7YjzhgLURyTVV-yIR8/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMtbmEuc3NsLWlt/YWdlcy1hbWF6b24u/Y29tL2ltYWdlcy9J/LzkxSVdkQm80VG5M/LmpwZw" alt="WEATHERING WITH YOU" loading="lazy">
            <p>En "Weathering With You", Hodaka, un adolescente que escapa a Tokio, conoce a Hina, una chica con la misteriosa habilidad de detener la lluvia y despejar el cielo. Juntos emprenden una historia de amor y sacrificio en medio de un clima descontrolado y decisiones que cambiarán sus vidas para siempre.</p>

            <div id="anime-player">
                <h3>Reproductor de Episodios</h3>
                <iframe width="640" height="480" src="https://drive.google.com/file/d/1JcT3dN56ZovWyYImA_u01BOjLbAkbVm7/preview" 
                        frameborder="0" allow="autoplay" allowfullscreen loading="lazy"></iframe>
            </div>
        </section>

        <button id="saveMangaButton" data-manga-title="WEATHERING WITH YOU">
            <img src="/Assets/add_mark_like_save_label_book_bookmark_icon_219290.ico" alt="Icono de guardar" class="button-icon">
            Agregar a lista de favoritos
        </button>
    </main>

    @livewire('comment-component', ['mangaId' => 17])

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

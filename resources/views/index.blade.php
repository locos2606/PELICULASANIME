<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANIMEDJ</title>

    <link rel="icon" href="Assets/diseno-logotipo-anime-dibujado-mano_23-2151269661.avif" type="image/avif">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos-home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles1.css') }}">
</head>

<body>
{{-- Toast de sesión --}}
    @if(session('mensaje'))
        <div id="toast" class="toast">
            {{ session('mensaje') }}
        </div>
    @endif

    <header id="inicio">
        <input type="checkbox" id="menu">
        <label for="menu" class="hamburger">
        </label>

        <section class="contenedor-nav">
            <div class="logo">
                <img src="Assets/diseno-logotipo-anime-dibujado-mano_23-2151269668.avif" alt="logo">
                <span>ANIMEDJ</span>
            </div>

            <form class="search-form" action="{{ route('mostrarContenido') }}" method="GET">
                <input type="text" class="search-input" placeholder="Buscar aquí (ej: naruto, seinen...)" name="genre" required>
                <button type="submit" class="search-btn">
                    <i class="fas fa-search"></i> Buscar Películas
                </button>
            </form>

            <nav>
                <ul>
                    <li><a href="#inicio">INICIO</a></li>
                    <li><a href="#categorias">CATEGORÍAS</a></li>
                    <li><a href="{{ route('control_panel') }}">CONFIGURACIÓN</a></li>
                    @auth
                        <!-- Ocultar botones si ya ha iniciado sesión -->
                    @else
                        <li><a href="{{ route('sign') }}">REGÍSTRATE</a></li>
                        <li><a href="{{ route('login-me') }}">INICIAR SESIÓN</a></li>
                    @endauth
                </ul>
            </nav>

            <div class="sesionActiva">
                @auth
                    <img src="{{ asset('Assets/') }}" alt="">
                    <span class="Bienvenido">Bienvenido, {{ Auth::user()->name }}</span>
                @endauth
            </div>
        </section>

        <section class="textos-header">
            <h1>ANIMEDJ</h1>
            <p>En nuestra aplicación web, invitamos a todos los fanáticos del anime, tanto veteranos como nuevos, a sumergirse en nuestro extenso catálogo de películas animadas.
               Aquí podrás explorar mundos increíbles, vivir emociones intensas y disfrutar de una experiencia cinematográfica única con títulos que van desde los clásicos del anime hasta los estrenos más recientes.
               ¡Navega ahora y disfruta de nuestros mejores animes!</p>
            <a href="#">DESCUBRE PELÍCULAS ➟</a>
        </section>
    </header>

    <section id="categorias" class="category-section">
        <h1>¿PELICULAS?</h1>
        <div class="category-grid">
            @php $cards = 0; @endphp
            @foreach ([
                ['genre' => 1, 'title' => 'Naruto', 'image' => 'https://naruto-official.com/special/anime_gallery/anime-gallery1.webp'],
                ['genre' => 2, 'title' => 'One Piece', 'image' => 'https://es.web.img3.acsta.net/pictures/16/02/03/17/11/571106.jpg'],
                ['genre' => 3, 'title' => 'Bleach', 'image' => 'https://pics.filmaffinity.com/Bleach_Serie_de_TV-235942666-large.jpg'],
                ['genre' => 4, 'title' => 'Parasyte', 'image' => 'https://m.media-amazon.com/images/M/MV5BMzg2YjA0NGYtYjQwMS00MDQyLWFlNWMtODVhNTBkYWIyNjE1XkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg'],
                ['genre' => 5, 'title' => 'Attack on Titan', 'image' => 'https://m.media-amazon.com/images/M/MV5BNjY4MDQxZTItM2JjMi00NjM5LTk0MWYtOTBlNTY2YjBiNmFjXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg'],
                ['genre' => 6, 'title' => 'La princesa Mononoke', 'image' => 'https://es.web.img3.acsta.net/pictures/22/05/09/12/02/0498795.jpg'],
                ['genre' => 7, 'title' => 'Dragon Ball', 'image' => 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/2c7060f6-2fa8-4a14-88bd-6a4c40a5a68b/de02cfs-02372838-1fbd-48c4-9324-df3da45a7cd3.jpg'],
                ['genre' => 8, 'title' => 'Demon Slayer', 'image' => 'https://preview.redd.it/visfj3xg7q9d1.jpeg?width=640&crop=smart&auto=webp&s=ea2e616f2031dde782511ed4aaed6faef8db1051'],
                ['genre' => 9, 'title' => 'Jujutsu Kaisen', 'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/4/46/Jujutsu_kaisen.jpg/250px-Jujutsu_kaisen.jpg'],
                ['genre' => 10, 'title' => 'Your Name', 'image' => 'https://m.media-amazon.com/images/M/MV5BZmUyYWRiODktOGYxMC00MWY3LThhNDUtZTViZDVkYTYwYmJhXkEyXkFqcGc@._V1_QL75_UY281_CR10,0,190,281_.jpg'],
                ['genre' => 11, 'title' => 'Suzume', 'image' => 'https://i0.wp.com/stewarthotston.com/wp-content/uploads/2024/10/images.jpeg?fit=452%2C678&ssl=1'],
                ['genre' => 12, 'title' => 'Mi vecino Totoro', 'image' => 'https://pics.filmaffinity.com/Mi_vecino_Totoro-520484169-large.jpg'],
                ['genre' => 13, 'title' => 'Violet Evergarden', 'image' => 'https://musicart.xboxlive.com/7/23715100-0000-0000-0000-000000000002/504/image.jpg'],
                ['genre' => 14, 'title' => 'A Silent Voice', 'image' => 'https://upload.wikimedia.org/wikipedia/en/3/32/A_Silent_Voice_Film_Poster.jpg'],
                ['genre' => 15, 'title' => 'Howl\'s Moving Castle', 'image' => 'https://upload.wikimedia.org/wikipedia/en/a/a0/Howls-moving-castleposter.jpg'],
                ['genre' => 16, 'title' => 'Spirited Away', 'image' => 'https://m.media-amazon.com/images/M/MV5BNTEyNmEwOWUtYzkyOC00ZTQ4LTllZmUtMjk0Y2YwOGUzYjRiXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg'],
                ['genre' => 17, 'title' => 'Weathering With You', 'image' => 'https://i.blogs.es/00dc30/weathering-with-you/450_1000.jpg'],
                ['genre' => 18, 'title' => '5 centímetros por segundo', 'image' => 'https://m.media-amazon.com/images/M/MV5BODVmZjhhYTYtYzRiOC00YzFiLThlZjMtZTQxNWY0MTI1MzlmXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg'],
                ['genre' => 19, 'title' => 'Pokémon: Mewtwo Strikes Back', 'image' => 'https://m.media-amazon.com/images/S/pv-target-images/ea142a90eaa5f0e02e5ba0388cfabe0bf22c4920c71ac6c83475cfe4977461e1.png'],
                ['genre' => 20, 'title' => 'The Garden of Words', 'image' => 'https://i.pinimg.com/564x/23/38/6d/23386d670b3629e6927efb48a2c149e6.jpg'],
                ['genre' => 21, 'title' => 'The Boy and the Beast', 'image' => 'https://upload.wikimedia.org/wikipedia/en/d/dc/The_Boy_and_the_Beast_poster.jpg'],
                ['genre' => 22, 'title' => 'The Wind Rises', 'image' => 'https://upload.wikimedia.org/wikipedia/en/a/a3/Kaze_Tachinu_poster.jpg'],
            ] as $anime)
                <div class="category-card{{ $cards >= 10 ? ' extra-card' : '' }}" style="{{ $cards >= 10 ? 'display:none' : '' }}">
                    <a href="{{ route('categories', ['genre' => $anime['genre']]) }}">
                        <img src="{{ $anime['image'] }}" alt="{{ $anime['title'] }}">
                        <div class="category-overlay"><span>{{ $anime['title'] }}</span></div>
                    </a>
                </div>
                @php $cards++; @endphp
            @endforeach
        </div>

        <div class="ver-mas-container" style="text-align:center; margin-top: 1rem;">
            <button id="verMasBtn" style="padding: 10px 20px; background-color: #00cc99; border: none; color: white; cursor: pointer; font-size: 16px; border-radius: 8px;">
                Ver más
            </button>
        </div>
    </section>

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
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.category-card');
            const verMasBtn = document.getElementById('verMasBtn');
            let visible = 10;

            cards.forEach((card, index) => {
                if (index >= visible) {
                    card.style.display = 'none';
                    card.classList.add('extra-card');
                }
            });

            verMasBtn.addEventListener('click', () => {
                const hiddenCards = document.querySelectorAll('.extra-card');
                let count = 0;

                hiddenCards.forEach((card) => {
                    if (count < 10) {
                        card.style.display = 'block';
                        card.classList.remove('extra-card');
                        count++;
                    }
                });

                if (document.querySelectorAll('.extra-card').length === 0) {
                    verMasBtn.style.display = 'none';
                }
            });
        });

        let currentIndex = 0;
        const items = document.querySelectorAll('.carousel-item');
        const totalItems = items.length;

        function moveCarousel() {
            currentIndex = (currentIndex + 1) % totalItems;
            const carousel = document.getElementById('carousel');
            carousel.style.transform = `translateX(${-currentIndex * 100}%)`;
        }

        setInterval(moveCarousel, 3000);
    </script>

    <script src="{{ asset('js/temaclaro.js') }}" defer></script>
    <script src="{{ asset('js/detalles.js') }}"></script>
    @if(session('mensaje'))
    <script>
      // Eliminamos el toast después de 4 segundos
      setTimeout(() => {
        const toast = document.getElementById('toast');
        if (toast) toast.remove();
      }, 4000);
    </script>
@endif

</body>
</html>

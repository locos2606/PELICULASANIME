<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Naruto - ANIMEDJ</title>

    @vite(['resources/css/app.css'])
    @livewireStyles

    <style>
      /* Estilos para el área de comentarios */
      #comentarios form {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
      }
      #comentarios form textarea {
        background-color: #2d2d2d;
        color: #fff;
        border: 1px solid #444;
        border-radius: 0.5rem;
        padding: 0.75rem;
        width: 100%;
        resize: vertical;
      }
      #comentarios form button {
        align-self: flex-end;
        background-color: #facc15; /* Yellow-400 */
        color: #000;
        font-weight: bold;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 0.5rem;
        cursor: pointer;
        transition: background-color 0.3s;
      }
      #comentarios form button:hover {
        background-color: #eab308; /* Yellow-500 */
      }
      #comentarios .comments-container ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
      }
      #comentarios .comments-container ul li {
        background-color: #1f2937; /* Gray-800 */
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
      }
    </style>
</head>

<body class="bg-gray-900 text-gray-100 font-sans antialiased">
  {{-- Header --}}
  <header class="bg-gray-800 shadow-md">
    <div class="container mx-auto flex items-center justify-between p-4">
      <h1 class="text-2xl font-extrabold uppercase tracking-widest">ANIMEDJ</h1>
      <nav>
        <ul class="flex space-x-6">
          <li><a href="{{ route('index') }}" class="hover:text-yellow-400 transition">Inicio</a></li>
          <li><a href="#contacto" class="hover:text-yellow-400 transition">Contacto</a></li>
        </ul>
      </nav>
    </div>
  </header>

  {{-- Main Content --}}
  <main class="container mx-auto p-6">
    {{-- Sección Naruto --}}
    <section id="anime-info" class="bg-gray-800 rounded-2xl shadow-lg overflow-hidden mb-8">
      <div class="md:flex">
        {{-- Imagen --}}
        <div class="md:w-1/3">
          <img src="https://naruto-official.com/special/anime_gallery/anime-gallery1.webp"
               alt="Naruto Uzumaki"
               loading="lazy"
               class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-300">
        </div>

        {{-- Descripción y reproductor --}}
        <div class="md:w-2/3 p-6 flex flex-col justify-between">
          <div>
            <h2 class="text-3xl font-bold mb-4 text-yellow-400">Naruto</h2>
            <p class="text-gray-300 mb-6">
              Naruto Uzumaki es un joven ninja que busca el reconocimiento de su aldea y sueña con convertirse en el Hokage.
            </p>
            <h3 class="text-xl font-semibold mb-2">Reproductor de Episodios</h3>
            <div class="mb-6">
              <iframe src="https://drive.google.com/file/d/1qh0ON1gCE7MwQTl04aRfO2vvKX3NlOc9/preview"
                      class="w-full h-96 sm:h-[600px] md:h-[800px] lg:h-[900px] rounded-lg shadow-inner"
                      frameborder="0" allow="autoplay" allowfullscreen loading="lazy"></iframe>
            </div>
          </div>
          {{-- Botón favoritos --}}
          <button id="saveMangaButton"
                  data-manga-title="naruto"
                  class="mt-4 self-start bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-2 px-4 rounded-full flex items-center space-x-2 transition-shadow shadow-md hover:shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 13l4 4L19 7" />
            </svg>
            <span>Agregar a favoritos</span>
          </button>
        </div>
      </div>
    </section>

    {{-- Comentarios --}}
    <section id="comentarios" class="bg-gray-800 rounded-2xl shadow-lg p-6 mt-8">
      <h3 class="text-2xl font-bold text-yellow-400 mb-4">Comentarios</h3>
      <div class="comments-container">
        @livewire('comment-component', ['mangaId' => 1])
      </div>
    </section>
  </main>

  {{-- Footer --}}
  <footer class="bg-gray-800 mt-12 py-6">
    <div class="container mx-auto text-center">
      <p class="text-gray-400">&copy; 2025 ANIMEDJ - Todos los derechos reservados</p>
      <div id="carousel-container" class="relative mt-4 overflow-hidden h-12">
        <div id="carousel" class="flex h-full transition-transform duration-500">
          <div class="carousel-item flex-shrink-0 w-full flex items-center justify-center">Estamos para entretener.</div>
          <div class="carousel-item flex-shrink-0 w-full flex items-center justify-center">Disfruta de nuestras películas.</div>
          <div class="carousel-item flex-shrink-0 w-full flex items-center justify-center">Síguenos en nuestras redes sociales.</div>
        </div>
      </div>
    </div>
  </footer>

  {{-- Scripts --}}
  <script>
    let currentIndex = 0;
    const items = document.querySelectorAll('.carousel-item');
    const totalItems = items.length;
    setInterval(() => {
      currentIndex = (currentIndex + 1) % totalItems;
      document.getElementById('carousel').style.transform = `translateX(-${currentIndex * 100}%)`;
    }, 3000);
  </script>

  <script src="{{ asset('js/temaclaro.js') }}" defer></script>
  <script src="{{ asset('js/detalles.js') }}"></script>
  @livewireScripts
</body>
</html>

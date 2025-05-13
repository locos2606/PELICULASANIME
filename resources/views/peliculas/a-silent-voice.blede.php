<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>A SILENT VOICE - ANIMEDJ</title>

  @vite(['resources/css/app.css'])
  @livewireStyles
  <link rel="stylesheet" href="{{ asset('css/styles1.css') }}">
</head>

<body class="bg-gray-900 text-gray-100 font-sans antialiased">
  {{-- Header --}}
  <header class="bg-gray-800 shadow-md">
    <div class="container mx-auto flex items-center justify-between p-4">
      <h1 class="text-2xl font-extrabold uppercase tracking-widest">ANIMEDJ</h1>
      <nav>
        <ul class="flex space-x-6">
          <li><a href="{{ route('index') }}" class="hover:text-green-400 transition">Inicio</a></li>
          <li><a href="#contacto" class="hover:text-green-400 transition">Contacto</a></li>
        </ul>
      </nav>
    </div>
  </header>

  {{-- Main Content --}}
  <main class="container mx-auto p-6">
    <section id="anime-info" class="bg-gray-800 rounded-2xl shadow-lg overflow-hidden">
      <div class="md:flex">
        {{-- Imagen --}}
        <div class="md:w-1/3">
          <img src="https://upload.wikimedia.org/wikipedia/en/e/e0/A_Silent_Voice_Film_Poster.jpg"
               alt="A Silent Voice – Póster"
               loading="lazy"
               class="w-full h-auto object-cover">
        </div>

        {{-- Descripción y reproductor --}}
        <div class="md:w-2/3 p-6 flex flex-col justify-between">
          <div>
            <h2 class="text-3xl font-bold mb-4">A SILENT VOICE</h2>
            <p class="text-gray-300 mb-6">
              “A Silent Voice” relata la historia de Shoya Ishida, un adolescente que busca redimirse por haber acosado a Shoko Nishimiya, una compañera sorda, durante la primaria. A través de una conmovedora narrativa, la película explora la culpa, el perdón y el valor de la empatía en la reconstrucción de relaciones humanas.
            </p>
            <h3 class="text-xl font-semibold mb-2">Reproductor de Episodios</h3>
            <div class="aspect-w-16 aspect-h-9 mb-6">
              <iframe src="https://drive.google.com/file/d/1NJoCv9B15AR1TnKY9_OInM5UsnvBL4HZ/preview"
                      class="w-full h-full rounded-lg shadow-inner"
                      frameborder="0" allow="autoplay" allowfullscreen loading="lazy"></iframe>
            </div>
          </div>
          {{-- Botón favoritos --}}
          <button id="saveAnimeButton"
                  data-anime-title="A SILENT VOICE"
                  class="mt-4 self-start bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full flex items-center space-x-2 transition-shadow shadow-md hover:shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 13l4 4L19 7" />
            </svg>
            <span>Agregar a favoritos</span>
          </button>
        </div>
      </div>
    </section>

    {{-- Comentarios Livewire --}}
    <div class="mt-8">
      @livewire('comment-component', ['mangaId' => 14])
    </div>
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

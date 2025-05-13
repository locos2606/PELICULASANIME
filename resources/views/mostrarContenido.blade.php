<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <link rel="icon" href="{{ asset('Assets/diseno-logotipo-anime-dibujado-mano_23-2151269668.avif') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/SesionStyle.css') }}">    
</head>
<body>

<!-- Header -->
<section class="contenedor-nav">
    <div class="logo">
        <a class="logo-back" href="{{ route('index') }}">
            <img src="{{ asset('Assets/diseno-logotipo-anime-dibujado-mano_23-2151269668.avif') }}" alt="logo">
        </a>
        <span class="Bienvenido">ANIMEDJ</span>
    </div>
    
    <nav>
        <ul>
            <li><a href="#categorias">Categorías</a></li>
            <li><a class="dasboar-color" href="{{ route('control_panel') }}">Dashboard</a></li>
            @auth
            @else
                <li><a href="{{ route('sign') }}">Registrate fácil</a></li>
                <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
            @endauth
        </ul>
    </nav>

    <div class="sesionActiva">
        @auth
            <img src="{{ asset('Assets/dandy.ico') }}" alt="Logo de usuario autenticado">
            <span class="user-name">Bienvenido, {{ Auth::user()->name }}</span>
        @else
            <img src="{{ asset('Assets/dead.ico') }}" alt="sesion sin inciar">
        @endauth
    </div>
</section>

<!-- Contenido principal -->
<div class="container">
    <h1>Bienvenido a AnimeMas</h1>
    <p>¡Has iniciado sesión correctamente!</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section id="categorias">
        <h2>Contenido en Drive</h2>

        @forelse($videos as $video)
            @php
                // Extraer ID de Google Drive desde la URL
                preg_match('/\/d\/(.*?)\//', $video->url, $matches);
                $videoId = $matches[1] ?? null;
            @endphp

            @if($videoId)
                <div class="video-container" style="margin-bottom: 2rem;">
                    <h3>{{ $video->title }}</h3>
                    <iframe 
                        src="https://drive.google.com/file/d/{{ $videoId }}/preview" 
                        width="640" 
                        height="480" 
                        allow="autoplay" 
                        allowfullscreen>
                    </iframe>
                </div>
            @else
                <p style="color: red;">URL inválida: {{ $video->url }}</p>
            @endif
        @empty
            <p>No hay contenido disponible aún.</p>
        @endforelse
    </section>
</div>

</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Assets/diseno-logotipo-anime-dibujado-mano_23-2151269668.avif" type="Assets/jpg">
    <title> ANYMEDJ</title>
    <link rel="stylesheet" href="css/stile.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
</head>
<body>
    <header>
        <div class="header-content">
            <img src="Assets/diseno-logotipo-anime-dibujado-mano_23-2151269668.avif" alt="LOGO DE ANIMEDY" class="logo">
            <h1>ANIMEDJ</h1>
            <a href="{{ route('index') }}"><img src="{{ asset('Assets/') }}" alt=""></a>
        </div>
    </header>
    <div class="container">
        <nav class="sidebar">
            <ul>
                <li><a href="admin">ADMINISTRADOR</a></li>
 <li><a href="#" data-section="reader-stats">USUARIO</a></li>
 
                <li><a href="index">ATRAS</a></li>
            </ul>
        </nav>
        <main class="dashboard">
            
            <section class="dashboard-item" id="manga-stats">
                <h2>PELICULAS POPULARES</h2>
                <div class="chart-container">
                    <canvas id="mangaChart"></canvas>
                </div>
            </section>
            <section class="dashboard-item" id="mangaka-stats">
                <h2>Mangakas Populares</h2>
                <div class="chart-container">
                    <canvas id="mangakaChart"></canvas>
                </div>
            </section>
            <section class="dashboard-item" id="reader-stats">
                <h2>Perfil de Usuario</h2>
                
                <button class="exit-buton" >
                    <li><a href="{{ route('logout') }}">cerrar sesion</a></li>
                </button>
                
                <div class="perfil-container">
                    <div id="box-lista-favorita">




                    </div>
                </div>
            </section>
        </main>
    </div>
    <script src="{{ asset('js/avaScrip.js') }}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Assets/" type="Assets/jpg">
    <link rel="stylesheet" href="css/user_style.css">
    <title>LISTA DE PELICULAS FAVORITAS</title>
</head>
<body>
    <header class="header-container"></header>
    <section class="section-list">
        <div class="list-container">
            <h1><img src="https://gothamotaku.com/wp-content/uploads/2020/08/Los-mejores-Animes-de-la-historia-scaled.jpg" alt="">Mi lista</h1>
            <p>MIS FAVORITOS</p>
            

            <!-- Contenedor de la lista -->
            <div class="show-list" >
            
                </div>
                <ul  id="user-s-list">
        <!-- Aquí se añadirán los enlaces dinámicamente -->
            </ul>


            <!-- Incluye el script externo -->
            <script src="{{ asset('js/list_favorite.js') }}"></script>
        </div>
        
        <button class="back-button" ><a href="/control_panel">ir atras</a></button>
    </section>
</body>
</html>

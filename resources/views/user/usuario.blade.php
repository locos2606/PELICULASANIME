//usuario funcional:
<!-- usuario.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario Perfil</title>
    <link rel="stylesheet" href=""> <!-- Ruta de tus estilos CSS -->
</head>
<body>
    <!-- Este es el div que quieres cargar en control_panel.html -->
    <div id="div-que-quiero-cargar">
        
        <div class="caja-contenedora">
    <div>
        <img src="https://gothamotaku.com/wp-content/uploads/2020/08/Los-mejores-Animes-de-la-historia-scaled.jpg" alt="Logo de usuario autenticado">
        <span class="Bienvenido" >Bienvenido, {{ Auth::user()->name}}</span>
    </div>
    <div class="box-favorite-list">
        <a href="/lista_favoritos">LISTA DE PELICULAS FAVORITAS</a>
    </div>
    
    
    <div class="box-x">
    <a href="profile">actualiza tus datos</a>
    </div>
</div>
</div>

</div>

</body>
</html>

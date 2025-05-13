<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://img.freepik.com/vector-gratis/diseno-logotipo-anime-dibujado-mano_23-2151269668.jpg?t=st=1718427189~exp=1718430789~hmac=11a81d0571e3f87fb36ea7a215a4da4d1ab6a08b116cb64fc43a7b1615868a78&w=900" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <main class="container">
        <div class="container-poster">
            <img src="https://img.freepik.com/vector-gratis/diseno-logotipo-anime-dibujado-mano_23-2151269668.jpg?t=st=1718427189~exp=1718430789~hmac=11a81d0571e3f87fb36ea7a215a4da4d1ab6a08b116cb64fc43a7b1615868a78&w=900" alt="Anime Gamer Logo">
        </div>
        
        <!--formulario -->
        <div class="container-formulario">
            <h2>login</h2>
            <p>Únete a nosotros</p>
            
            <!-- Login Form -->
            <form method="POST" action="{{ route('login.process') }}">
                @csrf <!-- Protección CSRF -->
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div>
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" placeholder="example@gmail.com" required pattern="^([\w]*[\w\.]*(?!\.)@gmail.com)">
                </div>
                <div>
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" placeholder="Contraseña" required>
                </div>
                <div>
                    <label for="recordar">
                        <input type="checkbox" id="recordar" name="recordar"> Recordarme
                    </label>
                    <a href="forgot-password">¿Olvidaste tu contraseña?</a>
                </div>
                <input class="btn" type="submit" value="Iniciar">
            </form>

            <span>¿No tienes una cuenta? <a href="sign">Regístrate</a></span>
        </div>
    </main>
</body>
</html>

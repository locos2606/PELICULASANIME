<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://img.freepik.com/vector-gratis/diseno-logotipo-anime-dibujado-mano_23-2151269668.jpg?t=st=1718427189~exp=1718430789~hmac=11a81d0571e3f87fb36ea7a215a4da4d1ab6a08b116cb64fc43a7b1615868a78&w=900">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <main class="container">
        <!-- Contenedor de la imagen -->
        <div class="container-poster">
            <img src="https://img.freepik.com/vector-gratis/diseno-logotipo-anime-dibujado-mano_23-2151269668.jpg?t=st=1718427189~exp=1718430789~hmac=11a81d0571e3f87fb36ea7a215a4da4d1ab6a08b116cb64fc43a7b1615868a78&w=900" alt="Logo Anime Gamer">
        </div>

        <!-- Formulario -->
        <div class="container-formulario">
            <h2>Iniciar sesión</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf <!-- Protección CSRF -->
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" placeholder="example@gmail.com" required pattern="^([\w]*[\w\.]*(?!\.)@gmail.com)">
                </div>
                <div>
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" placeholder="Contraseña" required>
                </div>
                <div>
                    <label for="recordar">
                        <input type="checkbox" id="recordar" name="remember"> Recordarme
                    </label>
                    <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                </div>
                <input class="btn" type="submit" value="Iniciar">
            </form>

            <span>¿No tienes una cuenta? <a href="sign">Regístrate</a></span>
        </div>
    </main>
</body>
</html>

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ManejoEntradas extends Controller
{
    public function showLoginForm()
    {
        return view('login-me');
    }

    public function showSignForm()
    {
        return view('sign'); 
    }

    public function showForm()
    {
        return view('control_panel');
    }

    public function showIndex()
    {
        return view('index');
    }


    public function mostrarSesionIniciada()
    {
        return view('sesion_iniciada');
    }


    public function login(Request $request)
    {
        // Validar las credenciales
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirigir a la vista de sesión iniciada
            //return redirect('sesion_iniciada');
            return redirect()->route('index');
        }

        // Si la autenticación falla, redirigir de nuevo a la página de inicio de sesión
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }


    //save here
    public function sign(Request $request){
    
        // Validar los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crea el usuario
        User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

         // Intentar autenticar al usuario
        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirigir a la vista de sesión iniciada
            //return redirect('sesion_iniciada');
            return redirect()->route('index');
        }
        
        // Redirigir después del registro
        //return redirect('index'); 
    }

    public function showProfile()
    {
        $user = Auth::user();
        return view('user.usuario', compact('user'))->render(); // Esto retornará el HTML de la vista
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function showFavoriteList()
    {
        return view('user.lista_favoritos');
    }

    public function showCategories(Request $request)
    {
        $genreNun = $request->input('genre');
    
        switch ($genreNun) {
            case '1': return view('peliculas.naruto');
            case '1': return view('peliculas.naruto');
            case '2': return view('peliculas.one-piece');
            case '3': return view('peliculas.bleach');
            case '4': return view('peliculas.parasyte');
            case '5': return view('peliculas.attack-on-titan');
            case '6': return view('peliculas.la-princesa-mononoke');
            case '7': return view('peliculas.dragon-ball');
            case '8': return view('peliculas.demon-slayer');
            case '9': return view('peliculas.jujutsu-kaisen');
            case '10': return view('peliculas.your-name');
            case '11': return view('peliculas.suzume');
            case '12': return view('peliculas.mi-vecino-totoro');
            case '13': return view('peliculas.violet-evergarden');
            case '14': return view('peliculas.a-silent-voice');
            case '15': return view('peliculas.howls-moving-castle');
            case '16': return view('peliculas.spirited-away');
            case '17': return view('peliculas.weathering-with-you');
            case '18': return view('peliculas.five-centimeters-per-second');
            case '19': return view('peliculas.pokemon-mewtwo');
            case '20': return view('peliculas.garden-of-words');
            case '21': return view('peliculas.boy-and-beast');
            case '22': return view('peliculas.the-wind-rises');
            
            default:
    return redirect()->route('index')->with('mensaje', 'Género no encontrado');

        }
    }
}
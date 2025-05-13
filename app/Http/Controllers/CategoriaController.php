<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function mostrarContenidoPeliculas(Request $request)
    {
        $genre = strtolower(trim($request->input('genre')));

        switch ($genre) {
            case 'naruto':
                return view('peliculas.naruto');
            case 'one piece':
                return view('peliculas.one-piece');
            case 'bleach':
                return view('peliculas.bleach');
            case 'parasyte':
                return view('peliculas.parasyte');
            case 'attack on titan':
                return view('peliculas.attack-on-titan');
            case 'la princesa mononoke':
                return view('peliculas.la-princesa-mononoke');
            case 'dragon ball':
                return view('peliculas.dragon-ball');
            case 'demon slayer':
                return view('peliculas.demon-slayer');
            case 'jujutsu kaisen':
                return view('peliculas.jujutsu-kaisen');
            case 'your name':
                return view('peliculas.your-name');
            case 'suzume':
                return view('peliculas.suzume');
            case 'mi vecino totoro':
                return view('peliculas.mi-vecino-totoro');
            case 'violet evergarden':
                return view('peliculas.violet-evergarden');
            case "howl's moving castle":
                return view('peliculas.howls-moving-castle');
            case 'spirited away':
                return view('peliculas.spirited-away');
            case 'weathering with you':
                return view('peliculas.weathering-with-you');
            case '5 centimeters per second':
                return view('peliculas.five-centimeters-per-second');
            case 'pokémon: mewtwo strikes back':
            case 'pokemon: mewtwo strikes back':
                return view('peliculas.pokemon-mewtwo');
            case 'the garden of words':
                return view('peliculas.garden-of-words');
            case 'the boy and the beast':
                return view('peliculas.boy-and-beast');
            case 'the wind rises':
                return view('peliculas.the-wind-rises');

            default:
                // Redirige a la ruta 'index' con un mensaje flash
                return redirect()
                    ->route('index')
                    ->with('mensaje', 'PELICULA “' . $request->input('genre') . '” no encontrada.');
        }
    }
}

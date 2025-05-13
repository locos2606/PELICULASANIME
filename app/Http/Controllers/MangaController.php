<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MangaReaderService;
use App\Models\Manga;
use App\Models\UserLink;
use Illuminate\Support\Facades\Auth;

class MangaController extends Controller
{
    private $mangaReaderService;

    public function __construct(MangaReaderService $mangaReaderService)
    {
        $this->mangaReaderService = $mangaReaderService;
    }

    // Método para mostrar la vista de sesión iniciada sin resultados
    public function mostrarSesionIniciada()
    {
        $mangas = $this->enviarManga();
        return view('vista_content', compact('mangas'));
    }

    // Este método enviará contenido por defecto al frontend
    public function enviarManga()
    {
        try {
            $mangas = $this->mangaReaderService->getAllMangas();
            return $mangas;
        } catch (\Exception $e) {
            session()->flash('error', 'Error al obtener los detalles del manga: ' . $e->getMessage());
            return [];
        }
    }

    // Función para mostrar mangas con su portada
    public function mostrarMangas()
    {
        $mangasConCover = $this->mangaReaderService->getAllMangas();
        return view('vista_content', ['mangas' => $mangasConCover]);
    }

    // Método para buscar manga por título
    public function buscarManga(Request $request)
    {
        $titulo = $request->input('titulo');
        try {
            $mangas = $this->mangaReaderService->buscarMangaPorTitulo($titulo);
            return view('sesion_iniciada', compact('mangas'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al buscar manga: ' . $e->getMessage()]);
        }
    }

    // Función para obtener la portada del manga
    public function getCover(Request $request)
    {
        $fileurl = $request->input('fileurl');
        try {
            $base64 = $this->mangaReaderService->getCoverBase64($fileurl);
            return response()->json([
                'base64' => $base64
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al buscar manga: ' . $e->getMessage()]);
        }
    }

    // Método para obtener los detalles de un manga específico
    public function detallesManga($id)
    {
        try {
            $mangaDetalle = $this->mangaReaderService->obtenerDetallesMangaPorId($id);
            session(['manga' => $mangaDetalle->data]);
            return view('detalles', [
                'manga' => $mangaDetalle->data,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al obtener los detalles del manga: ' . $e->getMessage()]);
        }
    }

    // Función exclusiva para la vista `vista_content` para enviar la portada del manga
    public function obtenerCoverPorId($mangas)
    {
        try {
            $mangasConCover = [];
            foreach ($mangas->data as $manga) {
                $id = $manga->id;
                $coverArt = collect($manga->relationships)->where('type', 'cover_art')->first();
                $coverUrl = $coverArt ? "https://uploads.mangadex.org/covers/{$id}/{$coverArt->attributes->fileName}" : null;
                $mangasConCover[] = [
                    'id' => $id,
                    'title' => $manga->attributes->title->en ?? 'Título no disponible',
                    'cover_url' => $coverUrl
                ];
            }
            return response()->json(['success' => true, 'mangas' => $mangasConCover]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Error al obtener el cover del manga: ' . $e->getMessage()
            ]);
        }
    }

    // Método para leer un capítulo del manga
    public function leerCapitulo($id)
    {
        $mangaService = new MangaReaderService();
        $imageUrls = $mangaService->obtenerCapituloPorId($id);
        return view('leer_capitulo', ['imageUrls' => $imageUrls]);
    }

    // Método para guardar el ID del manga en la base de datos
    public function saveMangaId(Request $request)
    {
        $request->validate([
            'url' => 'required|string',
            'manga_title' => 'required|string',
        ]);

        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['success' => false, 'message' => 'Usuario no autenticado'], 401);
        }

        UserLink::create([
            'user_id' => $userId,
            'url' => $request->url,
            'title' => $request->manga_title,
        ]);

        return response()->json(['success' => true]);
    }

    // Método para obtener la lista de mangas favoritos
    public function listaFavoritos()
    {
        $userId = Auth::id(); // Obtener el ID del usuario autenticado
        $userLinks = UserLink::where('user_id', $userId)->get();
        return response()->json($userLinks); // Retorna los links como JSON
    }

    // Método para eliminar un manga de la lista de favoritos
    public function eliminarManga($id)
    {
        $userId = Auth::id(); // Obtener el ID del usuario autenticado

        // Buscar el manga en la base de datos que pertenece al usuario autenticado
        $manga = UserLink::where('id', $id)->where('user_id', $userId)->first();

        // Verificar si el manga existe
        if ($manga) {
            // Eliminar el manga de la base de datos
            $manga->delete();

            // Retornar respuesta de éxito
            return response()->json(['success' => true, 'message' => 'Manga eliminado correctamente']);
        }

        // Si no se encuentra el manga, retornar error
        return response()->json(['success' => false, 'message' => 'Manga no encontrado'], 404);
    }
}

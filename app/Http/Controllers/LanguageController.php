<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LanguageController extends Controller
{
    public function language(Request $request)
    {
        $page = $request->get('page', 1);
        $response = Http::get('https://api.themoviedb.org/3/discover/movie', [
            'api_key' => config('services.tmdb.api'),
            'page' => $page,
            'language' => 'fr-FR'
        ]);

        $Movies = $response->json();
        $moviesList = $Movies['results'];

        return view('language', [
            'movies' => $moviesList,
            'currentPage' => $page,
            'totalPages' => $Movies['total_pages'],
        ]);
    }
}

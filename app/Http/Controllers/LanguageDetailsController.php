<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LanguageDetailsController extends Controller
{
    
    public function index($movieId)
{

    $response = Http::get("https://api.themoviedb.org/3/movie/{$movieId}", [
        'api_key' => config('services.tmdb.api'),
        'language' => 'fr-FR'
    ]);

    $movieDetails = $response->json();
    return view('languageDetails', ['movieDetails' => $movieDetails]);
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
        $page = $request->get('page', 1);
        $response = Http::get('https://api.themoviedb.org/3/discover/movie', [
        'api_key' => config('services.tmdb.api'),
        'page' => $page
        ]);

        $Movies = $response->json();

        // dd($Movies);

        $moviesList = $Movies['results'];

        return view('index', [
            'movies' => $moviesList,
            'currentPage' => $page,
            'totalPages' => $Movies['total_pages'],
        ]);
    }


    public function search(Request $request)
{
    $searchTerm = $request->input('query');

    $response = Http::get('https://api.themoviedb.org/3/search/movie', [
        'api_key' => config('services.tmdb.api'),
        'query' => $searchTerm,
    ]);

    $searchResults = $response->json()['results'];

    return view('searchResults', [
        'searchResults' => $searchResults, 
        'query' => $searchTerm
    ]);
}


}

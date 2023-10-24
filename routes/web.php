<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\MovieDetailsController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LanguageDetailsController;

Route::get('/', [MoviesController::class, 'index'])->name('movies.index');
Route::get('/movie/{id}', [MovieDetailsController::class, 'index'])->name('movie.details');
Route::get('/fr', [LanguageController::class, 'language'])->name('movies.fr');
Route::get('/movie/fr/{id}', [LanguageDetailsController::class, 'index'])->name('movie.details.fr');
Route::get('/search', [MoviesController::class, 'search'])->name('movies.search');

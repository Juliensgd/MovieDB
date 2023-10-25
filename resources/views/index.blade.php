<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootswatchSolarTheme.css') }}" rel="stylesheet">
    </head>
    <body>
        <form action="{{ route('movies.search') }}" method="GET">
            <div class="input-group mt-3">
                <input type="text" class="form-control" name="query" placeholder="Search movie" aria-label="Search movie">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
            </div>
        </form>
        <div class="row m-5">
            @foreach ($movies as $movie)
            <div class="col-md-3 mt-3">
                <a href="{{ route('movie.details', ['id' => $movie['id']]) }}">
                    <div class="card">
                        <img src="https://www.themoviedb.org/t/p/w220_and_h330_face/{{ $movie['poster_path'] }}" alt="Affiche de {{ $movie['title'] }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $movie['title'] }}</h5>
                            <p class="card-text text-light">{{ $movie['overview'] }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="pagination d-flex justify-content-center mt-4 mb-4">
    @if ($currentPage > 1)
        <a href="{{ route('movies.index', ['page' => $currentPage - 1]) }}" class="btn btn-primary mr-2">Back</a>
    @endif

    @if ($currentPage < $totalPages)
        <a href="{{ route('movies.index', ['page' => $currentPage + 1]) }}" class="btn btn-primary mx-2">Next</a>
    @endif
</div>
<div class="d-flex justify-content-center my-4">
    <a href="{{ route('movies.fr') }}" class="btn btn-light">Francais</a>
</div>

        </div>
    </body>
</html>

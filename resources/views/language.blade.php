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
                <input type="text" class="form-control" name="query" placeholder="Rechercher un film" aria-label="Rechercher un film">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Rechercher</button>
            </div>
            </div>
        </form>
            <div class="row m-5">
                @foreach ($movies as $movie)
                <div class="col-md-3 mt-3">
                    <a href="{{ route('movie.details.fr', ['id' => $movie['id']]) }}">
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
            <a href="{{ route('movies.fr', ['page' => $currentPage - 1]) }}" class="btn btn-primary mr-2">Précédent</a>
        @endif

        @if ($currentPage < $totalPages)
            <a href="{{ route('movies.fr', ['page' => $currentPage + 1]) }}" class="btn btn-primary mx-2">Suivant</a>
        @endif
    </div>
    <div class="d-flex justify-content-center my-4">
    <a href="{{ route('movies.index') }}" class="btn btn-light">Anglais</a>
</div>

            </div>
        </body>
    </html>

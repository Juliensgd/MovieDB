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
    <div class="container mt-5">
        <h1>Résultats de recherche pour : {{ $query }}</h1>

        @if (count($searchResults) > 0)
            <div class="row">
                @foreach ($searchResults as $result)
                    <div class="col-md-4">
                        <a href="{{ route('movie.details', ['id' => $result['id']]) }}">
                        <div class="card mb-4">
                                <img src="https://www.themoviedb.org/t/p/w220_and_h330_face/{{ $result['poster_path'] }}" alt="{{ $result['title'] }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{ $result['title'] }}</h5>
                                <p class="card-text text-light">{{ $result['overview'] }}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p>Aucun résultat trouvé pour "{{ $query }}".</p>
        @endif
    </div>

        </div>
    </body>
</html>

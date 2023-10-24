<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="row m-5">
            <div class="col-md-12">
                <div class="card flex-row">
                    <img src="https://www.themoviedb.org/t/p/w220_and_h330_face/{{ $movieDetails['poster_path'] }}" alt="Affiche de {{ $movieDetails['title'] }}" class="card-img-left">
                    <div class="card-body">
                        <h2 class="card-title">{{ $movieDetails['title'] }}</h2>
                        <h5 class="card-text">Synopsis :</h5>
                        <p class="card-text">{{ $movieDetails['overview'] }}</p>
                        <p class="card-text">Release date : {{ $movieDetails['release_date'] }}</p>
                        <p class="card-text">Genre : {{ $movieDetails['genres'][0]['name'] }}</p>
                        <p class="card-text">Production : </p>
                        <p class="card-text">@foreach ($movieDetails['production_companies'] as $company)
                                @if (!empty($company['name']))
                                    {{ $company['name'] }},
                                @else
                                    Aucune information de production disponible.
                                @endif
                            @endforeach
                        </p>
                        <a href="{{ route('movies.index') }}" class="btn btn-primary">Back to film list</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
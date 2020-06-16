<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li class="nav-item active">
                    <a class="nav-link"  hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }} <span class="sr-only">(current)</span></a>
                </li>
            @endforeach

        </ul>
    </div>
</nav>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">{{ __('message.offer name') }}</th>
        <th scope="col">{{ __('message.price') }}</th>
        <th scope="col">{{ __('message.offer details') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($offers as $offer)
    <tr>
        <th scope="row">{{ $offer->id }}</th>
        <td>{{ $offer['name_'. LaravelLocalization::getCurrentLocale()] }}</td>
        <td>{{ $offer->price }}</td>
        <td>{{ $offer['details_' . LaravelLocalization::getCurrentLocale()] }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>

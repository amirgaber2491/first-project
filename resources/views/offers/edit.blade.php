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
<div class="flex-center position-ref full-height">


    <div class="content">
        <div class="title m-b-md">
            {{ __('message.update offer') }}
        </div>
{{--        <form action="{{ route('offer.store') }}" method="POST">--}}
            {!! Form::model($offer, ['method'=>'PATCH', 'action'=>['Offer@update', $offer->id]]) !!}
            <div class="form-group">
{{--                <label for="exampleInputEmail1">{{ __('message.offer name_ar') }}</label>--}}
                {!! Form::label('name_ar', __('message.offer name_ar')) !!}
                {!! Form::text('name_ar',null, ['placeholder'=> __('message.enter offer_ar'), 'class'=>'form-control']) !!}
                @error('name_ar')
                <div class="alert alert-danger" role="alert">
                    {{  $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">

                 {!! Form::label('name_en', __('message.offer name_en')) !!}
                {!! Form::text('name_en',null, ['placeholder'=> __('message.enter offer_en'),
                'class'=>'form-control']) !!}
                @error('name_en')
                <div class="alert alert-danger" role="alert">
                    {{  $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('price', __('message.price')) !!}
                {!! Form::text('price',null, ['placeholder'=> __('message.enter price'), 'class'=>'form-control']) !!}
                @error('price')
                <div class="alert alert-danger" role="alert">
                    {{  $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('details_ar', __('message.details_ar')) !!}
                {!! Form::text('details_ar',null, ['placeholder'=> __('message.enter details_ar'), 'class'=>'form-control']) !!}
                @error('details_ar')
                <div class="alert alert-danger" role="alert">
                    {{  $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('details_en', __('message.details_ar')) !!}
                {!! Form::text('details_en',null, ['placeholder'=> __('message.enter details_en'),
                'class'=>'form-control']) !!}
                @error('details_en')
                <div class="alert alert-danger" role="alert">
                    {{  $message }}
                </div>
                @enderror
            </div>

            {!! Form::submit( __('message.send update'), ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}" />

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
</head>

<body class="account-page">
    <div class="main-wrapper">
        <div class="account-content">
            {{-- :: Begin Login Form :: --}}
            {{$slot}}
            {{-- :: End Login Form :: --}}
        </div>
    </div>

    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('assets/js/feather.min.js')}}"></script>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>
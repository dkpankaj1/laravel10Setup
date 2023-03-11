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
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="login-wrapper">
                    <div class="login-content">
                        <div class="login-userset">
                            <div class="login-logo">
                                <img src="assets/img/logo.png" alt="img" />
                            </div>
                            <div class="login-userheading">
                                <h3>Sign In</h3>
                                <h4>Please login to your account</h4>
                            </div>

                            {{-- :: Begin Email Input :: --}}
                            <div class="form-login">
                                <label>{{_("Email")}}</label>
                                <div class="form-addons">
                                    <input type="text" name="email" value="{{old('email')}}"
                                        placeholder="Enter your email address" />
                                    <img src="assets/img/icons/mail.svg" alt="img" />
                                </div>

                                @if ($errors->get('email'))
                                <ul {{ $attributes->merge(['class' => 'text-sm mt-2 text-danger']) }}>
                                    @foreach ((array) $errors->get('email') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            {{-- :: End Email Input :: --}}

                            {{-- :: Begin Password Input :: --}}
                            <div class="form-login">
                                <label>{{_("Password")}}</label>
                                <div class="pass-group">
                                    <input type="password" name="password" class="pass-input"
                                        placeholder="Enter your password" />
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>

                                @if ($errors->get('password'))
                                <ul {{ $attributes->merge(['class' => 'text-sm mt-2 text-danger']) }}>
                                    @foreach ((array) $errors->get('password') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            {{-- :: End Password Input :: --}}

                            {{-- :: Begin Sign In Button :: --}}
                            <div class="form-login">
                                <button type="submit" class="btn btn-login">{{_("Sign In")}}</>
                            </div>
                            {{-- :: End Sign In Button :: --}}

                        </div>
                    </div>
                    <div class="login-img">
                        <img src="{{asset('assets/img/login.jpg')}}" alt="img" />
                    </div>
                </div>
            </form>
            {{-- :: End Login Form :: --}}
        </div>
    </div>

    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('assets/js/feather.min.js')}}"></script>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>
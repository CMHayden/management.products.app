<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

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

            .text-logo {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 18px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .content {
                text-align: center;
                background-color: #f0f0f0;
                padding: 120px 20px;
                width: 900px;
                border-radius: 20px;

                animation: fadeIn ease 5s;
                -webkit-animation: fadeIn ease 5s;
                -moz-animation: fadeIn ease 5s;
                -o-animation: fadeIn ease 5s;
                -ms-animation: fadeIn ease 5s;
            }

            @keyframes fadeIn{
                0% {
                    opacity:0;
                }
                100% {
                    opacity:1;
                }
            }

            @-moz-keyframes fadeIn {
                0% {
                    opacity:0;
                }
                100% {
                    opacity:1;
                }
            }

            @-webkit-keyframes fadeIn {
                0% {
                    opacity:0;
                }
                100% {
                    opacity:1;
                }
            }

            @-o-keyframes fadeIn {
                0% {
                    opacity:0;
                }
                100% {
                    opacity:1;
                }
            }

            @-ms-keyframes fadeIn {
                0% {
                    opacity:0;
                }
                100% {
                    opacity:1;
                }
            }

            .wrap {
                text-align: center;
                width: 100%;
                margin-top: 10px;
            }
        </style>


    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="text-logo m-b-md">
                    PM App
                </div>

                <div class="links">
                @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="wrap">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    @endauth
                </div>
            </div>

        </div>
    </body>
</html>

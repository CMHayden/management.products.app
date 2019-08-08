<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

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
                background-color: #f0f0f0;
                padding: 120px 20px;
                width: 900px;
            }

            .title {
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
                animation: fadeIn ease 3s;
                -webkit-animation: fadeIn ease 3s;
                -moz-animation: fadeIn ease 3s;
                -o-animation: fadeIn ease 3s;
                -ms-animation: fadeIn ease 3s;
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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    PM App
                </div>

                <div class="links">
                @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            </div>

        </div>
    </body>
</html>

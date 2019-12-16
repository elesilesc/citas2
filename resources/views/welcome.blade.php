<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CGIS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #d2fdc9;
                color: #000;
                font-family: 'Raleway', sans-serif;
                font-weight: 500;
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
                color: #02307e;
                padding: 0 25px;
                font-size: 12px;
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
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Citas</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Registro</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                     SoS: Aplicación de citas
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Laravel</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravelcollective.com/docs/5.3/html">Formularios</a>
                    <a href="http://php.net/manual/es/langref.php">PHP</a>
                    <a href="https://www.mysql.com/products/workbench/">MySQL</a>
                </div>
                <div aling="right">
                    <h4>
                        Grado en Ingeniería de la Salud, Universidad de Sevilla
                    </h4>
                </div>
            </div>
        </div>
    </body>
</html>

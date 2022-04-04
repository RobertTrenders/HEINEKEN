<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ Session::token() }}">
        <title>LARAVEL BASE</title>
        <link rel="shortcut icon" type="image/png" href="{{ asset('/favicon.ico') }}"/>
        <!-- Bootstrap core CSS-->
        <link rel="stylesheet" href="{{ asset('/vendor/bootstrap.min.css') }}" crossorigin="anonymous">

        <script src="{{ asset('/vendor/jquery-3.6.0.min.js') }}" crossorigin="anonymous"></script>
        <link href="{{ asset('/vendor/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">   
        <!-- <link rel="stylesheet" href="{{ asset('/css/frontend/general.css') }}" crossorigin="anonymous"> -->
        <!-- <script src="{{ asset('/js/frontend/general.js') }}"></script> -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,700&display=swap" rel="stylesheet">

        <style>

            @font-face {
                font-family: "Roboto";
                src: url('{{ asset("/fonts/vendor/Roboto/Roboto-Black.ttf") }}');
                font-weight: 900;
            }

            @font-face {
                font-family: "Roboto";
                src: url('{{ asset("/fonts/vendor/Roboto/Roboto-Medium.ttf") }}');
                font-weight: 500;
            }

            @font-face {
                font-family: "Roboto";
                src: url('{{ asset("/fonts/vendor/Roboto/Roboto-Regular.ttf") }}');
                font-weight: 400;
            }

            @font-face {
                font-family: "Roboto";
                src: url('{{ asset("/fonts/vendor/Roboto/Roboto-Light.ttf") }}');
                font-weight: 300;
            }

        </style>

    </head>


    <body>

        @yield('content')

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('/vendor/popper.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('/vendor/bootstrap.min.js') }}" crossorigin="anonymous"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('/vendor/jquery.easing.compatibility.js') }}" crossorigin="anonymous"></script>

    </body>
</html>
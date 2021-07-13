<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel Devian</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/selectric.css') }}">
    @yield('css')
    <!-- Template CSS -->
    <link rel="stylesheet" href="/css/panel/style.css">
    <link rel="stylesheet" href="/css/panel/components.css">
    <link rel="stylesheet" href="{{ asset('css/loader.css') }}">
</head>

<body>
    <div class="loader d-none" id="loader">
        <div class="bg"></div>

        <div class="spinner">

            <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                <path fill="#5BBDC8"
                    d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                        from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                </path>
            </svg>
        </div>

    </div>




    <div id="app">

        <div class="main-wrapper">
            @include('panel.partials.nav')
            @include('panel.partials.menu')

            <div class="main-content">
                @yield('content')
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad
                        Nauval Azhar</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>


        <!-- General JS Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}">
        </script>
        <script src="{{ asset('js/Chart.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ asset('js/moment.min.js') }}"></script>
        <script src="{{ asset('js/jquery.selectric.js') }}"></script>
        <script src="{{ asset('js/panel/stisla.js') }}"></script>
        <!-- Template JS File --> var loader = document.getElementById('loader');
        @yield('js')
        <script src="{{ asset('js/panel/scripts.js') }}"></script>
        <script src="{{ asset('js/panel/custom.js') }}"></script>


</body>

</html>

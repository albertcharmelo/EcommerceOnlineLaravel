<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

</head>

<body>
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
        <!-- Template JS File -->
        @yield('js')
        <script src="{{ asset('js/panel/scripts.js') }}"></script>
        <script src="{{ asset('js/panel/custom.js') }}"></script>


</body>

</html>

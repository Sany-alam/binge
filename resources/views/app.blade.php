<!DOCTYPE html>
<html>
    <head>
        <title>Binge</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('assets')}}/css/style.css?{{time()}}">
        @yield('css')
        <link rel="stylesheet" href="{{asset('assets')}}/css/jquery.dataTables.min.css">
        <script src="{{asset('assets')}}/js/jquery.min.js"></script>
        <script src="{{asset('assets')}}/js/jquery.dataTables.min.js"> </script>
    </head>

    <body>
       @yield('body')
    </body>
    @yield('js')
</html>

<!DOCTYPE html>
<html>
    <head>
        <title>Binge</title>
        <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">
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

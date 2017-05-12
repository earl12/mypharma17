<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>@yield('title')</title>
    <meta name="description" content="Mypharma is an online application made for elderlies to acquire prescription medicines " />
    <meta name="keywords" content="mypharma, others" />
    <meta name="author" content="hencework"/>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    {{ HTML::style('dist/css/auth.css') }}
</head>
<body>
    @yield('contents')
    @yield('js')
</body>
</html>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Страница </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="/css/style_product.css">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<div class="header">
    @include('blocks.menu')
</div>

    <div class="main">
        @yield('content')
    </div>
<div class="footer">
    <p>© Copyright - {{date('Y')}}  . All Rights Reserved.</p>
</div>
</body>
</html>

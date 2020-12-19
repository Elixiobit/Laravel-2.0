<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$name}}</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b0e255a861.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
</head>
<body>
<div class="wrapper">
    <header class="center header">
        <div class="header__left">
            @if($newsOne)
                <h1>{{$nameRU}}</h1>
                @foreach($newsOne as $ro)
                    <div><a href='{{route('news-directories').'/'.$name.'/'.$ro}}'>{{$ro}}</a></div>
                @endforeach
            @endif
        </div>
    </header>
    <div class="main"></div>
    <footer class="footer "></footer>
</div>
</body>
</html>

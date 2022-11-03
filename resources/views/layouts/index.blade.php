<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('food-delivery/public/assets/css/style.css')}}">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
    <title>Food Delivery</title>
</head>
<body>
<header>
    <div class="logo">
        <a href="{{ route('home') }}">
            <i class="fa fa-home fa-4x">Food Delivery</i>
        </a>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('menu') }}">Меню</a></li>
            <li><a href="#">Контакти</a></li>
            @if(isset(Auth::user()->name))
                <li><a href="#">Корзина</a></li>
                <li><a href="{{ route('logout') }}">Вийти</a></li>
            @else
                <li><a href="{{ route('login.create') }}">Увійти</a></li>
            @endif
        </ul>
    </div>
</header>
@yield('content')
</body>
</html>

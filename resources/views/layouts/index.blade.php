<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('food-delivery/public/assets/css/style.css')}}">
    <title>Food Delivery</title>
</head>
<body>
<header>
    <div class="logo">
        <a href="{{ route('menu') }}">
            <i class="fa fa-home fa-4x">Food Delivery</i>
        </a>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('menu') }}">Меню</a></li>
            <li><a href="{{ route('contacts') }}">Контакти</a></li>
            @if(isset(Auth::user()->name))
                <li><a href="{{ route('showCart') }}">Корзина</a></li>
                <li><a href="{{ route('logout') }}">Вийти</a></li>
            @else
                <li><a href="{{ route('login.create') }}">Увійти</a></li>
            @endif
        </ul>
    </div>
</header>
@if (session()->has('success'))
    <div class="alert alert-success " role="alert">
        <p>{{ session()->get('success')}}</p>
    </div>
@endif
@if (session()->has('warning'))
    <div class="alert alert-warning " role="alert">
        <p>{{ session()->get('warning')}}</p>
    </div>
@endif
@yield('content')
</body>
</html>

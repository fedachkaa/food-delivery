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
        <a href="{{ route('menu') }}">
            <i class="fa fa-home fa-4x">Food Delivery</i>
        </a>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('categories.index') }}">Категорії</a></li>
            <li><a href="{{ route('menu.index') }}">Меню</a></li>
            <li><a href="{{ route('showOrders') }}">Замовлення</a></li>
            <li><a href="{{ route('showClients') }}">Клієнти</a></li>
            <li><a href="{{ route('logout') }}">Вийти</a></li>
        </ul>
    </div>
</header>
@if(isset($greet))
    <h1 style="text-align: center"> Вітаємо в адмін-панелі!</h1>
@endif
@if (session()->has('success'))
    <div class="alert alert-success " role="alert">
        <p>{{ session()->get('success')}}</p>
    </div>
@endif
@yield('content')
</body>
</html>

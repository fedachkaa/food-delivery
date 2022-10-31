@extends('layouts.user')

@section('title')
    Авторизація
@endsection

@section('content')
    <div class="login-page">
        <header class="text-center header">Авторизація</header>
        <div class="form">
            <form class="register-form" action="{{ route('login') }}" method="post" >
                @csrf
                <input type="email" name="email" placeholder="Введіть електронну пошту" value="{{old('email')}}">
                <input type="password" name="password" placeholder="Введіть пароль">
                <button type="submit" class="btn btn-primary btn-block">Увійти</button>
                <p class="message">Ще не зареєстровані? <strong><a href="{{ route('register.create') }}">Зареєструватись</a></strong></p>
            </form>
        </div>
    </div>
@endsection


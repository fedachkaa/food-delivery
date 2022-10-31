@extends('layouts.user')

@section('title')
    Реєстрація
@endsection

@section('content')
    <div class="login-page">
        <header class="text-center header">Реєстрація</header>
        <div class="form">
            <form class="register-form" action="{{ route('register.store') }}" method="post" >
                @csrf
                <input type="text" name="name" placeholder="Введіть ім'я" value="{{old('name')}}">
                <input type="email" name="email" placeholder="Введіть електронну пошту" value="{{old('email')}}">
                <input type="password" name="password" placeholder="Введіть пароль">
                <input type="password" name="password_confirmation" placeholder="Повторіть пароль">
                <button type="submit" class="btn btn-primary btn-block">Зареєструватись</button>
                <p class="message">Уже зареєстровані? <strong><a href="{{ route('login.create') }}">Увійти</a></strong></p>
            </form>
        </div>
    </div>
@endsection

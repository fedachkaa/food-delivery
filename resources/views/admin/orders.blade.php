@extends('layouts.admin')

@section('content')

    <div style="margin-top: 2%">
       <h1> Замовлення, які очікують підтвердження: </h1>
        <ul>
            @foreach($carts as $cart)
                <li><a href="{{ route('orderInfo', ['id'=>$cart->id]) }}">{{ $cart->id }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection

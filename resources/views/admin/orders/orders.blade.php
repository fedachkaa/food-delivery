@extends('layouts.admin')

@section('content')
    @if(count($carts)!=0)
    <div style="margin-top: 2%">
       <h1> Замовлення, які очікують підтвердження: </h1>
        <ul style="text-decoration: none; color: #000000; font-size: 25px; ">
            @foreach($carts as $cart)
                <li><a href="{{ route('orderInfo', ['id'=>$cart->id]) }}">Замовлення №{{ $cart->id }}.</a></li>
            @endforeach
        </ul>
    </div>
    @else
        <h1 style="text-align: center">Ще немає замовлень...</h1>
    @endif
@endsection

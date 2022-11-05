@extends('layouts.index')

@section('content')
    @if($order!=null)
        @php
            $totalCost = 0;
        @endphp
        <div style="margin-top: 2%">
            <table>
                <thead>
                <tr>
                    <th>Назва</th>
                    <th>Ціна</th>
                    <th>Кількість</th>
                    <th>Вартість</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order as $key=>$order_item)
                    <tr style="padding: 5px">
                        <td>{{ $order_item[0]->title }}</td>
                        <td>{{ $order_item[0]->price }} грн</td>
                        <td>{{ $order_item[1] }}</td>
                        <td>{{ $order_item[1] * $order_item[0]->price }} грн</td>
                        @php
                            $totalCost +=$order_item[1] * $order_item[0]->price;
                        @endphp
                    </tr>
                @endforeach
                </tbody>
            </table>
            <h1 style="text-align: right; margin-right: 10px"> Всього: {{ $totalCost }} грн.</h1>
            @if($cart->confirmed)
                <h3 style="text-align: right; margin-right: 10px"> Замовлення пітверджено, адміністратор зателефонує вам протягом декількох хвилин.</h3>
            @else
                <form action="{{ route('confirmOrder') }}" method="post" style="text-align: right">
                    @csrf
                    <input type="text" name="cart_id" value="{{ $cart->id }}" hidden>
                    <input type="submit" value="Підтвердити замовлення">
                </form>
            @endif
        </div>
    @else
        <h1>В корзині нічого немає...</h1>
    @endif
@endsection

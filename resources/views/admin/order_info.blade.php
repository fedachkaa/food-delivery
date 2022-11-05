@extends('layouts.admin')

@section('content')

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
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <form action="{{ route('takeOrder', ['id'=>$cart->id]) }}" method="post" style="text-align: right">
        @csrf
        <input type="submit" value="Прийняти замовлення">
    </form>

@endsection

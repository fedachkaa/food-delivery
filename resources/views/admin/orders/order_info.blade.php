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
    <div style="text-align: right; margin-right: 10px">
        <h3>Ім'я клієнта: {{ $user->name }}.</h3>
        <h3>Електронна пошта клієнта: {{ $user->email }}.</h3>
        <h3>Номер телефону клієнта: {{ $user->phone_number }}.</h3>
        <form action="{{ route('takeOrder', ['id'=>$cart->id]) }}" method="post">
            @csrf
            <input type="submit" value="Прийняти замовлення">
        </form>
    </div>


@endsection

@extends('layouts.admin')

@section('content')
    @if(count($clients)!=0)
        <div style="margin-top: 2%">
            <table>
                <thead>
                <tr>
                    <th>Ім'я</th>
                    <th>Електронна пошта</th>
                    <th>Номер телефону</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr style="padding: 5px">
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }} грн</td>
                        <td>{{ $client->phone_number }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <h1 style="text-align: center">Ще немає клієнтів...</h1>
    @endif
@endsection

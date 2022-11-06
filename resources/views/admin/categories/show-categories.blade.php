@extends('layouts.admin')

@section('content')
    <div style="margin-top: 2%; text-align: center">
        <form action="{{ route('categories.create')}}" method="get">
            <input type="submit" value="Додати категорію">
        </form>
    </div>
        <div style="margin-top: 2%">
            <table>
                <thead>
                <tr>
                    <th>№</th>
                    <th>Назва</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr style="padding: 5px">
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->title }}</td>
                        <td>
                            <div class="price">
                                <form action="{{ route('categories.edit', ['category'=>$category->id]) }}" method="get">
                                    <input type="submit" value="Редагувати"/>
                                </form>
                                <form action="{{ route('categories.destroy', ['category'=>$category->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Видалити" onclick="return confirm('Видалити категорію {{$category->title}}?')"/>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection

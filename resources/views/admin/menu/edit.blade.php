@extends('layouts.admin')

@section('content')
    <h1 style="text-align: center;"> Редагування</h1>
    <div class="create-menu">
        <form role="form" action="{{route('menu.update', ['menu'=>$menu_item->id])}}" method="post" enctype="multipart/form-data" class="create-menu-form">
            @csrf
            @method('PUT')
            <label for="title">Назва:</label>
            <input type="text" name="title" value="{{$menu_item->title}}" required>

            <label for="description">Опис страви:</label>
            <textarea name="description" required>{{$menu_item->description}}</textarea>

            <label for="weight">Вага:</label>
            <input type="text" name="weight" value="{{$menu_item->weight}}" required>

            <label for="price">Ціна:</label>
            <input type="text" name="price" value="{{$menu_item->price}}" required>

            <label for="image">Фото страви:</label>
            <input type="file" name="image" id="image">

            <div><img src=" {{ $menu_item->getImage() }}" alt="" width="300"></div>

            <input type="submit" value="Зберегти зміни">
        </form>
    </div>
@endsection

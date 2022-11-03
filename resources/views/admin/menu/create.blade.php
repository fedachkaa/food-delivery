@extends('layouts.admin')

@section('content')
    <h1 style="text-align: center;"> Нова страва</h1>
    <div class="create-menu">
        <form role="form" action="{{route('menu.store')}}" method="post" enctype="multipart/form-data" class="create-menu-form">
            @csrf
            <label for="title">Назва:</label>
            <input type="text" name="title" required>

            <label for="description">Опис страви:</label>
            <textarea name="description" required></textarea>

            <label for="weight">Вага:</label>
            <input type="text" name="weight" required>

            <label for="price">Ціна:</label>
            <input type="text" name="price" required>

            <label for="image">Фото страви:</label>
            <input type="file" name="image" id="image" required>

            <input type="submit" value="Додати страву">
        </form>
    </div>
@endsection

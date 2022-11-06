@extends('layouts.admin')

@section('content')
    <h1 style="text-align: center;"> Нова категорія</h1>
    <div class="create-menu">
        <form role="form" action="{{route('categories.store')}}" method="post" enctype="multipart/form-data" class="create-menu-form">
            @csrf
            <label for="title">Назва:</label>
            <input type="text" name="title" required>
            <input type="submit" value="Додати категорію">
        </form>
    </div>
@endsection

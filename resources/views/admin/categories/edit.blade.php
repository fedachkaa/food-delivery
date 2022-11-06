@extends('layouts.admin')

@section('content')
    <h1 style="text-align: center;"> Редагування</h1>
    <div class="create-menu">
        <form role="form" action="{{route('categories.update', ['category'=>$category->id])}}" method="post" enctype="multipart/form-data" class="create-menu-form">
            @csrf
            @method('PUT')
            <label for="title">Назва:</label>
            <input type="text" name="title" value="{{$category->title}}" required>
            <input type="submit" value="Зберегти зміни">
        </form>
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <h1 style="text-align: center">Меню</h1>
    <div style="margin-top: 2%; text-align: center">
        <form action="{{ route('menu.create')}}" method="get">
            <input type="submit" value="Додати страву">
        </form>
    </div>
    <div>
        <ul class="products clearfix">
            @foreach($menu as $menu_item)
                <li class="product-wrapper">
                    <a href="" class="product">
                        <div class="product-photo">
                            <img src="{{$menu_item->getImage()}}" alt="">
                        </div>
                        <h1>{{$menu_item->title}}</h1>
                        <p>{{$menu_item->description}}</p>
                        <h3>{{$menu_item->weight}} гр. / {{$menu_item->price}} грн</h3>
                        <div class="price">
                            <form action="{{ route('menu.edit', ['menu'=>$menu_item->id]) }}" method="get">
                                <input type="submit" value="Редагувати"/>
                            </form>
                            <form action="{{ route('menu.destroy', ['menu'=>$menu_item->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Видалити" onclick="return confirm('Видалити страву {{$menu_item->title}}?')"/>
                            </form>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

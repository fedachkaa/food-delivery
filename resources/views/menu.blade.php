@extends('layouts.index')

@section('content')
        <h1 style="text-align: center">Меню</h1>
        <ul class="products clearfix">
            @foreach($menu as $menu_item)
                <li class="product-wrapper">
                    <a href="" class="product">
                        <div class="product-photo">
                            <img src="{{$menu_item->getImage()}}" alt="">
                        </div>
                        <h1>{{$menu_item->title}}</h1>
                        <p>{{$menu_item->description}}</p>
                        <div class="price">
                            <h3>{{$menu_item->weight}} гр. / {{$menu_item->price}} грн</h3>
                            <form action="{{ route('addToCart') }}" method="post">
                                @csrf
                                <input type="text" name="menu_item_id" value="{{ $menu_item->id }}" hidden>
                                <input type="submit" value="В корзину"/>
                            </form>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

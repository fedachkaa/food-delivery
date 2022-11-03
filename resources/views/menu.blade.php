@extends('layouts.index')

@section('content')
    <h1 style="text-align: center">Меню</h1>
    <div>
        <ul class="products clearfix">
            @for($i = 0; $i<10; $i++)
                <li class="product-wrapper">
                    <a href="" class="product">
                        <div class="product-photo">
                            <img src="{{asset('food-delivery/public/assets/images/img1.jpg')}}" alt="">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat.</p>
                        <div class="price">
                            <h3>300 г. / 100 грн</h3>
                            <form action="#" method="post">
                                <input type="submit" value="В корзину"/>
                            </form>
                        </div>
                    </a>
                </li>
            @endfor
        </ul>
    </div>
@endsection

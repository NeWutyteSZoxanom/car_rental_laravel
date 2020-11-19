@extends('layouts.main')

@section('promo')

    <section id="promo">
        <div id="promo-details">
            <h1>Сегодняшние предложения</h1>
            <p>Оформите заказ в этом разделе <br />для нашего продвижения.</p>
        </div><!-- end promo-details -->
        {{ HTML::image('img/promo.png', 'Promotional Ad') }}
    </section><!-- promo -->

@stop

@section('content')

	<h2>{{ $car_type->name }} Авто</h2>
    <hr>

    <aside id="categories-menu">
        <h3>Виды авто</h3>
        <ul>
            @foreach($typenav as $type)
                <li>{{ HTML::link('/store/car-type/'.$type->id, $type->name) }}</li>
            @endforeach
        </ul>
    </aside><!-- end categories-menu -->

    <div id="listings">

    	@foreach($cars as $car)
        <div class="product">
            
            {{ HTML::image($car->image, $car->title, array('class'=>'feature', 'width'=>'220', 'height'=>'128')) }}

            <h3>{{ $car->title }}</h3>

            <h5>
                Месть: <span>{{ $car->seats }}</span><br>
                Дверы: <span>{{ $car->doors }}</span><br>
                Кондиционер:
                <span class="{{ Utility::displayClass($car->aircon) }}">
                    @if($car->aircon)
                        Есть
                    @else
                        Нет
                    @endif
                </span><br>
                Коробка передач:
                <span class="{{ Utility::displayClass($car->transmission) }}">
                    @if($car->transmission)
                        Атомат
                    @else
                        Ручной
                    @endif
                </span><br>
                В наличие
                <span class="{{ Utility::displayClass($car->available_at <= date("Y-m-d H:i:s")) }}">
                    @if($car->available_at <= date("Y-m-d H:i:s"))
                        Now
                    @else
                        {{ date('d/m/Y', strtotime($car->available_at)) }}
                    @endif
                </span>
            </h5>

            <p>
                {{ Form::open(array('url'=>'store/book-car')) }}
                {{ Form::hidden('id', $car->id) }}
                <button type="submit" class="cart-btn">
                    <span class="price">${{ $car->price }}/DAY</span> БРОНИРОВАТЬ
                </button>
                {{ Form::close() }}
            </p>
        </div>
        @endforeach

	</div><!-- end listings -->

@stop

@section('pagination')

	<section id="pagination">
		{{ $cars->links() }}
	</section><!-- end pagination -->

@stop

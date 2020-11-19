@extends('layouts.main')

@section('promo')

	<section id="promo">
        <div id="promo-details">
            <h1>Сегодняшние предложения</h1>
            <p>Оформите заказ в этом разделе
<br />для нашего продвижения.</p>
        </div><!-- end promo-details -->

        <a >
            <img src="img/promo.png" alt="Promotional Ad">
        </a>
       
    </section><!-- promo -->

@stop
    
@section('content')
    
	<h1>Наши предложения</h1>
    <hr>
    <div id="products">
    	@foreach($cars as $car)
        <div class="product">
            
            
            <a >
                <img src="../car/{{ $car->image }}" class='feature'  style="width:220px;">
            </a>
            <h3>{{ $car->title }}</h3>
            <h5>
                Месть: <span>{{ $car->seats }}</span><br>
                Дверы: <span>{{ $car->doors }}</span><br>
                Кондиционер:
                <span class="НАДО ИЗМЕНИТЬ">
                    @if($car->aircon)
                        Есть
                    @else
                        Нет
                    @endif
                </span><br>
                Коробка передач:
                <span class="НАДО ИЗМЕНИТЬ">
                    @if($car->transmission)
                        Атомат 
                    @else
                        Ручной
                    @endif
                </span><br>
                В наличие
                <span class="НАДО ИЗМЕНИТЬ">
                    @if($car->available_at <= date("Y-m-d H:i:s"))
                        Есть
                    @else
                        {{ date('d/m/Y', strtotime($car->available_at)) }}
                    @endif
                </span>
            </h5>
            
            <p>
                <form action="{{route('bookcar',$car->id)}}" method="get" >
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$car->id}}">
                    <button type="submit" class="cart-btn">
                        <span class="price">${{ $car->price }}/день</span> БРОНИРОВАТЬ
                    </button>
                </form>
            </p>
        </div> 
        @endforeach
    </div> 


@stop

@section('pagination')

    <section id="pagination">
        {{ $cars->links() }}
    </section><!-- end pagination -->

@stop

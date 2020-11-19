@extends('layouts.main')

@section('content')

	<div id="booking">
        <h2>
Подтвердите бронирование</h1>

        
        
        <div class="product">            
            
            <a >
                <img src="../car/{{ $car->image }}" class='feature'  style="width:200px">
            </a>

            <h3>{{ $car->title }}</h3>

            <p>{{ $car->description }}</p>

            <h5>
                Мест: <span>{{ $car->seats }}</span><br>
                Дверы: <span>{{ $car->doors }}</span><br>
                Кондиционер:
                <span >
                    @if($car->aircon)
                        Есть
                    @else
                        Нет
                    @endif
                </span><br>
                Коробка передач:    
                <span >
                    @if($car->transmission)
                        Автомат
                    @else
                        Ручной
                    @endif
                </span><br>
                В наличие
                <span >
                    @if($car->available_at <= date("Y-m-d H:i:s"))
                        есть
                    @else
                        {{ date('d/m/Y', strtotime($car->available_at)) }}
                    @endif
                </span>
            </h5>
        </div>
       
       <form action="{{route('bookcreate')}}" method="post">
            {{ @csrf_field() }}
           <input type="hidden" name="car_id" value="{{ $car->id }}">
           <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">          
           <p>
            <label for="book_from">Начало аренды</label><br>
            <span><input type="date"  name="book_from" id ="book_from" ></span><br>

            <p>
            <label for="book_to">Конец аренды</label><br>
            <span><input type="date"  name="book_to" id = "book_to" ></span ><br>
            </p>
            
            <input type="submit" value="OK" class="secondary-cart-btn" >

            <a href="/"><input type="button" value="Отменить" class="tertiary-btn"  /></a>
       </form>

    </div ><!-- end booking -->

@stop

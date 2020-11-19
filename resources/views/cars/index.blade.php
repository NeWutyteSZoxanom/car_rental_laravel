@extends('layouts.main')

@section('content')

	<div id="admin">

		<h1>Панель Администратора</h1><hr>

		<p>Здесь вы можете посмотреть, удалить и добавить автомобилей.</p>

		<h2>Авто</h2><hr>

		<ul>
			@foreach($cars as $car)
				<li>
					<a >
            			<img src="../car/{{ $car->image }}" style="width: 50px;">
        			</a>
        			<a>{{ $car->title }} ({{ $car->cartyp->name  }}) -</a>

					
                    <a href="/admin/cars/delete/{{ $car->id }}">
                    <input type="button" value="удалить" class="edit" /></a>
					<a> - </a>
                    <a href="/cars/edit/{{ $car->id }}">
                    <input type="hidden" value="{{$car->id}}" name="id">
                    <input type="button" value="изменить" class="edit" /></a>			
				</li>
			@endforeach
		</ul>

		<h2>Добавить автомобилей</h2><hr>

		<form  action="{{ route('addcar') }}" method="post" enctype="multipart/form-data">
			 {{ csrf_field() }}
			<p>
                <label for="type_id">Вид авто</label>
	            <select name="type_id" >				
					@foreach($car_types as $type)
		                <option value="{{  $type->id }}">  {{  $type->name }} </option>	    
		            @endforeach
		            
	            </select>
	        </p>
	        <p>
                <label for="title">Название</label>
	            <input type="text" name="title">
	        </p>
	        <p>
                <label for="description">Информация</label>
	            
	            <textarea name="description" placeholder="Информация" 
     ></textarea>
	        </p>
	        <p>
                <label for="price">Цена</label>
	            <input type="text" name="price" class='form-price'>
	        </p>
	        <p>
                <label for="available_at">Доступень</label>
	            <input type="text" name="available_at" >
	        </p>
	        <p>
                <label for="transmission">Коробка передач</label>
	            <select name="transmission" >			
		            <option value="1">Automatic</option>
					<option value="0">Manual</option>
	            </select>
	        </p>
	        <p>
                <label for="aircon">Кондиционер</label>
	            <select name="aircon" >				
					<option value="1">Yes</option>
					<option value="0">No</option>
	            </select>
	        </p>
	        <p>
                <label for="seats">Мест</label>
	            <select name="seats"  >				
					@foreach($seats as $seat)
		                <option>  {{  $seat }} </option>	    
		            @endforeach
	            </select>
	        </p>
	        <p>
                <label for="doors">Дверы</label>
	            <select name="doors" >				
					@foreach($doors as $door)
		                <option>  {{  $door }} </option>	    
		            @endforeach
	            </select>
	        </p>
	        
	        <p>
                <label for="image">Выбрать фото</label>
	            <input type="file" name="image">
	        </p>
	        <input type="submit" value="Добавить авто" class="secondary-cart-btn">
		</form>

	</div><!-- end admin -->

@stop

@extends('layouts.main')

@section('content')

	<div id="admin">

		<h1>Панель Администратора</h1><hr>

		<p>Here you can edit selected car.</p>

		<h2>Edit Car</h2><hr>

		{{ $cars->title }}
			<form  action="{{ route('carupdate',$cars->id)}}" method="post" enctype="multipart/form-data">
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
	            <input type="text" name="title" value="{{ $cars->title }}">
	        </p>
	         <p>
                <label for="description">Информация</label>
	            
	            <textarea name="description" value="{{ $cars->description }}" 
     ></textarea>
	        </p>
	        <p>
                <label for="price">Цена</label>
	            <input type="text" name="price" value="{{ $cars->price }}" class='form-price'>
	        </p>
	        <p>
                <label for="available_at">Доступень</label>
	            <input type="text" name="available_at" value="{{ $cars->available_at }}" >
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
	            <select name="seats" value="{{ $cars->seats }}" >				
					<option value="1">1</option>
					<option value="2">2</option>
	            </select>

	        </p>
	        <p>
                <label for="doors">Дверы</label>
	            <input type="text" name="doors" value="{{ $cars->doors }}" class='form-price'>
	        </p>
	       
	        
	        
	        <p>
                <label for="image">Выбрать фото</label>
	            <input type="file" name="image">
	        </p>
	        
	        <input type="submit" value="Изменить" class="secondary-cart-btn">
		</form>
		
	</div><!-- end admin -->

@stop

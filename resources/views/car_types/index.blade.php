@extends('layouts.main')

@section('content')

	<div id="admin">

		<h1>Панель Администратора </h1><hr>

		<p>Здесь вы можете посмотреть, удалить и создать виды автомобилей.</p>

		<h2>Виды автомобилей</h2><hr>

		<ul>
			@foreach($car_types as $type)
				<li>
					{{ $type->name }} -

					<form action="{{ route('destroy', ['id' => $type->id]) }}" class='form-inline' method="get">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{$type->id}}">
						<input type="submit" value="Удалить">
					</form>

				
				</li>
			@endforeach
		</ul>

		<h2>Новый вид автомобиля</h2><hr>

			<form action="{{ route('store') }}" method="POST">
				{{ csrf_field() }}
				<p>
					<label for="Название"></label>
					<input type="text" name="name">
				<p>
					<input type="submit" value="OK" class='secondary-cart-btn'>
			</form>		
	</div><!-- end admin -->

@stop

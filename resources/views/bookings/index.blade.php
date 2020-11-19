@extends('layouts.main')

@section('content')

	<div id="shopping-cart">
    <h1>Мои сделки</h1>
    
    <table border="1">
        <tr>
            <th>Номер сделки</th>
            <th>Авто</th>
            <th>Статус</th>
            <th>Цена</th>
            <th>Дата сделки</th>
            <th>Начало аренды</th>
            <th>Конец аренды</th>
            <th>Действие</th>
        </tr>

        @foreach($bookings as $booking)
        <tr>
            <td>{{ $booking->id }}</td>
            <td>
                {{ HTML::image($booking->car->image, $booking->car->name, array('width'=>'65', 'height'=>'37'))}} 
                {{ $booking->car->title }}
            </td>
            <td>{{ $booking->status }}</td>
            <td>${{ $booking->car->price }}/День</td>
            <td>{{ date('d/m/Y', strtotime($booking->created_at)) }}</td>
            <td>{{ date('d/m/Y', strtotime($booking->book_from)) }}</td>
            <td>{{ date('d/m/Y', strtotime($booking->book_to)) }}</td>
            <td>
                {{ Form::open(array('url'=>'bookings/cancel', 'class'=>'form-inline')) }}
                {{ Form::hidden('id', $booking->id) }}
                {{ Form::submit('отменить') }}
                {{ Form::close() }} 
            </td>
        </tr>
        @endforeach
        
    </table>
    
    </div><!-- end shopping-cart -->

@stop

@section('pagination')

    <section id="pagination">
        {{ $bookings->links() }}
    </section><!-- end pagination -->

@stop
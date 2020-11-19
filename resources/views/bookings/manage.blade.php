@extends('layouts.main')

@section('content')

	<div id="manage-bookings">
    <h1>История сделок</h1>
    
    <table border="1">
        <tr>
            <th>ID сделок</th>
            <th>Авто</th>
            <th>Статус</th>
            <th>Цена</th>
            <th>Дата брони</th>
            <th>Начало аренды</th>
            <th>Конец аренды</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Email</th>
            <th>Тел</th>
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
            <td>${{ $booking->car->price }}/Day</td>
            <td>{{ date('d/m/Y', strtotime($booking->created_at)) }}</td>
            <td>{{ date('d/m/Y', strtotime($booking->book_from)) }}</td>
            <td>{{ date('d/m/Y', strtotime($booking->book_to)) }}</td>
            <td>{{ $booking->user->firstname }}</td>
            <td>{{ $booking->user->lastname }}</td>
            <td>{{ $booking->user->email }}</td>
            <td>{{ $booking->user->telephone }}</td>
            <td>
                {{ Form::open(array('url'=>'bookings/manage', 'class'=>'form-inline'))}}
                {{ Form::hidden('id', $booking->id) }}
                {{ Form::select('status', array('Pending'=>'
В ожидании', 'Cancelled'=>'отменен', 'Confirmed'=>'Подтвердил'), $booking->status) }}<br>
                {{ Form::submit('Обновить') }}
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
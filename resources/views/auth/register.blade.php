@extends('layouts.main')

@section('content')


<div id="new-account">

        <h1>Создать новый аккаунт</h1>

        <form action="{{ route('register') }}"  method="POST">
            {{ csrf_field() }}
            <p>
                <label for="firstname">Имя</label>
                <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

            </p>
            <p>
                <label for="lastname">Фамилия</label>
                <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

            </p>
            <p>
                <label for="email">email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            </p>
            <p>
                <label for="password">Пороль</label>
                <input type="password" name="password" id="password" value="{{ old('password') }}" required autocomplete="password" autofocus>

            </p>
            <p>
                <label for="password_confirmation">Повторить_пороль</label>
                <input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="password_confirmation" autofocus>

            </p>
            <p>
                <label for="telephone">Тел</label>
                <input type="text" name="telephone" id="telephone" value="{{ old('telephone') }}" required autocomplete="telephone" autofocus>

            </p>
            <input type="submit" value="
            Создать новый аккаунт" class="secondary-cart-btn">

        </form>

    </div><!-- end new-account -->
@endsection

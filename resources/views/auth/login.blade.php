@extends('strangers.welcome')

@section('content')
    <form method="POST" action="{{route('login')}}">
        {!! csrf_field() !!}
        <div>
            Email
            <input type="email" name="email" value="{{ old('email') }}">
        </div>
        <div>
            Login
            <input type="text" name="login" value="{{ old('login') }}">
        </div>

        <div>
            Password
            <input type="password" name="password" id="password">
        </div>

        <div>
            <input type="checkbox" name="remember"> Remember Me
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>
@endsection

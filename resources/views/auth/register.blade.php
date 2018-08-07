@extends('strangers.welcome')

@section('content')
<form method="POST" action="{{ route('register') }}">
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
        <input type="password" name="password">
    </div>

    <div>
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>
@endsection

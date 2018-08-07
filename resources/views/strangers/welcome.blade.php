<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOG in Screen</title>

    <!-- CSS и JavaScript -->
</head>

<body>
<div class="container">
    <nav class="navbar navbar-default">
        Welcome stranger.<br \>
        This place can be your home.<br \>
        Join Us!
    </nav>
</div>
@if (Route::has('login'))
    <div >
        @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">New user</a>
        @endauth
    </div>
@endif
@yield('content')
</body>
</html>
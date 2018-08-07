<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

</head>
<body>
This is your new home.<br/>
Sorry.<br/>
Many function not available for now.<br/>
We will try to fix them soon.<br/>
Please, supply your patience.<br/>
<div>
 U balance = {{Auth::user()->points}}
    <br />
<a href = 'logout' >logout</a>
</div>
<div>
Ribbon Option<br/>
    <a href = 'ribbon' >Create</a>
    <a href = 'manage' >Manage your ribbon</a>
    <a href = 'rdelete' >Delete</a>
    <a href = 'ribbonslist' >Show all ribbons</a>
    @yield('content')
</div>
</body>
</html>
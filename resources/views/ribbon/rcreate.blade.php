@extends('owners.home')

@section('content')
    <form method="POST" action="{{url('ribbon')}}">
        {!! csrf_field() !!}

        <div>
            Name
            <input type="text" name="name" id="ribbon-name" >
        </div>
        <div>
            Description
            <input type="text" name="desc" id="desc-name">
        </div>


        <div>
            <button type="submit">Create</button>
        </div>
    </form>
@endsection

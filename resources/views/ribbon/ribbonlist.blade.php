@extends('owners.home')

@section('content')
    form for output all ribbon
    <!-- Форма создания задачи... -->

    <!-- Текущие задачи -->
    @if (count($ribbons) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Список лент всех пользователей
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <th>Ribbon</th>
                    <th>&nbsp;</th>
                    </thead>

                    <!-- Тело таблицы -->
                    <tbody>
                    <tr>
                        <td>
                            <b>Name</b>
                        </td>
                        <td>
                            <b>Desc</b>
                        </td>
                    </tr>
                    @foreach ($ribbons as $ribbon)
                        <tr>
                            <!-- Имя задачи -->
                            <td class="table-text">
                                <div>{{ $ribbon->name }}</div>
                            </td>
                            <td>
                                <div>{{ $ribbon->desc }}</div>
                            </td>
                        </tr>
                        <tr>
                            @foreach($ribbon->photos as $photo)
                                <td>
                                    <img src="{{asset($photo->path)}}" alt="Sorry">
                                </td>
                                <td>
                                    <form action="{{ url('ribbon/'.$ribbon->id.'/'.$photo->id) }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="checkbox" id="id-fom-{{$photo->id}}" name="state" onChange="this.form.submit()">
                                        <br />
                                        {{$photo->laik}}

                                    </form>
                                </td>
                            @endforeach
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        {{$ribbons->links()}}
    @endif
@endsection
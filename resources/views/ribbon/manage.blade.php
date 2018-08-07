@extends('owners.home')

@section('content')
    form for output all ribbon
    <!-- Форма создания задачи... -->

    <!-- Текущие задачи -->
    @if (count($ribbons) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Текущая задача
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <th>Task</th>
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
                            <td>
                                <form action="{{ url('ribbon/'.$ribbon->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" id="delete-task-{{ $ribbon->id }}">
                                        <i class="fa fa-btn fa-trash"></i>Удалить
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{url('ribbon/'.$ribbon->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    <td>
                                        <input type="submit" id="edit-ribbon-{{ $ribbon->id }}" value="EDIT">
                                    </td>
                                    <td>
                                        <input type="text" name="name" id="edit-ribbon-{{ $ribbon->id }}">
                                    </td>
                                    <td>
                                        <input type="text" name="desc" id="edit-ribbon-{{ $ribbon->id }}">
                                    </td>

                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="{{url('ribbon/'.$ribbon->id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="file" name="photo">
                                    <button type="submit">Download</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                        @foreach($ribbon->photos as $photo)
                            <td>
                                <img src="{{asset($photo->path)}}" alt="Sorry">
                                <form action="{{ url('ribbon/'.$ribbon->id.'/'.$photo->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" id="delete-photo-{{ $photo->id }}">
                                        <i class="fa fa-btn fa-trash"></i>Deletephoto
                                    </button>
                                </form>
                            </td>
                        @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
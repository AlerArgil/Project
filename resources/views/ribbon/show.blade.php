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
                            <b>Prof</b>
                        </td>
                        <td>
                            <b>Desc</b>
                        </td>
                    </tr>
                    @foreach ($ribbons as $ribbon)
                        <tr>
                            <!-- Имя задачи -->
                            <td class="table-text">
                                <div>{{ $ribbon->nam }}</div>
                            </td>

                            <td>
                                <div>{{ $ribbon->prof }}</div>
                            </td>
                            <td>
                                <div>{{ $ribbon->desc }}</div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
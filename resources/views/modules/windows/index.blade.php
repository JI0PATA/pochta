{{ config(['app.name' => 'Все типы очередей']) }}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <a href="{{ route('user.windows.add') }}" class="btn btn-dark">Добавить окно</a>
        </div><br>
        <table class="table">
            <thead>
            <th>#</th>
            <th>Номер окна</th>
            <th>Типы очереди</th>
            <th>Действия</th>
            </thead>
            <tbody>
            @foreach($windows as $window)
                <tr>
                    <td>{{ $window->id }}</td>
                    <td>{{ $window->number }}</td>
                    <td>
                        @foreach($window->queues as $queue)
                            {{ $queue->name.' | ' }}
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('user.windows.edit', ['id' => $window->id]) }}" class="btn btn-warning">Изменить</a>
                        <a href="{{ route('user.windows.delete', ['id' => $window->id]) }}" class="btn btn-danger">Удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
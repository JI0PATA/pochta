{{ config(['app.name' => 'Все типы очередей']) }}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <a href="{{ route('user.queues.add') }}" class="btn btn-dark">Добавить тип очереди</a>
        </div><br>
        <table class="table">
            <thead>
            <th>#</th>
            <th>Имя</th>
            <th>Префикс</th>
            <th>Действия</th>
            </thead>
            <tbody>
            @foreach($queues as $queue)
                <tr>
                    <td>{{ $queue->id }}</td>
                    <td>{{ $queue->name }}</td>
                    <td>{{ $queue->prefix }}</td>
                    <td>
                        <a href="{{ route('user.queues.edit', ['id' => $queue->id]) }}" class="btn btn-warning">Изменить</a>
                        <a href="{{ route('user.queues.delete', ['id' => $queue->id]) }}" class="btn btn-danger">Удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
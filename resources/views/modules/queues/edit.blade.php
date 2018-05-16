{{ config(['app.name' => 'Изменить тип очереди']) }}

@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('user.queues.update', ['id' => $queue->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Заголовок</label>
                <input type="text" class="form-control" id="name" placeholder="Введите заголовок" name="name" value="{{ $queue->name }}" required>
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="prefix">Префикс</label>
                <input type="text" class="form-control" id="prefix" placeholder="Введите префикс" name="prefix" value="{{ $queue->prefix }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
{{ config(['app.name' => 'Добавить тип очереди']) }}

@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('user.queues.create') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Заголовок</label>
                <input type="text" class="form-control" id="name" placeholder="Введите заголовок" name="name" required value="{{ old('name') }}">
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="prefix">Префикс</label>
                <input type="text" class="form-control" id="prefix" placeholder="Введите префикс" name="prefix" required value="{{ old('prefix') }}">
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection
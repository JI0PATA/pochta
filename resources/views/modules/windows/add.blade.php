{{ config(['app.name' => 'Добавить окно']) }}

@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('user.windows.create') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="number">Номер окна</label>
                <input type="text" class="form-control" id="number" placeholder="Введите номер окна" name="number" required>
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="queues">Типы очередей</label>
                <select class="custom-select" id="queues" name="queues[]" multiple size="3" required>
                    @foreach($queues as $queue)
                        <option value="{{ $queue->id }}">{{ $queue->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection
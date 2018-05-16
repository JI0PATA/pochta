{{ config(['app.name' => 'Изменить окно']) }}

@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('user.windows.update', ['id' => $window->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="number">Номер окна</label>
                <input type="text" class="form-control" id="number" placeholder="Введите номер окна" name="number" required value="{{ $window->number }}">
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="queues">Типы очередей</label>
                <select class="custom-select" id="queues" name="queues[]" multiple size="3" required>
                    @foreach($queues as $queue)
                        <option value="{{ $queue->id }}"
                            @foreach($window->queues as $queue_id)
                                @if($queue_id->id === $queue->id)
                                    selected
                                @endif
                            @endforeach
                        >{{ $queue->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
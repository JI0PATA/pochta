{{ config(['app.name' => 'Терминал']) }}

@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/screen.css') }}">
    <input type="hidden" id="hash" value="">
    <div class="container terminal">
        <div class="row" id="terminal__items">
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                let sync = new Sync(Queue, 'terminal');
            });
        </script>
    @endpush
@endsection
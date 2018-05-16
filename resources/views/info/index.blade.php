{{ config(['app.name' => 'Информационное табло']) }}

@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/screen.css') }}">
    <input type="hidden" id="hash" value="">
    <div id="cont">
        <div class="row" id='header'>
            <div class="col-md-12"><img src="{{ asset('img/logo-rp.png') }}"><h1>Электронная очередь</h1></div>

        </div>
        <div class="row title">
            <div class="col-md-3">Клиент</div>
            <div class="col-md-3">Окно</div>
            <div class="col-md-3">Клиент</div>
            <div class="col-md-3">Окно</div>
        </div>
        <div class="row info" id="info__items">
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(_ => {
                let sync = new Sync(ApplicationsOnInfo, 'info');
            });
        </script>
    @endpush
@endsection
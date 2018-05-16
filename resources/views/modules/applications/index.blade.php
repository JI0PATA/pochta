{{ config(['app.name' => 'Управление очередью']) }}

@extends('layouts.app')

@section('content')
    <input type="hidden" id="hash" value="">
    <div class="container">
        <table class="table">
            <thead>
            <th>Очередь</th>
            <th>Окна</th>
            </thead>
            <tbody id="applications__body">
            </tbody>
        </table>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function () {
                new Sync(Application, 'applications');
            });
        </script>
    @endpush
@endsection
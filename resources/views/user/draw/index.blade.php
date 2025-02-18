@extends('layouts.base-user')

@section('content')
    @viteReactRefresh
    @vite('resources/js/app.jsx')
    <div id="drawManagement"></div>
@endsection




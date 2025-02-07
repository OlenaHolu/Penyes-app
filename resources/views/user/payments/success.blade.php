@extends('layouts.base-user')

@section('content')
    <div class="container text-center">
        <h2>¡Pago Exitoso!</h2>
        <p>Tu pago ha sido registrado correctamente.</p>
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Volver al inicio</a>
    </div>
@endsection

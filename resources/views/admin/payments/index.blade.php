@extends('layouts.base-admin')

@section('content')
    <h1>Gestión de Pagos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Crew</th>
                <th>Monto</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->userCrew->crew_id ?? 'Crew eliminado' }}</td>
                    <td>{{ $payment->amount }} USD</td>
                    <td>{{ $payment->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

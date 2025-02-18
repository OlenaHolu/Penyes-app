@extends('layouts.base-admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Gestión de Pagos</h1>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="w-full border-collapse">
                <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">Usuario</th>
                        <th class="py-3 px-6 text-left">Año</th>
                        <th class="py-3 px-6 text-left">Crew</th>
                        <th class="py-3 px-6 text-left">Importe</th>
                        <th class="py-3 px-6 text-left">Estado</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm font-light">
                    @foreach($payments as $payment)
                        <tr class="border-b border-gray-200 hover:bg-gray-100 transition">
                            <td class="py-3 px-6">{{ $payment->user->name . $payment->user->surname ?? 'Usuario eliminado' }}</td>
                            <td class="py-3 px-6">{{ $payment->pricing->year }}</td>
                            <td class="py-3 px-6">{{ $payment->pricing->crew->name ?? 'Peña eliminada' }}</td>
                            <td class="py-3 px-6 font-semibold text-gray-800">{{ $payment->pricing->amount }} EUR</td>
                            <td class="py-3 px-6">
                                <span class="px-3 py-1 rounded-full text-white text-xs font-semibold
                                    {{ $payment->status == 'PAID' ? 'bg-green-500' : 'bg-red-500' }}">
                                    {{ $payment->status }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

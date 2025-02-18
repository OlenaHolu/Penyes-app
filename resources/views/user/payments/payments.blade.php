@extends('layouts.base-user')

@section('content')
    <div class="max-w-3xl mx-auto px-6 py-8">
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                {{ session('error') }}
            </div>
        @endif

        <!-- ✅ Show Payments Table Only If There Are Payments -->
        @if ($payments->count() > 0)
            <h2 class="text-xl font-semibold text-gray-800 mt-8 mb-4">Pagos Realizados</h2>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <table class="w-full border-collapse">
                    <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <tr>
                            <th class="py-3 px-6 text-left">Año</th>
                            <th class="py-3 px-6 text-left">Crew</th>
                            <th class="py-3 px-6 text-left">Importe</th>
                            <th class="py-3 px-6 text-left">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm font-light">
                        @foreach ($payments as $payment)
                            <tr class="border-b border-gray-200 hover:bg-gray-100 transition">
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
        @endif

        <!-- ✅ Show Payment Options If There Are Unpaid Fees -->
        @if ($pricingOptions->count() > 0)
            <h2 class="text-xl font-semibold text-gray-800 mt-8 mb-4">Cuotas Pendientes</h2>
            <div class="grid gap-6">
                @foreach ($pricingOptions as $pricing)
                    <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200">
                        <h5 class="text-lg font-semibold text-gray-700">Crew: {{ $pricing->crew->name }}</h5>
                        <p class="text-sm text-gray-600">Año: <span class="font-medium">{{ $pricing->year }}</span></p>
                        <p class="text-lg font-bold text-gray-900">Importe: ${{ $pricing->amount }}</p>

                        <form action="{{ route('payments.store') }}" method="POST" class="mt-4">
                            @csrf
                            <input type="hidden" name="pricing_id" value="{{ $pricing->id }}">
                            <button type="submit"
                                class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                                Pagar
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600 mt-6 text-center">No tienes cuotas pendientes por pagar.</p>
        @endif
    </div>
@endsection

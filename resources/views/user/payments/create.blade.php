@extends('layouts.base-user')

@section('content')
    <div class="max-w-3xl mx-auto px-6 py-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Selecciona la Cuota a Pagar</h2>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-6">
            @foreach($pricingOptions as $pricing)
                <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200">
                    <h5 class="text-lg font-semibold text-gray-700">Crew: {{ $pricing->crew->name }}</h5>
                    <p class="text-sm text-gray-600">Año: <span class="font-medium">{{ $pricing->year }}</span></p>
                    <p class="text-lg font-bold text-gray-900">Monto: ${{ $pricing->amount }}</p>

                    <form action="{{ route('payments.store') }}" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="pricing_id" value="{{ $pricing->id }}">
                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                            Pagar
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection

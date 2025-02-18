@extends('layouts.base-user')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-4">Cartera</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <p class="text-lg font-semibold text-gray-700">Saldo Actual: <span class="text-green-600">{{ number_format($wallet->balance, 2) }} EUR</span></p>
    </div>

    <!-- Deposit Form -->
    <div class="mt-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">Ingresar Dinero</h2>
        <form action="{{ route('wallet.deposit') }}" method="POST" class="bg-gray-100 p-4 rounded-lg">
            @csrf
            <label for="deposit-amount" class="block text-gray-600">Cantidad:</label>
            <input type="number" name="amount" id="deposit-amount" class="w-full border p-2 rounded" min="1" required>
            <button type="submit" class="mt-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Depositar</button>
        </form>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-500 text-green-700 p-3 rounded mt-4">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border border-red-500 text-red-700 p-3 rounded mt-4">
            {{ session('error') }}
        </div>
    @endif
</div>
@endsection

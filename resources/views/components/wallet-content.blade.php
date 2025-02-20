<div class="p-4">
    <p class="text-lg font-semibold text-gray-700">Saldo Actual: 
        <span id="wallet-balance" class="text-green-600">{{ number_format($wallet->balance, 2) }} EUR</span>
    </p>

    {{-- ✅ Deposit Money Form --}}
    <div class="mt-4">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">Ingresar Dinero</h2>
        <form id="deposit-form" class="bg-gray-100 p-4 rounded-lg">
            @csrf
            <label for="deposit-amount" class="block text-gray-600">Cantidad:</label>
            <input type="number" name="amount" id="deposit-amount" class="w-full border p-2 rounded" min="1" required>
            <button type="submit" class="mt-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Depositar
            </button>
        </form>
    </div>
</div>

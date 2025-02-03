@extends('layouts.base-user')
@section('content')
    <h1>Realizar Pago</h1>
    <form id="payment-form">
        @csrf
        <label for="amount">Monto:</label>
        <input type="number" id="amount" name="amount" required>
        
        <div id="card-element"></div>
        <button id="submit">Pagar</button>
    </form>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe("{{ env('STRIPE_KEY') }}");
        const elements = stripe.elements();
        const cardElement = elements.create("card");
        cardElement.mount("#card-element");

        document.getElementById("payment-form").addEventListener("submit", async (event) => {
            event.preventDefault();
            alert("Pago de prueba realizado con éxito.");
        });
    </script>
@endsection

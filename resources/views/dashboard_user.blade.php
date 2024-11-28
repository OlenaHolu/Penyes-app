@extends('partials.baseUser')
@section('content')
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            {{ __("You're logged in!") }}
        </div>
        {{-- Bienvenida personalizada --}}
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <p class="mt-4">¡Bienvenido, {{ Auth::user()->name }}!</p>
        </div>
    </div>
@endsection


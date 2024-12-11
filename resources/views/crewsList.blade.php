@extends('partials.baseUser')

@section('content')
    {{-- Formulario de Búsqueda --}}
    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow-md mb-6">
        <form action="/search-crew" method="get" class="flex items-center space-x-2">
            <input 
                type="search" 
                name="query" 
                placeholder="Buscar crew..." 
                required 
                class="flex-grow px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-gray-200"
            >
            <button 
                type="submit" 
                class="ml-2 bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400"
            >
                Buscar
            </button>
        </form>
    </div>

    {{-- Lista de Crews --}}
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
            Lista de crews
        </h2>
        <ul class="space-y-4">
            @foreach ($crews as $crew)
                <li class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-sm flex justify-between items-center">
                    <div>
                        <a href="/crews/{{ $crew->id }}" class="text-blue-500 hover:underline text-lg font-semibold">
                            {{ $crew->name }}
                        </a>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Año: {{ $crew->year }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Slogan: {{ $crew->slogan }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
        {{-- Enlace para regresar a HOME --}}
        <a href="{{ url('/dashboard') }}"
        class="mt-4 text-blue-500 hover:text-blue-700 dark:text-blue-300 dark:hover:text-blue-500 underline font-semibold">
        Volver al Home
    </a>
    </div>
@endsection

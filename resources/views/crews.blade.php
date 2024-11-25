@extends('partials.baseAdmin')
@section('content')
            {{-- Formulario de Búsqueda --}}
            <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow-md mb-6">
                <form action="/search-user" method="get" class="flex items-center">
                    <input 
                        type="search" 
                        name="query" 
                        placeholder="Buscar crew..." 
                        required 
                        class="flex-grow px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                    <button style="background-color: blue; color: white; margin-left: 2px; border-radius: 8px; padding: 10px;">
                        Buscar
                    </button>
                    
                </form>
            </div>

            {{-- Botón para Crear Crew --}}
            <div class="mb-6">
                <a href="{{ route('crews.create') }}" style="background-color: green" class="inline-block text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 ">
                    Crear Crew
                </a>
            </div>

            {{-- Lista de Crews --}}
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                    Lista de crews
                </h2>
                <ul class="space-y-2">
                    @foreach ($crews as $crew)
                        <li class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-sm flex justify-between items-center">
                            <span class="text-gray-800 dark:text-gray-200">{{ $crew->name }}</span>
                            <a href="/crews/{{ $crew->id }}/edit" class="text-blue-500 hover:text-blue-700 dark:text-blue-300 hover:underline">Editar</a>
                        </li>
                    @endforeach
                </ul>
            </div>
@endsection

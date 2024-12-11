@extends('partials.baseAdmin')

@section('content')
    {{-- Formulario de Búsqueda --}}
    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow-md mb-6">
        <form action="/search-crew" method="get" class="flex items-center">
            <input type="search" name="query" placeholder="Buscar crew..." required
                class="flex-grow px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit"
                class="ml-2 bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Buscar
            </button>
        </form>
    </div>

    {{-- Botón para Crear Crew --}}
    <div class="mb-6">
        <a href="{{ route('crews.create') }}"
            class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400">
            Crear Crew
        </a>
    </div>

    {{-- Lista de Crews --}}
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
            Lista de Crews
        </h2>
        <div class="space-y-4">
            @foreach ($crews as $crew)
                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-sm flex justify-between items-center hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                    <div class="flex flex-col w-1/4 text-left">
                        <span class="text-gray-800 dark:text-gray-200 font-medium">{{ $crew->name }}</span>
                        <span class="text-gray-600 dark:text-gray-400 text-sm">{{ $crew->color }}</span>
                    </div>
                    <div class="flex flex-col w-1/4 text-left">
                        <span class="text-gray-600 dark:text-gray-400 text-sm">{{ $crew->year }}</span>
                    </div>
                    <div class="flex flex-col w-1/4 text-left">
                        <span class="text-gray-600 dark:text-gray-400 text-sm">{{ $crew->slogan }}</span>
                    </div>
                    <a href="/crews/{{ $crew->id }}/edit"
                        class="text-blue-500 hover:text-blue-700 dark:text-blue-300 dark:hover:text-blue-500 hover:underline">
                        Editar
                    </a>
                </div>
            @endforeach
        </div>

        {{-- Enlace para regresar a HOME --}}
        <a href="{{ url('/dashboard') }}"
            class="mt-4 text-blue-500 hover:text-blue-700 dark:text-blue-300 dark:hover:text-blue-500 underline font-semibold">
            Volver al Home
        </a>
    </div>

    {{-- Mensaje de Éxito --}}
    @if (session('success'))
        <div id="successMessage" class="fixed top-5 right-5 bg-green-500 text-white p-4 rounded-lg shadow-lg z-50">
            {{ session('success') }}
        </div>

        <script>
            // Función para ocultar el mensaje después de unos segundos
            setTimeout(function() {
                document.getElementById('successMessage').style.display = 'none';
            }, 5000); // Se ocultará después de 5 segundos
        </script>
    @endif
@endsection

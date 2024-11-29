@extends('partials.baseUser')

@section('content')
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <div>
            {{-- Título e información del crew --}}
            <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">{{ $crew->name }}</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                <strong>Año:</strong> {{ $crew->year }}
            </p>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                <strong>Slogan:</strong> {{ $crew->slogan }}
            </p>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                <strong>Color:</strong> {{ $crew->color }}
            </p>
        
            {{-- Formulario para unirse al crew --}}
            <form action="/joinCrew/{{ $crew->id }}" method="POST" class="mb-6">
                @csrf
                <button type="submit" 
                    class="w-full bg-green-600 text-white font-semibold px-4 py-2 rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400"
                    style="background-color: green">
                    Enviar solicitud
                </button>
            </form>

            {{-- Mensajes de éxito o error --}}
            @if(session('success'))
                <p class="text-green-600">{{ session('success') }}</p>
            @elseif(session('error'))
                <p class="text-red-600">{{ session('error') }}</p>
            @endif

            {{-- Enlace para regresar a la lista de crews --}}
            <a href="{{ url('/crewsList') }}" 
                class="block text-blue-500 hover:underline text-sm font-medium">
                Regresar a la lista de crews
            </a>
        </div>
    </div>
</div>
@endsection

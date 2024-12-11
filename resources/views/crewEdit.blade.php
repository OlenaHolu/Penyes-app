@extends('partials.baseAdmin')

@section('content')
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <div>
            {{-- Formulario para actualizar crew --}}
            <form action="{{ url('/crews/' . $crew->id) }}" method="POST" class="mb-6 space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre:</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name', $crew->name) }}" 
                        required 
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200"
                    >
                </div>

                <div>
                    <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Año:</label>
                    <input 
                        type="text" 
                        id="year" 
                        name="year" 
                        value="{{ old('year', $crew->year) }}" 
                        required 
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200"
                    >
                </div>

                <div>
                    <label for="slogan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Slogan:</label>
                    <input 
                        type="text" 
                        id="slogan" 
                        name="slogan" 
                        value="{{ old('slogan', $crew->slogan) }}" 
                        required 
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200"
                    >
                </div>

                <div>
                    <label for="color" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Color:</label>
                    <input 
                        type="text" 
                        id="color" 
                        name="color" 
                        value="{{ old('color', $crew->color) }}" 
                        required 
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200"
                    >
                </div>

                    <div>
                        <button type="submit"
                            style="background-color: green; color: white; padding: 10px; margin-top: 10px; border: none; cursor: pointer; border-radius: 5px;">
                            Actualizar Crew
                        </button>
                    </div>
                </form>

                {{-- Formulario para eliminar crew --}}
                <form action="{{ url('/crews/' . $crew->id) }}" method="POST"
                    onsubmit="return confirm('¿Estás seguro de que quieres eliminar este crew?');">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        style="background-color: red; color: white; padding: 10px; border: none; cursor: pointer; border-radius: 5px;">
                        Eliminar Crew
                    </button>
                </form>

                {{-- Enlace para volver a la página anterior --}} 
                <a href="javascript:history.back()" 
                    class="block text-blue-500 hover:underline text-sm font-medium"> 
                    Volver a la página anterior 
                </a>
            </div>
        </div>
@endsection
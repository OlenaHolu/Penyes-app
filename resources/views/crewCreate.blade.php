@extends('partials.baseAdmin')

@section('content')
<div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">Crear Nuevo Crew</h2>
    <form action="{{ route('crews.store') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                required 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200"
            >
        </div>
        <div>
            <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Año</label>
            <input 
                type="year" 
                id="year" 
                name="year" 
                required 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200"
            >
        </div>
        <div>
            <label for="slogan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Slogan</label>
            <input 
                type="text" 
                id="slogan" 
                name="slogan" 
                required 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200"
            >
        </div>
        <div>
            <label for="color" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Color</label>
            <input 
                type="text" 
                id="color" 
                name="color" 
                required 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200"
            >
        </div>
        <button 
            type="submit" 
            class="w-full bg-green-500 text-white font-semibold px-4 py-2 rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400" style="background: green">
            Guardar Crew
        </button>
    </form>
</div>
@endsection

@extends('layouts.base-admin')

@section('content')
<div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">Crear Nuevo Usuario</h2>
    <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
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

        <!-- Surname -->
        <div>
            <label for="surname" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Apellido</label>
            <input 
                type="text" 
                id="surname" 
                name="surname" 
                required 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200"
            >
        </div>

        <!-- Born Day -->
        <div>
            <label for="bornDay" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha de Nacimiento</label>
            <input 
                type="date" 
                id="bornDay" 
                name="bornDay" 
                required 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200"
            >
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Correo Electrónico</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                required 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200"
            >
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contraseña</label>
            <input 
                type="password" 
                id="password" 
                name="password" 
                required 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200"
            >
        </div>
        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirmar Contraseña</label>
            <input 
                type="password" 
                id="password_confirmation" 
                name="password_confirmation" 
                required 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200"
            >
        </div>
        <button 
            type="submit" 
            class="w-full bg-green-500 text-white font-semibold px-4 py-2 rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400" style="background: green">
            Guardar Usuario
        </button>
    </form>
    <a href="{{ url('/users') }}" style="display: block; margin-top: 20px; text-decoration: underline;">Regresar
        a la lista de usuarios</a>
</div>
@endsection

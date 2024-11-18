<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard ADMIN') }}
        </h2>
    </x-slot>

    <div class="flex py-12">
        {{-- Menú Lateral --}}
        <aside class="w-1/4 bg-gray-100 dark:bg-gray-800 p-4">
            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">Menú</h3>
            <ul class="mt-4">
                <li class="mb-2"><a href="/home_admin" class="text-blue-500 hover:text-blue-700 dark:text-blue-300">Home</a></li>
                <li class="mb-2"><a href="/users" class="text-blue-500 hover:text-blue-700 dark:text-blue-300">Users</a></li>
                <li class="mb-2"><a href="/crews" class="text-blue-500 hover:text-blue-700 dark:text-blue-300">Crews</a></li>
                <li class="mb-2"><a href="/platforms" class="text-blue-500 hover:text-blue-700 dark:text-blue-300">Platforms</a></li>
                <li class="mb-2"><a href="/draws" class="text-blue-500 hover:text-blue-700 dark:text-blue-300">Draws</a></li>
                <li class="mb-2"><a href="/payments" class="text-blue-500 hover:text-blue-700 dark:text-blue-300">Payments</a></li>
            </ul>
        </aside>

         {{-- Contenido Principal --}}
         <div class="flex-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Formulario de Búsqueda --}}
            <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow-md mb-6">
                <form action="/search-user" method="get" class="flex items-center">
                    <input 
                        type="search" 
                        name="query" 
                        placeholder="Buscar usuario..." 
                        required 
                        class="flex-grow px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                    <button style="background-color: blue; color: white; margin-left: 2px; border-radius: 8px; padding: 10px;">
                        Buscar
                    </button>
                    
                </form>
            </div>

            {{-- Lista de Usuarios --}}
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                    Lista de usuarios
                </h2>
                <ul class="space-y-2">
                    @foreach ($users as $user)
                        <li class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-sm flex justify-between items-center">
                            <span class="text-gray-800 dark:text-gray-200">{{ $user->name }}</span>
                            <a href="/users/{{ $user->id }}/edit" class="text-blue-500 hover:text-blue-700 dark:text-blue-300 hover:underline">Editar</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard User') }}
        </h2>
    </x-slot>

    <div class="flex py-12">
        {{-- Menú Lateral --}}
        <aside class="w-1/4 bg-gray-100 dark:bg-gray-800 p-4">
            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">Menú</h3>
            <ul class="mt-4">
                <li class="mb-2"><a href="/dashboard" class="text-blue-500 hover:text-blue-700 dark:text-blue-300">Home</a></li>
                <li class="mb-2"><a href="/crewsList" class="text-blue-500 hover:text-blue-700 dark:text-blue-300">Crews</a></li>
                <li class="mb-2"><a href="/drawsList" class="text-blue-500 hover:text-blue-700 dark:text-blue-300">Draws</a></li>
                <li class="mb-2"><a href="/userJoinRequests" class="text-blue-500 hover:text-blue-700 dark:text-blue-300">Mis Solicitudes</a></li>
            </ul>
        </aside>

        {{-- Contenido Principal --}}
        <div class="flex-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </div>
</x-app-layout>

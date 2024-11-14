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
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                
                {{-- Bienvenida personalizada --}}
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mt-4">¡Bienvenido, {{ Auth::user()->name }}!</p>
                </div>
                
                {{-- Tabla o resumen de actividades --}}
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-bold mb-4">Resumen de Actividades</h3>
                        <table class="w-full text-left table-auto border-collapse">
                            <thead>
                                <tr>
                                    <th class="border-b dark:border-gray-700 p-2">Actividad</th>
                                    <th class="border-b dark:border-gray-700 p-2">Fecha</th>
                                    <th class="border-b dark:border-gray-700 p-2">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border-b dark:border-gray-700 p-2">Registro en la App</td>
                                    <td class="border-b dark:border-gray-700 p-2">13 Nov 2024</td>
                                    <td class="border-b dark:border-gray-700 p-2">Completado</td>
                                </tr>
                                <tr>
                                    <td class="border-b dark:border-gray-700 p-2">Primera Transacción</td>
                                    <td class="border-b dark:border-gray-700 p-2">14 Nov 2024</td>
                                    <td class="border-b dark:border-gray-700 p-2">Pendiente</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
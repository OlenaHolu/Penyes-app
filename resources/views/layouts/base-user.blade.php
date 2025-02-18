<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard User') }}
        </h2>
    </x-slot>

    <div class="flex py-12">
        {{-- Menú Lateral --}}
        <aside class="w-1/4 bg-white dark:bg-gray-200 text-gray-800 p-6 rounded-lg shadow-lg">
            <ul class="space-y-4">
                <li>
                    <a href="/" 
                       class="block px-4 py-2 rounded-lg text-lg font-medium transition duration-300 
                       {{ request()->is('') ? 'bg-blue-500 text-white' : 'text-blue-500 hover:bg-blue-100 hover:text-blue-700' }}">
                       Inicio
                    </a>
                </li>
                <li>
                    <a href="/crewsList" 
                       class="block px-4 py-2 rounded-lg text-lg font-medium transition duration-300 
                       {{ request()->is('crewsList') ? 'bg-blue-500 text-white' : 'text-blue-500 hover:bg-blue-100 hover:text-blue-700' }}">
                        Peñas
                    </a>
                </li>
                <li>
                    <a href="/draw-user-view" 
                       class="block px-4 py-2 rounded-lg text-lg font-medium transition duration-300 
                       {{ request()->is('drawsList') ? 'bg-blue-500 text-white' : 'text-blue-500 hover:bg-blue-100 hover:text-blue-700' }}">
                       Sorteos
                    </a>
                </li>
                <li>
                    <a href="/payments" 
                       class="block px-4 py-2 rounded-lg text-lg font-medium transition duration-300 
                       {{ request()->is('payments') ? 'bg-blue-500 text-white' : 'text-blue-500 hover:bg-blue-100 hover:text-blue-700' }}">
                        Pagos
                    </a>
                </li>
                <li>
                    <a href="/userJoinRequests" 
                       class="block px-4 py-2 rounded-lg text-lg font-medium transition duration-300 
                       {{ request()->is('userJoinRequests') ? 'bg-blue-500 text-white' : 'text-blue-500 hover:bg-blue-100 hover:text-blue-700' }}">
                        Mis Solicitudes
                    </a>
                </li>
            </ul>
        </aside>

        {{-- Contenido Principal --}}
        <div class="flex-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </div>
</x-app-layout>

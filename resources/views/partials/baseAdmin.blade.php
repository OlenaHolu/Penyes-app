<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard ADMIN') }}
        </h2>
    </x-slot>

    <div class="flex py-12">
        {{-- Menú Lateral --}}
        <aside class="w-1/4 bg-white dark:bg-gray-200 text-gray-800 p-6 rounded-lg shadow-lg">
            <h3 class="font-semibold text-lg text-gray-800 mb-4">Menú</h3>
            <ul class="space-y-4">
                <li>
                    <a href="/" 
                       class="block px-4 py-2 rounded-lg text-lg font-medium transition duration-300 
                       {{ request()->is('') ? 'bg-blue-500 text-white' : 'text-blue-500 hover:bg-blue-100 hover:text-blue-700' }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="/users" 
                       class="block px-4 py-2 rounded-lg text-lg font-medium transition duration-300 
                       {{ request()->is('users') ? 'bg-blue-500 text-white' : 'text-blue-500 hover:bg-blue-100 hover:text-blue-700' }}">
                        Users
                    </a>
                </li>
                <li>
                    <a href="/crews" 
                       class="block px-4 py-2 rounded-lg text-lg font-medium transition duration-300 
                       {{ request()->is('crews') ? 'bg-blue-500 text-white' : 'text-blue-500 hover:bg-blue-100 hover:text-blue-700' }}">
                        Crews
                    </a>
                </li>
                <li>
                    <a href="/platforms" 
                       class="block px-4 py-2 rounded-lg text-lg font-medium transition duration-300 
                       {{ request()->is('platforms') ? 'bg-blue-500 text-white' : 'text-blue-500 hover:bg-blue-100 hover:text-blue-700' }}">
                        Platforms
                    </a>
                </li>
                <li>
                    <a href="/draws" 
                       class="block px-4 py-2 rounded-lg text-lg font-medium transition duration-300 
                       {{ request()->is('draws') ? 'bg-blue-500 text-white' : 'text-blue-500 hover:bg-blue-100 hover:text-blue-700' }}">
                        Draws
                    </a>
                </li>
                <li>
                    <a href="/payments" 
                       class="block px-4 py-2 rounded-lg text-lg font-medium transition duration-300 
                       {{ request()->is('payments') ? 'bg-blue-500 text-white' : 'text-blue-500 hover:bg-blue-100 hover:text-blue-700' }}">
                        Payments
                    </a>
                </li>
                <li>
                    <a href="/adminJoinRequests" 
                       class="block px-4 py-2 rounded-lg text-lg font-medium transition duration-300 
                       {{ request()->is('adminJoinRequests') ? 'bg-blue-500 text-white' : 'text-blue-500 hover:bg-blue-100 hover:text-blue-700' }}">
                        Join Requests
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

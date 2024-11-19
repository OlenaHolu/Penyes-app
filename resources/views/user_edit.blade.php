
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
                    <div>
                        {{-- Formulario para actualizar al usuario --}}
                        <form action="{{ url('/users/' . $user->id) }}" method="POST" class="mb-4">
                            @csrf
                            @method('PUT')
                    
                            <div>
                                <label for="name">Nombre:</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            </div></br>
                    
                            <div>
                                <label for="email">Correo Electrónico:</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            </div></br>
                    
                            <div>
                                <button type="submit" style="background-color: green; color: white; padding: 10px; border: none; cursor: pointer; border-radius: 5px;">Actualizar Usuario</button>
                            </div>
                        </form>
                    
                        {{-- Formulario para eliminar al usuario --}}
                        <form action="{{ url('/users/' . $user->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este usuario?');">
                            @csrf
                            @method('DELETE')
                    
                            <button type="submit" style="background-color: red; color: white; padding: 10px; border: none; cursor: pointer; border-radius: 5px;">
                                Eliminar Usuario
                            </button>
                        </form>
                    
                        {{-- Enlace para regresar a la lista de usuarios --}}
                        <a href="{{ url('/users') }}" style="display: block; margin-top: 20px; text-decoration: underline;">Regresar a la lista de usuarios</a>
                    </div>
                    
                
                

            </div>
        </div>
    </div>
</x-app-layout>



@extends('partials.baseAdmin')
@section('content')
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <div>
                {{-- Formulario para actualizar al usuario --}}
                <form action="{{ url('/users/' . $user->id) }}" method="POST" class="mb-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre:</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200">
                    </div></br>

                    <!-- Surname -->
                    <div>
                        <label for="surname"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Apellido:</label>
                        <input type="text" id="surname" name="surname" value="{{ old('surname', $user->surname) }}"
                            required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200">
                    </div></br>

                    <!-- Born Day -->
                    <div>
                        <label for="bornDay" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha de
                            Nacimiento:</label>
                        <input type="date" id="bornDay" name="bornDay"
                            value="{{ old('bornDay', $user->bornDay ? $user->bornDay->format('Y-m-d') : '') }}" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200">
                    </div></br>


                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Correo
                            Electrónico:</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                            required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200">
                    </div></br>

                    <div>
                        <button type="submit"
                            style="background-color: green; color: white; padding: 10px; border: none; cursor: pointer; border-radius: 5px;">Actualizar
                            Usuario</button>
                    </div>
                </form>

                {{-- Formulario para eliminar al usuario --}}
                <form action="{{ url('/users/' . $user->id) }}" method="POST"
                    onsubmit="return confirm('¿Estás seguro de que quieres eliminar este usuario?');">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        style="background-color: red; color: white; padding: 10px; border: none; cursor: pointer; border-radius: 5px;">
                        Eliminar Usuario
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

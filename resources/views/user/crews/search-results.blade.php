@extends('layouts.base-user')

@section('content')
    <div class="max-w-7xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Resultados de Búsqueda</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg">
                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-gray-300 uppercase tracking-wider">
                            Name</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-gray-300 uppercase tracking-wider">
                            Year</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-gray-300 uppercase tracking-wider">
                            Slogan</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-gray-300 uppercase tracking-wider">
                            Color</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($searchResults as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                <a href="/crews/{{ $item->id }}">
                                    {{ $item->name }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                {{ $item->year }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                {{ $item->slogan }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                {{ $item->color }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                No se encontraron usuarios que coincidan con la búsqueda.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{-- Enlace para volver a la página anterior --}}
        <a href="javascript:history.back()" 
            class="block text-blue-500 hover:underline text-sm font-medium">
            Volver a la página anterior
        </a>
    </div>
@endsection

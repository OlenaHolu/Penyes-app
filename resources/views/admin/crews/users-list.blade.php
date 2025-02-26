@extends('layouts.base-admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-4">Usuarios en {{ $crew->name }}</h1>

    @if ($users->isEmpty())
        <p class="text-gray-600">No hay usuarios aprobados en esta Crew.</p>
    @else
        <div class="space-y-4">
            @foreach ($users as $userCrew)
                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-sm flex justify-between items-center hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                    <div class="flex flex-col w-1/3 text-left">
                        <span class="text-gray-800 dark:text-gray-200 font-medium">
                            {{ $userCrew->user->name }} {{ $userCrew->user->surname }}
                        </span>
                    </div>
                    <div class="flex flex-col w-1/3 text-left">
                        <span class="text-gray-600 dark:text-gray-400 text-sm">{{ $userCrew->user->email }}</span>
                    </div>
                    <a mhref="/users/{{ $userCrew->user->id }}/edit"
                        class="text-blue-500 hover:text-blue-700 dark:text-blue-300 dark:hover:text-blue-500 hover:underline">
                        Editar
                    </a>
                </div>
            @endforeach
        </div>
    @endif

    {{-- Enlace para volver a la página anterior --}}
    <a href="javascript:history.back()" class="block text-blue-500 hover:underline text-sm font-medium">
        Volver a la página anterior
    </a>
</div>
@endsection

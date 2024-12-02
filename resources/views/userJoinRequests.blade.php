@extends('partials.baseUser')

@section('content')
    <div class="flex-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h3 class="text-xl font-bold mb-4">Tus Solicitudes de Unirse a Crews</h3>

                {{-- Si el usuario no tiene solicitudes --}}
                @if ($joinRequests->isEmpty())
                    <p class="text-gray-600 dark:text-gray-400">No tienes solicitudes pendientes.</p>
                @else
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="px-4 py-2 text-left">Crew</th>
                                <th class="px-4 py-2 text-left">Estado</th>
                                <th class="px-4 py-2 text-left">Fecha de Solicitud</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($joinRequests as $request)
                                <tr
                                    class="border-t border-gray-300 dark:border-gray-600
                                        @if ($request->status == 'pending') bg-yellow-200
                                        @elseif ($request->status == 'approved') bg-green-200
                                        @elseif ($request->status == 'rejected') bg-red-200 @endif">
                                    <td class="px-4 py-2">{{ $request->crew->name }}</td>
                                    <td class="px-4 py-2">{{ ucfirst($request->status) }}</td>
                                    <td class="px-4 py-2">{{ $request->created_at->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                {{-- Enlace para regresar a HOME --}}
                <a href="{{ url('/dashboard') }}"
                    class="mt-4 text-blue-500 hover:text-blue-700 dark:text-blue-300 dark:hover:text-blue-500 underline font-semibold">
                    Volver al Home
                </a>
            </div>

        </div>
    </div>
@endsection

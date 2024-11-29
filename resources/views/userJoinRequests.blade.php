@extends('partials.baseAdmin')
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
                                <tr class="border-t border-gray-300 dark:border-gray-600">
                                    <td class="px-4 py-2">{{ $request->crew->name }}</td>
                                    <td class="px-4 py-2">{{ ucfirst($request->status) }}</td>
                                    <td class="px-4 py-2">{{ $request->created_at->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection

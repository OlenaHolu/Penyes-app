@extends('partials.baseAdmin')

@section('content')
    <div class="container">
        <!-- Menú de selección de año -->
        <div class="year-selection mb-4">
            <label for="year-select">Seleccione el Año:</label>
            <select id="year-select" name="year" class="form-select">
                <option value="2024" {{ $year == 2024 ? 'selected' : '' }}>2024</option>
                <option value="2023" {{ $year == 2023 ? 'selected' : '' }}>2023</option>
                <option value="2022" {{ $year == 2022 ? 'selected' : '' }}>2022</option>
                <!-- Agregar más años según sea necesario -->
            </select>
        </div>

        <!-- Mostrar el mensaje de error si no hay peñas disponibles -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Botón para realizar el sorteo -->
        @if ($showDrawButton)
            <div class="text-center">
                <form action="{{ route('draw.draw') }}" method="POST">
                    @csrf
                    <input type="hidden" name="year" value="{{ $year }}">
                    <button type="submit" id="start-draw" class="btn btn-primary mb-4">Realizar Sorteo</button>
                </form>
            </div>
        @endif

        <!-- Visualización de los resultados del sorteo -->
        @if ($resultados)
            <div class="results mt-4">
                <h3>Resultados del Sorteo</h3>
                <ul>
                    @foreach ($resultados as $location => $crew)
                        <li>{{ "Location $location: $crew" }}</li>
                    @endforeach
                </ul>

                <!-- Botón para eliminar el sorteo -->
                <form action="{{ route('draw.delete', ['year' => $year]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-4">Eliminar Sorteo</button>
                </form>
            </div>
        @else
            <p>No hay resultados disponibles para el año seleccionado.</p>
        @endif
    </div>
@endsection

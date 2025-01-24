@extends('partials.baseAdmin')

@section('content')
    <div class="container">
        <!-- Menú de selección de año -->
        <div class="year-selection mb-4">
            <label for="year-select">Seleccione el Año:</label>
            <select id="year-select" name="year" class="form-select" onchange="window.location.href = this.value;">
                <option value="{{ route('draw.show', ['year' => 2024]) }}" {{ $year == 2024 ? 'selected' : '' }}>2024</option>
                <option value="{{ route('draw.show', ['year' => 2023]) }}" {{ $year == 2023 ? 'selected' : '' }}>2023</option>
                <option value="{{ route('draw.show', ['year' => 2022]) }}" {{ $year == 2022 ? 'selected' : '' }}>2022</option>
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


        <!-- Visualización de la Plaza con los Cadafals -->
        <div class="draw-area">
            <div class="cadafals-container">
                <!-- Los cadafals se colocan en el perímetro de la plaza -->
                @foreach ($locations as $location)
                    <div class="cadafal" style="top: {{ $location->y * 10 }}%; left: {{ $location->x * 10 }}%;">
                        <!-- Mostrar nombre de la peña o 'No Crew' si no tiene asignada peña -->
                        @if($location->crew_id)
                            {{ $location->crew ? $location->crew->name : 'No Crew' }}
                        @else
                            No Crew
                        @endif
                    </div>
                @endforeach
            </div>
        </div>


        <!-- Botón para eliminar el sorteo -->
        <form action="{{ route('draw.delete', ['year' => $year]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-4">Eliminar Sorteo</button>
        </form>
    </div>
</div>


    </div>

    <style>
        /* Estilos para la plaza de toros (área donde se encuentran los cadafals) */
        .draw-area {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 400px;
            position: relative;
            border: 2px solid #000;  /* Borde de la plaza */
            margin-bottom: 20px;
        }

        /* Estilos para cada cadafal (representación de las peñas) */
        .cadafal {
            width: 60px;
            height: 60px;
            background-color: #d8e2e7;  /* Color por defecto */
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            position: absolute;  /* Colocación en base a coordenadas */
        }

        /* Asegurarse de que los resultados se vean correctamente */
        .results ul {
            list-style-type: none;
        }

        .results li {
            margin: 5px 0;
        }
    </style>
@endsection

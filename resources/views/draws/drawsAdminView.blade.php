@extends('partials.baseAdmin')

@section('content')
    <div class="container">
        <!-- Year selection menu -->
        <div class="year-selection mb-4">
            <label for="year-select">Seleccione el Año:</label>
            <select id="year-select" name="year" class="form-select" onchange="window.location.href = this.value;">
                @foreach ($rangeYears as $itemYear)
                    <option value="{{ route('draw.show', ['year' => $itemYear]) }}"
                        {{ $year == $itemYear ? 'selected' : '' }}>{{ $itemYear }}</option>
                @endforeach
            </select>
        </div>

        <!-- Display error message if no crews are available -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Button to start the draw -->
        @if ($showDrawButton)
            <div class="text-center">
                <form action="{{ route('draw.draw') }}" method="POST">
                    @csrf
                    <input type="hidden" name="year" value="{{ $year }}">
                    <button type="submit" id="start-draw" class="btn btn-primary mb-4">Realizar Sorteo</button>
                </form>
            </div>
        @endif

        <!-- Plaza visualization with Cadafals as a 5x9 table -->
        <div class="draw-area">
            <table class="map-table">
                @for ($row = 0; $row < 5; $row++)
                    <tr>
                        @for ($col = 0; $col < 9; $col++)
                            <td>
                                @foreach ($locations as $location)
                                    @if ($location->y == $row && $location->x == $col)
                                        {{ $location->crew->name }}
                                    @endif
                                @endforeach
                            </td>
                        @endfor
                    </tr>
                @endfor
            </table>
        </div>


        <!-- Draw results -->
        <div class="results mt-4">
            <ul>
                @foreach ($locations as $location)
                    <li>{{ "Location ($location->x, $location->y): " . ($location->crew ? $location->crew->name : 'No Crew') }}
                    </li>
                @endforeach
            </ul>


            <!-- Button to delete the draw -->
            @if ($showDeleteDrawButton)
                <form action="{{ route('draw.delete', ['year' => $year]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-4">Eliminar Sorteo</button>
                </form>
            @endif

        </div>

        <style>
            .map-table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            .map-table td {
                border: 1px solid #000;
                width: 60px;
                height: 60px;
                text-align: center;
                vertical-align: middle;
                font-weight: bold;
            }

            .map-table th {
                background-color: #f2f2f2;
            }

            .map-table td {
                background-color: #d8e2e7;
            }
        </style>
    @endsection

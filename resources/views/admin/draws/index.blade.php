@extends('layouts.base-admin')

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
            <div class="text-center mb-4">
                <form action="{{ route('draw.draw') }}" method="POST">
                    @csrf
                    <input type="hidden" name="year" value="{{ $year }}">
                    <button type="submit" id="start-draw"
                        class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400">
                        Realizar Sorteo
                    </button>
                </form>
            </div>
        @endif

        <!-- Button to delete the draw -->
        @if ($showDeleteDrawButton)
            <div class="text-center mb-4">
                <form action="{{ route('draw.delete', ['year' => $year]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-block bg-red-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-400">
                        Eliminar Sorteo
                    </button>
                </form>
            </div>
        @endif

        <!-- Plaza visualization with Cadafals -->
        <div class="draw-area">
            <table class="map-table mx-auto">
                @for ($row = 0; $row < 5; $row++)
                    <tr>
                        @for ($col = 0; $col < 9; $col++)
                            @php
                                $crew = null;
                                foreach ($locations as $location) {
                                    if ($location->y == $row && $location->x == $col) {
                                        $crew = $location->crew;
                                        break;
                                    }
                                }
                                $isPerimeter = $row === 0 || $row === 4 || $col === 0 || $col === 8;
                            @endphp

                            <td class="{{ $isPerimeter ? 'plaza-cell' : 'inner-cell' }}">
                                @if ($crew)
                                    <a href="/crews/{{ $crew->id }}/edit" class="hover:underline text-lg font-semibold">
                                        {{ $crew->name }}
                                    </a>
                                @endif
                            </td>
                        @endfor
                    </tr>
                @endfor
            </table>
        </div>



        <!-- Draw results -->
        <div class="results mt-4">
            <h3>Resultados del Sorteo:</h3>
            <ul>
                @foreach ($locations as $location)
                    <li>{{ "Ubicación ($location->x, $location->y): " . ($location->crew ? $location->crew->name : 'Sin Peña') }}
                    </li>
                @endforeach
            </ul>
        </div>

        <style>
            .map-table {
                width: 100%;
                max-width: 700px;
                border-collapse: collapse;
                margin-top: 20px;
            }

            .map-table td {
                width: 70px;
                height: 70px;
                text-align: center;
                vertical-align: middle;
            }

            .plaza-cell {
                border: 1px solid #000;
                background-color: #d8e2e7;
                /* o el color que quieras */
                font-weight: bold;
                font-size: 14px;
                transition: background-color 0.3s ease-in-out;
                border-radius: 4px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .plaza-cell:hover {
                background-color: #bbdefb;
            }

            .inner-cell {
                border: none;
                background: transparent;
            }

            .results ul {
                list-style-type: none;
                padding: 0;
            }

            .results li {
                background-color: #f8f9fa;
                border: 1px solid #ddd;
                margin: 5px 0;
                padding: 10px;
                border-radius: 5px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            }
        </style>
    @endsection

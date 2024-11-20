@extends('partials.baseAdmin')
@section('content')
<h1>Resultados de Búsqueda</h1>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>
    @forelse ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            
        </tr>
    @empty
        <tr>
            <td colspan="5">No se encontraron usuarios que coincidan con la búsqueda.</td>
        </tr>
    @endforelse
</table>
@endsection
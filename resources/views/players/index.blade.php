@extends('layouts.app')

@section('title', 'Jugadores de La Liga')

@section('content')
    <h2>Jugadores de La Liga</h2>
    <a class="btn" href="{{ route('players.create') }}">Nuevo jugador</a>

    <form method="GET" action="{{ route('players.index') }}" style="margin-top: 16px;">
        <label for="team_id">Filtrar por equipo:</label>
        <select name="team_id" id="team_id" onchange="this.form.submit()">
            <option value="">Todos los equipos</option>
            @foreach($teams as $team)
                <option value="{{ $team->id }}" @selected((string) $selectedTeamId === (string) $team->id)>{{ $team->name }}</option>
            @endforeach
        </select>
    </form>

    <table>
        <tr>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Equipo</th>
            <th>Posición</th>
            <th>Nacionalidad</th>
            <th>Acciones</th>
        </tr>
        @foreach($players as $player)
            <tr>
                <td><img src="{{ $player->photo }}" width="50"></td>
                <td>{{ $player->name }}</td>
                <td>{{ $player->team->name }}</td>
                <td>{{ $player->position }}</td>
                <td>{{ $player->nationality }}</td>
                <td>
                    <a class="btn secondary" href="{{ route('players.edit', $player) }}">Editar</a>
                    <form class="inline" action="{{ route('players.destroy', $player) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

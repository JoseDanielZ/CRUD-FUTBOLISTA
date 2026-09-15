@extends('layouts.app')

@section('title', 'Editar jugador')

@section('content')
    <h2>Editar jugador</h2>
    <form class="card" action="{{ route('players.update', $player) }}" method="POST">
        @csrf
        @method('PUT')
        <input name="name" placeholder="Nombre" value="{{ $player->name }}" required>
        <select name="team_id" required>
            @foreach($teams as $team)
                <option value="{{ $team->id }}" @selected($team->id === $player->team_id)>{{ $team->name }}</option>
            @endforeach
        </select>
        <input name="position" placeholder="Posición" value="{{ $player->position }}">
        <input name="nationality" placeholder="Nacionalidad" value="{{ $player->nationality }}">
        <input name="photo" placeholder="URL de foto" value="{{ $player->photo }}">
        <button type="submit">Guardar</button>
    </form>
@endsection

@extends('layouts.app')

@section('title', 'Nuevo jugador')

@section('content')
    <h2>Nuevo jugador</h2>
    <form class="card" action="{{ route('players.store') }}" method="POST">
        @csrf
        <input name="name" placeholder="Nombre" required>
        <select name="team_id" required>
            @foreach($teams as $team)
                <option value="{{ $team->id }}">{{ $team->name }}</option>
            @endforeach
        </select>
        <input name="position" placeholder="Posición">
        <input name="nationality" placeholder="Nacionalidad">
        <input name="photo" placeholder="URL de foto">
        <button type="submit">Guardar</button>
    </form>
@endsection

<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlayerController extends Controller
{
    public function index(Request $request)
    {
        $teams = Team::all();
        $selectedTeamId = $request->query('team_id');

        $players = Player::with('team')
            ->when($selectedTeamId, fn ($query) => $query->where('team_id', $selectedTeamId))
            ->get();

        return view('players.index', compact('players', 'teams', 'selectedTeamId'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('players.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'position' => 'nullable',
            'nationality' => 'nullable',
            'photo' => 'nullable',
            'team_id' => 'required|exists:teams,id',
        ]);
        $data['external_id'] = 'manual-' . Str::uuid();

        Player::create($data);
        return redirect()->route('players.index');
    }

    public function edit(Player $player)
    {
        $teams = Team::all();
        return view('players.edit', compact('player', 'teams'));
    }

    public function update(Request $request, Player $player)
    {
        $player->update($request->validate([
            'name' => 'required',
            'position' => 'nullable',
            'nationality' => 'nullable',
            'photo' => 'nullable',
            'team_id' => 'required|exists:teams,id',
        ]));
        return redirect()->route('players.index');
    }

    public function destroy(Player $player)
    {
        $player->delete();
        return redirect()->route('players.index');
    }
}

<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SportsDbService
{
    protected string $base = 'https://www.thesportsdb.com/api/v1/json/3';

    public function teamsByLeague(string $league): array
    {
        $res = Http::get("{$this->base}/search_all_teams.php", ['l' => $league]);
        return $res->json('teams') ?? [];
    }

    public function playersByTeam(string $teamId): array
    {
        $res = Http::get("{$this->base}/lookup_all_players.php", ['id' => $teamId]);
        return $res->json('player') ?? [];
    }
}

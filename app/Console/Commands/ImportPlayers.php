<?php

namespace App\Console\Commands;

use App\Models\Player;
use App\Models\Team;
use App\Services\SportsDbService;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('import:players {league=Spanish La Liga}')]
#[Description('Importa equipos y jugadores desde TheSportsDB')]
class ImportPlayers extends Command
{
    public function handle(SportsDbService $api)
    {
        $teams = $api->teamsByLeague($this->argument('league'));

        foreach ($teams as $t) {
            $team = Team::updateOrCreate(
                ['external_id' => $t['idTeam']],
                [
                    'name' => $t['strTeam'],
                    'badge' => $t['strTeamBadge'],
                    'description' => $t['strDescriptionES'] ?? $t['strDescriptionEN'],
                ]
            );

            $players = $api->playersByTeam($t['idTeam']);

            foreach ($players as $p) {
                Player::updateOrCreate(
                    ['external_id' => $p['idPlayer']],
                    [
                        'team_id' => $team->id,
                        'name' => $p['strPlayer'],
                        'position' => $p['strPosition'],
                        'nationality' => $p['strNationality'],
                        'photo' => $p['strCutout'] ?? $p['strThumb'],
                    ]
                );
            }
        }

        $this->info('Importados ' . count($teams) . ' equipos de La Liga.');
    }
}

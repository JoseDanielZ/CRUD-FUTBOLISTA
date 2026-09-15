<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['external_id', 'team_id', 'name', 'position', 'nationality', 'photo'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}

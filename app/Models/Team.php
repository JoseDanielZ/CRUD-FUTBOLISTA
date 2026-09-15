<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['external_id', 'name', 'badge', 'description'];

    public function players()
    {
        return $this->hasMany(Player::class);
    }
}

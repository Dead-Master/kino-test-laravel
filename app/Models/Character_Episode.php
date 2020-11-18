<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Episodes_Characters
 * @property int episode_id
 * @property int character_id
 */

class Character_Episode extends Model
{
    public $timestamps = false;
    protected $table = 'character_episode';
    protected $fillable = ['episode_id', 'character_id'];
}

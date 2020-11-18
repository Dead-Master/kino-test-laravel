<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Quote
 * @property int id
 * @property string quote
 * @property int episode_id
 * @property int character_id
 */

class Quote extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['quote', 'episode_id', 'character_id'];

    public function episodes(): HasOne
    {
        return $this->hasOne(Episode::class);
    }

    public function characters(): HasOne
    {
        return $this->hasOne(Character::class);
    }
}

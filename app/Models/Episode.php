<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Episode
 * @property int id
 * @property string title
 */

class Episode extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];

    public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class);
    }

    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(Character::class);
    }
}

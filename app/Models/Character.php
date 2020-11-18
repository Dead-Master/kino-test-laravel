<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Character
 * @property int id
 * @property string name
 * @property Carbon birthday
 * @property array occupations
 * @property string img
 * @property string nickname
 * @property string portrayed
 */

class Character extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name', 'birthday', 'occupations', 'img', 'nickname', 'portrayed'];

    protected $attributes = [
        'occupations' => '{}',
    ];

    protected $casts = [
        'occupations' => 'array'
    ];

    public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class);
    }

    public function episodes(): BelongsToMany
    {
        return $this->belongsToMany(Episode::class);
    }

}

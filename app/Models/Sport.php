<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sport extends Model
{
    use Sluggable;

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    /**
     * @return HasMany<Game>
     */
    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }

    /**
     * @return HasMany<Game>
     */
    public function activeGames(): HasMany
    {
        return $this->games()->active()->withTeams();
    }

    /**
     * @return HasMany<Team>
     */
    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }
}

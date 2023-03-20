<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeActive(Builder $builder)
    {
        $builder->where('is_active', '=', true);
    }

    public function scopeWithTeams(Builder $builder)
    {
        $builder->with('teams');
    }

    public function scopeFinished(Builder $builder)
    {
        $builder->where('is_finished', '=', true);
    }

    /**
     * @return BelongsToMany<Team>
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class)->withPivot(['score', 'is_winner'])->withTimestamps()->using(GameTeam::class);
    }

    /**
     * @return BelongsTo<Sport, self>
     */
    public function sport(): BelongsTo
    {
        return $this->belongsTo(Sport::class);
    }
}

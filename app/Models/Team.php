<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * @return BelongsTo<Sport, self>
     */
    public function sport(): BelongsTo
    {
        return $this->belongsTo(Sport::class);
    }

    /**
     * @return BelongsToMany<Game>
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Game::class)->withPivot(['score', 'is_winner'])->withTimestamps()->using(GameTeam::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GameTeam extends Pivot
{
    protected $guarded = ['id'];
}

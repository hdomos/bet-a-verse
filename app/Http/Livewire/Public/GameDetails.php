<?php

namespace App\Http\Livewire\Public;

use App\Models\Game;
use Livewire\Component;

class GameDetails extends Component
{
    public Game $game;

    public function mount()
    {
        $this->game->loadMissing('sport');
    }

    public function render()
    {
        return view('livewire.public.game-details');
    }
}

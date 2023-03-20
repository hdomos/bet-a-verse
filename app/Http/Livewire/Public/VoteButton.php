<?php

namespace App\Http\Livewire\Public;

use App\Models\Game;
use App\Models\Team;
use App\Models\Vote;
use Livewire\Component;

class VoteButton extends Component
{
    public Game $game;

    public Team $team;

    public bool $votingOpen = false;

    public bool $voted = false;

    public bool $votedForTeam = false;

    public string $name = '';

    public string $email = '';

    protected function rules(): array
    {
        $rules = [];

        if (auth()->guest()) {
            $rules['name'] = 'required|string|max:255';
            $rules['email'] = 'required|email';
        } else {
            $rules['name'] = '';
            $rules['email'] = '';
        }

        return $rules;
    }

    public function mount()
    {
        $this->name = session()->get('user.name', '');
        $this->email = session()->get('user.email', '');
        $this->voted = session()->has('game.'.$this->game->id.'.vote');
        $this->votedForTeam = session()->get('game.'.$this->game->id.'.vote') == $this->team->id;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveVote()
    {
        $validatedData = $this->validate();

        $vote = new Vote([
            'game_id' => $this->game->id,
            'team_id' => $this->team->id,
        ]);

        if (auth()->guest()) {
            $vote->fill($validatedData);

            session()->put('user.name', $this->name);
            session()->put('user.email', $this->email);
        } else {
            $vote->user_id = auth()->id();
        }

        $this->votedForTeam = $this->team->id;
        session()->put('game.'.$this->game->id.'.vote', $this->team->id);

        $vote->save();

        return redirect()->to('/game/'.$this->game->id);
    }

    public function render()
    {
        return view('livewire.public.vote-button');
    }
}

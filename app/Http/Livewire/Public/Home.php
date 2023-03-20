<?php

namespace App\Http\Livewire\Public;

use App\Models\Sport;
use Livewire\Component;

class Home extends Component
{
    public string $search = '';

    public ?Sport $sport = null;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function render()
    {
        return view('livewire.public.home', [
            'sports' => Sport::select('id', 'slug', 'name', 'icon')
            ->orderBy('name')
            ->when($this->sport !== null, fn ($builder) => $builder
                ->where('sports.slug', '=', $this->sport->slug)
            )
            ->when($this->search !== '', fn ($builder) => $builder
                ->where(fn ($builder) => $builder
                    ->orWhereHas('activeGames.teams', fn ($builder) => $builder
                        ->where('teams.name', 'LIKE', '%'.$this->search.'%')
                    )->orWhereHas('activeGames', fn ($builder) => $builder
                        ->where('games.name', 'LIKE', '%'.$this->search.'%')
                    )
                )
            )
            ->with(['activeGames' => fn ($builder) => $builder
                ->when($this->search !== '', fn ($builder) => $builder
                    ->where(fn ($builder) => $builder
                        ->orWhereHas('teams', fn ($builder) => $builder
                            ->where('teams.name', 'LIKE', '%'.$this->search.'%')
                        )
                        ->orWhere('games.name', 'LIKE', '%'.$this->search.'%')
                    )
                ),
            ])
            ->get(),
        ]);
    }
}

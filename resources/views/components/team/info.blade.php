@props([
    'team',
    'expanded' => false,
    'positionRight' => false,
    'game'
])

<div {{ $attributes->class([
    'pr-3' => ! $positionRight,
    'pl-3' => $positionRight,
]) }}>
    <div @class([
        'p-2',
        'align-middle',
        'text-right' => $positionRight
    ])>
        {{-- <div class="h-40 block overflow-hidden rounded-lg w-1/1 bg-center bg-no-repeat bg-[url('/storage/teams/{{ $team->logo_url }}')]"></div> --}}

        <span @class([
            "text-slate-800 dark:text-gray-50",
            "text-2xl" => $expanded
        ])>{{ $team->name }}</span>
    </div>


    <div @class([
        'p-2',
        'align-middle',
        'text-right' => $positionRight
    ])>
        @if ($team->score != null)
            <div>
                {{ $team->score }}
            </div>
        @endif

        @if ($game->is_active && $expanded)
            <livewire:public.vote-button :game="$game" :team="$team" />
        @endif
    </div>
</div>

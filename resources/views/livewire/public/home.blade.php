<div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <h1 class="text-4xl font-bold leading-7 text-slate-900 dark:text-white">@lang('Welcome to bet-a-verse!')</h1>

    <div class="py-6">
        <x-input class="w-1/2 px-6 py-4 text-xl form-input" type="search" wire:model="search" placeholder="{{ __('Search for teams, games...') }}" />
    </div>
    @foreach ($sports as $sport)
    <section>
        <x-sport.card :$sport class="my-4" />

        <div>
            {{-- <h3>@lang('Current games')</h3> --}}

            <div class="grid grid-cols-3">
                @foreach ($sport->activeGames as $game)
                    <a href="/game/{{ $game->id }}"  @class([
                        'group relative flex flex-col flex-initial justify-items-between items-strech h-40 m-3 transition-all border-2 rounded-md', 'hover:ring-4',
                        'border-orange-800 dark:border-orange-300 hover:ring-orange-800 hover:dark:ring-orange-300' => $sport->slug == 'basketball',
                        'border-sky-800 dark:border-sky-300 hover:ring-sky-800 hover:dark:ring-sky-300' => $sport->slug == 'football',
                        'border-blue-800 dark:border-blue-300 hover:ring-blue-800 hover:dark:ring-blue-300' => $sport->slug == 'handball',
                        'border-teal-800 dark:border-teal-300 hover:ring-teal-800 hover:dark:ring-teal-300' => $sport->slug == 'volleyball',
                    ])>
                        <div class="relative flex content-between justify-center flex-grow">
                            <x-team.info class="w-1/2" :team="$game->teams[0]" :$game />
                            <x-sport.colored-line :slug="$sport->slug" />
                            <x-team.info class="w-1/2" :team="$game->teams[1]" :position-right="true" :$game />
                        </div>
                        <div class="flex-grow text-lg font-semibold text-center align-middle justify-items-center text-slate-800 dark:text-gray-50">
                            {{ $game->name }}
                        </div>
                        <div class="absolute inset-0 hidden bg-white bg-opacity-75 pointer-events-none dark:bg-opacity-25 group-hover:block">
                        </div>
                        <p class="absolute hidden text-xl text-teal-900 -translate-x-1/2 -translate-y-1/2 opacity-100 top-1/2 left-1/2 dark:text-white group-hover:block">
                            @lang('Show game details')
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endforeach
</div>

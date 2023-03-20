<div class="px-4 py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="content-center justify-between py-4 md:flex lg:py-8">
        <h2 class="text-4xl font-bold text-slate-900 dark:text-white">{{ $game->name }}</h2>

        <x-sport.card :sport="$game->sport" :position-right="true" />
    </div>


    <section class="relative grid grid-cols-2 grid-rows-1">
        <x-team.info :team="$game->teams[0]" :expanded="true" :$game />
        <x-sport.colored-line :slug="$game->sport->slug" />
        <x-team.info :team="$game->teams[1]" :expanded="true" :position-right="true" :$game />
    </section>
</div>

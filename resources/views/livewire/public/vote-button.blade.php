<div>
    @if ($voted)
            @if($votedForTeam)
                <x-button disabled="disabled">@lang('Already voted for this team!')</x-button>
            @else
                <x-secondary-button disabled="disabled">@lang('Already voted!')</x-secondary-button>
            @endif
    @else
        <x-button type="button" wire:click="$set('votingOpen', true)">@lang('Vote for the team')</x-button>
    @endif

    <x-dialog-modal :id="$game->id . '_' . $team->id . '_vote'" wire:model='votingOpen'>
        <x-slot name="title">
            <h3 class="font-normal text-left">@lang('Vote for <span class="font-extrabold">:team</span> in <span class="italic">:game</span>', ['team' => $team->name, 'game' => $game->name])</h3>
        </x-slot>
        <x-slot name="content">
            <div class="text-left">
                @guest
                <div class="mt-2">
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" type="text" class="block w-full mt-1" wire:model.debounce="name" autofocus />
                    <x-input-error for="name" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" type="email" class="block w-full mt-1" wire:model.debounce="email" />
                    <x-input-error for="email" class="mt-2" />
                </div>
                @else
                    @lang('You are logged in as <strong class="text-teal-900 dark:text-white">:user</strong>, you don\'t need to fill out your details again!', ['user' =>  Auth::user()->name ])
                @endguest
            </div>
        </x-slot>
        <x-slot name="footer" class="text-left">
            <x-button wire:click="saveVote()" wire:loading.attr="disabled">
                {{ __('Vote now') }}
            </x-button>
            <x-secondary-button class="ml-2" wire:click="$set('votingOpen', false)" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>

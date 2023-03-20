@props([
    'sport',
    'positionRight' => false,
])

<h2 {{ $attributes->class([
    'text-3xl',
    'text-orange-800 dark:text-orange-300' => $sport->slug == 'basketball',
    'text-sky-800 dark:text-sky-300' => $sport->slug == 'football',
    'text-blue-800 dark:text-blue-300' => $sport->slug == 'handball',
    'text-teal-800 dark:text-teal-300' => $sport->slug == 'volleyball',
]) }}>
    @if(! $positionRight)
        <i class="pr-2 {{ $sport->icon }}"></i>
    @endif
    {{ $sport->name }}
    @if($positionRight)
        <i class="pl-2 {{ $sport->icon }}"></i>
    @endif
</h2>

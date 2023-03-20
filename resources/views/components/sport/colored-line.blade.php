@props([
    'slug',
])

<span {{ $attributes->class([
    "absolute text-xl -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2",
    'text-orange-800 dark:text-orange-300' => $slug == 'basketball',
    'text-sky-800 dark:text-sky-300' => $slug == 'football',
    'text-blue-800 dark:text-blue-300' => $slug == 'handball',
    'text-teal-800 dark:text-teal-300' => $slug == 'volleyball',
]) }}>
    -
</span>

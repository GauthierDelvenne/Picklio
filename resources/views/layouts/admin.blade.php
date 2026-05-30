<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet">
    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/admin.css', 'resources/js/app.js'])

    @livewireStyles
    @fluxAppearance

</head>
<body class="bg-white text-black dark:bg-zinc-800 dark:text-white">
<flux:heading class="sr-only" level="1">{{$title}}</flux:heading>

@livewire('admin.admin.partials.sidebar')

{{ $slot }}

<flux:toast />
@livewireScripts
@fluxScripts
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    @vite(['resources/css/app.scss', 'resources/js/app.js'])

    @livewireStyles

</head>
<body class="body body--front">
<h1 class="sr-only">{{ $title ?? config('app.name') }}</h1>
@livewire('front.components.header')
{{ $slot }}
@livewire('front.components.footer')
@livewireScripts
</body>
</html>

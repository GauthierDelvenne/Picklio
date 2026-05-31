<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    <meta name="description" content="{{ __('commons.head.description') }}">

    <link rel="canonical" href="{{url()->current() }}">

    <meta name="robots" content="index, follow">

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/favicon_io/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/favicon_io/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon_io/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('images/favicon_io/site.webmanifest')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <meta property="og:type"        content="website">
    <meta property="og:url"         content="{{ url()->current() }}">
    <meta property="og:title"       content="{{  $title ?? config('app.name') }}">
    <meta property="og:description" content="{{  __('commons.head.description') }}">
    <meta property="og:image"       content="{{  asset('images/og-default.jpg') }}">
    <meta property="og:locale"      content="{{ str_replace('_', '-', app()->getLocale()) }}">

    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="{{ $title ?? config('app.name') }}">
    <meta name="twitter:description" content="{{  __('commons.head.description') }}">
    <meta name="twitter:image"       content="{{ asset('images/og-default.jpg') }}">

    @vite(['resources/css/app.scss', 'resources/js/app.js'])

    @livewireStyles
    @cookieconsentscripts

</head>
<body class="body body--front">
<a href="#main-content" class="sr-only sr-only-focusable">Passer au contenu principal</a>
<h1 class="sr-only">{{ $title ?? config('app.name') }}</h1>
@livewire('front.components.header')
<main id="main-content">
    {{ $slot }}
</main>
@cookieconsentview
@livewire('front.components.footer')
@livewireScripts
</body>
</html>

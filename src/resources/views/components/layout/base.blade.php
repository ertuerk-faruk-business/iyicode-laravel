@props(['title', 'head' => null, 'description'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $description }}">
    <meta name="og:title" property="og:title" content="{{ $title }}">
    <meta name="twitter:card" content="{{ $title }}">
    <meta name="author" content="iyiCode">
    <meta name="copyright" content="iyiCode">
    <meta name="publisher" content="iyiCode">
    <meta name="color-scheme" content="dark only">
    <meta name="theme-color" content="#ffffff">
    <meta name="canonical" href="/">
    <title>{{ $title }}</title>
    <link href="{{ mix('/css/site.css') }}" rel="stylesheet">
    <link rel="mask-icon" href="/favicon.svg" color="#ffffff">
    <link rel="icon" type="image/png" href="/favicon.png" />
    <livewire:styles />
    @stack('styles')
    {{ $head ?? '' }}
    @foreach (IyiCode\Services\Layout::getHead() as $value)
        {!! $value !!}
    @endforeach
</head>

<body class="text-black text-base font-poppins bg-white antialiased no-scroll-bar scroll-smooth overflow-y-scroll">
    @livewireScripts
    @stack('scripts')
    {{ $slot }}
    <script src="{{ mix('/js/site.js') }}"></script>
</body>

</html>

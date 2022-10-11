@props(['sideBar', 'bottom'])
<div>
    <x-iyicode::page.base.desktop :sideBar="$sideBar ?? null" :bottom="$bottom ?? null">
        {{ $slot }}
    </x-iyicode::page.base.desktop>
    <x-iyicode::page.base.mobile :sideBar="$sideBar ?? null" :bottom="$bottom ?? null">
        {{ $slot }}
    </x-iyicode::page.base.mobile>
    @if (\IyiCode\Services\Layout::shouldAcceptCookies())
        @livewire('iyicode.components.cookie-layout')
    @endif
</div>

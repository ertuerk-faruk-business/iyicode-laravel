@props(['sideBar', 'bottom', 'sideBarAlwaysVisible' => false, 'sideBarDisabled' => false, 'sideBarFixed' => true,])
<div>
    <x-iyicode::page.base.desktop :sideBarFixed="$sideBarFixed" :sideBarDisabled="$sideBarDisabled" :sideBarAlwaysVisible="$sideBarAlwaysVisible" :sideBar="$sideBar ?? null" :bottom="$bottom ?? null">
        {{ $slot }}
    </x-iyicode::page.base.desktop>
    <x-iyicode::page.base.mobile :sideBarDisabled="$sideBarDisabled" :sideBar="$sideBar ?? null" :bottom="$bottom ?? null">
        {{ $slot }}
    </x-iyicode::page.base.mobile>
    @if (\IyiCode\App\Services\Layout::shouldAcceptCookies())
        @livewire('iyicode.components.cookie-layout')
    @endif
</div>

@props(['bottom', 'sideBarDisabled' => false, 'sideBarAlwaysVisible' => false])
<div class="sticky top-0 z-50">
    <x-iyicode::app-bar.desktop :sideBarDisabled="$sideBarDisabled" :sideBarAlwaysVisible="$sideBarAlwaysVisible" :bottom="$bottom ?? null"
        {{ $attributes->merge(['class' => 'h-full flex flex-row items-center']) }}>
        {{ $slot }}
    </x-iyicode::app-bar.desktop>
    <x-iyicode::app-bar.mobile :sideBarDisabled="$sideBarDisabled" :sideBarAlwaysVisible="$sideBarAlwaysVisible" :bottom="$bottom ?? null"
        {{ $attributes->merge(['class' => 'h-full flex flex-row items-center']) }}>
        {{ $slot }}
    </x-iyicode::app-bar.mobile>
</div>

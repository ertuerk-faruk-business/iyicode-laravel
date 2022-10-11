@props(['head'])
<div {{ $attributes->merge(['class' => ' w-screen xl:w-60 h-full']) }}>
    <x-iyicode::side-bar.mobile :head="$head ?? null">
        {{ $slot }}
    </x-iyicode::side-bar.mobile>
    <x-iyicode::side-bar.desktop :head="$head ?? null">
        {{ $slot }}
    </x-iyicode::side-bar.desktop>
</div>

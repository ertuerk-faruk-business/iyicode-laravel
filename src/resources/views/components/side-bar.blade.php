@props(['head', 'alwaysVisible' => false])
<div class="h-full w-screen bg-black bg-opacity-30">
    <div {{ $attributes->merge(['class' => ' w-screen xl:w-60 h-full']) }}>
        <x-iyicode::side-bar.mobile :head="$head ?? null">
            {{ $slot }}
        </x-iyicode::side-bar.mobile>
        <x-iyicode::side-bar.desktop :alwaysVisible="$alwaysVisible" :head="$head ?? null">
            {{ $slot }}
        </x-iyicode::side-bar.desktop>
    </div>
</div>

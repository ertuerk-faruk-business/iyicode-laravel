@props(['head'])
<div class="h-full {{ IyiCode\App\Support\View\SideBar::isAlwaysVisible() ? '' : (IyiCode\App\Support\View\SideBar::isFixed() ? 'w-screen bg-black bg-opacity-30' : '') }}">
    <div {{ $attributes->merge(['class' => ' w-screen xl:w-60 h-full']) }}>
        <x-iyicode::side-bar.mobile :head="$head ?? null">
            {{ $slot }}
        </x-iyicode::side-bar.mobile>
        <x-iyicode::side-bar.desktop :head="$head ?? null">
            {{ $slot }}
        </x-iyicode::side-bar.desktop>
    </div>
</div>

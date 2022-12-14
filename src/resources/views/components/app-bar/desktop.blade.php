@props(['bottom'])
<div class="hidden xl:block">
    <div {{ $attributes->merge(['class' => 'h-full flex flex-row items-center']) }}>
        @if (!IyiCode\App\Support\View\SideBar::isDisabled() && !IyiCode\App\Support\View\SideBar::isAlwaysVisible())
            <div x-show="!showSideBar" x-cloak>
                <div @click="showSideBar=true, localStorage.setItem('showSideBar', true)">
                    <x-iyicode::svg.menu-alt4 class="w-6 h-6 mr-6 cursor-pointer" />
                </div>
            </div>
        @endif
        <div class="w-full">
            {{ $slot }}
        </div>
    </div>
    @isset($bottom)
        {{ $bottom }}
    @endisset
</div>

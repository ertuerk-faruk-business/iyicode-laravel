@props(['bottom'])
<div class="xl:hidden">
    <div {{ $attributes->merge(['class' => 'h-full flex flex-row items-center']) }}>
        @if (!IyiCode\Services\SideBar::isDisabled())
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

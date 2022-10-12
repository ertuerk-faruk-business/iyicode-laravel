@props(['head', 'alwaysVisible'])
<div class="hidden xl:block">
    <div class="flex flex-row items-center justify-start">
        @unless($alwaysVisible)
            <div @click="showSideBar=false, localStorage.setItem('showSideBar', false)">
                <x-iyicode::svg.x class="w-6 h-6 mr-6 cursor-pointer" />
            </div>
        @endunless
        @isset($head)
            {{ $head }}
        @endisset
    </div>
    {{ $slot }}
</div>

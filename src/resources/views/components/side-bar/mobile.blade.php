@props(['head'])
<div class="xl:hidden">
    <div class="flex flex-row items-center justify-start">
        <div @click="showSideBar=false, localStorage.setItem('showSideBar', false)">
            <x-iyicode::svg.x class="w-6 h-6 mr-6 cursor-pointer" />
        </div>
        @isset($head)
            {{ $head }}
        @endisset
    </div>
    {{ $slot }}
</div>

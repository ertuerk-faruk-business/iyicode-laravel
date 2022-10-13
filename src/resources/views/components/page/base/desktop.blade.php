@props(['sideBar', 'bottom'])
<div x-data="{ showSideBar: {{ IyiCode\App\Support\View\SideBar::isDisabled() ? false : (IyiCode\App\Support\View\SideBar::isAlwaysVisible() ? true : "localStorage.getItem('showSideBar') === 'true'") }} }" class="hidden xl:block absolute z-0 container mx-auto left-0 right-0">
    <div class="flex flex-col w-full relative">
        <div class="flex flex-row w-full items-start bg-slate-100">
            @if (!IyiCode\App\Support\View\SideBar::isDisabled() && !empty($sideBar))
                <span x-show="showSideBar" x-cloak>
                    <div>
                        <div class="{{ IyiCode\App\Support\View\SideBar::isAlwaysVisible() ? 'w-60' : (IyiCode\App\Support\View\SideBar::isFixed() ? 'w-0' : 'w-60') }} bg-white h-full">
                            <div class="fixed h-full z-[60]">
                                {{ $sideBar }}
                            </div>
                        </div>
                    </div>
                </span>
            @endif
            <div class="flex w-full flex-col justify-start">
                <div class="flex flex-col w-full min-h-screen">
                    {{ $slot }}
                </div>
                @isset($bottom)
                    {{ $bottom }}
                @endisset
            </div>
        </div>
    </div>
</div>

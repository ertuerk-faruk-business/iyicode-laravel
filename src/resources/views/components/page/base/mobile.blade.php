@props(['sideBar', 'bottom'])
<div x-data="{ showSideBar: false }" class="xl:hidden absolute z-0 container mx-auto left-0 right-0">
    <div class="flex flex-col w-full relative">
        <div class="flex flex-row w-full items-start bg-slate-100">
            @if (!IyiCode\App\Support\View\SideBar::isDisabled() && !empty($sideBar))
                <span x-show="showSideBar" x-cloak>
                    <div class="">
                        <div class="w-screen bg-white h-full">
                            <div class="fixed h-full z-[60]">
                                {{ $sideBar }}
                            </div>
                        </div>
                    </div>
                </span>
            @endif
            <div x-show="!showSideBar" class="flex w-full flex-col justify-start">
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

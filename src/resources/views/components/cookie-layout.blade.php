<div class="fixed w-screen bottom-0 left-0 right-0 flex flex-col items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-6 flex flex-col xl:flex-row container xl:justify-between gap-6 border-t border-t-gray-400">
        <div>
            <div class="font-bold text-xl">{!! __('iyicode::cookie.title') !!}</div>
            <div class="mt-2 text-base">
                {!! __('iyicode::cookie.text') !!}
            </div>
        </div>
        <div class="flex flex-row items-center justify-end gap-6">
            <x-iyicode::button.outline href="{{ route('iyicode.data-protection.index') }}"
                background="bg-white hover:bg-black" border="border-black border"
                text="text-black hover:text-white hover:underline">
                {!! __('iyicode::cookie.info') !!}
            </x-iyicode::button.outline>
            <x-iyicode::button.outline action="accept" background="bg-white hover:bg-black" border="border-black border"
                text="text-black hover:text-white hover:underline">
                {!! __('iyicode::cookie.accept') !!}
            </x-iyicode::button.outline>
        </div>
    </div>
</div>

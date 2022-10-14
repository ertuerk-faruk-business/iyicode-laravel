@google('maps, adsense')
<x-iyicode::page.base>
    <x-iyicode::app-bar class="p-6 bg-white border-b border-b-gray-400">
        <h1 class="text-2xl font-bold">{{ __('iyicode::cookie.title') }}</h1>
    </x-iyicode::app-bar>
    <div class="mx-auto container p-2 xl:p-6 bg-white text-black min-h-screen">
        @collection('fields')
            <div class="flex flex-col mt-6">
                @foreach ($collection->array() as $field)
                    <div class="flex flex-col mt-6">
                        <div class="text-xl font-bold">{{ $field['title'] }}</div>
                        <div class="mt-2">{{ $field['content'] }}</div>
                    </div>
                @endforeach
            </div>
        @endcollection
        <div class="mt-6">
            <x-iyicode::button.outline action="declineAll" background="bg-white hover:bg-black" border="border-black border"
                text="text-black hover:text-white hover:underline">
                {!! __('iyicode::cookie.decline') !!}
            </x-iyicode::button.outline>
        </div>
    </div>
</x-iyicode::page.base>

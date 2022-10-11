@props(['id', 'title' => ''])
@input($id)
    <div class="w-full max-w-md">
        <label class="text-gray-400 flex flex-col items-center justify-center w-full cursor-pointer h-full">
            <div class="bg-white rounded-full h-40 w-40">
                @unless(empty($input->text()))
                    <img class="w-full object-cover h-full rounded-full" src="{{ asset($input->text()) }}" />
                @else
                    <div class="items-center flex flex-col w-full h-full justify-center rounded-full">
                        <x-svg.image class="w-6 h-6" />
                        <div class="mt-2 text-sm ">
                            {{ $title }}
                        </div>
                    </div>
                @endunless
            </div>
            <input id="{{ $input->getPath() }}" type="file" class="hidden" wire:model="{{ $input->getPath() }}">
        </label>
    </div>
@endinput

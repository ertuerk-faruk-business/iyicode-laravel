@props(['id', 'title' => '', 'placeholder' => '', 'type' => 'text'])
@input($id)
    <div class="flex flex-col w-full max-w-md">
        <div class="mb-1">
            {{ $title }}
        </div>
        <input type="{{ $type }}" wire:model.lazy="{{ $input->getPath() }}"
            class="bg-white px-6 py-4 rounded-xl outline-none placeholder-grey-100"
            placeholder="{{ empty($placeholder) ? $title : $placeholder }}" />
    </div>
@endinput

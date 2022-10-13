@props(['target'])
<div wire:loading @isset($target)wire:target="{{ $target }}"@endisset
    class="fixed flex-col flex z-[9999] inset-0 bg-black bg-opacity-50 items-center justify-center w-screen h-screen">
    <div class="self-center flex items-center m-auto justify-center h-screen">
        <div class="spinner">
        </div>
    </div>
</div>

<x-iyicode::page.base>
    <x-iyicode::app-bar class="p-6 bg-white border-b border-b-gray-400">
        <h1 class="text-2xl font-bold">Settings</h1>
    </x-iyicode::app-bar>
    <div class="mx-auto container p-2 xl:p-6 bg-white text-black min-h-screen">
        <div class="w-full flex flex-col">
            @input('env')
                <textarea wire:model.lazy="{{ $input->getPath() }}" class="p-6 mb-6 bg-transparent outline-none border border-gray-400"
                    rows="10"></textarea>
            @endinput
            <div class="flex flex-row gap-6 items-center">
                <div>
                    <x-iyicode::button.outline action="updateEnv" background="bg-white hover:bg-black"
                        border="border-black border" text="text-black hover:text-white hover:underline">
                        Update Environment
                    </x-iyicode::button.outline>
                </div>
                <div>
                    <x-iyicode::button.outline action="installNewestVersion" background="bg-white hover:bg-black"
                        border="border-black border" text="text-black hover:text-white hover:underline">
                        Install Newest Version
                    </x-iyicode::button.outline>
                </div>
            </div>
        </div>
    </div>
    <x-iyicode::loading.overlay target="updateEnv" />
    <x-iyicode::loading.overlay target="installNewestVersion" />
</x-iyicode::page.base>

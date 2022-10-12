<?php

namespace IyiCode\App\Livewire\View\Components;

use IyiCode\App\Livewire\View;
use Illuminate\Support\Str;

class Input extends Component
{
    public static function create(View $view, string $id): InputBuilder
    {
        return new InputBuilder($view, $id);
    }

    public function clear(): self
    {
        return $this->setValue('');
    }

    public function slug($seperator = '-', $language = 'en'): string
    {
        $value = $this->getValue();

        if ($value == null) {
            return '';
        }

        $value = Str::slug($value, $seperator, $language);

        return $value;
    }

    public function text(): string
    {
        $value = $this->getValue();

        if ($value == null) {
            return '';
        }

        if (!is_string($value)) {
            $value = strval($value);
        }

        return $value;
    }

    /**
     * Store media in public storage.
     */
    public function store(string $pathToStore = 'iyicode/media/'): self
    {
        $imagePath = $this->getValue();

        if (empty($imagePath)) {
            return $this;
        }

        $path = 'storage/' . $imagePath->store($pathToStore, 'public');

        return $this->setValue($path);
    }
}

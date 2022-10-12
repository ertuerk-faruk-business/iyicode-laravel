<?php

namespace IyiCode\App\Livewire\View\Components;

class CollectionBuilder extends ComponentBuilder
{
    public mixed $class = Collection::class;

    /**
     * Prevent from queryable.
     */
    public function queryable(): self
    {
        $this->queryable = false;

        return $this;
    }
}

<?php

namespace IyiCode;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class IyiCodeProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'iyicode');

        $this->loadBladeDirectives();

        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'iyicode');

        Livewire::component('iyicode.components.cookie-layout', \IyiCode\Http\Livewire\Components\CookieLayout::class);
    }

    private function loadBladeDirectives()
    {
        Blade::directive('input', function ($expression) {
            return '<?php $input = $this->getInput(' . $expression . '); ?>';
        });

        Blade::directive('endinput', function ($expression) {
            return "<?php  ?>";
        });

        Blade::directive('collection', function ($expression) {
            return '<?php $collection = $this->getCollection(' . $expression . '); ?>';
        });

        Blade::directive('endcollection', function ($expression) {
            return "<?php  ?>";
        });

        Blade::directive('field', function ($expression) {
            return '<?php $field = $this->getComponent(' . $expression . '); ?>';
        });

        Blade::directive('endfield', function ($expression) {
            return "<?php  ?>";
        });
    }
}

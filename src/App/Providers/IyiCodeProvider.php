<?php

namespace IyiCode\App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use IyiCode\App\Support\View\SideBar;
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
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'iyicode');

        $this->loadBladeDirectives();

        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'iyicode');

        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');

        Livewire::component('iyicode.components.cookie-layout', \IyiCode\App\Http\Livewire\Components\CookieLayout::class);
        Livewire::component('iyicode.data-protection', \IyiCode\App\Http\Livewire\DataProtection\Index::class);
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

        Blade::directive('sidebar', function ($expression) {
            return '<?php $exploded = explode(",", ' . $expression . ');

            foreach ($exploded as $key => $value) {
                $prop = str_replace(" ", "", $value);
                if ($prop == "fixed") {
                    IyiCode\App\Support\View\SideBar::fixed();
                } elseif ($prop == "alwaysVisible") {
                    IyiCode\App\Support\View\SideBar::alwaysVisible();
                } elseif ($prop == "disable") {
                    IyiCode\App\Support\View\SideBar::disable();
                }
            }?>';
        });

        Blade::directive('google', function ($expression) {
            return '<?php $exploded = explode(",", ' . $expression . ');

            foreach ($exploded as $key => $value) {
                $prop = str_replace(" ", "", $value);
                if ($prop == "maps") {
                    IyiCode\App\Services\Google::withMaps();
                } elseif ($prop == "adsense") {
                    IyiCode\App\Services\Google::withAdsense();
                }
            }?>';
        });
    }
}

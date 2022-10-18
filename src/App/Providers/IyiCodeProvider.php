<?php

namespace IyiCode\App\Providers;

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
        $this->loadBladeDirectives();

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'iyicode');

        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'iyicode');

        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');

        Livewire::component('iyicode.components.cookie-layout', \IyiCode\App\Http\Livewire\Components\CookieLayout::class);
        Livewire::component('iyicode.data-protection', \IyiCode\App\Http\Livewire\DataProtection\Index::class);
        Livewire::component('iyicode.settings', \IyiCode\App\Http\Livewire\Settings\Index::class);
    }

    private function loadBladeDirectives()
    {
        if (config('iyicode.auth.enabled', false)) {
            Blade::if('auth', function () {
                if (auth()->check()) {
                    return true;
                }
                return !empty(\IyiCode\App\Services\Account::get());
            });
        }

        Blade::directive('account', function () {
            return '<?php $account = \IyiCode\App\Services\Account::get(); ?>';
        });

        Blade::directive('endaccount', function () {
            return "<?php  ?>";
        });

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

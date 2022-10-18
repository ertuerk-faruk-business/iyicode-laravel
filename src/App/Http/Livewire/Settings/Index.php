<?php

namespace IyiCode\App\Http\Livewire\Settings;

use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Contracts\View\Factory;
use IyiCode\App\Livewire\View;
use IyiCode\App\Livewire\View\Components\Input;

class Index extends View
{
    public function onMount()
    {
        Input::create($this, 'env')->build();
        $this->loadEnv();
    }

    private function loadEnv()
    {
        $path = base_path('.env');

        if (file_exists($path)) {
            $this->getInput('env')->setValue(file_get_contents($path));
        } else {
            $this->getInput('env')->setValue('');
        }
    }

    public function updateEnv()
    {
        $path = base_path('.env');

        if (file_exists($path)) {
            file_put_contents($path, $this->getInput('env')->text());
        }

        $this->loadEnv();
    }

    public function onRender(): ViewView|Factory
    {
        return view('iyicode::settings.index');
    }

    public function installNewestVersion()
    {
        $output = null;

        $output = shell_exec('git pull');

        $output = shell_exec('composer install');

        $output = shell_exec('npm run dev');

        $output = shell_exec('php artisan migrate');

        $output = shell_exec('php artisan optimize:clear');
    }
}

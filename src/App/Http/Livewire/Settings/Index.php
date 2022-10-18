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

        return [
            'command_output' => ''
        ];
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
        $output = '';

        $output .= $this->runCommand('git pull');

        $output .= $this->runCommand([
            'composer install',
            'yes'
        ]);

        $output .= $this->runCommand('npm run dev');

        $output .= $this->runCommand('php artisan migrate');

        $output .= $this->runCommand('php artisan optimize:clear');

        $this->emit('commandOutput', $this->getContext('command_output'));
    }

    private function runCommand(mixed $commands): mixed
    {
        if (is_array($commands)) {
            $command = implode(' && ', $commands);
        } else {
            $command = $commands;
        }

        $output =  shell_exec('cd ../ && ' . $command) ?? "Something went wrong\n";

        $this->setContext('command_output', ($this->getContext('command_output') ?? '') ."\n".now()->format('d/m H:s')."\ncommand: <strong>". $command . "</strong>\n" . $output);

        return $output;
    }
}

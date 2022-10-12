<?php

namespace Iyicode\App\Http\Livewire\Components;

use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Contracts\View\Factory;
use IyiCode\App\Livewire\View;
use IyiCode\App\Services\GoogleAdsense;
use IyiCode\App\Services\GoogleMaps;

class CookieLayout extends View
{
    public function onRender(): ViewView|Factory
    {
        return view('iyicode::components.cookie-layout');
    }

    public function accept()
    {
        GoogleMaps::accept();
        GoogleAdsense::accept();

        return redirect('/');
    }

    public function readMore()
    {
    }
}

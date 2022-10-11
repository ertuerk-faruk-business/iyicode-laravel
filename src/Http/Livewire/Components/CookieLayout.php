<?php

namespace Iyicode\Http\Livewire\Components;

use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Contracts\View\Factory;
use IyiCode\Livewire\View;
use IyiCode\Services\GoogleAdsense;
use IyiCode\Services\GoogleMaps;

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

<?php

namespace IyiCode\App\Http\Livewire\DataProtection;

use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Redirect;
use IyiCode\App\Livewire\View;
use IyiCode\App\Livewire\View\Components\Collection;
use IyiCode\App\Services\Google;
use IyiCode\App\Services\GoogleAdsense;
use IyiCode\App\Services\GoogleMaps;

class Index extends View
{
    public function onMount()
    {
        $fields = Collection::create($this, 'fields')->build();

        if (Google::hasAdsense()) {
            $fields->add([
                'title' => __('iyicode::dataprotection.googleadsensetitle'),
                'content' => __('iyicode::dataprotection.googleadsensecontent'),
            ]);
        }

        if (Google::hasMaps()) {
            $fields->add([
                'title' => __('iyicode::dataprotection.googlemapstitle'),
                'content' => __('iyicode::dataprotection.googlemapscontent'),
            ]);
        }
    }

    public function onRender(): ViewView|Factory
    {
        return view('iyicode::data-protection.index');
    }

    public function declineAll()
    {
        GoogleMaps::reject();
        GoogleAdsense::reject();

        return redirect('/');
    }
}

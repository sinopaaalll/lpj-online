<?php

namespace App\View\Components\User;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $instansi = "HUMANIKA STT Wastukancana Purwakarta";
        $by = "Divisi Teknologi Informasi dan Komunikasi";
        return view('components.user.footer', compact('instansi', 'by'));
    }
}

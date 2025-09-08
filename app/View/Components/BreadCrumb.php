<?php

namespace App\View\Components;

use App\Helpers\TranslationHelper;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BreadCrumb extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $breadcrumbs , public $button, public $title = '')
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('admin.components.bread-crumb');
    }
}

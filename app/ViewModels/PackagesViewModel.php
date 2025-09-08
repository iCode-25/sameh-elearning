<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use App\Models\Packages;
use App\Models\Level;

class PackagesViewModel extends ViewModel
{
    public function __construct(public ?Packages $packages = null)
    {
        $this->packages = is_null($packages) ? new Packages(old()) : $packages;
    }

    public function action(): string
    {
        return is_null($this->packages->id)
            ? route('admin.packages.store')
            : route('admin.packages.update', ['packages' => $this->packages->id]);
    }

    public function method(): string
    {
        return is_null($this->packages->id) ? 'POST' : 'PUT';
    }



    public function categories()
    {
        return Level::all();
    }
}

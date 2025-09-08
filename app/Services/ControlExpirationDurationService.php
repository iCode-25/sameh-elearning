<?php

namespace App\Services;

use App\Helpers\ReorderHelper;
use App\Models\ControlExpirationDuration;

class  ControlExpirationDurationService
{

    public function createControlExpirationDuration($data)
    {
     {
        // dd($data);
            $controlExpirationDuration = ControlExpirationDuration::create($data);
        }
        if (isset($data['meta_image'])) {
            $controlExpirationDuration->storeFile($data['meta_image'], '_meta_image');
        }
    }
 

    public function updateControlExpirationDuration($controlExpirationDuration , $data)
    {
        if (isset($data['meta_image'])) {
            $controlExpirationDuration->updateFile($data['meta_image'], '_meta_image');
        }
        $controlExpirationDuration->update($data);
    }

     public function deleteControlExpirationDuration($controlExpirationDuration)
    {
        $controlExpirationDuration->delete();
    }

    public function reorder($controlExpirationDuration, $label, $path, $max_num)
    {
        return ReorderHelper::reorder($controlExpirationDuration, $label, $path, $max_num);
    }

    public function saveReorder($all_entries, $controlExpirationDuration)
    {
        return ReorderHelper::saveReorder($all_entries, $controlExpirationDuration);
    }
}

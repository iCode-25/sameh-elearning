<?php

namespace App\Services;

use App\Helpers\ReorderHelper;
use App\Models\Packages;
use App\Models\Tag;

class PackagesService
{

    public function createPackages($data)
    {
        $packages = Packages::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'discount' => is_numeric($data['discount']) ? $data['discount'] : 0,
            'level_id' => $data['level_id'],
        ]);
        $this->storeFiles($packages, $data);
        $this->storePdf($packages, $data);
    }


    private function storePdf(Packages $packages, array $data)
    {
        if (isset($data['pdf']) && $data['pdf'] instanceof \Illuminate\Http\UploadedFile) {
            $packages->clearMediaCollection('pdf');
            $packages->addMedia($data['pdf'])->toMediaCollection('pdf');
        }
    }


    public function updatePackages(Packages $packages, array $data)
    {
        $packages->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'level_id' => $data['level_id'],
            'discount' => $data['discount'] ?? 0,
        ]);
        $this->storePdf(
            $packages,
            $data
        );
        $this->updateFiles($packages, $data);
    }


    public function deletePackages(Packages $packages)
    {
        $packages->delete();
    }


    private function storeFiles(Packages $packages, array $data)
    {
        if (isset($data['image'])) {
            $packages->storeFile($data['image'], '_image');
        }
    }

    private function updateFiles(Packages $packages, array $data)
    {
        if (isset($data['image'])) {
            $packages->updateFile(image: $data['image'], prefix: '_image');
        }
    }

    public function reorder($packages, $label, $path, $max_num)
    {
        return ReorderHelper::reorder($packages, $label, $path, $max_num);
    }

    public function saveReorder($all_entries, $packages)
    {
        return ReorderHelper::saveReorder($all_entries, $packages);
    }
}

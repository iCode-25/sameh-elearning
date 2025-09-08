<?php

namespace App\Services;

use App\Helpers\ReorderHelper;
use App\Models\Contact;

class  ContactService
{

    public function createContact($data)
    {
        $contact = Contact::create($data);
        if (isset($data['meta_image'])) {
            $contact->storeFile($data['meta_image'], '_meta_image');
        }
        if (isset($data['image_banner'])) {
            $contact->storeFile($data['image_banner'], '_image_banner');
        }
        
    }


    public function updateContact($contact, $data)
    {
        if (isset($data['meta_image'])) {
            $contact->updateFile($data['meta_image'], '_meta_image');
        }
        if (isset($data['image_banner'])) {
            $contact->updateFile($data['image_banner'], '_image_banner');
        }
        $contact->update($data);
    }

    public function deleteContact($contact)
    {
        $contact->delete();
    }

    public function reorder($contact, $label, $path, $max_num)
    {
        return ReorderHelper::reorder($contact, $label, $path, $max_num);
    }

    public function saveReorder($all_entries, $contact)
    {
        return ReorderHelper::saveReorder($all_entries, $contact);
    }
}

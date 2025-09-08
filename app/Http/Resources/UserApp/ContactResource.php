<?php

namespace App\Http\Resources\UserApp;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'address' => $this->address,
            'description' => html_entity_decode(strip_tags($this->description)),
            'facebook' => $this->facebook,
            'whatsapp' => $this->whatsapp,
            'email' => $this->email,
            'iniesta' => $this->iniesta,
            'Youtube' => $this->tiktok,
            'x' => $this->x,
        ];
    }
}

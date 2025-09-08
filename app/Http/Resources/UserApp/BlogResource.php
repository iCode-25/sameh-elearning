<?php

namespace App\Http\Resources\UserApp;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'name' => $this->name,
            'description' => html_entity_decode(strip_tags($this->description)),
            'image' => $this->getFirstMediaUrl('blogs_image'), 
            // 'facebook' => $this->facebook,
            // 'whatsapp' => $this->whatsapp,
            // 'email' => $this->email,
            // 'iniesta' => $this->iniesta,
            // 'Youtube' => $this->tiktok,
            // 'x' => $this->x,
            // 'image' => $this->getFirstMediaUrl('products'), 
        ];
    }
}

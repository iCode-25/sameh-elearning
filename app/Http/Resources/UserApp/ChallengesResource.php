<?php

namespace App\Http\Resources\UserApp;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChallengesResource extends JsonResource
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
            // 'description' => $this->description,
            'description' => html_entity_decode(strip_tags($this->description)),
            'date' => $this->date,
            'age' => $this->age,
            'image' => $this->getFirstMediaUrl('challenges_image'), 
        ];
    }
}


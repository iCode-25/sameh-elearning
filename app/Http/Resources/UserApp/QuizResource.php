<?php

namespace App\Http\Resources\UserApp;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'answer_1' => $this->answer_1,
            'answer_1_image' => $this->getFirstMediaUrl('answer_1_image'),
            'answer_2' => $this->answer_2,
            'answer_2_image' => $this->getFirstMediaUrl('answer_2_image'),
            'answer_3' => $this->answer_3,
            'answer_3_image' => $this->getFirstMediaUrl('answer_3_image'),
            'answer_4' => $this->answer_4, // لو موجود
            'answer_4_image' => $this->getFirstMediaUrl('answer_4_image'), // لو فيه رابع
            'correct_answer' => $this->c_answer,
        ];
    }
}


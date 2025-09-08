<?php

namespace App\Http\Resources\UserApp;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    public function toArray($request): array
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => (string) ($this->phone ?? ''),
            'birth' => $this->birth,
            'gender' => $this->gender,
            'imageprofile' => $this->getFirstMediaUrl('client_profile'),
        ];
        if ($request->is('api/auth/register') || $request->is('api/auth/login')) {
            $data['token'] = $this->createToken('estedama')->accessToken;
        }

        return $data;
    }
}

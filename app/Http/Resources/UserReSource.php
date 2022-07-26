<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserReSource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'password' => $this->password,
            'name' => $this->name,
            'dateOfBirth' => $this->dateOfBirth,
            'phone' => $this->phone,
            'image' => $this->image,
            'description' => $this->description,
            'address' => $this->address,
            'status' => $this->status,
            'role' => $this->role,
        ];
    }
}

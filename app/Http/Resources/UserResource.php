<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => (int) $this->id,
            'first_name' =>(string) $this->first_name,
            'last_name' => (string)$this->last_name,
            'image' => (string)$this->image,
            'email' => (string)$this->email,
            'phone' => (string)$this->phone,
            'is_active' => (int)$this->is_active,
            'jwt' => (string) $this->jwt ,
            'notification_count' => (int) $this->Notifications->count() ,
        ];
    }
}

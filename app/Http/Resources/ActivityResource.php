<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
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
//            'id' => (int) $this->id,
            'title' =>(string) $this->title,
//            'image' => (string)$this->image,
//            'parent_id' => (string)$this->parent_id,

        ];
    }
}

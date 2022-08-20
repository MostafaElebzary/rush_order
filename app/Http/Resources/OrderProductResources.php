<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderProductResources extends JsonResource
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
            'id' => (int)$this->id,
            'title' => (string)$this->CompanyProduct->title,
            'content' => (string)$this->CompanyProduct->content,
            'image' => (string)$this->CompanyProduct->image,
            'type' => (string)$this->CompanyProduct->type,
            'price' => (double)$this->price,
            'qty' => (int)$this->qty,
            'attributes' => (array)$this->attributes,
            'additions' => (array)$this->additions,
            'drinks' => (array)$this->drinks,



        ];
    }
}

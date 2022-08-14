<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyProductResource extends JsonResource
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
            'company_id' => (int)$this->company_id,
            'company_category_id' => (int)$this->company_category_id,
            'title' => (string)$this->title,
            'content' => (string)$this->content,
            'image' => (string)$this->image,
            'price' => (double)$this->price,
            'type' => (string)$this->type,
            'attributes' => (array)$this->attributes,
            'additions' => (array)$this->additions,
            'drinks' => (array)$this->drinks,

        ];
    }
}

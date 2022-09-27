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
        foreach ($this->attributes as $key => $attrrib) {

            $return = array();
            foreach($this->attributes as $v) {
                $return[$v->attribute_name_en][]= $v;
            }
        }

        return [
            'id' => (int)$this->id,
            'company_id' => (int)$this->company_id,
            'company_category_id' => (int)$this->company_category_id,
            'title' => (string)$this->title,
            'content' => (string)$this->content,
            'image' => (string)$this->image,
            'price' => (double)$this->price,
            'type' => (string)$this->type,
            'attributes' => (array)$return,
            'additions' => (array)$this->additions,
            'drinks' => (array)$this->drinks,

        ];
    }
}

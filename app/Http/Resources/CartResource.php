<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'user_id' => (int)$this->user_id,
            'qty' => (int)$this->qty,
            'cart_attributes' => (array)$this->attributes,
            'cart_additions' => (array)$this->additions,
            'cart_drinks' => (array)$this->drinks,
            'notes' => (string)$this->notes,
            'price' => $this->price,
//            'company' => $this->Company,
            'product' => new CompanyProductResource($this->CompanyProduct),
        ];
    }
}

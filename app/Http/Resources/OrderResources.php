<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResources extends JsonResource
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

            'company_title' => (string)$this->Company->title,
            'company_logo' => (string)$this->Company->logo,
            'company_phone1' => (string)$this->Company->phone1,
            'company_phone2' => (string)$this->Company->phone2,
            'sub_categories' => ActivityResource::collection($this->Company->CompanySubActivities),
            'address_title' => $this->UserAddress->address,
            'address_description' => $this->UserAddress->description,

            'order_time' => Carbon::parse($this->created_at)->translatedFormat("Y/m/d h:i a"),
            'status' => (int)$this->status,

            'deliver_type' => (string)$this->deliver_type,
            'payment_type' => (string)$this->payment_type,
            'delivery_price' => (double)$this->delivery_price,
            'order_price' => (double)$this->order_price,
            'total_price' => (double)$this->total_price,
            'order_products'=> OrderProductResources::collection($this->OrderProducts)


        ];
    }
}

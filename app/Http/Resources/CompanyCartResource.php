<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyCartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    private static $user_id;

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'sub_categories' => ActivityResource::collection($this->CompanySubActivities),
            'cart' => CartResource::collection($this->carts),
            'total' => cart_sum($this->id, self::$user_id),
            'tax' => cart_sum($this->id, self::$user_id) * taxs() / 100,
            'sub_total' => cart_sum($this->id, self::$user_id) * taxs() / 100 + cart_sum($this->id, self::$user_id),

        ];
    }

    public static function customCollection($resource, $user_id): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {

        //you can add as many params as you want.
        self::$user_id = $user_id;
        return parent::collection($resource);
    }
}

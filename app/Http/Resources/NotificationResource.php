<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'id' => (int) $this->id,
            'title' =>(string) $this->title,
            'body' => (string)$this->body,
            'date'=>Carbon::parse($this->created_at)->format("Y/m/d"),
            'time'=>Carbon::parse($this->created_at)->format("h:i a"),
        ];
    }
}

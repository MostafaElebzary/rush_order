<?php

namespace App\Http\Resources;

use App\Models\CompanyWorkTime;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $work_time = CompanyWorkTime::where('company_id', $this->Company->id)
            ->where('day', Carbon::now()->format('l'))
            ->first();
        $is_open = false;
        if ($work_time) {
            if (Carbon::now() > $work_time->open_time && Carbon::now() < $work_time->close_time) {
                $is_open = true;
            }
        }
        return [
            'id' => (int)$this->id,
            'company_id' => (int)$this->Company->id,
            'company_title' => (string)$this->Company->title,
            'branch_title' => (string)$this->title,
            'logo' => (string)$this->Company->logo,
            'banner' => (string)$this->Company->banner,
            'location' => (string)$this->Company->location,
            'delivery_price' => (double)$this->Company->delivery_price,
            'rate' => (double)$this->Company->Rates->count() > 0 ? $this->Company->Rates->sum('rate') / $this->Company->Rates->count() : 0.0,
            'delivery_time' => $this->delivery_time,
            'open_time' => $work_time ? Carbon::parse($work_time->open_time)->translatedFormat("h:i a") : null,
            'close_time' => $work_time ? Carbon::parse($work_time->close_time)->translatedFormat("h:i a") : null,
            'is_open' => (boolean)$is_open,
            'distance' => $this->distance ? number_format((float)$this->distance, 2, '.', '') : 0.0,
            'sub_categories' => ActivityResource::collection($this->Company->CompanySubActivities),
        ];
    }
}

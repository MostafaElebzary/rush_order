<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BranchsResource;
use App\Http\Resources\MainCategoryResource;
use App\Http\Resources\SliderResources;
use App\Models\Activity;
use App\Models\Branch;
use App\Models\Company;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function Offers(Request $request)
    {
        $data = Slider::orderBy('sort', 'asc')->get();
        $data = SliderResources::collection($data);
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }


    public function MainCategories(Request $request)
    {
        $data = Activity::root()->paginate(10);
        $data = MainCategoryResource::collection($data)->response()->getData(true);
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }

    public function SubCategories(Request $request, $id)
    {
        $data = Activity::where('parent_id', $id)->paginate(10);
        $data = MainCategoryResource::collection($data)->response()->getData(true);
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }

    public function branches(Request $request)
    {
        $query = Branch::whereHas('Company', function ($q) use ($request) {
            $q->where('activity_id', $request->category_id);
            if ($request->subactivity_id) {
                $q->whereHas('CompanyPivotActivity', function ($q4) use ($request) {
                    $q4->whereIn('activity_id', $request->subactivity_id);
                });
                if ($request->search) {
                    $q->where('title_ar', 'like', '%' . $request->search . '%')
                        ->orwhere('title_en', 'like', '%' . $request->search . '%');
                }
            }
        });
        if ($request->city_id) {
            $query->where('city_id', $request->city_id);
        }
        if ($request->lat && $request->lng) {
            $query->select(DB::raw("id,company_id,title_ar,title_en,lat,lng,city_id,delivery_time,
            ( 3959 * acos( cos( radians('$request->lat') ) *
            cos( radians( lat ) ) * cos( radians( lng ) - radians('$request->lng') ) +
             sin( radians('$request->lat') ) * sin( radians( lat ) ) ) ) AS distance"))
//                ->havingRaw('distance < 50')
                ->orderBy('distance');
        }
        $query->with(['Company' => function ($q2) use ($request) {
            $q2->with('CompanySubActivities')
                ->with('CompanyWorkTime')
                ->with('Rates');
        }]);

        $data = $query->paginate(5);
        $data = BranchsResource::collection($data)->response()->getData(true);
        return response()->json(msgdata(success(), trans('lang.success'), $data));

    }
}

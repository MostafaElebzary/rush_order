<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BranchsResource;
use App\Http\Resources\CompanyCategoryResource;
use App\Http\Resources\CompanyProductResource;
use App\Http\Resources\MainCategoryResource;
use App\Http\Resources\SliderResources;
use App\Models\Activity;
use App\Models\Branch;
use App\Models\Company;
use App\Models\CompanyCategory;
use App\Models\CompanyProduct;
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

    public function branch_Categories(Request $request, $id)
    {
        $branch = Branch::where('id', $id)->first();
        if ($branch) {
            $branch_categories = CompanyCategory::where('company_id', $branch->company_id)->get();
        } else {
            return response()->json(msg(not_found(), trans('lang.not_found')));
        }

        $data = $branch_categories;
        $data = CompanyCategoryResource::collection($data);
        return response()->json(msgdata(success(), trans('lang.success'), $data));

    }


    public function branch_products(Request $request, $branch_id)
    {
        $branch = Branch::where('id', $branch_id)->first();
        if (!$branch) {
            return response()->json(msg(not_found(), trans('lang.not_found')));
        }
        $query = CompanyProduct::query();
        $query->where('company_id', $branch->company_id);
        if ($request->category_id) {
            $query->whereIn('company_category_id', $request->category_id);
        }
        $data = $query->paginate(10);
        $data = CompanyProductResource::collection($data)->response()->getData(true);
        return response()->json(msgdata(success(), trans('lang.success'), $data));

    }
}

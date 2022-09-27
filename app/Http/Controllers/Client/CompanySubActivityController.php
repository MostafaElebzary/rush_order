<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Branch;
use App\Models\Company;
use App\Models\CompanyCategory;
use App\Models\CompanySubActivity;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use Validator;

class CompanySubActivityController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        $data = Auth::guard('client')->user();
        $activities_id = CompanySubActivity::where('company_id', $data->company_id)->pluck('activity_id')->toArray();
        $activities = Activity::whereNotNull('parent_id')->whereNotIn('id',$activities_id)->get();

        return view('client.sub_activity.index', compact('data','activities'));
    }

    public function datatable(Request $request, $company_id)
    {
        $data = CompanySubActivity::where('company_id', $company_id)->orderBy('id', 'asc');
        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('image', function ($row) {
                $photo = '';
                $photo .= ' <a class="d-block overlay h-100" data-fslightbox="lightbox-hot-sales" target="_blank" href="' . $row->Activity->image . '">
                            <!--begin::Image-->
                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-75px h-100" style="background-image:url(' . $row->Activity->image . ')"></div>
                            <!--end::Image-->
                            <!--begin::Action-->
                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                <i class="bi bi-eye-fill fs-2x text-white"></i>
                            </div>
                            <!--end::Action-->
                        </a>';
                return $photo;
            })
            ->editColumn('title_ar', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->Activity->title_ar . '</span>
                                   <br> <small class="text-gray-600">' . $row->Activity->title_en . '</small>';
                return $name;
            })
            ->editColumn('company_id', function ($row) {
                $phone = '';
                $phone .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->Company->title . '</span>';
                return $phone;
            })
            ->rawColumns(['checkbox', 'image', 'title_ar', 'company_id'])
            ->make();

    }

    public function button($id)
    {

        $query['data'] = Company::findOrFail($id);
        return view('client/sub_activity/button', $query);
    }


    public function store(Request $request)
    {
        $rule = [
            'company_id' => 'required|exists:companies,id',
            'activity_id' => 'required|array',
            'activity_id.*' => 'required|exists:activities,id',

        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        foreach ($request->activity_id as $activity_id){
            $data = CompanySubActivity::create([
                'company_id' => $request->company_id,
                'activity_id' => $activity_id,
            ]);
        }

        return redirect(url('client/client-company_sub_activity'))->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
    }



    public function destroy(Request $request)
    {

        try {
            CompanySubActivity::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }

}

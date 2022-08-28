<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use Validator;

class CompanyController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        // $query['data'] = Admin::orderBy('id','desc')->get();
        // $query['data'] = Admin::orderBy('id','desc')->paginate(10);

        return view('admin.company.index');
    }

    public function datatable(Request $request)
    {
        $data = Company::orderBy('id', 'asc');
        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('logo', function ($row) {
                $photo = '';
                $photo .= ' <a class="d-block overlay h-100" data-fslightbox="lightbox-hot-sales" target="_blank" href="' . $row->logo . '">
                            <!--begin::Image-->
                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-75px h-100" style="background-image:url(' . $row->logo . ')"></div>
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
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->title_ar . '</span>
                                   <br> <small class="text-gray-600">' . $row->title_en . '</small>';
                return $name;
            })
            ->editColumn('email1', function ($row) {
                $phone = '';
                $phone .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->email1 . '</span>';
                return $phone;
            })->editColumn('phone1', function ($row) {
                $phone = '';
                $phone .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->phone1 . '</span>';
                return $phone;
            })->editColumn('activity_id', function ($row) {
                $phone = '';
                $phone .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->Activity ? $row->Activity->title : "-" . '</span>';
                return $phone;
            })
            ->editColumn('is_active', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">مفعل</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">غير مفعل</div>';
                if ($row->is_active == 1) {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("admin/edit-company/" . $row->id) . '" class="btn btn-icon btn-light-info"><i class="bi bi-pencil-fill"></i> </a>';
                return $actions;

            })
            ->rawColumns(['checkbox', 'logo', 'title_ar', 'email1', 'phone1', 'activity_id', 'is_active', 'actions'])
            ->make();

    }

    public function store(Request $request)
    {
        $rule = [
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'banner' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'location' => 'required',
            'phone1' => 'required|unique:companies',
            'phone2' => 'nullable|unique:companies',
            'email1' => 'required|email|unique:companies',
            'email2' => 'nullable|email|unique:companies',
            'activity_id' => 'required|exists:activities,id',
            'owner_name' => 'required',
            'owner_phone' => 'required',
            'ceo_name' => 'required',
            'ceo_phone' => 'required',
            'commercial_file' => 'required',
            'maroof_id' => 'nullable',
            'lat' => 'nullable',
            'lng' => 'nullable',
            'is_active' => 'required|in:0,1',
            'expire_date' => 'required|date',
            'delivery_price' => 'required',
            'password' => 'required|min:5|confirmed',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        $data = Company::create($validate->validated());

        Client::create([
            'name' => $data->title_ar,
            'email' => $data->email1,
            'phone' => $data->phone1,
            'address' => $request->location,
            'is_active' => $data->is_active,
            'company_id' => $data->id,
            'type' => "Manager",
            'password' => $request->password,

        ]);


        return redirect()->back()->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
    }

    public function show($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = User::whereId($id)->with('Addresses')->firstOrFail();
        return view('admin.user.show', $query);
    }

    public function edit($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Company::findOrFail($id);
        return view('admin.company.edit', $query);
    }

    public function update(Request $request)
    {

        $rule = [
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'banner' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'location' => 'required',
            'phone1' => 'required|unique:companies,phone1,' . $request->id,
            'phone2' => 'nullable|unique:companies,phone2,' . $request->id,
            'email1' => 'required|email|unique:companies,email1,' . $request->id,
            'email2' => 'nullable|email|unique:companies,email2,' . $request->id,
            'activity_id' => 'required|exists:activities,id',
            'owner_name' => 'required',
            'owner_phone' => 'required',
            'ceo_name' => 'required',
            'ceo_phone' => 'required',
            'commercial_file' => 'nullable',
            'maroof_id' => 'nullable',
            'lat' => 'nullable',
            'lng' => 'nullable',
            'is_active' => 'required|in:0,1',
            'expire_date' => 'required|date',
            'delivery_price' => 'required',

        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $row = Company::findOrFail($request->id);

        if ($request->logo) {
            $row->logo = $request->logo;
        }
        if ($request->banner) {
            $row->banner = $request->banner;
        }
        $row->title_ar = $request->title_ar;
        $row->title_en = $request->title_en;
        $row->location = $request->location;
        $row->phone1 = $request->phone1;
        $row->phone2 = $request->phone2;
        $row->email1 = $request->email1;
        $row->email2 = $request->email2;
        $row->activity_id = $request->activity_id;
        $row->owner_name = $request->owner_name;
        $row->owner_phone = $request->owner_phone;
        $row->ceo_name = $request->ceo_name;
        $row->ceo_phone = $request->ceo_phone;
        $row->commercial_file = $request->commercial_file;
        $row->maroof_id = $request->maroof_id;
        $row->lat = $request->lat;
        $row->lng = $request->lng;
        $row->is_active = $request->is_active;
        $row->expire_date = $request->expire_date;
        $row->delivery_price = $request->delivery_price;
        $row->save();

        $company_user = CompanyUser::where('company_id', $row->id)->first();
        $company_user->name = $row->title_ar;
        $company_user->email = $row->email1;
        $company_user->phone = $row->phone1;
        $company_user->password = $row->password;
        $company_user->is_active = $row->is_active;
        $company_user->save();

        return redirect(route('company'))->with('message', 'تم التعديل بنجاح')->with('status', 'success');
    }

    public function destroy(Request $request)
    {

        try {
            Company::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }

}

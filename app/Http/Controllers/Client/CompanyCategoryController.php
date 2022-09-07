<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Company;
use App\Models\CompanyCategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use Validator;

class CompanyCategoryController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        $data = Auth::guard('client')->user();
        return view('client.category.index', compact('data'));
    }

    public function datatable(Request $request, $company_id)
    {
        $data = CompanyCategory::where('company_id', $company_id)->orderBy('id', 'asc');
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
                $photo .= ' <a class="d-block overlay h-100" data-fslightbox="lightbox-hot-sales" target="_blank" href="' . $row->image . '">
                            <!--begin::Image-->
                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-75px h-100" style="background-image:url(' . $row->image . ')"></div>
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
            ->editColumn('company_id', function ($row) {
                $phone = '';
                $phone .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->Company->title . '</span>';
                return $phone;
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("client/edit-company_category/" . $row->id) . '" class="btn btn-icon btn-light-info"><i class="bi bi-pencil-fill"></i> </a>';
                return $actions;

            })
            ->rawColumns(['checkbox', 'image', 'title_ar', 'company_id', 'actions'])
            ->make();

    }

    public function button($id)
    {

        $query['data'] = Company::findOrFail($id);
        return view('client/category/button', $query);
    }


    public function store(Request $request)
    {
        $rule = [
            'company_id' => 'required|exists:companies,id',
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',

        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        $data = CompanyCategory::create([
            'company_id' => $request->company_id,
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'image' => $request->image,

        ]);
        return redirect(url('client/client-company_category'))->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
    }


    public function edit($id)
    {

        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = CompanyCategory::whereId($id)->with('Company')->firstOrFail();
        return view('client.category.edit', $query);
    }

    public function update(Request $request)
    {

        $rule = [

            'id' => 'required|exists:company_categories,id',
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        $data = CompanyCategory::where('id', $request->id)->firstOrFail();
        $data->title_ar = $request->title_ar;
        $data->title_en = $request->title_en;
        if ($request->image) {
            $data->image = $request->image;
        }
        $data->save();


        return redirect(url('client/client-company_category/' . $data->company_id))->with('message', 'تم التعديل بنجاح')->with('status', 'success');
    }

    public function destroy(Request $request)
    {

        try {
            CompanyCategory::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }

}

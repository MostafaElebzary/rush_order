<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use Validator;

class BranchController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }


    public function datatable(Request $request, $company_id)
    {
        $data = Branch::where('company_id', $company_id)->orderBy('id', 'asc');
        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('title', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->title_ar . '</span>
                                   <br> <small class="text-gray-600">' . $row->title_en . '</small>';
                return $name;
            })
            ->editColumn('city', function ($row) {
                $phone = '';
                $phone .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->City ? $row->City->name : "-" . '</span>';
                return $phone;
            })->editColumn('delivery_time', function ($row) {
                $phone = '';
                $phone .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->delivery_time . '</span>';
                return $phone;
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("admin/edit-branch/" . $row->id) . '" class="btn btn-icon btn-light-info"><i class="bi bi-pencil-fill"></i> </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'title', 'checkbox', 'city', 'delivery_time'])
            ->make();

    }

    public function store(Request $request)
    {
        $rule = [
            'company_id' => 'required|exists:companies,id',
            'lat' => 'nullable|string',
            'lng' => 'nullable|string',
            'city_id' => 'required|exists:city,id',
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'delivery_time' => 'required',

        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        $data = Branch::create([
            'company_id' => $request->company_id,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'city_id' => $request->city_id,
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'delivery_time' => $request->delivery_time,

        ]);
        return redirect()->back()->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
    }

    public function button($id)
    {

        $query['data'] = Company::findOrFail($id);
        return view('admin/company/branch/button', $query);
    }

    public function show($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Branch::whereId($id)->with('Company')->firstOrFail();
        return view('admin.user.show', $query);
    }

    public function edit($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Branch::whereId($id)->with('Company')->firstOrFail();
        return view('admin.company.branch.edit', $query);
    }

    public function update(Request $request)
    {

        $rule = [

            'id' => 'required|exists:branches,id',
            'lat' => 'nullable|string',
            'lng' => 'nullable|string',
            'city_id' => 'required|exists:city,id',
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'delivery_time' => 'required',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        $data = Branch::where('id', $request->id)->update([
            'lat' => $request->lat,
            'lng' => $request->lng,
            'city_id' => $request->city_id,
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'delivery_time' => $request->delivery_time,

        ]);

        return redirect(url('admin/edit-company/' . $request->id))->with('message', 'تم التعديل بنجاح')->with('status', 'success');
    }

    public function destroy(Request $request)
    {
        try {
            Branch::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }

}

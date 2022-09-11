<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Company;
use App\Models\CompanyCategory;
use App\Models\CompanyWorkTime;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use Validator;

class CompanyWorksTimeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        $data = Auth::guard('client')->user();
        return view('client.works_time.index', compact('data'));
    }

    public function datatable(Request $request, $company_id)
    {
        $data = CompanyWorkTime::where('company_id', $company_id)->orderBy('id', 'asc');
        return Datatables::of($data)
            ->editColumn('day', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->day . '</span>';
                return $name;
            })->editColumn('open_time', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->open_time . '</span>';
                return $name;
            })->editColumn('close_time', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->close_time . '</span>';
                return $name;
            })
            ->editColumn('company_id', function ($row) {
                $phone = '';
                $phone .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->Company->title . '</span>';
                return $phone;
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("client/edit-company_works_time/" . $row->id) . '" class="btn btn-icon btn-light-info"><i class="bi bi-pencil-fill"></i> </a>';
                return $actions;

            })
            ->rawColumns(['day', 'open_time', 'close_time', 'company_id', 'actions'])
            ->make();

    }




    public function edit($id)
    {

        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = CompanyWorkTime::whereId($id)->with('Company')->firstOrFail();
        return view('client.works_time.edit', $query);
    }

    public function update(Request $request)
    {


        $rule = [

            'id' => 'required|exists:company_work_times,id',
            'open_time' => 'required',
            'close_time' => 'required',

        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        $data = CompanyWorkTime::where('id', $request->id)->firstOrFail();
        $data->open_time = $request->open_time;
        $data->close_time = $request->close_time;

        $data->save();


        return redirect(url('client/client-company_works_time/'))->with('message', 'تم التعديل بنجاح')->with('status', 'success');
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

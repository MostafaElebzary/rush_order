<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Copoun;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use Validator;

class CopounController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        // $query['data'] = Admin::orderBy('id','desc')->get();
        // $query['data'] = Admin::orderBy('id','desc')->paginate(10);

        return view('admin.copoun.index');
    }

    public function datatable(Request $request)
    {
        $data = Copoun::orderBy('id', 'asc');
        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('code', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->code . '</span>';
                return $name;
            })->editColumn('usage_count', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->usage_count . '</span>';
                return $name;
            })
            ->editColumn('from_date', function ($row) {
                $phone = '';
                $phone .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->from_date . '</span>';
                return $phone;
            })->editColumn('to_date', function ($row) {
                $phone = '';
                $phone .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->to_date . '</span>';
                return $phone;
            })->editColumn('amount', function ($row) {
                $phone = '';
                $phone .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->amount . '</span>';
                return $phone;
            })
            ->editColumn('active', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">مفعل</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">غير مفعل</div>';
                if ($row->active == 1) {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })->editColumn('discount_type', function ($row) {
                $amount = '<div class="badge badge-light-success fw-bolder">مبلغ $</div>';
                $ratio = '<div class="badge badge-light-primary fw-bolder">نسبة %</div>';
                if ($row->discount_type == "Ratio") {
                    return $ratio;
                } else {
                    return $amount;
                }
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("admin/edit-copoun/" . $row->id) . '" class="btn btn-icon btn-light-info"><i class="bi bi-pencil-fill"></i> </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'code', 'from_date', 'to_date', 'amount', 'discount_type', 'usage_count', 'active'])
            ->make();

    }

    public function store(Request $request)
    {
        $rule = [
            'code' => 'required|unique|string',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'amount' => 'required|numeric',
            'discount_type' => 'required|in:Ratio,Amount',
            'active' => 'required|in:0,1',


        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        $data = Copoun::create([
            'code' => $request->code,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'amount' => $request->amount,
            'discount_type' => $request->discount_type,
            'active' => $request->active,

        ]);
        return redirect()->back()->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
    }


    public function edit($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Copoun::findOrFail($id);
        return view('admin.copoun.edit', $query);
    }

    public function update(Request $request)
    {

        $rule = [

            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'amount' => 'required|numeric',
            'discount_type' => 'required|in:Ratio,Amount',
            'active' => 'required|in:0,1',
            'code' => 'required|string|unique:copouns,code,' . $request->id,

        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        $data = Copoun::where('id', $request->id)->update([
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'amount' => $request->amount,
            'discount_type' => $request->discount_type,
            'active' => $request->active,
            'code' => $request->code,

        ]);

        return redirect(route('copouns'))->with('message', 'تم التعديل بنجاح')->with('status', 'success');
    }

    public function destroy(Request $request)
    {


        try {
            Copoun::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }

}

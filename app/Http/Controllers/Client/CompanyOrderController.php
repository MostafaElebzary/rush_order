<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Company;
use App\Models\CompanyCategory;
use App\Models\CompanyProduct;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use Validator;

class CompanyOrderController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        $data = Auth::guard('client')->user();
        return view('client.orders.index', compact('data'));
    }

    public function datatable(Request $request, $company_id)
    {

        $data = Order::where('company_id', $company_id)->with('User')->orderBy('id', 'asc');

//        if (Client_type() != "Manager") {
//            $data = $data->where('branch_id', Auth::guard('client')->user()->branch_id);
//        }

        return Datatables::of($data)
            ->editColumn('id', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->id . '</span>';
                return $name;
            })
            ->editColumn('user_name', function ($row) {
                $phone = '';
                $phone .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->user_name . '</span>';
                return $phone;
            })->editColumn('phone', function ($row) {
                $phone = '';
                $phone .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->User ? $row->User->phone : "--"
                    . '</span>';
                return $phone;
            })
            ->editColumn('total_price', function ($row) {
                $phone = '';
                $phone .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->total_price . '</span>';
                return $phone;
            })
            ->editColumn('status', function ($row) {
                $pending = '<div class="badge badge-light-success fw-bolder">فى الانتظار</div>';
                $accepted = '<div class="badge badge-light-success fw-bolder">تم القبول</div>';
                $processing = '<div class="badge badge-light-success fw-bolder">جارى تنفيذ الطلب</div>';
                $delivered = '<div class="badge badge-light-success fw-bolder">تم توصيل الطلب</div>';
                $cancelled = '<div class="badge badge-light-danger fw-bolder">تم الالغاء</div>';
                if ($row->status == 0) {
                    return $pending;
                } elseif ($row->status == 1) {
                    return $accepted;
                } elseif ($row->status == 2) {
                    return $processing;
                } elseif ($row->status == 3) {
                    return $delivered;
                } elseif ($row->status == 4) {
                    return $cancelled;
                }
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("client/show-client-company_order/" . $row->id) . '" class="btn btn-icon btn-light-warning"><i class="bi bi-eye-fill"></i> </a>';
                return $actions;

            })
            ->rawColumns(['id', 'user_name', 'phone', 'total_price', 'status', 'actions'])
            ->make();

    }

    public function show($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Order::whereId($id)->with('OrderProducts')->firstOrFail();

        return view('client.orders.edit', $query);
    }

    public function AddToBranch(Request $request)
    {
        $rule = [
            'id' => 'required',
            'branch_id' => 'required',

        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $order = Order::whereId($request->id)->firstOrFail();
        $order->branch_id = $request->branch_id;
        $order->status = 1;
        $order->save();

        return redirect()->back()->with('message', 'تم التعيين بنجاح')->with('status', 'success');
    }

    public function ChangeStatus(Request $request)
    {
        $rule = [
            'id' => 'required',
            'status' => 'required|in:0,1,2,3,4',

        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $order = Order::whereId($request->id)->firstOrFail();
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('message', 'تم التعيين بنجاح')->with('status', 'success');
    }

}

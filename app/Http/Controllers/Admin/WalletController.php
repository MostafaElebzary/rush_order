<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Copoun;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use Validator;

class WalletController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        // $query['data'] = Admin::orderBy('id','desc')->get();
        // $query['data'] = Admin::orderBy('id','desc')->paginate(10);

        return view('admin.wallet.index');
    }

    public function datatable(Request $request)
    {
        $data = Wallet::orderBy('id', 'asc');
        if ($request->company_id) {
            $data = $data->where('company_id', Client_Company_Id());
        }
        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('price', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->price . '</span>';
                return $name;
            })->editColumn('company_id', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->Company ? $row->Company->title : '--' . '</span>';
                return $name;
            })->editColumn('order_id', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->order_id . '</span>';
                return $name;
            })->editColumn('description', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->description . '</span>';
                return $name;
            })->editColumn('created_at', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . Carbon::parse($row->created_at)->translatedFormat("Y-m-d h:i a") . '</span>';
                return $name;
            })
            ->editColumn('type', function ($row) {
                $deposit = '<div class="badge badge-light-success fw-bolder">ايداع</div>';
                $withdrawal = '<div class="badge badge-light-danger fw-bolder">سحب</div>';
                if ($row->type == "deposit") {
                    return $deposit;
                } else {
                    return $withdrawal;
                }
            })
            ->rawColumns(['checkbox', 'price', 'company_id', 'order_id', 'type', 'created_at', 'description'])
            ->make();

    }


}

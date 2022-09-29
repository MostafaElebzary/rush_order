<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Company;
use App\Models\CompanyCategory;
use App\Models\CompanyProduct;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
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


    public function datatable(Request $request, $company_id)
    {
        $data = Order::where('company_id', $company_id)->with('User')->orderBy('id', 'asc');
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
                $actions = ' <a href="' . url("admin/show-company_order/" . $row->id) . '" class="btn btn-icon btn-light-warning"><i class="bi bi-eye-fill"></i> </a>';
                return $actions;

            })
            ->rawColumns(['id', 'user_name', 'phone', 'total_price', 'status', 'actions'])
            ->make();

    }


    public function show($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Order::whereId($id)->with('OrderProducts')->firstOrFail();

        $total_vat = $query['data']->total_price * .15;
        $generatedString = [
            $this->toString($query['data']->Company->title_ar, '1'),
            $this->toString("123456789456123", '2'),
            $this->toString($query['data']->created_at, '3'),
            $this->toString($query['data']->total_price, '4'),
            $this->toString($total_vat, '5'),
        ];

        $query['qrcode'] = QrCode::size(150)->generate($this->toBase64($generatedString));

        return view('admin.company.order.edit', $query);
    }

    public function toBase64($value): string
    {
        return base64_encode($this->toTLV($value));
    }

    public function toTLV($value): string
    {
        return implode('', $value);
    }

    public function toString($value, $tag)
    {
        $value = (string)$value;

        return $this->toHex($tag) . $this->toHex($this->getLength($value)) . ($value);
    }

    protected function toHex($value)
    {
        return pack("H*", sprintf("%02X", $value));
    }

    public function getLength($value)
    {
        return strlen($value);
    }

}

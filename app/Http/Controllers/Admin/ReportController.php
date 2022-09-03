<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function OrderReport(Request $request)
    {
        if ($request->from && $request->to) {
            $from = $request->from;
            $to = $request->to;
        } else {
            $from = Carbon::now();
            $to = Carbon::now()->endOfMonth();
        }
        $order = Order::whereBetween('created_at', [$from, $to]);
        $count = $order->count();
        $total_price = $order->sum('total_price');
        $delivery_price = $order->sum('delivery_price');
        $most_sell_company = Order::select('company_id', DB::raw('count(*) as total'))
            ->groupBy('company_id')
            ->orderBy('total', 'DESC')
            ->first();
        $from = Carbon::parse($from)->format("Y-m-d");
        $to = Carbon::parse($to)->format("Y-m-d");
        $canceled = $order->where('status',4)->count();
        $most_sell_product = OrderProduct::select('company_product_id', DB::raw('count(*) as total'))
            ->groupBy('company_product_id')
            ->orderBy('total', 'DESC')
            ->first();
        return view('admin.reports.order', get_defined_vars());

    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Company;
use App\Models\Copoun;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\User;
use App\Models\UserAddress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function PlaceOrder(Request $request)
    {
        $jwt = ($request->hasHeader('jwt') ? $request->header('jwt') : "");
        $user = check_jwt($jwt);
        if ($user) {
            $rule = [
                'company_id' => 'required|exists:companies,id',
                'user_address_id' => 'required|exists:user_addresses,id',
                'payment_type' => 'required|in:Cash,Online',
                'deliver_type' => 'required|in:Delivery,OnSite,ByCar',
                'car_type' => 'required_if:deliver_type,ByCar',
                'car_color' => 'required_if:deliver_type,ByCar',
                'car_num' => 'required_if:deliver_type,ByCar',
                'car_notes' => 'nullable',
                'copoun_code' => 'nullable|exists:copouns,code',
            ];

            $validate = Validator::make($request->all(), $rule);
            if ($validate->fails()) {
                return response()->json(msg(failed(), $validate->messages()->first()));
            }

            $total = cart_sum($request->company_id, $user->id);
            $tax = cart_sum($request->company_id, $user->id) * taxs() / 100;
            $sub_total = $total + $tax;
            if ($request->copoun_code) {
                $copoun = Copoun::where('code', $request->copoun_code)->first();
                $startDate = Carbon::createFromFormat('Y-m-d', $copoun->from_date);
                $endDate = Carbon::createFromFormat('Y-m-d', $copoun->to_date);
                $check = Carbon::now()->between($startDate, $endDate);
                if ($check) {
                    if ($copoun->discount_type == "Ratio") {
                        $sub_total = $sub_total - $sub_total * $copoun->amount / 100;
                    } else {
                        $sub_total = $sub_total - $copoun->amount;
                    }

                } else {
                    return msg(failed(), trans('lang.coupon_expired'));
                }
            }
            $user_address = UserAddress::whereId($request->user_address_id)->first();
            $company = Company::whereId($request->company_id)->first();
            $carts = Cart::where('user_id', $user->id)
                ->where('company_id', $request->company_id)->get();
            if ($carts->count() == 0) {
                return msg(failed(), trans('lang.cart_empty'));
            }
            $order = Order::create([
                'user_id' => $user->id,
                'company_id' => $request->company_id,
                'user_name' => $user->first_name . "  " . $user->last_name,
                'user_state' => null,
                'user_city' => null,
                'user_address' => $user_address->address,
                'user_address_id' => $request->user_address_id,
                'payment_type' => $request->payment_type,
                'delivery_price' => $company->delivery_price,
                'order_price' => $sub_total,
                'total_price' => $sub_total + $company->delivery_price,
                'deliver_type' => $request->deliver_type,
                'car_type' => $request->car_type,
                'car_color' => $request->car_color,
                'car_num' => $request->car_num,
                'car_notes' => $request->car_notes,
            ]);


            foreach ($carts as $cart) {

                OrderProduct::create([
                    'order_id' => $order->id,
                    'company_product_id' => $cart->product_id,
                    'price' => $cart->price,
                    'qty' => $cart->qty,
                    'attributes' => json_encode($cart->getOriginal('attributes')),
                    'additions' => json_encode($cart->getOriginal('additions')),
                    'drinks' => json_encode($cart->getOriginal('drinks')),
                ]);
            }

//            empty cart
            Cart::where('user_id', $user->id)
                ->where('company_id', $request->company_id)->delete();
            $data = Order::whereId($order->id)->with(['Company', 'OrderProducts'])->first();

            return response()->json(msgdata(success(), trans('lang.success'), $data));

        }
        return msg(failed(), trans('lang.not_authorized'));
    }
}

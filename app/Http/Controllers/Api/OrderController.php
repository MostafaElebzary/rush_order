<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyOrderResources;
use App\Http\Resources\OrderResources;
use App\Models\Cart;
use App\Models\Company;
use App\Models\Copoun;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\Wallet;
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
            if ($request->deliver_type == "Delivery") {
                $delivery_price = $company->delivery_price;
            } else {
                $delivery_price = 0;
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
                'delivery_price' => $delivery_price,
                'order_price' => $sub_total,
                'total_price' => $sub_total + $company->delivery_price,
                'deliver_type' => $request->deliver_type,
                'car_type' => $request->car_type,
                'car_color' => $request->car_color,
                'car_num' => $request->car_num,
                'car_notes' => $request->car_notes,
            ]);
            if (notification_setting(1)) {

                if ($request->deliver_type == "Delivery") {
                    send($user->fcm_token, notification_setting(2)->title, notification_setting(2)->body);
                } elseif ($request->deliver_type == "ByCar") {
                    send($user->fcm_token, notification_setting(3)->title, notification_setting(3)->body);
                } else //on site
                {
                    send($user->fcm_token, notification_setting(4)->title, notification_setting(4)->body);
                }
            }

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

            return response()->json(msg(success(), trans('lang.success')));

        }
        return msg(failed(), trans('lang.not_authorized'));
    }


    public function getcopoun(Request $request, $id)
    {
        $jwt = ($request->hasHeader('jwt') ? $request->header('jwt') : "");
        $user = check_jwt($jwt);
        if ($user) {

            $copoun = Copoun::where('code', $id)->first();
            if (!$copoun) {
                return msg(not_found(), trans('lang.not_found'));
            } else {
                return response()->json(msgdata(success(), trans('lang.success'), $copoun));
            }

        } else {
            return msg(failed(), trans('lang.not_authorized'));
        }

    }

    public function getOrders(Request $request)
    {
        $jwt = ($request->hasHeader('jwt') ? $request->header('jwt') : "");
        $user = check_jwt($jwt);
        if ($user) {

            $orders = Order::where('user_id', $user->id)->with('Company')->with('OrderProducts');
            if ($request->status) {
                $orders = $orders->where('status', $request->status);
            }
            $orders = $orders->paginate(10);
            $data = OrderResources::collection($orders)->response()->getData(true);
            return response()->json(msgdata(success(), trans('lang.success'), $data));
        }
        return msg(failed(), trans('lang.not_authorized'));
    }

    public function getOrdersTap(Request $request)
    {
        $jwt = ($request->hasHeader('jwt') ? $request->header('jwt') : "");
        $user = check_jwt($jwt);
        if ($user) {

            $orders = Order::where('user_id', $user->id)->with('Company')->with('OrderProducts')->orderBy('id', 'desc');
            if ($request->status == "new") {
                $orders = $orders->whereIn('status', [0, 1, 2]);
            } else {
                $orders = $orders->whereIn('status', [3, 4]);
            }
            $orders = $orders->paginate(10);
            $data = OrderResources::collection($orders)->response()->getData(true);
            return response()->json(msgdata(success(), trans('lang.success'), $data));
        }
        return msg(failed(), trans('lang.not_authorized'));
    }

    public function deleteOrder(Request $request, $id)
    {
        $jwt = ($request->hasHeader('jwt') ? $request->header('jwt') : "");
        $user = check_jwt($jwt);
        if ($user) {

            $orders = Order::whereId($id)->first();
            if ($orders) {
                $orders->delete();
            } else {
                return response()->json(msg(not_found(), trans('lang.not_found')));
            }

            return response()->json(msg(success(), trans('lang.success')));
        }
        return msg(failed(), trans('lang.not_authorized'));
    }
}

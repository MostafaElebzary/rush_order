<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Http\Resources\CompanyCartResource;
use App\Models\Cart;
use App\Models\Company;
use App\Models\CompanyProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function AddToCart(Request $request)
    {
        $jwt = ($request->hasHeader('jwt') ? $request->header('jwt') : "");
        $user = check_jwt($jwt);
        if ($user) {
            $rule = [
                'product_id' => 'required|exists:company_products,id',
                'qty' => 'required|numeric',
                'attribute' => 'nullable',
                'additions' => 'nullable',
                'drinks' => 'nullable',
                'notes' => 'nullable',

            ];

            $validate = Validator::make($request->all(), $rule);
            if ($validate->fails()) {
                return response()->json(msg(failed(), $validate->messages()->first()));
            }
            $product = CompanyProduct::where('id', $request->product_id)->first();
            if ($request->attribute != null || $request->additions != null || $request->drinks != null) {
//                every quantity will be alone in db
                for ($i = 0; $i < $request->qty; $i++) {
                    Cart::create([
                        'user_id' => $user->id,
                        'company_id' => $product->company_id,
                        'product_id' => $product->id,
                        'qty' => 1,
                        'attributes' => json_encode($request->attribute),
                        'additions' => json_encode($request->additions),
                        'drinks' => json_encode($request->drinks),
                        'notes' => $request->notes,
                    ]);
                }
            } else {
                $cart = Cart::where('user_id', $user->id)->where('product_id', $product->id)
                    ->whereNull('attributes')
                    ->whereNull('additions')
                    ->whereNull('drinks')
                    ->first();
                if (!$cart) {
                    Cart::create([
                        'user_id' => $user->id,
                        'company_id' => $product->company_id,
                        'product_id' => $product->id,
                        'qty' => $request->qty,
                        'attributes' => null,
                        'additions' => null,
                        'drinks' => null,
                        'notes' => $request->notes,
                    ]);
                } else {
                    $cart->qty += $request->qty;
                    $cart->save();
                }
            }
            return response()->json(msg(success(), trans('lang.success')));
        } else {
            return msg(failed(), trans('lang.not_authorized'));
        }

    }

    public function getCart(Request $request)
    {
        $jwt = ($request->hasHeader('jwt') ? $request->header('jwt') : "");
        $user = check_jwt($jwt);
        if ($user) {
//            $data = Cart::where('user_id', $user->id)->with(['Company', 'CompanyProduct'])->get();
//            $data = CartResource::collection($data)->collection->groupBy('company_id')->values();
            $companies = Company::whereHas('carts', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })->with('carts')->get();
            $data = CompanyCartResource::customCollection($companies, $user->id);
            return response()->json(msgdata(success(), trans('lang.success'), $data));
        }
        return msg(failed(), trans('lang.not_authorized'));
    }

    public function deleteCart(Request $request, $id)
    {
        $jwt = ($request->hasHeader('jwt') ? $request->header('jwt') : "");
        $user = check_jwt($jwt);
        if ($user) {
            $cart = Cart::where('id', $id)->first();
            if ($cart) {
                $cart->delete();
                return response()->json(msg(success(), trans('lang.success')));
            } else {
                return msg(not_found(), trans('lang.not_found'));
            }
        }
        return msg(failed(), trans('lang.not_authorized'));
    }

    public function UpdateCart(Request $request)
    {
        $jwt = ($request->hasHeader('jwt') ? $request->header('jwt') : "");
        $user = check_jwt($jwt);
        if ($user) {
            $rule = [
                'id' => 'required|exists:carts,id',
                'attribute' => 'nullable',
                'additions' => 'nullable',
                'drinks' => 'nullable',
                'notes' => 'nullable',
            ];

            $validate = Validator::make($request->all(), $rule);
            if ($validate->fails()) {
                return response()->json(msg(failed(), $validate->messages()->first()));
            }
            $cart = Cart::where('id', $request->id)->update([
                'qty' => 1,
                'attributes' => json_encode($request->attribute),
                'additions' => json_encode($request->additions),
                'drinks' => json_encode($request->drinks),
                'notes' => $request->notes,
            ]);
            $data = Cart::where('id', $request->id)->first();
            $data = new CartResource($data);
            return response()->json(msgdata(success(), trans('lang.success'), $data));
        } else {
            return msg(failed(), trans('lang.not_authorized'));
        }

    }

    public function AddQty(Request $request, $id)
    {
        $jwt = ($request->hasHeader('jwt') ? $request->header('jwt') : "");
        $user = check_jwt($jwt);
        if ($user) {
            $cart = Cart::whereId($id)->first();
            if (!$cart) {
                return msg(not_found(), trans('lang.not_found'));
            }
            if ($cart->attributes != null || $cart->additions != null || $cart->drinks != null) {
                $data = Cart::create([
                    'user_id' => $user->id,
                    'company_id' => $cart->company_id,
                    'product_id' => $cart->product_id,
                    'qty' => 1,
                    'attributes' => json_encode($cart->attributes),
                    'additions' => json_encode($cart->additions),
                    'drinks' => json_encode($cart->drinks),
                    'notes' => $request->notes,
                ]);
            } else {
                $cart->qty += 1;
                $cart->save();
                $data = Cart::where('id', $id)->first();

            }
            $data = new CartResource($data);
            return response()->json(msgdata(success(), trans('lang.success'), $data));
        } else {
            return msg(failed(), trans('lang.not_authorized'));
        }

    }

    public function DecreaseQty(Request $request, $id)
    {
        $jwt = ($request->hasHeader('jwt') ? $request->header('jwt') : "");
        $user = check_jwt($jwt);
        if ($user) {
            $cart = Cart::whereId($id)->first();
            if (!$cart) {
                return msg(not_found(), trans('lang.not_found'));
            }
            if ($cart->qty > 1) {
                $cart->qty -= 1;
                $cart->save();
                $data = Cart::where('id', $id)->first();
                $data = new CartResource($data);
                return response()->json(msgdata(success(), trans('lang.success'), $data));
            } else {
                return msg(failed(), trans('lang.cannot_decrease'));
            }

//            }
        } else {
            return msg(failed(), trans('lang.not_authorized'));
        }

    }

}

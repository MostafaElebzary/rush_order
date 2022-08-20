<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserAddressController extends Controller
{
    public function UserAddresses(Request $request)
    {
        $jwt = ($request->hasHeader('jwt') ? $request->header('jwt') : "");
        $user = check_jwt($jwt);
        if ($user) {
            $data = UserAddress::where('user_id', $user->id)->orderBy('is_default', 'desc')->get();
            return response()->json(msgdata(success(), trans('lang.success'), $data));
        } else {
            return msg(failed(), trans('lang.not_authorized'));
        }
    }

    public function changeUserAddressStatus(Request $request, $id)
    {
        $jwt = ($request->hasHeader('jwt') ? $request->header('jwt') : "");
        $user = check_jwt($jwt);
        if ($user) {
            $address = UserAddress::whereId($id)->first();
            if (!$address) {
                return msg(not_found(), trans('lang.not_found'));
            }
            if ($address->is_default == 0) {
                $address->is_default = 1;
            } else {
                $address->is_default = 0;
            }
            $address->save();
            return response()->json(msgdata(success(), trans('lang.success'), $address));
        } else {
            return msg(failed(), trans('lang.not_authorized'));
        }
    }

    public function deleteUserAddress(Request $request, $id)
    {
        $jwt = ($request->hasHeader('jwt') ? $request->header('jwt') : "");
        $user = check_jwt($jwt);
        if ($user) {
            $address = UserAddress::whereId($id)->first();
            if (!$address) {
                return msg(not_found(), trans('lang.not_found'));
            }
            $address->delete();
            return response()->json(msg(success(), trans('lang.success')));
        } else {
            return msg(failed(), trans('lang.not_authorized'));
        }
    }

    public function AddUserAddress(Request $request)
    {
        $jwt = ($request->hasHeader('jwt') ? $request->header('jwt') : "");
        $user = check_jwt($jwt);
        if ($user) {
            $rule = [
                'address' => 'required',
                'description' => 'required',
                'lat' => 'nullable',
                'lng' => 'nullable',

            ];

            $validate = Validator::make($request->all(), $rule);
            if ($validate->fails()) {
                return response()->json(msg(failed(), $validate->messages()->first()));
            }
            $data = UserAddress::create([
                'address' => $request->address,
                'description' => $request->description,
                'lat' => $request->lat,
                'lng' => $request->lng,
                'user_id' => $user->id
            ]);

            return response()->json(msgdata(success(), trans('lang.success'), $data));
        } else {
            return msg(failed(), trans('lang.not_authorized'));
        }
    }
}

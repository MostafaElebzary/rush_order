<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function Settings(Request $request)
    {
        $data = Setting::query();
        if ($request->key) {
            $data = $data->where('key', $request->key);
        }
        $data = $data->get();
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }

    public function ContactUs(Request $request)
    {

        $rule = [
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'required',
            'msg' => 'required|string',

        ];

        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return response()->json(msg(failed(), $validate->messages()->first()));
        }
        $data = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'msg' => $request->msg,

        ]);

        return response()->json(msgdata(success(), trans('lang.success'), $data));

    }
}

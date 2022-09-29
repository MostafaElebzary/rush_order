<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\UserResource;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function CheckCode(Request $request)
    {
        $data = $request->all();
        $validate = Validator::make($data, [
            'phone' => 'required|regex:/(966)[0-9]{8}/',
            'code' => 'required|min:4'
        ]);
        if ($validate->fails()) {
            return response()->json(msg(failed(), $validate->messages()->first()));
        }

//        $ch = curl_init();
//        $url = "https://www.enjazsms.com/api/sendsms.php";
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, "username=fs4host&password=544566&message=كود التحقق : " . $request->recode . "&numbers=" . $request->phone . "&sender=iGold&unicode=E&return=full"); // define what you want to post
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        $output = curl_exec($ch);
//        curl_close($ch);

        return response()->json(msg(success(), trans('lang.success')));

    }

    public function Register(Request $request)
    {


        $rule = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|regex:/(966)[0-9]{8}/|unique:users',
            'password' => 'required|min:6',
            'fcm_token' => 'nullable'
        ];

        $validate = Validator::make($request->all(), $rule);

        if ($validate->fails()) {
            return response()->json(msg(failed(), $validate->messages()->first()));

        } else {


            $data = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => $request->password,
                'fcm_token' => $request->fcm_token,
                'jwt' => Str::random(60),
                'is_active' => 1

            ]);
            if (notification_setting(1)) {

                send($request->fcm_token, notification_setting(1)->title, notification_setting(1)->body);
            }
            if ($data) {
                return $this->get_profile($data->id);
            } else {
                return response()->json(msg(not_found(), trans('lang.not_found')));

            }

        }

    }

    public function login(Request $request)
    {
        $rule = [
            'phone' => 'required|regex:/(966)[0-9]{8}/',
            'password' => 'required|min:6',
            'fcm_token' => 'nullable'
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return response()->json(msg(failed(), $validate->messages()->first()));
        } else {
            $credentials = $request->only(['phone', 'password']);
            $token = Auth::attempt($credentials);
            //return token
            if (!$token) {
                return msg(failed(), trans('lang.not_authorized'));
            }
            $user = Auth::user();
            if ($user->is_active == 0) {
                Auth::logout();
                return msg(not_active(), trans('lang.account_un_active'));
            }
            if ($request->fcm_token) {
                User::where('id', $user->id)->update(['fcm_token' => $request->fcm_token, 'jwt' => Str::random(60)]);
            }
            return $this->get_profile($user->id);
        }

    }

    public function change_password(Request $request)
    {

        $rule = [
            'phone' => 'required|exists:users,phone',
            'password' => 'required|min:6'
        ];

        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return response()->json(msg(failed(), $validate->messages()->first()));
        } else {


            if ($request->oldpassword) {
                $credentials = $request->only(['phone', 'password']);
                $token = Auth::attempt($credentials);

                if (!$token) {
                    return msg(failed(), trans('lang.not_authorized'));
                }
            }

            $data = User::where('phone', $request->phone)->first();

            if ($data) {
                $data->password = $request->password;
                $data->jwt = Str::random(60);
                $data->save();
                return $this->get_profile($data->id);

            } else {
                return response()->json(msg(not_found(), trans('lang.not_found')));

            }

        }

    }

    public function change_profile(Request $request)
    {

        $jwt = ($request->hasHeader('jwt') ? $request->header('jwt') : "");
        $user = check_jwt($jwt);
        if ($user) {
            $data = User::where('phone', $user->phone)->first();
            $data->first_name = $request->first_name;
            $data->last_name = $request->last_name;
            $data->email = $request->email;
            $data->jwt = Str::random(60);
            $data->save();
            return $this->get_profile($data->id);
        } else {
            return msg(failed(), trans('lang.not_authorized'));

        }

        $rule = [
            'phone' => 'required|exists:users,phone',
            'password' => 'required|min:6'
        ];

        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return response()->json(msg(failed(), $validate->messages()->first()));
        } else {
            $data = User::where('phone', $request->phone)->first();

            if ($data) {
                $data->password = $request->password;
                $data->jwt = Str::random(60);
                $data->save();
                return $this->get_profile($data->id);

            } else {
                return response()->json(msg(not_found(), trans('lang.not_found')));

            }

        }

    }

    public function get_profile($id)
    {
        $data = User::where('id', $id)->with('Notifications')->first();
        if (!$data) {
            return response()->json(msg(not_found(), trans('lang.not_found')));
        } else {
            $data = new UserResource($data);
            return response()->json(msgdata(success(), trans('lang.success'), $data));
        }
    }

    public function get_profile_data(Request $request)
    {
        $jwt = ($request->hasHeader('jwt') ? $request->header('jwt') : "");
        $user = check_jwt($jwt);
        if ($user) {
            return $this->get_profile($user->id);
        } else {
            return msg(failed(), trans('lang.not_authorized'));

        }
    }

    public function UserNotification(Request $request)
    {
        $jwt = ($request->hasHeader('jwt') ? $request->header('jwt') : "");
        $user = check_jwt($jwt);
        if ($user) {
            $data = Notification::where('user_id', $user->id)->paginate(10);
            $data = NotificationResource::collection($data)->response()->getData(true);
            return response()->json(msgdata(success(), trans('lang.success'), $data));
        } else {
            return msg(failed(), trans('lang.not_authorized'));

        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NotificationSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class NotificationSettingController extends Controller
{
    public function index()
    {
        $query['data'] = NotificationSetting::all();
        return view('admin.notification_setting.edit', $query);
    }

    public function update(Request $request)
    {

        foreach ($request->title as $key => $title) {

            NotificationSetting::whereId($key)->update([
                'title' => $title
            ]);
        }
        foreach ($request->body as $key2 => $body) {
            NotificationSetting::whereId($key2)->update([
                'body' => $body
            ]);
        }
        foreach ($request->is_active as $key3 => $is_active) {
            NotificationSetting::whereId($key3)->update([
                'is_active' => $is_active
            ]);
        }

        return redirect()->back()->with('message', 'تم التعديل بنجاح')->with('status', 'success');

    }

    public function UsersSendNotification(Request $request)
    {

        $rule = [
            'title' => 'required|string',
            'body' => 'required|string',

        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

//        todo::sendNotification
        $users_tokens = User::all()->pluck('fcm_token')->toArray();
        send($users_tokens, $request->title, $request->body);

        return redirect()->back()->with('message', 'تم الارسال  بنجاح')->with('status', 'success');
    }
}

<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:client')->except('logout');
    }
    public function showLoginForm()
    {
        return view('client.login');
    }

    public function login(Request $request)
    {
        $messages = [
            'email' => 'Email tarek required!',
            'password' => 'Password mandour required!'
        ];

        // Validate form data
        $validates = $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ],[], $messages);

        $query = Client::where('email', $request->email)->first();



        if ($query) {
            if ($query->is_active != 1) {
                session()->flash('msg', 'عفوا .. الحساب غير مفعل');
                return redirect()->back()->withInput($request->only('email','remember'));
            }

            // Attempt to log the user in
            if( Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1], $request->remember))
            {
                return redirect()->intended(route('client.blank'));
            }
        } else {
            session()->flash('msg', 'لا يوجد حساب لهذا المستخدم');
            return redirect()->back()->withInput($request->only('email','remember'));
        }

        // if unsuccessful
        return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout(Request $request) {
        Auth::guard('client')->logout();

        return redirect(url('client/login'));
    }


}

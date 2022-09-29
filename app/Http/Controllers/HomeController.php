<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Slider;
use App\Models\Client;
use App\Models\Company;
use App\Models\CompanyWorkTime;
use App\Models\Setting;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('front.home');
    }

    public function create()
    {
        return view('front.create');
    }

    public function store(Request $request)
    {
        $rule = [
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'banner' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'location' => 'required',
            'phone1' => 'required|unique:companies',
            'phone2' => 'nullable|unique:companies',
            'email1' => 'required|email|unique:companies',
            'email2' => 'nullable|email|unique:companies',
            'activity_id' => 'required|exists:activities,id',
            'owner_name' => 'required',
            'owner_phone' => 'required',
            'ceo_name' => 'required',
            'ceo_phone' => 'required',
            'commercial_file' => 'required',
            'maroof_id' => 'nullable',
            'lat' => 'nullable',
            'lng' => 'nullable',
            'delivery_price' => 'required',
            'password' => 'required|min:5|confirmed',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        $data = Company::create($validate->validated());

        Client::create([
            'name' => $data->title_ar,
            'email' => $data->email1,
            'phone' => $data->phone1,
            'address' => $request->location,
            'is_active' => 0,
            'company_id' => $data->id,
            'type' => "Manager",
            'password' => $request->password,

        ]);

        $weekDays = [
            'Saturday',
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday'
        ];
        foreach ($weekDays as $day) {

            CompanyWorkTime::create([
                'company_id' => $data->id,
                'day' => $day,
                'open_time' => "09:00",
                'close_time' => "23:00",
            ]);
        }


        return redirect()->back()->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
    }

    public function getpage($id)
    {
        $query['data'] = Setting::findOrFail($id);
        if (!$query['data']) {
            return view('front.nodata' ,$query);
        }

        return view('front.page' ,$query);
    }

    public function getcompany($id)
    {
        $query['data'] = Company::find($id);
        if (!$query['data']) {
            return view('front.nodata' ,$query);
        }

        return view('front.details' ,$query);
    }

    public function contactus(Request $request)
    {
        
        $this->validate($request,[
            'name' => 'required|string',
            'phone' => 'required',
            'message' => 'required|string',
        ]);

        $data = new Contact;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->msg = $request->message;
        $data->save();
        
        if ($data) {
            return redirect()->back()->with('message', 'تم الارسال بنجاح')->with('status', 'success');
        } else {
            return redirect()->back()->with('message', 'عفوا .. لم يتم الارسال')->with('status', 'error');
        }
    }

}

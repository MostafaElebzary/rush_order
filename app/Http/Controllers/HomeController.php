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
            dd($validate->messages());
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

    public function policy () {
        $query['data'] = Page::find(3);
        return view('front.pages.policy',$query);
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
            return redirect('/#contact-section')->with('msg', 'Success');
        } else {
            return redirect('/#contact-section')->with('msg', 'Failed');
        }
    }

    public function register () {
        return view('front.pages.register');
    }

    public function registerform(Request $request)
    {
        $data = $this->validate(request(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:clients',
            'phone' => 'required|unique:clients',
            'password' => 'required',
            'city_id' => 'required',
            'name_en' => 'required|string',
            'profile_photo' => 'required|image',
            'commerical_photo' => 'required|image',
            'license_photo' => 'required|image',
            'clinic_name' => 'required|string',
            'clinic_name_en' => 'required|string',
            'clinic_num' => 'required',
            'tax_num' => 'required',
            'tax_photo' => 'required|image',
            'content' => 'required',
            'phone2' => 'required',
            'content_certificate' => 'required',
            'content_certificate_en' => 'required',
            'content_license' => 'required',
            'content_license_en' => 'required',
        ]);

        $data['password'] = Hash::make($request->password);
        $data['phone'] = $request->code . $request->phone;
        $data['phone2'] = $request->code . $request->phone2;
        $data['is_enabled'] = 0;
        
        $data = Client::create($data);

        if ($data) {
            return redirect('/register-clinic')->with('msg', 'Success');
        } else {
            return redirect('/register-clinic')->with('msg', 'Failed');
        }
    }

}

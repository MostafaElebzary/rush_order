<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use Validator;

class ContactController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        // $query['data'] = Admin::orderBy('id','desc')->get();
        // $query['data'] = Admin::orderBy('id','desc')->paginate(10);

        return view('admin.contact.index');
    }

    public function datatable(Request $request)
    {
        $data = Contact::orderBy('id', 'asc');
        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('name', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->name . '</span>';
                return $name;
            })
            ->editColumn('email', function ($row) {
                $phone = '';
                $phone .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->email . '</span>';
                return $phone;
            })->editColumn('phone', function ($row) {
                $phone = '';
                $phone .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->phone . '</span>';
                return $phone;
            })->editColumn('msg', function ($row) {
                $msg = '';
                $msg .= ' <span class="text-gray-800">' . $row->msg . '</span>';
                return $msg;
            })
            ->editColumn('type', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">شكوى</div>';
                $not_active = '<div class="badge badge-light-info fw-bolder">اقتراح</div>';
                if ($row->type == 0) {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("admin/show-user/" . $row->id) . '" class="btn btn-icon btn-light-info"><i class="bi bi-eye-fill"></i> </a>';
                return $actions;

            })
            ->rawColumns(['checkbox', 'name', 'email', 'phone', 'msg', 'type', 'actions'])
            ->make();

    }

    public function store(Request $request)
    {
        $rule = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        $data = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'image' => $request->image,
            'is_active' => $request->is_active,

        ]);
        return redirect()->back()->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
    }

    public function show($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = User::whereId($id)->with('Addresses')->firstOrFail();
        return view('admin.user.show', $query);
    }

    public function edit($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = User::findOrFail($id);
        return view('admin.user.edit', $query);
    }

    public function update(Request $request)
    {

        $rule = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'phone' => 'required|unique:users,phone,' . $request->id,
            'password' => 'nullable|min:6|confirmed',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $row = User::findOrFail($request->id);


        if ($request->password) {
            $row->password = $request->password;

        }
        if ($request->image) {
            $row->image = $request->image;

        }
        $row->save();

        $data = User::where('id', $request->id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'is_active' => $request->is_active,
        ]);

        return redirect(route('users'))->with('message', 'تم التعديل بنجاح')->with('status', 'success');
    }

    public function destroy(Request $request)
    {


        try {
            Contact::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }

}

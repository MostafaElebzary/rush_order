<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use Validator;

class ClientController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        // $query['data'] = Admin::orderBy('id','desc')->get();
        // $query['data'] = Admin::orderBy('id','desc')->paginate(10);

        return view('client.clients.index');
    }

    public function datatable(Request $request)
    {

        $data = Client::where('company_id', Auth::guard('client')->user()->company_id)
            ->orderBy('id', 'asc');
        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('photo', function ($row) {
                $photo = '';
                $photo .= ' <a class="d-block overlay h-100" data-fslightbox="lightbox-hot-sales" target="_blank" href="' . $row->image . '">
                            <!--begin::Image-->
                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-75px h-100" style="background-image:url(' . $row->image . ')"></div>
                            <!--end::Image-->
                            <!--begin::Action-->
                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                <i class="bi bi-eye-fill fs-2x text-white"></i>
                            </div>
                            <!--end::Action-->
                        </a>';
                return $photo;
            })
            ->editColumn('name', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->name . '</span>
                                   <br> <small class="text-gray-600">' . $row->email . '</small>';
                return $name;
            })
            ->editColumn('phone', function ($row) {
                $phone = '';
                $phone .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->phone . '</span>';
                return $phone;
            })
            ->editColumn('type', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">مدير</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">موظف فرع</div>';
                if ($row->type == "Manager") {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })
            ->editColumn('branch_id', function ($row) {
                $phone = '';
                if ($row->Branch) {
                    $phone .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->Branch->title . '</span>';
                }
                return $phone;
            })
            ->editColumn('is_active', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">مفعل</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">غير مفعل</div>';
                if ($row->is_active == 1) {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("client/show-client/" . $row->id) . '" class="btn btn-icon btn-light-warning"><i class="bi bi-eye-fill"></i> </a>';
                $actions .= ' <a href="' . url("client/edit-client/" . $row->id) . '" class="btn btn-icon btn-light-info"><i class="bi bi-pencil-fill"></i> </a>';
                return $actions;

            })
            ->rawColumns(['checkbox', 'photo', 'name', 'phone', 'type', 'branch_id', 'is_active', 'actions'])
            ->make();

    }

    public function store(Request $request)
    {
        $rule = [
            'name' => 'required|string',
            'profile' => 'image|mimes:png,jpg,jpeg|max:2048',
            'email' => 'nullable|email|unique:clients',
            'address' => 'nullable|string',
            'phone' => 'required|unique:clients',
            'password' => 'required|min:6|confirmed',
            'is_active' => 'required|in:0,1',
            'type' => 'required|in:Manager,Employee',
            'branch_id' => 'required_unless:type,Manager',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $data = new Client();
        $data->company_id = Client_Company_Id();
        $data->image = $request->profile;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->password = $request->password;
        $data->is_active = $request->is_active;
        $data->type = $request->type;
        if ($request->type != "Manager") {
            $data->branch_id = $request->branch_id;
        }
        $data->save();
        return redirect()->back()->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
    }

    public function show($id)
    {
        $query['data'] = Client::findOrFail($id);
        return view('client.clients.show', $query);
    }

    public function edit($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Client::findOrFail($id);
        return view('client.clients.edit', $query);
    }
    public function profile()
    {

        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Client::findOrFail(Auth::guard('client')->user()->id);
        return view('client.clients.profile', $query);
    }

    public function update(Request $request)
    {

        $rule = [
            'name' => 'required|string',
            'profile' => 'image|mimes:png,jpg,jpeg|max:2048',
            'email' => 'nullable|email|unique:clients,email,' . $request->id,
            'address' => 'nullable|string',
            'phone' => 'required|unique:clients,phone,' . $request->id,
            'password' => 'nullable|min:6|confirmed',
            'is_active' => 'required|in:0,1',
            'type' => 'required|in:Manager,Employee',
            'branch_id' => 'nullable|required_unless:type,Manager',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $data = Client::findOrFail($request->id);
        $data->company_id = Client_Company_Id();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->is_active = $request->is_active;
        $data->type = $request->type;
        if ($request->type != "Manager") {
            $data->branch_id = $request->branch_id;
        } else {
            $data->branch_id = null;
        }
        if ($request->password) {
            $data->password = $request->password;
        }
        if ($request->profile) {
            $data->image = $request->profile;
        }
        $data->save();


        return redirect(route('client.client'))->with('message', 'تم التعديل بنجاح')->with('status', 'success');
    }
    public function updateProfile(Request $request)
    {

        $rule = [
            'name' => 'required|string',
            'profile' => 'image|mimes:png,jpg,jpeg|max:2048',
            'email' => 'nullable|email|unique:clients,email,' . $request->id,
            'address' => 'nullable|string',
            'phone' => 'required|unique:clients,phone,' . $request->id,
            'password' => 'nullable|min:6|confirmed',

        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $data = Client::findOrFail($request->id);
        $data->company_id = Client_Company_Id();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->phone = $request->phone;
        if ($request->password) {
            $data->password = $request->password;
        }
        if ($request->profile) {
            $data->image = $request->profile;
        }
        $data->save();


        return redirect()->back()->with('message', 'تم التعديل بنجاح')->with('status', 'success');
    }

    public function destroy(Request $request)
    {
        try {
            Client::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }

}

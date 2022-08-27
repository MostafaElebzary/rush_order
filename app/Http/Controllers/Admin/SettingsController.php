<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Copoun;
use App\Models\Setting;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use Validator;

class SettingsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        // $query['data'] = Admin::orderBy('id','desc')->get();
        // $query['data'] = Admin::orderBy('id','desc')->paginate(10);

        return view('admin.settings.index');
    }

    public function datatable(Request $request)
    {
        $data = Setting::orderBy('id', 'asc');

        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('key', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->key . '</span>';
                return $name;
            })->editColumn('value', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-info mb-1">' . $row->value . '</span>';
                return $name;
            })->editColumn('file', function ($row) {
                $name = '-';
                if ($row->file) {
                    $name = ' <a target="_blank" href="' . $row->file . '" class="btn btn-icon btn-light-info"><i class="bi bi-file-arrow-down"></i> </a>';
                }
                return $name;
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("admin/edit-settings/" . $row->id) . '" class="btn btn-icon btn-light-info"><i class="bi bi-pencil-fill"></i> </a>';
                return $actions;
            })
            ->rawColumns(['key', 'value', 'file', 'actions', 'checkbox'])
            ->make();

    }

    public function store(Request $request)
    {
        $rule = [
            'key' => 'required|unique:settings',
            'value' => 'required',
            'file' => 'nullable',


        ];

        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        $data = Setting::create([
            'key' => $request->key,
            'value' => $request->value,
            'file' => $request->file,


        ]);
        return redirect()->back()->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
    }


    public function edit($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Setting::findOrFail($id);
        return view('admin.settings.edit', $query);
    }

    public function update(Request $request)
    {

        $rule = [

            'key' => 'required|unique:settings,key,' . $request->id,
            'value' => 'required',
            'file' => 'nullable',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        $data = Setting::where('id', $request->id)->firstOrFail();
        $data->key = $request->key;
        $data->value = $request->value;
        $data->file = $request->file;
        $data->save();

        return redirect(route('settings'))->with('message', 'تم التعديل بنجاح')->with('status', 'success');
    }

    public function destroy(Request $request)
    {


        try {
            Setting::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }

}

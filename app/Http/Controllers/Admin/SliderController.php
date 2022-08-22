<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Slider;
use Validator;

class SliderController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.slider.index');
    }

    public function datatable(Request $request)
    {
        $data = Slider::orderBy('id', 'asc');
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
            ->editColumn('title', function ($row) {
                $title = '';
                $title .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->title . '</span>';
                return $title;
            })
            ->editColumn('sort', function ($row) {
                $sort = '';
                $sort .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->sort . '</span>';
                return $sort;
            })
            ->editColumn('created_at', function ($row) {
                $created_at = '';
                $created_at .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->created_at . '</span>';
                return $created_at;
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("admin/edit-slider/" . $row->id) . '" class="btn btn-light-info"><i class="bi bi-pencil-fill"></i> تعديل</a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'title', 'sort', 'photo', 'created_at'])
            ->make();

    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $rule = [
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',

        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        $data = Slider::create([
            'title_ar' => $request->title_ar,
            'content_ar' => $request->content_ar,
            'title_en' => $request->title_en,
            'content_en' => $request->content_en,
            'sort' => $request->sort,
            'image' => $request->image,

        ]);
        return redirect('admin/slider')->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
    }

    public function edit($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Slider::find($id);
        return view('admin.slider.edit', $query);
    }

    public function update(Request $request)
    {

        $rule = [
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',

        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $row = Slider::find($request->id);
        $row->title_ar = $request->title_ar;
        $row->content_ar = $request->content_ar;
        $row->title_en = $request->title_en;
        $row->content_en = $request->content_en;
        $row->sort = $request->sort;
        $row->image = $request->image;
        $row->save();



        return redirect('admin/slider')->with('message', 'تم التعديل بنجاح')->with('status', 'success');
    }

    public function destroy(Request $request)
    {

        try {
            Slider::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }

}

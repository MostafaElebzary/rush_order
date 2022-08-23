<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Slider;
use Validator;

class CategoryController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index($id = null)
    {
        $query['data'] = Activity::find($id);
        return view('admin.category.index', $query);
    }

    public function datatable(Request $request, $parent_id = null)
    {


        $data = Activity::where('parent_id', $parent_id)->orderBy('id', 'asc');


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
            ->editColumn('title_ar', function ($row) {
                $title = '';
                $title .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->title_ar . '</span>';
                return $title;
            })->editColumn('title_en', function ($row) {
                $title = '';
                $title .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->title_en . '</span>';
                return $title;
            })
            ->editColumn('parent_id', function ($row) {
                $created_at = '';
                $created_at .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->created_at . '</span>';
                return $created_at;
            })->editColumn('created_at', function ($row) {
                $created_at = '';
                $created_at .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->created_at . '</span>';
                return $created_at;
            })
            ->addColumn('actions', function ($row) use ($parent_id) {
                $actions = ' <a href="' . url("admin/edit-category/" . $row->id) . '" class="btn btn-light-info"><i class="bi bi-pencil-fill"></i> تعديل</a>';
                if ($parent_id == null) {
                    $actions .= ' <a href="' . url("admin/sub-category/" . $row->id) . '" class="btn btn-light-success"><i class="bi bi-eye-fill"></i> التصنيفات </a>';
                }
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'title_ar', 'title_en', 'photo', 'created_at'])
            ->make();

    }


    public function store(Request $request)
    {
        $rule = [
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'parent_id' => 'nullable'

        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        $data = Activity::create([
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'image' => $request->image,
            'parent_id' => $request->parent_id,

        ]);
        if ($request->parent_id) {

            return redirect('admin/sub-category/' . $request->parent_id)->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
        }
        return redirect('admin/category')->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
    }

    public function edit($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Activity::findOrFail($id);
        return view('admin.category.edit', $query);
    }

    public function update(Request $request)
    {

        $rule = [
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'parent_id' => 'nullable'

        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $row = Activity::findOrFail($request->id);
        $row->title_ar = $request->title_ar;
        $row->title_en = $request->title_en;
        if ($request->image) {
            $row->image = $request->image;
        }
        $row->parent_id = $request->parent_id;
        $row->save();
        if ($request->parent_id) {
            return redirect('admin/sub-category/' . $request->parent_id)->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
        }

        return redirect('admin/category')->with('message', 'تم التعديل بنجاح')->with('status', 'success');
    }

    public function destroy(Request $request)
    {

        try {
            Activity::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }

}

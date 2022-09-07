<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Company;
use App\Models\CompanyCategory;
use App\Models\CompanyProduct;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use Validator;

class CompanyProductController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        $data = Auth::guard('client')->user();
        return view('client.products.index', compact('data'));
    }

    public function datatable(Request $request, $company_id)
    {
        $data = CompanyProduct::where('company_id', $company_id)->orderBy('id', 'asc');
        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('image', function ($row) {
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
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->title_ar . '</span>
                                   <br> <small class="text-gray-600">' . $row->title_en . '</small>';
                return $name;
            })
            ->editColumn('company_category_id', function ($row) {
                $phone = '';
                $phone .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->CompanyCategory->title . '</span>';
                return $phone;
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("client/edit-company_product/" . $row->id) . '" class="btn btn-icon btn-light-info"><i class="bi bi-pencil-fill"></i> </a>';
                return $actions;

            })
            ->rawColumns(['checkbox', 'image', 'title_ar', 'company_category_id', 'actions'])
            ->make();

    }

    public function button($id)
    {

        $query['data'] = Company::findOrFail($id);
        return view('client/products/button', $query);
    }


    public function store(Request $request)
    {


        $rule = [
            'company_id' => 'required|exists:companies,id',
            'company_category_id' => 'required|exists:company_categories,id',
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'content_ar' => 'required|string',
            'content_en' => 'required|string',
            'price' => 'required|numeric',
            'preparation_time' => 'nullable',
            'attributess' => 'nullable|array',
            'additions' => 'nullable|array',
            'drinks' => 'nullable|array',
            'type' => 'required|in:Normal,Bundle',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',

        ];

        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        if ($request->attributess != null && count($request->attributess) > 0) {
            $attr['attributes'] = array();
            $i = 0;
            foreach ($request->attributess as $attribute) {
                $attr['attributes'][$i]['attribute_name_ar'] = $attribute['attribute_name_ar'];
                $attr['attributes'][$i]['attribute_name_en'] = $attribute['attribute_name_en'];
                $attr['attributes'][$i]['attribute_option_ar'] = $attribute['attribute_option_ar'];
                $attr['attributes'][$i]['attribute_option_en'] = $attribute['attribute_option_en'];
                $attr['attributes'][$i]['attribute_price'] = $attribute['attribute_price'];
                $i++;
            }

            $save_attributes = json_encode($attr['attributes']);

        } else {
            $save_attributes = null;
        }

        if ($request->additions != null && count($request->additions) > 0) {
            $add['additions'] = array();
            $i = 0;
            foreach ($request->additions as $attribute) {
                $add['additions'][$i]['addittion_name_ar'] = $attribute['addittion_name_ar'];
                $add['additions'][$i]['addittion_name_en'] = $attribute['addittion_name_en'];
                $add['additions'][$i]['addittion_price'] = $attribute['addittion_price'];


                $i++;
            }

            $save_addition = json_encode($add['additions']);

        } else {
            $save_addition = null;
        }

        if ($request->drinks != null && count($request->drinks) > 0) {
            $drink['drinks'] = array();
            $i = 0;
            foreach ($request->drinks as $attribute) {
                $drink['drinks'][$i]['drink_name_ar'] = $attribute['drink_name_ar'];
                $drink['drinks'][$i]['drink_name_en'] = $attribute['drink_name_en'];
                $drink['drinks'][$i]['drink_price'] = $attribute['drink_price'];

                $i++;
            }

            $save_drinks = json_encode($drink['drinks']);

        } else {
            $save_drinks = null;
        }


        $data = CompanyProduct::create([
            'company_id' => $request->company_id,
            'company_category_id' => $request->company_category_id,
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'content_ar' => $request->content_ar,
            'content_en' => $request->content_en,
            'price' => $request->price,
            'preparation_time' => $request->preparation_time,
            'attributes' => $save_attributes,
            'additions' => $save_addition,
            'drinks' => $save_drinks,
            'type' => $request->type,
            'image' => $request->image,
        ]);


        return redirect()->back()->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
    }


    public function edit($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = CompanyProduct::whereId($id)->with('Company')->firstOrFail();
        return view('client.products.edit', $query);
    }

    public function update(Request $request)
    {


        $rule = [

            'id' => 'required|exists:company_products,id',
            'company_category_id' => 'required|exists:company_categories,id',
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'content_ar' => 'required|string',
            'content_en' => 'required|string',
            'price' => 'required|numeric',
            'preparation_time' => 'nullable',
            'attributess' => 'nullable|array',
            'additions' => 'nullable|array',
            'drinks' => 'nullable|array',
            'type' => 'required|in:Normal,Bundle',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        if ($request->attributess != null && count($request->attributess) > 0) {
            $attr['attributes'] = array();
            $i = 0;
            foreach ($request->attributess as $attribute) {
                $attr['attributes'][$i]['attribute_name_ar'] = $attribute['attribute_name_ar'];
                $attr['attributes'][$i]['attribute_name_en'] = $attribute['attribute_name_en'];
                $attr['attributes'][$i]['attribute_option_ar'] = $attribute['attribute_option_ar'];
                $attr['attributes'][$i]['attribute_option_en'] = $attribute['attribute_option_en'];
                $attr['attributes'][$i]['attribute_price'] = $attribute['attribute_price'];
                $i++;
            }

            $save_attributes = json_encode($attr['attributes']);

        } else {
            $save_attributes = null;
        }
        if ($request->additions != null && count($request->additions) > 0) {
            $add['additions'] = array();
            $i = 0;
            foreach ($request->additions as $attribute) {
                $add['additions'][$i]['addittion_name_ar'] = $attribute['addittion_name_ar'];
                $add['additions'][$i]['addittion_name_en'] = $attribute['addittion_name_en'];
                $add['additions'][$i]['addittion_price'] = $attribute['addittion_price'];


                $i++;
            }

            $save_addition = json_encode($add['additions']);

        } else {
            $save_addition = null;
        }
        if ($request->drinks != null && count($request->drinks) > 0) {
            $drink['drinks'] = array();
            $i = 0;
            foreach ($request->drinks as $attribute) {
                $drink['drinks'][$i]['drink_name_ar'] = $attribute['drink_name_ar'];
                $drink['drinks'][$i]['drink_name_en'] = $attribute['drink_name_en'];
                $drink['drinks'][$i]['drink_price'] = $attribute['drink_price'];

                $i++;
            }

            $save_drinks = json_encode($drink['drinks']);

        } else {
            $save_drinks = null;
        }

        $data = CompanyProduct::where('id', $request->id)->firstOrFail();
        $data->company_category_id = $request->company_category_id;
        $data->title_ar = $request->title_ar;
        $data->title_en = $request->title_en;
        $data->content_ar = $request->content_ar;
        $data->content_en = $request->content_en;
        $data->price = $request->price;
        $data->preparation_time = $request->preparation_time;
        $data->type = $request->type;
        if ($request->image) {
            $data->image = $request->image;
        }
        $data->attributes = $save_attributes;
        $data->additions = $save_addition;
        $data->drinks = $save_drinks;
        $data->save();


        return redirect(url('client/client-company_product'))->with('message', 'تم التعديل بنجاح')->with('status', 'success');
    }

    public function destroy(Request $request)
    {
        try {
            CompanyProduct::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }

}

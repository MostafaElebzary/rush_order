@extends('client.layouts.master')

@section('css')
    <link href="{{asset('/admin')}}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css"/>

@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0"> التصنيفات الخاصة | {{$data->Company->title}}  </h1>
@endsection

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">

                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                        فاتورة رقم {{$data->id}}</h1>
                                    <!--end::Title-->
                                    <!--begin::Breadcrumb-->

                                    <!--end::Breadcrumb-->
                                </div>
                                <!--end::Page title-->

                            </div>
                            <!--end::Toolbar container-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-xxl">
                                <!-- begin::Invoice 3-->
                                <div class="card">
                                    <!-- begin::Body-->
                                    <div class="card-body py-20">
                                        <!-- begin::Wrapper-->
                                        <div class="mw-lg-950px mx-auto w-100">
                                            <!-- begin::Header-->
                                            <div class="d-flex justify-content-between flex-column flex-sm-row mb-19">
                                                <h4 class="fw-bolder text-gray-800 fs-2qx pe-5 pb-7">فاتورة</h4>
                                                <!--end::Logo-->
                                                <div class="text-sm-end">
                                                    <!--begin::Logo-->
                                                    <a href="{{settings_image('logo')}}"
                                                       class="d-block mw-150px ms-sm-auto">
                                                        <img alt="Logo" src="{{settings_image('logo')}}" class="w-100"/>
                                                    </a>
                                                    <!--end::Logo-->
                                                    <!--begin::Text-->

                                                    <!--end::Text-->
                                                </div>
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div class="pb-12">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-column gap-7 gap-md-10">
                                                    <!--begin::Message-->
                                                    <div class="fw-bold fs-2"> {{$data->user_name}}
                                                        <span
                                                            class="fs-6">({{$data->User ? $data->User->phone : ""}})</span>
                                                        <br/>
                                                    {{--                                                        <span class="text-muted fs-5">Here are your order details. We thank you for your purchase.</span></div>--}}
                                                    <!--begin::Message-->
                                                        <!--begin::Separator-->
                                                        <div class="separator"></div>
                                                        <!--begin::Separator-->
                                                        <!--begin::Order details-->
                                                        <div
                                                            class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold">
                                                            <div class="flex-root d-flex flex-column">
                                                                <span class="text-muted">رقم الطلب</span>
                                                                <span class="fs-5">{{$data->id}}#</span>
                                                            </div>
                                                            <div class="flex-root d-flex flex-column">
                                                                <span class="text-muted">التاريخ</span>
                                                                <span
                                                                    class="fs-5">{{\Carbon\Carbon::parse($data->created_at)->translatedFormat('d M Y h:i a')}}</span>
                                                            </div>
                                                            <div class="flex-root d-flex flex-column">
                                                                <span class="text-muted">حالة الطلب</span>
                                                                @if(Client_type() == "Manager")
                                                                    <span class="fs-5">
                                                                        @if($data->status == 0)
                                                                            <span
                                                                                class="badge badge-light-success fw-bolder">فى الانتظار</span>
                                                                        @elseif($data->status == 1)
                                                                            <span
                                                                                class="badge badge-light-success fw-bolder">تم القبول</span>
                                                                        @elseif($data->status == 2)
                                                                            <span
                                                                                class="badge badge-light-success fw-bolder">جارى تنفيذ الطلب</span>
                                                                        @elseif($data->status == 3)
                                                                            <span
                                                                                class="badge badge-light-success fw-bolder">تم توصيل الطلب</span>
                                                                        @elseif($data->status == 4)
                                                                            <span
                                                                                class="badge badge-light-danger fw-bolder">تم الالغاء</span>
                                                                        @endif
                                                                        @else
                                                                            <span
                                                                                class="fs-6">
                                                                            <button type="button" class="btn"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#kt_modal_add_user2">
                                                                                 @if($data->status == 0)
                                                                                    <span
                                                                                        class="badge badge-light-success fw-bolder">فى الانتظار</span>
                                                                                @elseif($data->status == 1)
                                                                                    <span
                                                                                        class="badge badge-light-success fw-bolder">تم القبول</span>
                                                                                @elseif($data->status == 2)
                                                                                    <span
                                                                                        class="badge badge-light-success fw-bolder">جارى تنفيذ الطلب</span>
                                                                                @elseif($data->status == 3)
                                                                                    <span
                                                                                        class="badge badge-light-success fw-bolder">تم توصيل الطلب</span>
                                                                                @elseif($data->status == 4)
                                                                                    <span
                                                                                        class="badge badge-light-danger fw-bolder">تم الالغاء</span>
                                                                                @endif
                                                                            </button>
                                                                                </span>
                                                                        @endif

                                                            </span>
                                                            </div>
                                                            <div class="flex-root d-flex flex-column">
                                                                <span class="text-muted">نوع الدفع</span>
                                                                <span
                                                                    class="fs-6"> {{trans('lang.'.$data->payment_type)}} </span>
                                                            </div>

                                                        </div>
                                                        <!--end::Order details-->
                                                        <!--begin::Billing & shipping-->
                                                        <div
                                                            class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold">
                                                            <div class="flex-root d-flex flex-column">
                                                                <span class="text-muted">نوع التوصيل</span>
                                                                <span
                                                                    class="fs-5">{{trans('lang.'.$data->deliver_type)}}</span>
                                                            </div>
                                                            @if($data->deliver_type == "Delivery")
                                                                <div class="flex-root d-flex flex-column">
                                                                    <span class="text-muted">عنوان التوصيل</span>
                                                                    <span
                                                                        class="fs-6"> {!! $data->user_address !!}</span>
                                                                </div>
                                                            @elseif($data->deliver_type == "ByCar")
                                                                <div class="flex-root d-flex flex-column">
                                                                    <span class="text-muted">نوع السيارة</span>
                                                                    <span class="fs-6"> {{$data->car_type}}</span>
                                                                </div>
                                                                <div class="flex-root d-flex flex-column">
                                                                    <span class="text-muted">لون السيارة</span>
                                                                    <span class="fs-6"> {{$data->car_color}}</span>
                                                                </div>
                                                                <div class="flex-root d-flex flex-column">
                                                                    <span class="text-muted">رقم السيارة</span>
                                                                    <span class="fs-6"> {{$data->car_num}}</span>
                                                                </div>
                                                                <div class="flex-root d-flex flex-column">
                                                                    <span class="text-muted">رقم السيارة</span>
                                                                    <span class="fs-6"> {{$data->car_num}}</span>
                                                                </div>
                                                            @endif
                                                            <div class="flex-root d-flex flex-column">
                                                                <span class="text-muted">الفرع</span>
                                                                <span
                                                                    class="fs-6"> {{$data->Branch ? $data->Branch->title : "" }}
                                                                    @if(!$data->Branch)
                                                                        <button type="button" class="btn"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#kt_modal_add_user">
                                                                   تخصيص فرع
                                                                </button>
                                                                    @endif
                                                                </span>

                                                            </div>
                                                        </div>
                                                        <br>
                                                        <!--end::Billing & shipping-->
                                                        <!--begin:Order summary-->
                                                        <div class="d-flex justify-content-between flex-column">
                                                            <!--begin::Table-->
                                                            <div class="table-responsive border-bottom mb-9">
                                                                <table
                                                                    class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                                                    <thead>
                                                                    <tr class="border-bottom fs-6 fw-bold text-muted">
                                                                        <th class="min-w-175px pb-2">المنتج</th>
                                                                        <th class="min-w-70px text-end pb-2">الكمية</th>
                                                                        <th class="min-w-80px text-end pb-2">الخصائص
                                                                        </th>
                                                                        <th class="min-w-80px text-end pb-2">الاضافات
                                                                        </th>
                                                                        <th class="min-w-80px text-end pb-2">المشروبات
                                                                        </th>
                                                                        <th class="min-w-100px text-end pb-2">الاجمالي
                                                                        </th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody class="fw-semibold text-gray-600">
                                                                    <!--begin::Products-->
                                                                    @foreach($data->OrderProducts as $OrderProduct)
                                                                        <tr>
                                                                            <!--begin::Product-->
                                                                            <td>
                                                                                <div class="d-flex align-items-center">
                                                                                    <!--begin::Thumbnail-->
                                                                                    <a href="{{url('admin/edit-company_product/'.$OrderProduct->company_product_id)}}"
                                                                                       class="symbol symbol-50px">
                                                                                    <span class="symbol-label"
                                                                                          style="background-image:url({{$OrderProduct->CompanyProduct->image}});"></span>
                                                                                    </a>
                                                                                    <!--end::Thumbnail-->
                                                                                    <!--begin::Title-->
                                                                                    <div class="ms-5">
                                                                                        <div
                                                                                            class="fw-bold">{{$OrderProduct->CompanyProduct->title}}</div>

                                                                                    </div>
                                                                                    <!--end::Title-->
                                                                                </div>
                                                                            </td>
                                                                            <!--end::Product-->
                                                                            <!--begin::SKU-->
                                                                            <td class="text-end">{{$OrderProduct->qty}}</td>
                                                                            <!--end::SKU-->
                                                                            <!--begin::Quantity-->

                                                                            <!--end::Quantity-->
                                                                            <!--begin::Total-->
                                                                            <td class="text-end">
                                                                                @if($OrderProduct->attributes)
                                                                                    @foreach($OrderProduct->attributes as $attribute )
                                                                                        <b> {{$attribute->attribute_name_ar}}</b>
                                                                                        :  {{$attribute->attribute_option_ar}}
                                                                                    @endforeach
                                                                                @endif
                                                                            </td>
                                                                            <!--end::Total-->
                                                                            <!--begin::Total-->
                                                                            <td class="text-end">
                                                                                @if($OrderProduct->additions)
                                                                                    @foreach($OrderProduct->additions as $attribute )
                                                                                        <b> {{$attribute->addittion_name_ar}}</b>
                                                                                        ,
                                                                                    @endforeach
                                                                                @endif
                                                                            </td>

                                                                            <td class="text-end">
                                                                                @if($OrderProduct->drinks)
                                                                                    @foreach($OrderProduct->drinks as $attribute )
                                                                                        <b> {{$attribute->drink_name_ar}}</b>
                                                                                        ,
                                                                                    @endforeach
                                                                                @endif
                                                                            </td>
                                                                            <!--end::Total-->
                                                                            <td class="text-end">{{$OrderProduct->price}}
                                                                                $
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    <!--end::Products-->
                                                                    <!--begin::Subtotal-->
                                                                    <tr>
                                                                        <td colspan="5" class="text-end">الاجمالي
                                                                            الطلبية
                                                                        </td>
                                                                        <td class="text-end">{{$data->order_price}}$
                                                                        </td>
                                                                    </tr>
                                                                    <!--end::Subtotal-->
                                                                    <!--begin::VAT-->

                                                                    <!--end::VAT-->
                                                                    <!--begin::Shipping-->
                                                                    <tr>
                                                                        <td colspan="5" class="text-end">تكلفه التوصيل
                                                                        </td>
                                                                        <td class="text-end">{{$data->delivery_price}}
                                                                            $
                                                                        </td>
                                                                    </tr>
                                                                    <!--end::Shipping-->
                                                                    <!--begin::Grand total-->
                                                                    <tr>
                                                                        <td colspan="5"
                                                                            class="fs-3 text-dark fw-bold text-end">
                                                                            الاجمالي
                                                                        </td>
                                                                        <td class="text-dark fs-3 fw-bolder text-end">
                                                                            {{$data->total_price}} $
                                                                        </td>
                                                                    </tr>
                                                                    <!--end::Grand total-->
                                                                    </tbody>
                                                                </table>
                                                                <div class="my-1 me-5">
                                                                    <!-- begin::Pint-->
                                                                    <button type="button"
                                                                            class="btn btn-success my-1 me-12"
                                                                            onclick="window.print();">طباعة الفاتورة
                                                                    </button>
                                                                    <!-- end::Pint-->
                                                                    <!-- begin::Download-->
                                                                    <!-- end::Download-->
                                                                </div>
                                                            </div>
                                                            <!--end::Table-->
                                                        </div>
                                                        <!--end:Order summary-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                </div>
                                                <!--end::Body-->
                                                <!-- begin::Footer-->
                                                <div class="d-flex flex-stack flex-wrap mt-lg-20 pt-13">
                                                    <!-- begin::Actions-->

                                                    <!-- end::Actions-->
                                                    <!-- begin::Action-->
                                                    <!-- end::Action-->
                                                </div>
                                                <!-- end::Footer-->
                                            </div>
                                            <!-- end::Wrapper-->
                                        </div>
                                        <!-- end::Body-->
                                    </div>
                                    <!-- end::Invoice 1-->
                                </div>
                                <!--end::Content container-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Content wrapper-->
                        <!--begin::Footer-->

                        <!--end::Footer-->
                    </div>


                </div>


                <!--end::Tab pane-->
            </div>
            <!--end::Tab content-->

        </div>


        <!--end::Form-->

        <!--begin::Modal - Add task-->
        <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_user_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bolder">تخصيص لفرع </h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                             data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                          transform="rotate(-45 6 17.3137)" fill="black"/>
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                          transform="rotate(45 7.41422 6)" fill="black"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <!--begin::Form-->
                        <form id="" class="form" method="post" action="{{url('client/store-order-branch')}}"
                              enctype="multipart/form-data">
                        @csrf
                        <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                 id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                 data-kt-scroll-activate="{default: false, lg: true}"
                                 data-kt-scroll-max-height="auto"
                                 data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                 data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                 data-kt-scroll-offset="300px">


                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">اختر الفرع</label>
                                    <!--end::Label-->
                                    <input type="hidden" name="id" value="{{$data->id}}">
                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" name="branch_id"
                                            data-control="select2" data-dropdown-parent="#kt_modal_add_user"
                                            data-placeholder="اختر الفرع" data-allow-clear="true">

                                        <option></option>
                                        @foreach(\App\Models\Branch::where('company_id',Client_Company_Id())->get() as $company)
                                            <option value="{{$company->id}}">{{$company->title}}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Input-->
                                </div>


                            </div>
                            <!--end::Scroll-->
                            <!--begin::Actions-->
                            <div class="text-center pt-15">
                                <button type="reset" class="btn btn-light me-3"
                                        data-bs-dismiss="modal">ألغاء
                                </button>
                                <button type="submit" class="btn btn-primary"
                                        data-kt-users-modal-action="submit">
                                    <span class="indicator-label">حفظ</span>
                                    <span class="indicator-progress">برجاء الانتظار
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Add task-->

        <!--begin::Modal - Add task-->
        <div class="modal fade" id="kt_modal_add_user2" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_user2_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bolder">تخصيص لفرع </h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                             data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                          transform="rotate(-45 6 17.3137)" fill="black"/>
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                          transform="rotate(45 7.41422 6)" fill="black"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <!--begin::Form-->
                        <form id="" class="form" method="post" action="{{url('client/change-order-status')}}"
                              enctype="multipart/form-data">
                        @csrf
                        <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                 id="kt_modal_add_use2r_scroll" data-kt-scroll="true"
                                 data-kt-scroll-activate="{default: false, lg: true}"
                                 data-kt-scroll-max-height="auto"
                                 data-kt-scroll-dependencies="#kt_modal_add_user2_header"
                                 data-kt-scroll-wrappers="#kt_modal_add_user2_scroll"
                                 data-kt-scroll-offset="300px">


                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">اختر الحاله</label>
                                    <!--end::Label-->
                                    <input type="hidden" name="id" value="{{$data->id}}">
                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" name="status"
                                            data-control="select2" data-dropdown-parent="#kt_modal_add_user2"
                                            data-placeholder="اختر الحاله" data-allow-clear="true">

                                        <option></option>
                                        <option value="1">تم القبول</option>
                                        <option value="2">جارى تنفيذ الطلب</option>
                                        <option value="3">تم توصيل الطلب</option>
                                        <option value="4">تم الالغاء</option>


                                    </select>
                                    <!--end::Input-->
                                </div>


                            </div>
                            <!--end::Scroll-->
                            <!--begin::Actions-->
                            <div class="text-center pt-15">
                                <button type="reset" class="btn btn-light me-3"
                                        data-bs-dismiss="modal">ألغاء
                                </button>
                                <button type="submit" class="btn btn-primary"
                                        data-kt-users-modal-action="submit">
                                    <span class="indicator-label">حفظ</span>
                                    <span class="indicator-progress">برجاء الانتظار
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Add task-->


        <!--end::Content-->

    </div>
    <!--end::Container-->
    </div>
    <!--end::Post-->
    </div>
    <!--end::Content-->


@endsection

@section('js')
    <script src="{{ URL::asset('/admin/assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>

@endsection

@section('script')

@endsection

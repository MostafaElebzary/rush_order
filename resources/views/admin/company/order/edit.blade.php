@extends('admin.layouts.master')

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
                                                    <a href="#" class="d-block mw-150px ms-sm-auto">
                                                        <img alt="Logo" src="#" class="w-100"/>
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
                                                                        <td class="text-end">{{$data->order_price}}</td>
                                                                    </tr>
                                                                    <!--end::Subtotal-->
                                                                    <!--begin::VAT-->

                                                                    <!--end::VAT-->
                                                                    <!--begin::Shipping-->
                                                                    <tr>
                                                                        <td colspan="5" class="text-end">تكلفه التوصيل
                                                                        </td>
                                                                        <td class="text-end">{{$data->delivery_price}}</td>
                                                                    </tr>
                                                                    <!--end::Shipping-->
                                                                    <!--begin::Grand total-->
                                                                    <tr>
                                                                        <td colspan="5"
                                                                            class="fs-3 text-dark fw-bold text-end">
                                                                            الاجمالي
                                                                        </td>
                                                                        <td class="text-dark fs-3 fw-bolder text-end">
                                                                            {{$data->total_price}}
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

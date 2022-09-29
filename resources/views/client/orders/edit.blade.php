@extends('client.layouts.master')

@section('css')

    <link href="{{asset('/admin')}}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css"/>
    <style>
        table.print > thead > tr > td, table.print > thead > tr > th {
            color: #181c32;
            background: #f3f6f9;
            padding-right: 10px;
        }

        
        @media print {
            body {
                height:1px;
                overflow: hidden;
                visibility: hidden;
                display: none;
            }

            .hid {
                position: absolute;
                top: 0px;
                visibility: visible;
                overflow: inherit;
                height: auto;
            }

            .hidden-item {
                height:1px;
                overflow: hidden;
                visibility: hidden;
                display: none;
            }
            
        }
    </style>
@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0"> التصنيفات الخاصة | {{$data->Company->title}}  </h1>
@endsection

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid hid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <!-- begin::Wrapper-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <div class="container-fluid invoice-container"> 
                            <!-- Header -->
                            <header>
                            <div class="row align-items-left">
                                <div class="col-sm-5 text-left">
                                    <h4 class="mb-0">Tax Invoice</h4>
                                    <p class="mb-0" style="font-size: 22px;">فاتورة ضريبية</p>
                                </div>
                                <div class="col-sm-7 text-left text-sm-start mb-3 mb-sm-0">  </div>
                                
                            </div>
                            <hr>
                            </header>
                            
                            <!-- Main Content -->
                            <main>
                        
                            <div class="row">
                                <div class="col-4"> 
                                    <strong>مؤسسة مؤسسة مؤسسة</strong>
                                <address>
                                العنوان العنوان العنوان<br />
                                96650505050<br />
                                <strong>رقم التسجيل الضريبي</strong><br />
                                123456789654<br />
                                </address>
                                <strong>العميل</strong>
                                <address>
                                    {{$data->user_name}}<br />
                                    {{$data->User ? $data->User->phone : ""}}<br />
                                    {{$data->user_address}}<br />
                                    {{$data->user_city}}<br />
                                    {{$data->user_state}}

                                </address>
                                </div>
                                <div class="col-4"> 
                                <strong>رقم الفاتورة</strong>
                                <address>
                                    # {{$data->id}}<br />
                                </address>
                                <strong>التاريخ</strong>
                                <address>
                                {{\Carbon\Carbon::parse($data->created_at)->translatedFormat('d M Y h:i a')}}<br />
                                </address>
                                <strong>تاريخ الاصدار</strong>
                                <address>
                                    {{\Carbon\Carbon::parse($data->created_at)->translatedFormat('d M Y h:i a')}}<br />
                                </address>
                                <strong>حالة الطلب</strong>
                                    @if(Client_type() == "Manager")
                                        <address>
                                            @if($data->status == 0)
                                                فى الانتظار<br />
                                            @elseif($data->status == 1)
                                                تم القبول<br />
                                            @elseif($data->status == 2)
                                                جارى تنفيذ الطلب<br>
                                            @elseif($data->status == 3)
                                                تم توصيل الطلب<br>
                                            @elseif($data->status == 4)
                                                تم الالغاء<br>
                                            @endif                            
                                        </address>
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

                                    <strong>الفرع</strong>
                                    <address>
                                        {{$data->Branch ? $data->Branch->title : "" }}<br />
                                        @if(!$data->Branch)
                                            <button type="button" class="btn hidden-item"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_add_user">
                                            تخصيص فرع ؟
                                            </button>
                                        @endif
                                    </address>
                                   

                                </div>
                                <div class="col-4" style="text-align: right;"> 
                                    <strong>نوع الدفع</strong>
                                    <address>
                                        {{trans('lang.'.$data->payment_type)}}<br />
                                    </address>
                                    <strong>نوع التوصيل</strong>
                                    <address>
                                        {{trans('lang.'.$data->deliver_type)}}<br />
                                    </address>
                                    @if($data->deliver_type == "Delivery")
                                    <strong>عنوان التوصيل</strong>
                                    <address>
                                        {!! $data->user_address !!}<br />
                                    </address>
                                    @elseif($data->deliver_type == "ByCar")
                                    <strong>نوع السيارة</strong>
                                    <address>
                                        {{$data->car_type}}<br />
                                    </address>
                                    <strong>لون السيارة</strong>
                                    <address>
                                        {{$data->car_color}}<br />
                                    </address>
                                    <strong>رقم السيارة</strong>
                                    <address>
                                        {{$data->car_num}}<br />
                                    </address>
                                    <strong>ملاحظات السياراة</strong>
                                    <address>
                                        {{$data->car_notes}}<br />
                                    </address>
                                    @endif
                                </div>
                        
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-4 gy-5 print" id="data_table">
                                <thead>
                                    <tr class="border-bottom fs-6 fw-bold text-muted">
                                        <th class="min-w-175px pb-4">المنتج</th>
                                        <th class="min-w-70px text-center pb-4">الكمية</th>
                                        <th class="min-w-80px text-center pb-4">الخصائص
                                        </th>
                                        <th class="min-w-80px text-center pb-4">الاضافات
                                        </th>
                                        <th class="min-w-80px text-center pb-4">المشروبات
                                        </th>
                                        <th class="min-w-100px text-center pb-4">الاجمالي
                                        </th>
                                    </tr>
                                    </thead>
                                <tbody>
                                    @foreach ($data->OrderProducts as $OrderProduct)
                                        <tr>
                                            <td class="col-3">{{$OrderProduct->CompanyProduct->title}}</td>
                                            <td class="col-2 text-center">{{$OrderProduct->qty}}</td>
                                                <td class="col-2 text-center">
                                                    @if($OrderProduct->attributes)
                                                        @foreach($OrderProduct->attributes as $attribute )
                                                            <b> {{$attribute->attribute_name_ar}}</b>
                                                            :  {{$attribute->attribute_option_ar}}
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td class="col-3 text-center">
                                                    @if($OrderProduct->additions)
                                                        @foreach($OrderProduct->additions as $attribute )
                                                            <b> {{$attribute->addittion_name_ar}}</b>
                                                            
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td class="col-3 text-center">
                                                    @if($OrderProduct->drinks)
                                                        @foreach($OrderProduct->drinks as $attribute )
                                                            <b> {{$attribute->drink_name_ar}}</b>
                                                            
                                                        @endforeach
                                                    @endif
                                                </td>
                                            <td class="col-2 text-center">{{$OrderProduct->price}}</td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <td class="text-center border-bottom-0" colspan="2" rowspan="3">{{$qrcode}}</td>
                                    <td class="text-end" colspan="2"><p>المجموع الفرعي</p></td>
                                    <td class="text-center" colspan="2">{{$data->order_price}} ريال</td>
                                    </tr>
                                    <tr>
                                    <td class="text-end" colspan="2"><p>اجمالي ضريبة القيمة المضافة </p></td>
                                    <td class="text-center" colspan="2">{{$data->delivery_price}} ريال</td>
                                    </tr>
                                    <tr>
                                    <td class="text-end border-bottom-0" colspan="2"><p>الاجمالي</p></td>
                                    <td class="text-center border-bottom-0" colspan="2">{{$data->total_price}} ريال</td>
                                    </tr>
                                </tfoot>
                                </table>
                            </div>
                            </main>
                            <!-- Footer -->
                            <footer class="text-center">
                            {{-- <hr>
                            <p><strong>Koice Inc.</strong><br>
                                4th Floor, Plot No.22, Above Public Park, 145 Murphy Canyon Rd,<br>
                                Suite 100-18, San Diego CA 2028. </p>
                            <hr>
                            <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical signature.</p> --}}
                            <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none" style="background: #000000;color: #ffffff !important;font-size: 18px;font-weight: bold;border: none !important;padding: 10px 25px;"> طباعه</a></div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end::Body-->

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

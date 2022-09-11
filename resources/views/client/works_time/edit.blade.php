@extends('admin.layouts.master')

@section('css')
    <link href="{{asset('/admin')}}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css"/>

@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0"> اوقات العمل | {{$data->Company->title}}  </h1>
@endsection

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">

                <!--begin::Content-->


                <!--begin::Form-->
                <form id="kt_account_profile_details_form" action="{{url('client/update-company_works_time')}}"
                      class="form"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin:::Tabs-->

                        <!--end:::Tabs-->
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="arabic" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="row">

                                                <div class="col-8">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-bold fs-6 mb-2">اليوم </label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="hidden" name="id" value="{{$data->id}}">
                                                        <input type="text"
                                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                                               placeholder="اليوم" value="{{$data->day}}"
                                                               required readonly/>

                                                        <!--end::Input-->
                                                    </div>

                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-bold fs-6 mb-2">وقت الفتح </label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->

                                                        <input type="time" name="open_time"
                                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                                               placeholder="وقت الفتح" value="{{$data->open_time}}"
                                                               required />

                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-bold fs-6 mb-2">وقت الغلق </label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->

                                                        <input type="time" name="close_time"
                                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                                               placeholder="وقت الغلق" value="{{$data->close_time}}"
                                                               required />

                                                        <!--end::Input-->
                                                    </div>



                                                </div>

                                                <!--end::Input group-->
                                                <!--begin::Input group-->

                                                <!--end::Input-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                </div>
                                <!--begin::Input group-->

                                <!--end::Input group-->
                            </div>
                            <!--end::Card header-->

                        </div>
                        <!--end::General options-->
                    </div>
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="#" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">الغاء</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                            <span class="indicator-label">حفظ</span>
                            <span class="indicator-progress">برجاء الانتظار
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>

                </form>
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

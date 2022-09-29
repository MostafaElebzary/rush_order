@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">اعدادت الاشعارات </h1>
@endsection

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">

                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                               href="#client_data" onclick="">اعدادات الاشعارات </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                               href="#Followers" onclick="">ارسال اشعار لكل العملاء</a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"--}}
{{--                               href="#Cards" onclick="cards()">ارسال اشعار لكل المؤسسات</a>--}}
{{--                        </li>--}}

                    </ul>
                    <!--begin::Card-->
                    <div class="tab-content">
                        <!--begin::Content-->

                        <div class="tab-pane fade show active" id="client_data" role="tab-panel">
                            <!--begin::Form-->
                            <form id="kt_account_profile_details_form" action="{{url('admin/notification-setting')}}"
                                  class="form"
                                  method="post" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Card body-->
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::Input group-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0 row">
                                            <div class="row mb-7">
                                                @foreach($data as $key=> $item)
                                                    <div class="col-lg-6">

                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="required fw-bold fs-6 mb-2">العنوان </label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" name="title[{{$item->id}}]"
                                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                                   placeholder="العنوان" value="{{$item->title}}"
                                                                   readonly
                                                                   required/>

                                                        </div>
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="required fw-bold fs-6 mb-2">الاشعار </label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" name="body[{{$item->id}}]"
                                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                                   placeholder="الاشعار" value="{{$item->body}}"
                                                                   required/>

                                                        </div>
                                                        <div class="fv-row mb-7">
                                                            <div
                                                                class="form-check form-switch form-check-custom form-check-solid">
                                                                <label class="form-check-label" for="flexSwitchDefault">مفعل
                                                                    ؟</label><br><br>
                                                                <input class="form-check-input"
                                                                       name="is_active[{{$item->id}}]"
                                                                       type="hidden"
                                                                       value="0" id="flexSwitchDefault"/>
                                                                <input
                                                                    class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                                                    name="is_active[{{$item->id}}]" type="checkbox"
                                                                    value="1" id="flexSwitchDefault"
                                                                    @if($item->is_active == true) checked @endif />
                                                            </div>
                                                        </div>


                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--end::Scroll-->
                                <!--begin::Actions-->

                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">الغاء
                                    </button>
                                    <button type="submit" class="btn btn-primary"
                                            id="kt_account_profile_details_submit">حفظ
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>

                        <div class="tab-pane fade show " id="Followers" role="tab-panel">
                            <!--begin::Form-->
                            <form id="kt_account_profile_details_form" action="{{url('admin/send-notification')}}"
                                  class="form"
                                  method="post" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Card body-->
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::Input group-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0 row">
                                            <div class="row mb-7">
                                                    <div class="col-lg-6">
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="required fw-bold fs-6 mb-2">العنوان </label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" name="title"
                                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                                   placeholder="العنوان" value=""

                                                                   required/>

                                                        </div>
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="required fw-bold fs-6 mb-2">الاشعار </label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" name="body"
                                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                                   placeholder="الاشعار" value=""
                                                                   required/>

                                                        </div>



                                                    </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--end::Scroll-->
                                <!--begin::Actions-->

                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">الغاء
                                    </button>
                                    <button type="submit" class="btn btn-primary"
                                            id="kt_account_profile_details_submit">حفظ
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <div class="tab-pane fade show " id="Cards" role="tab-panel">
                            <!--begin::Form-->
                            <form id="kt_account_profile_details_form" action="{{url('admin/client-send')}}"
                                  class="form"
                                  method="post" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Card body-->
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::Input group-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0 row">
                                            <div class="row mb-7">
                                                    <div class="col-lg-6">
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="required fw-bold fs-6 mb-2">العنوان </label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" name="title"
                                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                                   placeholder="العنوان" value=""

                                                                   required/>

                                                        </div>
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="required fw-bold fs-6 mb-2">الاشعار </label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" name="body"
                                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                                   placeholder="الاشعار" value=""
                                                                   required/>

                                                        </div>



                                                    </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--end::Scroll-->
                                <!--begin::Actions-->

                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">الغاء
                                    </button>
                                    <button type="submit" class="btn btn-primary"
                                            id="kt_account_profile_details_submit">حفظ
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>

                        <!--end::Content-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Container-->
            </div>
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection

@section('js')
@endsection

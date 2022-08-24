@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">كوبونات الخصم</h1>
@endsection

@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Content-->

                        <div id="kt_account_settings_profile_details" class="collapse show">
                            <!--begin::Form-->
                            <form id="kt_account_profile_details_form" action="{{url('admin/update-copoun')}}" class="form"
                                  method="post" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <!--begin::Input group-->
                                  <input type="hidden" name="id" value="{{$data->id}}" required/>

                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fw-bold fs-6 mb-2">الكود</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="code"
                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                               placeholder="code" value="{{$data->code}}" required/>
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fw-bold fs-6 mb-2">من تاريخ</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="date" name="from_date"
                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                               placeholder="من تاريخ" value="{{$data->from_date}}" required/>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->  <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fw-bold fs-6 mb-2">الى تاريخ</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="date" name="to_date"
                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                               placeholder="الى تاريخ" value="{{$data->to_date}}"
                                               required />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fw-bold fs-6 mb-2">قيمة الخصم</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" name="amount"
                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                               placeholder="قيمة الخصم" value="{{$data->amount}}" required/>
                                        <!--end::Input-->
                                    </div>

                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fw-bold fs-6 mb-2">نوع الخصم</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-control form-control-solid mb-3 mb-lg-0"
                                                name="discount_type" id="discount_type">
                                            <option value="Ratio" @if($data->discount_type == "Ratio") selected @endif >نسبة %</option>
                                            <option value="Amount" @if($data->discount_type == "Amount") selected @endif >مبلغ $</option>
                                        </select>
                                        <!--end::Input-->
                                    </div>

                                    <div class="fv-row mb-7">
                                        <div
                                            class="form-check form-switch form-check-custom form-check-solid">
                                            <label class="form-check-label" for="flexSwitchDefault">مفعل
                                                ؟</label>
                                            <input class="form-check-input" name="active" type="hidden"
                                                   value="0" id="flexSwitchDefault"/>
                                            <input
                                                class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                                name="active" type="checkbox"
                                                value="1" id="flexSwitchDefault" @if($data->active == 1) checked @endif/>
                                        </div>
                                    </div>

                                </div>
                                <!--end::Scroll-->
                                <!--begin::Actions-->

                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">الغاء</button>
                                    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">حفظ
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
    <!--end::Post-->
</div>
<!--end::Content-->
@endsection

@section('js')
@endsection

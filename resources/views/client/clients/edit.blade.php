@extends('client.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">المديرين</h1>
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
                            <form id="kt_account_profile_details_form" action="{{url('admin/update-admin')}}" class="form"
                                  method="post" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <!--begin::Input group-->

                                    <div class="row mb-7">
                                        <div class="col-lg-6">
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">اسم العميل</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="name"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="الاسم" value="{{$data->name}}" required/>

                                                <input type="hidden" name="id" value="{{$data->id}}" required/>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">البريد الالكترونى</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="email" name="email"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="البريد الالكتروني" value="{{$data->email}}"
                                                       />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">رقم الجوال</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="tel" name="phone"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="رقم الجوال" value="{{$data->phone }}" required/>
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">كلمة المرور</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="password" name="password"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="كلمة المرور" value=""/>
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">تأكيد كلمة المرور</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="password" name="password_confirmation"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="تأكيد كلمة المرور" value=""/>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <div class="fv-row mb-7">
                                                <div
                                                    class="form-check form-switch form-check-custom form-check-solid">
                                                    <label class="form-check-label" for="flexSwitchDefault">مفعل
                                                        ؟</label><br><br>
                                                    <input class="form-check-input" name="is_active" type="hidden"
                                                           value="0" id="flexSwitchDefault"/>
                                                    <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                                           name="is_active" type="checkbox"
                                                           value="1" id="flexSwitchDefault"
                                                           @if($data->is_active == 1) checked @endif />
                                                </div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 col-form-label fw-bold fs-6">صورة البروفايل</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-8">
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('/admin')}}/assets/media/svg/avatars/blank.svg')">
                                                        <!--begin::Preview existing avatar-->

                                                        @if ($data->image)
{{--                                                            <img class="img-thumbnail" id="get_photo_link" style="width: 200px;" src="{{$data->image}}" data-holder-rendered="true">--}}
                                                            <div class="image-input-wrapper w-200px h-200px"
                                                                 style="background-image: url({{$data->image}})"></div>
                                                        @else
                                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{asset('/admin')}}/assets/media/avatars/blank.png)"></div>
                                                        @endif

                                                        <!--end::Preview existing avatar-->
                                                        <!--begin::Label-->
                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="تعديل">
                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                            <!--begin::Inputs-->
                                                            <input type="file" name="profile" accept="image/*" />
                                                            <input type="hidden" name="avatar_remove" />
                                                            <!--end::Inputs-->
                                                        </label>
                                                        <!--end::Label-->
                                                        <!--begin::Cancel-->
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="الغاء">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Cancel-->
                                                        <!--begin::Remove-->
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="حذف">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Remove-->
                                                    </div>
                                                    <!--end::Image input-->
                                                    <!--begin::Hint-->
                                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                    <!--end::Hint-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
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

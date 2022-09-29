@extends('admin.layouts.master')

@section('css')

@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">الشركات | {{$data->title}}</h1>
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


                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">

                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                               href="#client_data" onclick="">بيانات الشركة </a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                               href="#Followers" onclick="followers()">الفروع</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                               href="#Cards" onclick="cards()">التصنيفات الخاصة</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                               href="#Debts" onclick="debits()">المنتجات</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                               href="#payment" onclick="payment()">الطلبيات</a>
                        </li>

{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"--}}
{{--                               href="#notification" onclick="notification()">الاشعارات</a>--}}
{{--                        </li>--}}
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->

                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->

                        <div class="tab-pane fade show active" id="client_data" role="tab-panel">
                            <form id="kt_account_profile_details_form" action="{{url('admin/update-company')}}"
                                  class="form"
                                  method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{$data->id}}">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0 row">

                                            <div class="col-md-8">


                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">الاسم بالعربية </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="title_ar"
                                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                                           placeholder="الاسم بالعربية" value="{{$data->title_ar}}"
                                                           required/>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">الاسم بالانجليزية </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="title_en"
                                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                                           placeholder="الاسم بالانجليزية" value="{{$data->title_en}}"
                                                           required/>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">رابط العنوان على خرائط
                                                        جوجل </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="url" name="location"
                                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                                           placeholder="رابط العنوان على خرائط جوجل"
                                                           value="{{$data->location}}" required/>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->  <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="fw-bold fs-6 mb-2">البريد الالكترونى</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="email" name="email1"
                                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                                           placeholder="البريد الالكتروني" value="{{$data->email1}}"
                                                           required/>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">كلمة المرور
                                                        الجديدة</label>
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
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="fw-bold fs-6 mb-2">البريد الالكترونى2</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="email" name="email2"
                                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                                           placeholder="البريد الالكتروني2" value="{{$data->email2}}"
                                                    />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">رقم الجوال1</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="tel" name="phone1"
                                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                                           placeholder="رقم الجوال1" value="{{$data->phone1}}"
                                                           required/>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">رقم الجوال2</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="tel" name="phone2"
                                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                                           placeholder="رقم الجوال2" value="{{$data->phone2}}"/>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">نوع النشاط</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select class="form-select mb-2" name="activity_id"
                                                            data-control=""
                                                            data-hide-search="false" data-placeholder="إختر نوع النشاط"
                                                            required>
                                                        <option disabled value="">إختر نوع النشاط</option>
                                                        @foreach(\App\Models\Activity::root()->get() as $activity)
                                                            <option @if($data->activity_id == $activity->id) selected
                                                                    @endif
                                                                    value="{{$activity->id}}">{{$activity->title}}</option>
                                                        @endforeach
                                                    </select>
                                                    <!--end::Input-->
                                                </div>

                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">اسم المالك </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="owner_name"
                                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                                           placeholder="اسم المالك" value="{{$data->owner_name}}"
                                                           required/>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">رقم جوال المالك </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="tel" name="owner_phone"
                                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                                           placeholder="رقم جوال المالك" value="{{$data->owner_phone}}"
                                                           required/>
                                                    <!--end::Input-->
                                                </div>

                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">اسم المدير </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="ceo_name"
                                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                                           placeholder="اسم المدير" value="{{$data->ceo_name}}"
                                                           required/>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">رقم جوال المدير </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="tel" name="ceo_phone"
                                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                                           placeholder="رقم جوال المدير" value="{{$data->ceo_phone}}"
                                                           required/>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">الملف التجاري </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="file" name="commercial_file"
                                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                                           value="{{old('commercial_file')}}"
                                                    />
                                                    <a class="btn btn-light-info" target="_blank"
                                                       href="{{$data->commerical_file}}"><i
                                                            class="bi  bi-file-arrow-down"></i></a>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">الرقم المعرف
                                                        لمعروف </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="maroof_id"
                                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                                           value="{{$data->maroof_id}}"
                                                           placeholder="الرقم المعرف لمعروف"
                                                    />
                                                    <!--end::Input-->
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">تاريخ الانتهاء </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="date" name="expire_date"
                                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                                           value="{{$data->expire_date}}" placeholder="تاريخ الانتهاء"
                                                           required/>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">سعر التوصيل </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="number" name="delivery_price"
                                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                                           value="{{$data->delivery_price}}" placeholder="سعر التوصيل"
                                                           required/>
                                                    <!--end::Input-->
                                                </div>


                                                <div class="fv-row mb-7">
                                                    <div
                                                        class="form-check form-switch form-check-custom form-check-solid">
                                                        <label class="form-check-label" for="flexSwitchDefault">مفعل
                                                            ؟</label>
                                                        <input class="form-check-input" name="is_active" type="hidden"
                                                               value="0" id="flexSwitchDefault"/>
                                                        <input
                                                            class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                                            name="is_active" type="checkbox"
                                                            value="1" id="flexSwitchDefault"
                                                            @if($data->is_active == 1) checked @endif/>
                                                    </div>
                                                </div>

                                                <div class="fv-row mb-7">
                                                    <?php

                                                    $lat = !empty(old('lat')) ? old('lat') : '24.69670448385797';
                                                    $lng = !empty(old('lng')) ? old('lng') : '46.690517596875';

                                                    ?>
                                                    <label class="form-check-label" for="us1">الموقع على الخريطه</label>
                                                    <input type="hidden" value="" id="lat" name="lat">
                                                    <input type="hidden" value="" id="lng" name="lng">
                                                    <input type="text" id="search_input"
                                                           placeholder=" أبحث  بالمكان او اضغط على الخريطه"/>
                                                    <input type="hidden" id="information"/>
                                                    <div id="us1" style="width: 100%; height: 250px;"></div>
                                                </div>
                                                <!--end::Input group-->


                                            </div>
                                            <div class="col-lg-4">
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label fw-bold fs-6"> شعار
                                                        الشركة</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8">
                                                        <!--begin::Image input-->
                                                        <div class="image-input image-input-outline"
                                                             data-kt-image-input="true"
                                                             style="background-image: url('{{asset('/admin')}}/assets/media/svg/avatars/blank.svg')">
                                                            <!--begin::Preview existing avatar-->

                                                            @if ($data->logo)
                                                                {{--                                                            <img class="img-thumbnail" id="get_photo_link" style="width: 200px;" src="{{$data->image}}" data-holder-rendered="true">--}}
                                                                <div class="image-input-wrapper w-200px h-200px"
                                                                     style="background-image: url({{$data->logo}})"></div>
                                                            @else
                                                                <div class="image-input-wrapper w-125px h-125px"
                                                                     style="background-image: url({{asset('/admin')}}/assets/media/avatars/blank.png)"></div>
                                                        @endif

                                                        <!--end::Preview existing avatar-->
                                                            <!--begin::Label-->
                                                            <label
                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="change"
                                                                data-bs-toggle="tooltip" title="تعديل">
                                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                                <!--begin::Inputs-->
                                                                <input type="file" name="logo" accept="image/*"/>
                                                                <input type="hidden" name="avatar_remove"/>
                                                                <!--end::Inputs-->
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Cancel-->
                                                            <span
                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="cancel"
                                                                data-bs-toggle="tooltip" title="الغاء">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                            <!--end::Cancel-->
                                                            <!--begin::Remove-->
                                                            <span
                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="remove"
                                                                data-bs-toggle="tooltip" title="حذف">
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
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label fw-bold fs-6"> البانر</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8">
                                                        <!--begin::Image input-->
                                                        <div class="image-input image-input-outline"
                                                             data-kt-image-input="true"
                                                             style="background-image: url('{{asset('/admin')}}/assets/media/svg/avatars/blank.svg')">
                                                            <!--begin::Preview existing avatar-->

                                                            @if ($data->banner)
                                                                {{--                                                            <img class="img-thumbnail" id="get_photo_link" style="width: 200px;" src="{{$data->image}}" data-holder-rendered="true">--}}
                                                                <div class="image-input-wrapper w-325px h-150px"
                                                                     style="background-image: url({{$data->banner}})"></div>
                                                            @else
                                                                <div class="image-input-wrapper w-325px h-150px"
                                                                     style="background-image: url({{asset('/admin')}}/assets/media/avatars/blank.png)"></div>
                                                        @endif

                                                        <!--end::Preview existing avatar-->
                                                            <!--begin::Label-->
                                                            <label
                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="change"
                                                                data-bs-toggle="tooltip" title="تعديل">
                                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                                <!--begin::Inputs-->
                                                                <input type="file" name="banner" accept="image/*"/>
                                                                <input type="hidden" name="avatar_remove"/>
                                                                <!--end::Inputs-->
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Cancel-->
                                                            <span
                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="cancel"
                                                                data-bs-toggle="tooltip" title="الغاء">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                            <!--end::Cancel-->
                                                            <!--begin::Remove-->
                                                            <span
                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="remove"
                                                                data-bs-toggle="tooltip" title="حذف">
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
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::General options-->
                                    <div class="d-flex justify-content-end">

                                        <!--begin::Button-->
                                        <a href="{{url('admin/company')}}"
                                           id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">الغاء</a>
                                        <!--end::Button-->
                                        <button type="submit" id="kt_ecommerce_add_product_submit"
                                                class="btn btn-primary">
                                            <span class="indicator-label">حفظ</span>
                                            <span class="indicator-progress">برجاء الانتظار
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                </div>


                                <!--begin::Button-->
                            </form>
                        </div>
                        <div class="tab-pane fade" id="Followers" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <table class="table align-middle table-row-dashed fs-4 gy-5"
                                               id="data_table_followers">
                                            <!--begin::Table head-->
                                            <thead>
                                            <!--begin::Table row-->

                                            <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                                <th class="w-10px pe-2">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                        <input class="form-check-input" type="checkbox"
                                                               data-kt-check="true"
                                                               data-kt-check-target="#data_table .form-check-input"
                                                               value=""/>
                                                    </div>
                                                </th>

                                                <th class="min-w-125px">الاسم</th>
                                                <th class="min-w-125px">المدينة</th>
                                                <th class="min-w-125px">وقت التوصيل</th>
                                                <th class=" min-w-100px">الاجراءات</th>
                                            </tr>
                                            <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->


                                            <!--end::Table body-->
                                        </table>
                                    </div>
                                    <!--end::Card header-->
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="Cards" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <table class="table align-middle table-row-dashed fs-4 gy-5"
                                               id="data_table_cards">
                                            <!--begin::Table head-->
                                            <thead>
                                            <!--begin::Table row-->

                                            <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                                <th class="w-10px pe-2">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                        <input class="form-check-input" type="checkbox"
                                                               data-kt-check="true"
                                                               data-kt-check-target="#data_table_cards .form-check-input"
                                                               value=""/>
                                                    </div>
                                                </th>

                                                <th class="min-w-125px">الصورة</th>
                                                <th class="min-w-125px">الاسم</th>
                                                <th class="min-w-125px">اسم الشركة</th>
                                                <th class="min-w-125px">الاجرائات</th>

                                            </tr>
                                            <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->


                                            <!--end::Table body-->
                                        </table>
                                    </div>
                                    <!--end::Card header-->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Debts" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <table class="table align-middle table-row-dashed fs-4 gy-5"
                                               id="data_table_debts">
                                            <!--begin::Table head-->
                                            <thead>
                                            <!--begin::Table row-->

                                            <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                                <th class="w-10px pe-2">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                        <input class="form-check-input" type="checkbox"
                                                               data-kt-check="true"
                                                               data-kt-check-target="#data_table_debts .form-check-input"
                                                               value=""/>
                                                    </div>
                                                </th>

                                                <th class="min-w-125px">الصورة</th>
                                                <th class="min-w-125px">الاسم</th>
                                                <th class="min-w-125px">التصنيف</th>
                                                <th class="min-w-125px">الاجرائات</th>

                                            </tr>
                                            <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->


                                            <!--end::Table body-->
                                        </table>
                                    </div>
                                    <!--end::Card header-->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="payment" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <table class="table align-middle table-row-dashed fs-4 gy-5"
                                               id="data_table_payment">
                                            <!--begin::Table head-->
                                            <thead>
                                            <!--begin::Table row-->

                                            <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                                <th class="min-w-125px">رقم الفاتورة</th>
                                                <th class="min-w-125px">اسم العميل</th>
                                                <th class="min-w-125px">رقم جوال العميل</th>
                                                <th class="min-w-125px">السعر</th>
                                                <th class="min-w-125px">الحالة</th>
                                                <th class="min-w-125px">الاجرائات</th>

                                            </tr>
                                            <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->


                                            <!--end::Table body-->
                                        </table>
                                    </div>
                                    <!--end::Card header-->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="notification" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <table class="table align-middle table-row-dashed fs-4 gy-5"
                                               id="data_table_notification">
                                            <!--begin::Table head-->
                                            <thead>
                                            <!--begin::Table row-->

                                            <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                                <th class="w-10px pe-2">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                        <input class="form-check-input" type="checkbox"
                                                               data-kt-check="true"
                                                               data-kt-check-target="#data_table_notification .form-check-input"
                                                               value=""/>
                                                    </div>
                                                </th>

                                                <th class="min-w-125px">العنوان</th>
                                                <th class="min-w-125px">التفاصيل</th>
                                                <th class="min-w-125px">تاريخ الانشاء</th>
                                                {{--                                                <th class="min-w-125px">الاجرائات</th>--}}

                                            </tr>
                                            <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->


                                            <!--end::Table body-->
                                        </table>
                                    </div>
                                    <!--end::Card header-->
                                </div>
                            </div>
                        </div>


                        <!--end::Tab pane-->
                    </div>
                    <!--end::Tab content-->

                </div>


                <!--end::Form-->


                <!--end::Content-->
                <!--begin::Modal - Add task-->

                <!--begin::Modal - Add task-->
                <div class="modal fade" id="kt_modal_add_payment" tabindex="-3" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_add_debit_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bolder">اضف جديد</h2>
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
                                <form  class="form" method="post" action="{{url('admin/store-company_category')}}"
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

                                        <!--begin::Input group-->
                                        <input type="hidden" name="company_id" value="{{$data->id}}">
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">الاسم بالعربية </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="title_ar"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="الاسم بالعربية" value="{{old('title_ar')}}" required/>

                                            <!--end::Input-->
                                        </div>

                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">الاسم بالانجليزية </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="title_en"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="الاسم بالانجليزية" value="{{old('title_en')}}"
                                                   required/>

                                            <!--end::Input-->
                                        </div>

                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-bold fs-6">الصورة</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline"
                                                     data-kt-image-input="true"
                                                     style="background-image: url('{{asset('/admin')}}/assets/media/svg/avatars/blank.svg')">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                         style="background-image: url({{asset('/admin')}}/assets/media/avatars/blank.png)"></div>
                                                    <!--end::Preview existing avatar-->
                                                    <!--begin::Label-->
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="تعديل">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="image"
                                                               accept=".png, .jpg, .jpeg , .png"
                                                        />
                                                        <input type="hidden" name="avatar_remove"/>
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Cancel-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="الغاء">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Cancel-->
                                                    <!--begin::Remove-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="حذف">
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

                                        <!--end::Input group-->


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


            {{--                begin modal--}}
            <!--begin::Modal - Add task-->
                <div class="modal fade" id="kt_modal_add_product" tabindex="-3" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_add_debit_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bolder">اضف جديد</h2>
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
                                <form id="" class="form" method="post" action="{{url('admin/store-company_product')}}"
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

                                        <!--begin::Input group-->
                                        <input type="hidden" name="company_id" value="{{$data->id}}">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-bold fs-6">الصورة</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline"
                                                     data-kt-image-input="true"
                                                     style="background-image: url('{{asset('/admin')}}/assets/media/svg/avatars/blank.svg')">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                         style="background-image: url({{asset('/admin')}}/assets/media/avatars/blank.png)"></div>
                                                    <!--end::Preview existing avatar-->
                                                    <!--begin::Label-->
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="تعديل">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="image"
                                                               accept=".png, .jpg, .jpeg , .png"
                                                        />
                                                        <input type="hidden" name="avatar_remove"/>
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Cancel-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="الغاء">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Cancel-->
                                                    <!--begin::Remove-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="حذف">
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


                                        <!--end::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">التصنيف </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-select mb-2" name="company_category_id"
                                                    data-control="select2"
                                                    data-hide-search="false" data-placeholder="إختر التصنيف"
                                                    required>

                                                <option></option>
                                                @foreach(\App\Models\CompanyCategory::where('company_id',$data->id)->get() as $company)
                                                    <option value="{{$company->id}}">{{$company->title}}</option>
                                                @endforeach
                                            </select>
                                            <!--end::Input-->
                                        </div>

                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">الاسم بالعربية </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="title_ar"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="الاسم بالعربية" value="{{old('title_ar')}}" required/>

                                            <!--end::Input-->
                                        </div>

                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">الاسم بالانجليزية </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="title_en"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="الاسم بالانجليزية" value="{{old('title_en')}}"
                                                   required/>

                                            <!--end::Input-->
                                        </div>

                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class=" fw-bold fs-6 mb-2">الوصف بالعربية</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <textarea name="content_ar" id="kt_docs_tinymce_basic2" required>

                                                 </textarea>
                                            <!--end::Input-->
                                        </div>

                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class=" fw-bold fs-6 mb-2">الوصف بالانجليزية</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <textarea name="content_en" id="kt_docs_tinymce_basic1" required>

                                                 </textarea>
                                            <!--end::Input-->
                                        </div>

                                        <!--end::Input group-->

                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">السعر </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="number" name="price"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="السعر" value="{{old('price')}}" required/>

                                            <!--end::Input-->
                                        </div>
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">وقت التنفيذ </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="preparation_time"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="وقت التنفيذ" value="{{old('preparation_time')}}"
                                                   required/>

                                            <!--end::Input-->
                                        </div>
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">نوع المنتج </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select name="type"
                                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                                    required>
                                                <option value="Normal">عادي</option>
                                                <option value="Bundle">مركب</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>

                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <div id="attributes_append">
                                                <div class="col-lg-12">
                                                    <br>
                                                    <div class="col-lg-4">
                                                        <button class="form-control col-6 btn btn-primary add-attribute"
                                                                type="button"
                                                                onclick="add_new_attribute()">اضافة
                                                            خاصية
                                                            <i class="fa fa-plus"></i></button>
                                                    </div>


                                                </div>
                                            </div>
                                            <!--end::Input-->
                                        </div>

                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <div id="additions_append">
                                                <div class="col-lg-12">
                                                    <br>
                                                    <div class="col-lg-4">
                                                        <button
                                                            class="form-control col-6 btn btn-light-dark add-attribute"
                                                            type="button"
                                                            onclick="add_new_addition()">اضافة
                                                            اضافات
                                                            <i class="fa fa-plus"></i></button>
                                                    </div>


                                                </div>
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <div id="drinks_append">
                                                <div class="col-lg-12">
                                                    <br>
                                                    <div class="col-lg-4">
                                                        <button
                                                            class="form-control col-6 btn btn-secondary add-attribute"
                                                            type="button"
                                                            onclick="add_new_drink()">اضافة
                                                            مشروب
                                                            <i class="fa fa-plus"></i></button>
                                                    </div>


                                                </div>
                                            </div>
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

                <!--end::Modal - Add task-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->

@endsection

@section('js')
    <script src="{{ URL::asset('/admin/assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
    <script src="{{asset('/admin')}}/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script type="text/javascript"
            src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyAIcQUxj9rT_a3_5GhMp-i6xVqMrtasqws&language=ar'></script>
    <script>


        if (document.getElementById('us1')) {
            var content;
            var latitude = 24.69670448385797;
            var longitude = 46.690517596875;
            var map;
            var marker;
            @if($data->lat)
                latitude =  {{$data->lat}};
            @endif
                @if($data->lng)
                longitude = {{$data->lng}};
            @endif
            navigator.geolocation.getCurrentPosition(loadMap);


            function loadMap(location) {

                var myLatlng = new google.maps.LatLng(latitude, longitude);
                console.log(myLatlng)
                var mapOptions = {
                    zoom: 8,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,

                };
                map = new google.maps.Map(document.getElementById("us1"), mapOptions);

                content = document.getElementById('information');
                google.maps.event.addListener(map, 'click', function (e) {
                    placeMarker(e.latLng);
                });

                var input = document.getElementById('search_input');
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                var searchBox = new google.maps.places.SearchBox(input);

                google.maps.event.addListener(searchBox, 'places_changed', function () {
                    var places = searchBox.getPlaces();
                    placeMarker(places[0].geometry.location);
                });

                marker = new google.maps.Marker({
                    position: {lat: latitude, lng: longitude},
                    map: map
                });
            }
        }

        function placeMarker(location) {
            marker.setPosition(location);
            map.panTo(location);
            //map.setCenter(location)
            content.innerHTML = "Lat: " + location.lat() + " / Long: " + location.lng();
            $("#lat").val(location.lat());
            $("#lng").val(location.lng());
            google.maps.event.addListener(marker, 'click', function (e) {
                new google.maps.InfoWindow({
                    content: "Lat: " + location.lat() + " / Long: " + location.lng()
                }).open(map, marker);

            });
        }

    </script>
    <script>
        var options2 = {selector: "#kt_docs_tinymce_basic2"};

        if (KTApp.isDarkMode()) {
            options2["skin"] = "oxide-dark";
            options2["content_css"] = "dark";
        }

        tinymce.init(options2);
        var options = {selector: "#kt_docs_tinymce_basic1"};

        if (KTApp.isDarkMode()) {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
        }

        tinymce.init(options);
    </script>
    <script src="{{ URL::asset('/admin/assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
    <script>
        let i = 1;
        let j = 1;
        let k = 1;

        function add_new_attribute() {
            $('#attributes_append').append('<div style="background-color: whitesmoke" class="row">\n' +
                '                                                     <div class="col-5">\n' +
                '                                                         <label for="">الخاصية بالعربية</label>\n' +
                '                                                         <input class="form-control" type="text" name="attributess[' + i + '][attribute_name_ar]" id="">\n' +
                '                                                     </div>\n' +
                '                                                     <div class="col-5">\n' +
                '                                                         <label for="">الخاصية بالانجليزية</label>\n' +
                '                                                         <input class="form-control" type="text" name="attributess[' + i + '][attribute_name_en]" id="">\n' +
                '                                                     </div>\n' +

                '                                                     <div class="col-lg-2">\n' +
                '                                                         <label for=""> </label>\n' +
                '                                                         <button class="btn btn-danger me-3 font-weight-bolder removeappend"  "> \n' +
                '                                                        <i class="bi bi-trash-fill fs-2x"></i></button> \n' +
                '                                                     </div>\n' +

                '                                                     <div class="col-4">\n' +
                '                                                         <label for="">الصفة بالعربية</label>\n' +
                '                                                         <input class="form-control" type="text" name="attributess[' + i + '][attribute_option_ar]" id="">\n' +
                '                                                     </div>\n' +

                '                                                     <div class="col-4">\n' +
                '                                                         <label for="">الصفة بالانجليزية</label>\n' +
                '                                                         <input class="form-control" type="text" name="attributess[' + i + '][attribute_option_en]" id="">\n' +
                '                                                     </div>\n' +
                '                                                     <div class="col-4">\n' +
                '                                                         <label for="">السعر الاضافي</label>\n' +
                '                                                         <input class="form-control" type="number" name="attributess[' + i + '][attribute_price]" id="">\n' +
                '                                                     </div>\n' +
                '                                                 </div><br>'
            )
            ;
            i++;
        }

        function add_new_addition() {
            $('#additions_append').append('<div style="background-color: whitesmoke" class="row">\n' +
                '                                                     <div class="col-4">\n' +
                '                                                         <label for="">الاضافة بالعربية</label>\n' +
                '                                                         <input class="form-control" type="text" name="additions[' + j + '][addittion_name_ar]" id="">\n' +
                '                                                     </div>\n' +
                '                                                     <div class="col-4">\n' +
                '                                                         <label for="">الاضافة بالانجليزية</label>\n' +
                '                                                         <input class="form-control" type="text" name="additions[' + j + '][addittion_name_en]" id="">\n' +
                '                                                     </div>\n' +
                '                                                     <div class="col-3">\n' +
                '                                                         <label for="">السعر الاضافي</label>\n' +
                '                                                         <input class="form-control" type="number" name="additions[' + j + '][addittion_price]" id="">\n' +
                '                                                     </div>\n' +
                '                                                     <div class="col-lg-1">\n' +
                '                                                         <label for=""> </label>\n' +
                '                                                         <button class="btn btn-danger me-3 font-weight-bolder removeappend"  "> \n' +
                '                                                        <i class="bi bi-trash-fill fs-2x"></i></button> \n' +
                '                                                     </div>\n' +
                '                                                 </div><br>'
            )
            ;
            j++;
        }

        function add_new_drink() {
            $('#drinks_append').append('<div style="background-color: whitesmoke" class="row">\n' +
                '                                                     <div class="col-4">\n' +
                '                                                         <label for="">المشروب بالعربية</label>\n' +
                '                                                         <input class="form-control" type="text" name="drinks[' + k + '][drink_name_ar]" id="">\n' +
                '                                                     </div>\n' +
                '                                                     <div class="col-4">\n' +
                '                                                         <label for="">المشروب بالانجليزية</label>\n' +
                '                                                         <input class="form-control" type="text" name="drinks[' + k + '][drink_name_en]" id="">\n' +
                '                                                     </div>\n' +
                '                                                     <div class="col-3">\n' +
                '                                                         <label for="">السعر الاضافي</label>\n' +
                '                                                         <input class="form-control" type="number" name="drinks[' + k + '][drink_price]" id="">\n' +
                '                                                     </div>\n' +
                '                                                     <div class="col-lg-1">\n' +
                '                                                         <label for=""> </label>\n' +
                '                                                         <button class="btn btn-danger me-3 font-weight-bolder removeappend"  "> \n' +
                '                                                        <i class="bi bi-trash-fill fs-2x"></i></button> \n' +
                '                                                     </div>\n' +
                '                                                 </div><br>'
            )
            ;
            k++;
        }


        $('#attributes_append').on('click', '.removeappend', function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
        });
        $('#additions_append').on('click', '.removeappend', function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
        });
        $('#drinks_append').on('click', '.removeappend', function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
        });

    </script>





    <script type="text/javascript">
        var check_followers = false;

        function followers() {
            if (check_followers == false) {
                $(function () {
                    var table = $('#data_table_followers').DataTable({
                        processing: true,
                        serverSide: true,
                        autoWidth: false,
                        responsive: true,
                        aaSorting: [],
                        "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                        lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],
                        "language": {
                            search: '',
                            searchPlaceholder: 'بحث سريع'
                        },
                        buttons: [
                            {
                                extend: 'print',
                                className: 'btn btn-light-primary me-3',
                                text: '<i class="bi bi-printer-fill fs-2x"></i>'
                            },
                            // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                            {
                                extend: 'excel',
                                className: 'btn btn-light-primary me-3',
                                text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-2x"></i>'
                            },
                            // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}
                        ],
                        ajax: {
                            url: '{{ route('branch.datatable.data',$data->id)}}',
                            data: {}
                        },
                        columns: [
                            {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                            {data: 'title', name: 'title', "searchable": true, "orderable": true},
                            {data: 'city', name: 'city', "searchable": true, "orderable": true},
                            {data: 'delivery_time', name: 'delivery_time', "searchable": true, "orderable": true},
                            {data: 'actions', name: 'actions', "searchable": false, "orderable": false},

                        ]
                    });
                    $.ajax({
                        url: "{{ URL::to('admin/add-branch-button/'.$data->id)}}",
                        success: function (data) {
                            $('.add_button').append(data);
                            check_followers = true;
                        },
                        dataType: 'html'
                    });
                });
            }

        }

    </script>
    <script type="text/javascript">
        var check_cards = false;

        function cards() {
            if (check_cards == false) {
                $(function () {
                    var table = $('#data_table_cards').DataTable({
                        processing: true,
                        serverSide: true,
                        autoWidth: false,
                        responsive: true,
                        aaSorting: [],
                        "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button2'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                        lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],
                        "language": {
                            search: '',
                            searchPlaceholder: 'بحث سريع'
                        },
                        buttons: [
                            {
                                extend: 'print',
                                className: 'btn btn-light-primary me-3',
                                text: '<i class="bi bi-printer-fill fs-2x"></i>'
                            },
                            // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                            {
                                extend: 'excel',
                                className: 'btn btn-light-primary me-3',
                                text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-2x"></i>'
                            },
                            // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}
                        ],
                        ajax: {
                            url: '{{ route('company_category.datatable.data',$data->id)}}',
                            data: {}
                        },
                        columns: [
                            {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                            {data: 'image', name: 'image', "searchable": false, "orderable": false},
                            {data: 'title_ar', name: 'title_ar', "searchable": true, "orderable": true},
                            {data: 'company_id', name: 'company_id', "searchable": true, "orderable": true},
                            {data: 'actions', name: 'actions', "searchable": false, "orderable": false},


                        ]
                    });
                    $.ajax({
                        url: "{{ URL::to('admin/add-company_category-button/'.$data->id)}}",
                        success: function (data) {
                            $('.add_button2').append(data);
                            check_cards = true;
                        },
                        dataType: 'html'
                    });
                });
            }

        }

    </script>
    <script type="text/javascript">
        var check_debits = false;

        function debits() {
            if (check_debits == false) {
                $(function () {
                    var table = $('#data_table_debts').DataTable({
                        processing: true,
                        serverSide: true,
                        autoWidth: false,
                        responsive: true,
                        aaSorting: [],
                        "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button3'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                        lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],
                        "language": {
                            search: '',
                            searchPlaceholder: 'بحث سريع'
                        },
                        buttons: [
                            {
                                extend: 'print',
                                className: 'btn btn-light-primary me-3',
                                text: '<i class="bi bi-printer-fill fs-2x"></i>'
                            },
                            // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                            {
                                extend: 'excel',
                                className: 'btn btn-light-primary me-3',
                                text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-2x"></i>'
                            },
                            // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}
                        ],
                        ajax: {
                            url: '{{ route('company_product.datatable.data',$data->id)}}',
                            data: {}
                        },
                        columns: [
                            {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                            {data: 'image', name: 'image', "searchable": true, "orderable": true},
                            {data: 'title_ar', name: 'title_ar', "searchable": true, "orderable": true},
                            {
                                data: 'company_category_id',
                                name: 'company_category_id',
                                "searchable": true,
                                "orderable": true
                            },
                            {data: 'actions', name: 'actions', "searchable": false, "orderable": false},


                        ]
                    });
                    $.ajax({
                        url: "{{ URL::to('admin/add-company_product-button/'.$data->id)}}",
                        success: function (data) {
                            $('.add_button3').append(data);
                            check_debits = true;
                        },
                        dataType: 'html'
                    });
                });
            }

        }

    </script>
    <script type="text/javascript">
        var check_payment = false;

        function payment() {
            if (check_payment == false) {
                $(function () {
                    var table = $('#data_table_payment').DataTable({
                        processing: true,
                        serverSide: true,
                        autoWidth: false,
                        responsive: true,
                        aaSorting: [],
                        "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button4'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                        lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],
                        "language": {
                            search: '',
                            searchPlaceholder: 'بحث سريع'
                        },
                        buttons: [
                            {
                                extend: 'print',
                                className: 'btn btn-light-primary me-3',
                                text: '<i class="bi bi-printer-fill fs-2x"></i>'
                            },
                            // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                            {
                                extend: 'excel',
                                className: 'btn btn-light-primary me-3',
                                text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-2x"></i>'
                            },
                            // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}
                        ],
                        ajax: {
                            url: '{{ route('company_order.datatable.data',$data->id)}}',
                            data: {}
                        },
                        columns: [
                            {data: 'id', name: 'id', "searchable": true, "orderable": true},
                            {data: 'user_name', name: 'user_name', "searchable": true, "orderable": true},
                            {data: 'phone', name: 'phone', "searchable": true, "orderable": true},
                            {data: 'total_price', name: 'total_price', "searchable": true, "orderable": true},
                            {data: 'status', name: 'status', "searchable": true, "orderable": true},
                            {data: 'actions', name: 'actions', "searchable": false, "orderable": false},


                        ]
                    });
                    check_payment = true;

                });
            }

        }

    </script>
    {{--    <script type="text/javascript">--}}
    {{--        var check_notification = false;--}}

    {{--        function notification() {--}}
    {{--            if (check_notification == false) {--}}
    {{--                $(function () {--}}
    {{--                    var table = $('#data_table_notification').DataTable({--}}
    {{--                        processing: true,--}}
    {{--                        serverSide: true,--}}
    {{--                        autoWidth: false,--}}
    {{--                        responsive: true,--}}
    {{--                        aaSorting: [],--}}
    {{--                        "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button5'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable--}}
    {{--                        lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],--}}
    {{--                        "language": {--}}
    {{--                            search: '',--}}
    {{--                            searchPlaceholder: 'بحث سريع'--}}
    {{--                        },--}}
    {{--                        buttons: [--}}
    {{--                            {--}}
    {{--                                extend: 'print',--}}
    {{--                                className: 'btn btn-light-primary me-3',--}}
    {{--                                text: '<i class="bi bi-printer-fill fs-2x"></i>'--}}
    {{--                            },--}}
    {{--                            // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},--}}
    {{--                            {--}}
    {{--                                extend: 'excel',--}}
    {{--                                className: 'btn btn-light-primary me-3',--}}
    {{--                                text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-2x"></i>'--}}
    {{--                            },--}}
    {{--                            // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}--}}
    {{--                        ],--}}
    {{--                        ajax: {--}}
    {{--                            url: '{{ route('company.notification.datatable.data',$data->id)}}',--}}
    {{--                            data: {}--}}
    {{--                        },--}}
    {{--                        columns: [--}}
    {{--                            {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},--}}
    {{--                            {data: 'title', name: 'title', "searchable": true, "orderable": true},--}}
    {{--                            {data: 'body', name: 'body', "searchable": true, "orderable": true},--}}
    {{--                            {data: 'created_at', name: 'created_at', "searchable": true, "orderable": true},--}}
    {{--                            // {data: 'actions', name: 'actions', "searchable": true, "orderable": true},--}}

    {{--                        ]--}}
    {{--                    });--}}
    {{--                    $.ajax({--}}
    {{--                        url: "{{ URL::to('admin/add-company-notification-button/'.$data->id)}}",--}}
    {{--                        success: function (data) {--}}
    {{--                            $('.add_button5').append(data);--}}
    {{--                            check_notification = true;--}}
    {{--                        },--}}
    {{--                        dataType: 'html'--}}
    {{--                    });--}}
    {{--                });--}}
    {{--            }--}}

    {{--        }--}}

    {{--    </script>--}}
@endsection

@section('script')
    <script>
        var options = {selector: "#kt_docs_tinymce_basic"};

        if (KTApp.isDarkMode()) {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
        }

        tinymce.init(options);

        var options2 = {selector: "#kt_docs_tinymce_basic2"};

        if (KTApp.isDarkMode()) {
            options2["skin"] = "oxide-dark";
            options2["content_css"] = "dark";
        }

        tinymce.init(options2);

        var options3 = {selector: "#kt_docs_tinymce_basic3"};

        if (KTApp.isDarkMode()) {
            options2["skin"] = "oxide-dark";
            options2["content_css"] = "dark";
        }

        tinymce.init(options3);

        var options4 = {selector: "#kt_docs_tinymce_basic4"};

        if (KTApp.isDarkMode()) {
            options2["skin"] = "oxide-dark";
            options2["content_css"] = "dark";
        }

        tinymce.init(options4);

    </script>
@endsection

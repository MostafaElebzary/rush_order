@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">العملاء
        | {{$data->first_name}} {{$data->last_name}}</h1>
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
                    <!--begin::Card header-->
                    <div class="card-header cursor-pointer">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0"></h3>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Action-->
                        <a href="{{url('admin/edit-user')}}/{{$data->id}}" class="btn btn-primary align-self-center">تعديل
                            البيانات</a>
                        <!--end::Action-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Card body-->
                    <div class="row">
                        <div class="card-body col-8 p-9">
                            <!--begin::Row-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">الصورة</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <img src="{{$data->image}}" alt="{{$data->first_name}}"
                                         style="height: 225px;width: 225px">
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">الاسم بالكامل</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span
                                        class="fw-bolder fs-6 text-gray-800">{{$data->first_name}} {{$data->last_name}}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Input group-->

                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">رقم الجوال</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-bold text-gray-800 fs-6">{{$data->phone}}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">البريد الالكتروني</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-bold text-gray-800 fs-6">{{$data->email}}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">هل نشط</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    @if ($data->is_active == 1)
                                        <span class="badge badge-success">نشـط</span>
                                    @else
                                        <span class="badge badge-danger">غير نشـط</span>
                                    @endif
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                        </div>
                        <div class="card-header">
                            <h3>العناوين</h3>
                        </div>

                            @foreach($data->addresses as $address)
                                <div class="col-4 p-9">
                                    <!--begin::Row-->
                                    <div class="row mb-7">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 fw-bold text-muted">العنوان</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                    <span
                                        class="fw-bolder fs-6 text-gray-800">{{$address->address}}</span>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <div class="row mb-7">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 fw-bold text-muted">وصف العنوان</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                    <span
                                        class="fw-bolder fs-6 text-gray-800">{{$address->description}}</span>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <div class="row mb-7">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 fw-bold text-muted">عنوان افتراضي</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            @if ($address->is_default == 1)
                                                <span class="badge badge-success">افتراضي</span>
                                            @else
                                                <span class="badge badge-info">غير افتراضي</span>
                                            @endif
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->

                                </div>
                            @endforeach
                        </div>

                    <!--end::Card body-->
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

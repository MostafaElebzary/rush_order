@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">الاعدادات</h1>
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
                        <form id="kt_account_profile_details_form" action="{{url('admin/update-settings')}}"
                              class="form"
                              method="post" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <input type="hidden" name="id" value="{{$data->id}}" required/>

                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">الاسم</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="key"
                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="الاسم" value="{{$data->key}}" required/>
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class=" fw-bold fs-6 mb-2">الملف (ان وجد)</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="file" name="file" class="form-control form-control-solid mb-3 mb-lg-0">
                                    <!--end::Input-->
                                    @if($data->file)
                                        <a target="_blank" href="{{$data->file}}"
                                           class="btn large btn-icon btn-light-info"><i
                                                class="bi bi-file-arrow-down"></i> </a>
                                    @endif
                                </div>

                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class=" fw-bold fs-6 mb-2">القيمة</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <textarea name="value" id="kt_docs_tinymce_basic2">
                                            {!! $data->value !!}
                                    </textarea>
                                    <!--end::Input-->
                                </div>

                                <!--end::Input group-->

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

    <script src="{{ URL::asset('/admin/assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
    <script>
        var options2 = {selector: "#kt_docs_tinymce_basic2"};

        if (KTApp.isDarkMode()) {
            options2["skin"] = "oxide-dark";
            options2["content_css"] = "dark";
        }

        tinymce.init(options2);
    </script>
@endsection

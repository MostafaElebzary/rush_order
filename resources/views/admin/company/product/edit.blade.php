@extends('admin.layouts.master')

@section('css')
    <link href="{{asset('/admin')}}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css"/>

@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0"> منتجات الشركة | {{$data->Company->title}}  </h1>
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
                <form id="kt_account_profile_details_form" action="{{url('admin/update-company_product')}}"
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

                                                <input type="hidden" name="id" value="{{$data->id}}">
                                                <div class="col-8">
                                                    <!--end::Input group-->


                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-bold fs-6 mb-2">الاسم
                                                            بالعربية </label>
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
                                                        <label class="required fw-bold fs-6 mb-2">الاسم
                                                            بالانجليزية </label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="title_en"
                                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                                               placeholder="الاسم بالانجليزية"
                                                               value="{{$data->title_en}}"
                                                               required/>

                                                        <!--end::Input-->
                                                    </div>
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
                                                            @foreach(\App\Models\CompanyCategory::where('company_id',$data->Company->id)->get() as $company)
                                                                <option
                                                                    @if($data->company_category_id == $company->id) selected
                                                                    @endif
                                                                    value="{{$company->id}}">{{$company->title}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class=" fw-bold fs-6 mb-2">الوصف بالعربية</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <textarea name="content_ar" id="kt_docs_tinymce_basic2"
                                                                  required>
                                                                  {!! $data->content_ar !!}

                                                 </textarea>
                                                        <!--end::Input-->
                                                    </div>

                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class=" fw-bold fs-6 mb-2">الوصف بالانجليزية</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <textarea name="content_en" id="kt_docs_tinymce_basic1"
                                                                  required>
                                                            {!! $data->content_en !!}

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
                                                               placeholder="السعر" value="{{$data->price}}" required/>

                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-bold fs-6 mb-2">وقت التنفيذ </label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="preparation_time"
                                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                                               placeholder="وقت التنفيذ"
                                                               value="{{$data->preparation_time}}"
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
                                                            <option @if($data->type =="Normal") selected
                                                                    @endif   value="Normal">عادي
                                                            </option>
                                                            <option @if($data->type =="Bundle") selected
                                                                    @endif  value="Bundle">مركب
                                                            </option>
                                                        </select>
                                                        <!--end::Input-->
                                                    </div>

                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <div id="attributes_append">
                                                            <div class="col-lg-12">
                                                                <br>
                                                                <div class="col-lg-4">
                                                                    <button
                                                                        class="form-control col-6 btn btn-primary add-attribute"
                                                                        type="button"
                                                                        onclick="add_new_attribute()">اضافة
                                                                        خاصية
                                                                        <i class="fa fa-plus"></i></button>
                                                                </div>
                                                            </div>
                                                            @if($data->attributes)
                                                                @foreach($data->attributes as $key => $value)
                                                                    <div class="row">
                                                                        <div class="col-2">
                                                                            <label for="">الخاصية بالعربية</label>
                                                                            <input class="form-control" type="text"
                                                                                   name="attributess[{{$key}}][attribute_name_ar]"
                                                                                   value="{{$value->attribute_name_ar}}">
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <label for="">الخاصية بالانجليزية</label>
                                                                            <input class="form-control" type="text"
                                                                                   name="attributess[{{$key}}][attribute_name_en]"
                                                                                   value="{{$value->attribute_name_en}}">
                                                                        </div>
                                                                        <div class="col-2">
                                                                            <label for="">الصفة بالعربية</label>
                                                                            <input class="form-control" type="text"
                                                                                   name="attributess[{{$key}}][attribute_option_ar]"
                                                                                   value="{{$value->attribute_option_ar}}">
                                                                        </div>
                                                                        <div class="col-2">
                                                                            <label for="">الصفة بالانجليزية</label>
                                                                            <input class="form-control" type="text"
                                                                                   name="attributess[{{$key}}][attribute_option_en]"
                                                                                   value="{{$value->attribute_option_en}}">
                                                                        </div>
                                                                        <div class="col-2">
                                                                            <label for="">السعر الاضافي</label>
                                                                            <input class="form-control" type="number"
                                                                                   name="attributess[{{$key}}][attribute_price]"
                                                                                   value="{{$value->attribute_price}}">
                                                                        </div>
                                                                        <div class="col-lg-1">
                                                                            <label for=""> </label>
                                                                            <button
                                                                                class="btn btn-danger me-3 font-weight-bolder removeappend">
                                                                                <i class="bi bi-trash-fill fs-2x"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @endif
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

                                                            @if($data->additions)
                                                                @foreach($data->additions as $key => $value)
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <label for="">الاضافة بالعربية</label>
                                                                            <input class="form-control" type="text"
                                                                                   name="additions[{{$key}}][addittion_name_ar]"
                                                                                   value="{{$value->addittion_name_ar}}">
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <label for="">الاضافة بالانجليزية</label>
                                                                            <input class="form-control" type="text"
                                                                                   name="additions[{{$key}}][addittion_name_en]"
                                                                                   value="{{$value->addittion_name_en}}">
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <label for="">السعر الاضافي</label>
                                                                            <input class="form-control" type="text"
                                                                                   name="additions[{{$key}}][addittion_price]"
                                                                                   value="{{$value->addittion_price}}">
                                                                        </div>

                                                                        <div class="col-lg-1">
                                                                            <label for=""> </label>
                                                                            <button
                                                                                class="btn btn-danger me-3 font-weight-bolder removeappend">
                                                                                <i class="bi bi-trash-fill fs-2x"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @endif

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
                                                            @if($data->drinks)
                                                                @foreach($data->drinks as $key => $value)
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <label for="">المشروب بالعربية</label>
                                                                            <input class="form-control" type="text"
                                                                                   name="drinks[{{$key}}][drink_name_ar]"
                                                                                   value="{{$value->drink_name_ar}}">
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <label for="">المشروب بالانجليزية</label>
                                                                            <input class="form-control" type="text"
                                                                                   name="drinks[{{$key}}][drink_name_en]"
                                                                                   value="{{$value->drink_name_en}}">
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <label for="">السعر الاضافي</label>
                                                                            <input class="form-control" type="text"
                                                                                   name="drinks[{{$key}}][drink_price]"
                                                                                   value="{{$value->drink_price}}">
                                                                        </div>

                                                                        <div class="col-lg-1">
                                                                            <label for=""> </label>
                                                                            <button
                                                                                class="btn btn-danger me-3 font-weight-bolder removeappend">
                                                                                <i class="bi bi-trash-fill fs-2x"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>

                                                </div>

                                                <div class="col-4">
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label
                                                            class="col-lg-4 col-form-label fw-bold fs-6">الصورة</label>
                                                        <!--end::Label-->
                                                        <!--begin::Col-->
                                                        <div class="col-lg-8">
                                                            <!--begin::Image input-->

                                                            <div class="image-input image-input-outline"
                                                                 data-kt-image-input="true"
                                                                 style="background-image: url('{{asset('/admin')}}/assets/media/svg/avatars/blank.svg')">
                                                                <!--begin::Preview existing avatar-->

                                                                @if ($data->image)
                                                                    {{--                                                            <img class="img-thumbnail" id="get_photo_link" style="width: 200px;" src="{{$data->image}}" data-holder-rendered="true">--}}
                                                                    <div class="image-input-wrapper w-325px h-150px"
                                                                         style="background-image: url({{$data->image}})"></div>
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
                                                                    <input type="file" name="image" accept="image/*"/>
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
                                                            <div class="form-text">Allowed file types: png, jpg, jpeg.
                                                            </div>
                                                            <!--end::Hint-->

                                                            <!--end::Hint-->
                                                        </div>
                                                        <!--end::Col-->
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
                    <br>
                    <br>
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

    <script>
            @if($data->attributes)
        let i = {{count($data->attributes)}} +1;
            @else
        let i = 1;

        @endif
        function add_new_attribute() {
            $('#attributes_append').append('<div style="background-color: whitesmoke" class="row">\n' +
                '                                                     <div class="col-2">\n' +
                '                                                         <label for="">الخاصية بالعربية</label>\n' +
                '                                                         <input class="form-control" type="text" name="attributess[' + i + '][attribute_name_ar]" id="">\n' +
                '                                                     </div>\n' +
                '                                                     <div class="col-3">\n' +
                '                                                         <label for="">الخاصية بالانجليزية</label>\n' +
                '                                                         <input class="form-control" type="text" name="attributess[' + i + '][attribute_name_en]" id="">\n' +
                '                                                     </div>\n' +

                '                                                     <div class="col-2">\n' +
                '                                                         <label for="">الصفة بالعربية</label>\n' +
                '                                                         <input class="form-control" type="text" name="attributess[' + i + '][attribute_option_ar]" id="">\n' +
                '                                                     </div>\n' +

                '                                                     <div class="col-2">\n' +
                '                                                         <label for="">الصفة بالانجليزية</label>\n' +
                '                                                         <input class="form-control" type="text" name="attributess[' + i + '][attribute_option_en]" id="">\n' +
                '                                                     </div>\n' +
                '                                                     <div class="col-2">\n' +
                '                                                         <label for="">السعر الاضافي</label>\n' +
                '                                                         <input class="form-control" type="number" name="attributess[' + i + '][attribute_price]" id="">\n' +
                '                                                     </div>\n' +
                '                                                     <div class="col-lg-1">\n' +
                '                                                         <label for=""> </label>\n' +
                '                                                         <button class="btn btn-danger me-3 font-weight-bolder removeappend"  "> \n' +
                '                                                        <i class="bi bi-trash-fill fs-2x"></i></button> \n' +
                '                                                     </div>\n' +

                '                                                 </div><br>'
            )
            ;
            i++;
        }


            @if($data->additions)
        let j = {{count($data->additions)}} +1;
            @else
        let j = 1;

        @endif

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


            @if($data->drinks)
        let k = {{count($data->drinks)}} +1;
            @else
        let k = 1;

        @endif

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
@endsection

@section('script')

@endsection

@extends('client.layouts.master')

@section('css')
    <link href="{{asset('/admin')}}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/admin')}}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">المنتجات</h1>
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
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
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
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
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
                                    <form id="" class="form" method="post" action="{{url('client/store-company_product')}}"
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
    <script src="{{asset('/admin')}}/assets/plugins/custom/datatables/datatables.bundle.js"></script>
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
                '                                                         <button class="btn btn-danger me-3  removeappend"  "> \n' +
                '                                                        <i class="bi bi-trash-fill "></i></button> \n' +
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
                '                                                         <button class="btn btn-danger me-3  removeappend"  "> \n' +
                '                                                        <i class="bi bi-trash-fill "></i></button> \n' +
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
                '                                                         <button class="btn btn-danger me-3  removeappend"  "> \n' +
                '                                                        <i class="bi bi-trash-fill "></i></button> \n' +
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
    <script type="text/javascript">

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
                    url: '{{ route('client.company_product.datatable.data',$data->id)}}',
                    data: {}
                },
                columns: [
                    {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                    {data: 'image', name: 'image', "searchable": true, "orderable": true},
                    {data: 'title_ar', name: 'title_ar', "searchable": true, "orderable": true},
                    {data: 'company_category_id',name: 'company_category_id',"searchable": true,"orderable": true},
                    {data: 'actions', name: 'actions', "searchable": false, "orderable": false},


                ]
            });
            $.ajax({
                url: "{{ URL::to('client/add-company_product-button/'.$data->id)}}",
                success: function (data) {
                    $('.add_button3').append(data);

                },
                dataType: 'html'
            });
        });
    </script>

@endsection

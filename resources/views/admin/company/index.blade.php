@extends('admin.layouts.master')

@section('css')
    <link href="{{asset('/admin')}}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/admin')}}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet"
          type="text/css"/>

@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">سجلات المنشآت</h1>
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
                        <table class="table align-middle table-row-dashed fs-4 gy-5" id="data_table">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->

                            <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                               data-kt-check-target="#data_table .form-check-input" value=""/>
                                    </div>
                                </th>

                                <th class="min-w-125px">الشعار</th>
                                <th class="min-w-125px">الاسم</th>
                                <th class="min-w-125px">البريد الالكترونى</th>
                                <th class="min-w-125px">رقم الجوال</th>
                                <th class="min-w-125px">النشاط</th>
                                <th class="min-w-125px">الحالة</th>
                                <th class=" min-w-100px">الاجراءات</th>
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
                    <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Modal header-->
                                <div class="modal-header" id="kt_modal_add_user_header">
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
                                    <form id="" class="form" method="post" action="{{url('admin/store-company')}}"
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
                                                <label class="col-lg-4 col-form-label fw-bold fs-6">الشعار</label>
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
                                                            <input type="file" name="logo" accept=".png, .jpg, .jpeg"
                                                                   required/>
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
                                                <label class="col-lg-4 col-form-label fw-bold fs-6">البانر</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-8">
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-outline"
                                                         data-kt-image-input="true"
                                                         style="background-image: url('{{asset('/admin')}}/assets/media/svg/avatars/blank.svg')">
                                                        <!--begin::Preview existing avatar-->
                                                        <div class="image-input-wrapper w-325px h-150px"
                                                             style="background-image: url({{asset('/admin')}}/assets/media/avatars/blank.png)"></div>
                                                        <!--end::Preview existing avatar-->
                                                        <!--begin::Label-->
                                                        <label
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                            title="تعديل">
                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                            <!--begin::Inputs-->
                                                            <input type="file" name="banner" accept=".png, .jpg, .jpeg"
                                                                   required/>
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
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">الاسم بالعربية </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="title_ar"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="الاسم بالعربية" value="{{old('title_ar')}}"
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
                                                       placeholder="الاسم بالانجليزية" value="{{old('title_en')}}"
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
                                                       value="{{old('location')}}" required/>
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
                                                       placeholder="البريد الالكتروني" value="{{old('email1')}}"
                                                       required/>
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">كلمة المرور</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="password" name="password"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="كلمة المرور" value="" required/>
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">تأكيد كلمة المرور</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="password" name="password_confirmation"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="تأكيد كلمة المرور" value="" required/>
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">البريد الالكترونى2</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="email" name="email2"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="البريد الالكتروني2" value="{{old('email2')}}"
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
                                                       placeholder="رقم الجوال1" value="{{old('phone1')}}" required/>
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">رقم الجوال2</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="tel" name="phone2"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="رقم الجوال2" value="{{old('phone2')}}"/>
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
                                                    @foreach(\App\Models\Activity::all() as $activity)
                                                        <option value="{{$activity->id}}">{{$activity->title}}</option>
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
                                                       placeholder="اسم المالك" value="{{old('owner_name')}}" required/>
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">رقم جوال المالك </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="tel" name="owner_phone"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="رقم جوال المالك" value="{{old('owner_phone')}}"
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
                                                       placeholder="اسم المدير" value="{{old('ceo_name')}}" required/>
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">رقم جوال المدير </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="tel" name="ceo_phone"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="رقم جوال المدير" value="{{old('ceo_phone')}}"
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
                                                       required/>
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">الرقم المعرف لمعروف </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="maroof_id"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       value="{{old('maroof_id')}}" placeholder="الرقم المعرف لمعروف"
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
                                                       value="{{old('expire_date')}}" placeholder="تاريخ الانتهاء"
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
                                                       value="{{old('delivery_price')}}" placeholder="سعر التوصيل"
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
                                                        value="1" id="flexSwitchDefault" checked/>
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
                                                <input type="text" id="search_input" placeholder=" أبحث  بالمكان او اضغط على الخريطه" />
                                                <input type="hidden" id="information"  />
                                                <div id="us1" style="width: 100%; height: 250px;"></div>
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

    <script type="text/javascript"
            src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyAIcQUxj9rT_a3_5GhMp-i6xVqMrtasqws&language=ar'></script>

    <script type="text/javascript">
        $(function () {
            var table = $('#data_table').DataTable({
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
                    url: '{{ route('company.datatable.data') }}',
                    data: {}
                },
                columns: [
                    {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                    {data: 'logo', name: 'logo', "searchable": false, "orderable": false},
                    {data: 'title_ar', name: 'title_ar', "searchable": true, "orderable": true},
                    {data: 'email1', name: 'email1', "searchable": true, "orderable": true},
                    {data: 'phone1', name: 'phone1', "searchable": true, "orderable": true},
                    {data: 'activity_id', name: 'activity_id', "searchable": true, "orderable": true},
                    {data: 'is_active', name: 'is_active', "searchable": true, "orderable": true},
                    {data: 'actions', name: 'actions', "searchable": false, "orderable": false},
                ]
            });
            $.ajax({
                url: "{{ URL::to('admin/add-company-button')}}",
                success: function (data) {
                    $('.add_button').append(data);
                },
                dataType: 'html'
            });
        });
    </script>

    <script>




        if (document.getElementById('us1')) {
            var content;
            var latitude = 24.69670448385797;
            var longitude = 46.690517596875;
            var map;
            var marker;
            navigator.geolocation.getCurrentPosition(loadMap);

            function loadMap(location) {
                if (location.coords) {
                    latitude = location.coords.latitude;
                    longitude = location.coords.longitude;
                }
                var myLatlng = new google.maps.LatLng(latitude, longitude);
                var mapOptions = {
                    zoom: 8,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,

                };
                map = new google.maps.Map(document.getElementById("us1"), mapOptions);

                content = document.getElementById('information');
                google.maps.event.addListener(map, 'click', function(e) {
                    placeMarker(e.latLng);
                });

                var input = document.getElementById('search_input');
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                var searchBox = new google.maps.places.SearchBox(input);

                google.maps.event.addListener(searchBox, 'places_changed', function() {
                    var places = searchBox.getPlaces();
                    placeMarker(places[0].geometry.location);
                });

                marker = new google.maps.Marker({
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
            google.maps.event.addListener(marker, 'click', function(e) {
                new google.maps.InfoWindow({
                    content: "Lat: " + location.lat() + " / Long: " + location.lng()
                }).open(map,marker);

            });
        }



        function showInput() {
            document.getElementById('comp_name').innerHTML =
                document.getElementsByName("name")[0].value;
            document.getElementById('comp_email').innerHTML =
                document.getElementsByName("email")[0].value;
            document.getElementById('comp_phone').innerHTML =
                document.getElementsByName("phone")[0].value;
            document.getElementById('comp_address').innerHTML =
                document.getElementsByName("address")[0].value;
            document.getElementById('branch_name').innerHTML =
                document.getElementsByName("branch_name")[0].value;
            document.getElementById('branch_email').innerHTML =
                document.getElementsByName("branch_email")[0].value;
            document.getElementById('branch_phone').innerHTML =
                document.getElementsByName("branch_phone")[0].value;
            var lat = document.getElementsByName("lat")[0].value;
            var lng = document.getElementsByName("lng")[0].value;


            var latlng = new google.maps.LatLng(lat, lng);
            var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({'latLng': latlng}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[1]) {
                        document.getElementById('branch_location').innerHTML = results[1].formatted_address;
                    }
                }
            });
        }
    </script>
@endsection

@extends('client.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">بيانات المؤسسة</h1>
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
                        <form id="kt_account_profile_details_form" action="{{url('client/update-company-profile')}}"
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
        $('#flexSwitchDefault1').change(function () {
            if ($(this).is(":checked")) {
                $("#branch").css("display", 'none');
            } else {
                $("#branch").css("display", 'block');
            }
        })
    </script>

@endsection

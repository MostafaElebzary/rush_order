<div class="dt-buttons flex-wrap">

    <!--end::Filter-->


    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
            data-bs-target="#kt_modal_add_payment">
        <i class="bi bi-plus-circle-fill fs-2x"></i>
    </button>

    <!--end::Add user-->
    <button id="delete4" class="btn btn-light-danger me-3 font-weight-bolder">
        <i class="bi bi-trash-fill fs-2x"></i>
    </button>


</div>

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
                <form id="" class="form" method="post" action="{{url('client/store-branch')}}"
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
                                   placeholder="الاسم بالانجليزية" value="{{old('title_en')}}" required/>

                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">مدة التوصيل </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="delivery_time"
                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                   placeholder="مدة التوصيل" value="{{old('delivery_time')}}" required/>

                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">المدينة </label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <select class="form-select mb-2" name="city_id"
                                    required>
                                <option value="">اختر مدينة</option>
                                @foreach(\App\Models\City::all() as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <?php

                            $lat = !empty(old('lat')) ? old('lat') : '24.69670448385797';
                            $lng = !empty(old('lng')) ? old('lng') : '46.690517596875';

                            ?>
                            <label class="form-check-label" for="us2">الموقع على الخريطه</label>
                            <input type="hidden" value="" id="lat1" name="lat">
                            <input type="hidden" value="" id="lng1" name="lng">
                            <input type="text" id="search_input2" placeholder=" أبحث  بالمكان او اضغط على الخريطه"/>
                            <input type="hidden" id="information"/>
                            <div id="us2" style="width: 100%; height: 250px;"></div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->


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

<script>


    if (document.getElementById('us2')) {
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
            map = new google.maps.Map(document.getElementById("us2"), mapOptions);

            content = document.getElementById('information');
            google.maps.event.addListener(map, 'click', function (e) {
                placeMarker(e.latLng);
            });

            var input = document.getElementById('search_input2');
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            var searchBox = new google.maps.places.SearchBox(input);

            google.maps.event.addListener(searchBox, 'places_changed', function () {
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
        $("#lat1").val(location.lat());
        $("#lng1").val(location.lng());
        google.maps.event.addListener(marker, 'click', function (e) {
            new google.maps.InfoWindow({
                content: "Lat: " + location.lat() + " / Long: " + location.lng()
            }).open(map, marker);

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
<script type="text/javascript">

    $("#delete4").on("click", function () {
        var dataList = [];
        $("input:checkbox:checked").each(function (index) {
            dataList.push($(this).val())
        })
        if (dataList.length > 0) {
            Swal.fire({
                title: "تحذير.هل انت متأكد؟!",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f64e60",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function (result) {
                if (result.value) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '{{url("client/delete-branch")}}',
                        type: "get",
                        data: {'id': dataList, _token: CSRF_TOKEN},
                        dataType: "JSON",
                        success: function (data) {
                            if (data.message == "Success") {
                                $("input:checkbox:checked").parents("tr").remove();
                                Swal.fire("", "تم الحذف بنجاح", "success");
                                // location.reload();
                            } else {
                                Swal.fire("", "حدث خطأ ما اثناء الحذف", "error");
                            }
                        },
                        fail: function (xhrerrorThrown) {
                            Swal.fire("", "حدث خطأ ما اثناء الحذف", "error");
                        }
                    });
                    // result.dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                    Swal.fire("ألغاء", "تم الالغاء", "error");
                }
            });
        }
    });
</script>

<script>

</script>

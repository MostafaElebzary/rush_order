@extends('front.layout.master')
@section('content')    


<!-- main-area -->
<main>

    <!-- breadcrumb-area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content">
                        <div class="breadcrumb-title">
                            <h2 class="title">سجل منشأتك الان</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- faq-area -->
    <section class="faq-area">
        <div class="container">
            @php $msg=session()->get("status"); @endphp
            @if( session()->has("message"))

                    @if( $msg == "success")
                        <div class="alert alert-success mb-0">
                            تم الاضافة بنجاح
                        </div>
                        <br>

                    @elseif ( $msg == "error")
                        <div class="alert alert-danger mb-0">
                            عفوا ، هناك خطأ ما !
                        </div>
                        <br>
                    @endif


            @endif

            <form class="contact-form" action="{{url('store-company')}}" method="post" data-toggle="validator" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6">

                        <label>الشعار</label>
                        <input type="file" name="logo" accept=".png, .jpg, .jpeg" required>

                        <label>البانر</label>
                        <input type="file" name="banner" accept=".png, .jpg, .jpeg" required>

                        <label>الاسم بالعربية </label>
                        <input type="text" name="title_ar" placeholder="ادخل الاسم بالعربية" value="{{old('title_ar')}}" required>

                        <label>الاسم بالانجليزية </label>
                        <input type="text" name="title_en" placeholder="ادخل الاسم بالانجليزية" value="{{old('title_en')}}" required>

                        <label>رابط العنوان على خرائط جوجل </label>
                        <input type="url" name="location" placeholder="ادخل رابط العنوان على خرائط جوجل" value="{{old('location')}}" required/>

                        <label> البريد الالكتروني</label>
                        <input type="email" name="email1" placeholder="ادخل البريد الالكتروني" value="{{old('email1')}}" required>

                        <label>كلمة المرور</label>
                        <input type="password" name="password" placeholder="ادخل كلمة المرور" value="" required>

                        <label>تأكيد كلمة المرور</label>
                        <input type="password" name="password_confirmation" placeholder="ادخل تأكيد كلمة المرور" value="" required>

                        <label> البريد الالكتروني 2</label>
                        <input type="email" name="email1" placeholder="ادخل البريد الالكتروني 2" value="{{old('email2')}}">

                        <label>رقم الجوال 1</label>
                        <input type="tel" name="phone1" placeholder="ادخل رقم الجوال 1" value="{{old('phone1')}}" required>

                        <label>رقم الجوال 2</label>
                        <input type="tel" name="phone2" placeholder=" ادخل رقم الجوال 2" value="{{old('phone2')}}">

                    </div>

                    <div class="col-12 col-md-6">
                            
                        <label>نوع النشاط</label>
                        <select class="form-select mt-2" name="activity_id"
                                data-control="" data-hide-search="false" data-placeholder="إختر نوع النشاط" required>
                            
                            <option disabled value="">إختر نوع النشاط</option>
                            @foreach(\App\Models\Activity::whereNull('parent_id')->get() as $activity)
                                <option value="{{$activity->id}}">{{$activity->title}}</option>
                            @endforeach
                        </select>
                        <br>

                        <label>اسم المالك</label>
                        <input type="text" name="owner_name" placeholder="ادخل اسم المالك" value="{{old('owner_name')}}" required>

                        <label>رقم جوال المالك </label>
                        <input type="tel" name="owner_phone" placeholder="ادخل رقم جوال المالك" value="{{old('owner_phone')}}" required>

                        <label>اسم المدير </label>
                        <input type="text" name="ceo_name" placeholder="ادخل اسم المدير" value="{{old('ceo_name')}}" required>

                        <label>رقم جوال المدير </label>
                        <input type="tel" class="form-control form-control-solid" name="ceo_phone" placeholder="ادخل رقم جوال المدير" value="{{old('ceo_phone')}}" required >

                        <label>الملف التجاري </label>
                        <input type="file" name="commercial_file" value="{{old('commercial_file')}}" required>

                        <label>الرقم المعرف لمعروف </label>
                        <input type="text" name="maroof_id" value="{{old('maroof_id')}}" placeholder="ادخل الرقم المعرف لمعروف">

                        <label>سعر التوصيل </label>
                        <input type="number" name="delivery_price" value="{{old('delivery_price')}}" placeholder="ادخل سعر التوصيل" required>

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

                            <button class="btn login-sub" type="submit">تسجيل البيانات  </button>
                            
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- faq-area-end -->


</main>
<!-- main-area-end -->

@endsection

@section('script')
    <script type="text/javascript"
            src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyAIcQUxj9rT_a3_5GhMp-i6xVqMrtasqws&language=ar'></script>

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
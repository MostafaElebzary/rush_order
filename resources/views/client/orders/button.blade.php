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

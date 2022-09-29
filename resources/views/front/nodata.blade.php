@extends('front.layout.master')
@section('content')

    <!-- main-area -->
    <main>

        <!-- comingSoon-area -->
        <section class="comingsoon-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="comingsoon-img">
                            <img src="{{ URL::asset('front')}}/assets/img/images/comming_img.png" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="comingsoon-content">
                            <h2 class="title">عفوا .. لا يوجد بيانات</h2>
                            <span>------------------------------------------------------------</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- comingSoon-area-end -->

    </main>

@endsection

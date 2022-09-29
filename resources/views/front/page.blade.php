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
                            <h2 class="title">{{ $data->key }}</h2>
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
            {{ $data->value }}
        </div>
    </section>
    <!-- faq-area-end -->


</main>
<!-- main-area-end -->

@endsection

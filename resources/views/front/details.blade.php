@extends('front.layout.master')
@section('content')

    <!-- main-area -->
    <main>

            <!-- breadcrumb-area -->
            <div class="breadcrumb-area" style="background: linear-gradient(rgb(255 255 255 / 100%), rgb(255 255 255 / 75%)), url('{{$data->banner}}');background-position: center;background-repeat: no-repeat;background-size: cover;">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="breadcrumb-content">
                                <div class="breadcrumb-title">
                                    <img src="{{$data->logo}}" style="max-width:200px;">
                                    <br><br>
                                    <h2 class="title">{{$data->title_ar}}</h2>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area-end -->

            <!-- blog-area -->
            <section class="blog-area pt-120 pb-120">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-2">

                        </div>
                        <div class="col-lg-8">
                            <div class="blog-sidebar">
                                @foreach ($data->CompanyCategories as $cat)
                                <div class="widget">
                                    <h4 class="widget-title">{{$cat->title_ar}}</h4>
                                    <div class="rc-post-list">
                                        <ul>
                                            @foreach ($cat->CompanyProducts as $product)
                                                <li>
                                                    <div class="rc-post-thumb">
                                                        <a href="javascript:;"><img src="{{$product->image}}" alt=""></a>
                                                    </div>
                                                    <div class="rc-post-content">
                                                        <h6 class="title"><a href="javascript:;">{{$product->title_ar}}</a></h6>
                                                        <span class="date">{!! $product->content_ar !!}</span>
                                                    </div>
                                                    @if($product->attributes)
                                                        @foreach ($product->attributes as $attribute)
                                                            <div class="rc-post-content">
                                                                <h6 class="title">{{$attribute->attribute_option_ar}}</h6>
                                                                <span class="date">{{$attribute->attribute_price + $product->price}}</span>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                    <div class="rc-post-content">
                                                        <h6 class="title">السـعر</h6>
                                                        <span class="date">{{$product->price}}</span>
                                                    </div>
                                                    @endif

                                                </li>

                                            @endforeach
                                        </ul>
                                    </div>

                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-2">

                        </div>
                    </div>
                </div>
            </section>
            <!-- blog-area-end -->


        </main>
    <!-- main-area-end -->

@endsection

@extends('front.layout.master')
@section('content')

    <!-- main-area -->
    <main>

        <!-- banner-area -->
        <section id="home" class="banner-area static-home-banner">
            <div class="banner-left-shape"></div>
            <div class="banner-right-shape"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xxl-7 col-lg-6">
                        <div class="banner-content">
                            <h2 class="title wow fadeInUp" data-wow-delay=".2s">بدء حياتك الذكية مع فانتاستك</h2>
                            <p class="wow fadeInUp" data-wow-delay=".4s">الخاطئة المتمثلة في إدانة المتعة لكن يجب أن أشرح لك كيف ولدته الفكرة الخاطئة المتمثلة في إدانة المتعة ومدح الألم وسأقدم لك سردًا كاملاًالخاطئة المتمثلة في إدانة المتعة.</p>
                            <div class="download-btn">
                                <a href="#" class="btn transparent-btn fadeInRight" data-wow-delay=".6s">
                                    <i class="fab fa-android"></i>
                                    <p>متاح على <span>متجر جوجل</span></p>
                                </a>
                                <a href="#" class="btn transparent-btn fadeInLeft" data-wow-delay=".6s">
                                    <i class="fab fa-apple"></i>
                                    <p>متاح على <span>متجر آبل</span></p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-lg-6">
                        <div class="banner-img wow fadeInLeft" data-wow-delay=".4s">
                            <img src="{{ URL::asset('front')}}/assets/img/banner/banner_img.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner-area-end -->

        <!-- features-area -->
        <section class="features-area pt-70 pb-20">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="features-item text-center mb-50 wow fadeInUp" data-wow-delay=".2s">
                            <div class="features-icon">
                                <img src="{{ URL::asset('front')}}/assets/img/icons/features_icon01.png" alt="">
                            </div>
                            <div class="features-content">
                                <h4 class="title">تصميم آمن</h4>
                                <p>كاملاً للنظام وشرح التعاليم الفعلية للمستكشفأعطيك حسابًا كاملاً للنظام وشرح التعاليم الفعلية للمستكشف العظيم للحقيقة السيد.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="features-item text-center mb-50 wow fadeInUp" data-wow-delay=".4s">
                            <div class="features-icon">
                                <img src="{{ URL::asset('front')}}/assets/img/icons/features_icon02.png" alt="">
                            </div>
                            <div class="features-content">
                                <h4 class="title">تصميم رائع</h4>
                                <p>كاملاً للنظام وشرح التعاليم الفعلية للمستكشفأعطيك حسابًا كاملاً للنظام وشرح التعاليم الفعلية للمستكشف العظيم للحقيقة السيد.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="features-item text-center mb-50 wow fadeInUp" data-wow-delay=".6s">
                            <div class="features-icon">
                                <img src="{{ URL::asset('front')}}/assets/img/icons/features_icon03.png" alt>
                            </div>
                            <div class="features-content">
                                <h4 class="title">سهل التخصيص</h4>
                                <p>كاملاً للنظام وشرح التعاليم الفعلية للمستكشفأعطيك حسابًا كاملاً للنظام وشرح التعاليم الفعلية للمستكشف العظيم للحقيقة السيد.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- features-area-end -->

        <!-- about-area -->
        <section id="about" class="about-area home-static-about pt-70 pb-70">
            <div class="about-shape"></div>
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-5 col-lg-6">
                        <div class="about-img wow fadeInRight" data-wow-delay=".3s">
                            <img src="{{ URL::asset('front')}}/assets/img/images/about_img.png" alt="img">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="section-title mb-40">
                            <h2 class="title">تطبيقات رائعة لجهاز <br> ازدهار العمل</h2>
                        </div>
                        <div class="about-content">
                            <p>لكن يجب أن أشرح لك كيف ولدت كل هذه الفكرة الخاطئة المتمثلة في إدانة المتعة ومدح الألم ، وسأقدم لك وصفًا كاملاً للنظام ، وأشرح التعاليم الفعلية للمستكشف العظيم للحقيقة ، الباني البارع للإنسان سعادة. لا أحد يرفض أو يكره أو يتجنب المتعة نفسها لأنها متعة ، ولكن بسبب أولئك الذين لا يعرفون كيفية السعي وراءها.</p>
                            <a href="#" class="btn">اقرأ أكثر</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->

        <!-- app-features-area -->
        <section id="features" class="app-features-area pt-70 pb-70">
            <div class="app-features-shape"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="section-title text-center mb-40">
                            <h2 class="title">ميزات التطبيقات</h2>
                            <p>لكن يجب أن أشرح لك كيف أن كل هذه الفكرة الخاطئة المتمثلة في إدانة المتعة وتمجيد الألم التي ولدت ستعطي سردًا كاملاً.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-features-wrapper">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="add-features-item mb-50 wow fadeInUp" data-wow-delay=".2s">
                                        <div class="add-features-icon">
                                            <img src="{{ URL::asset('front')}}/assets/img/icons/app_features01.png" alt="">
                                        </div>
                                        <div class="add-features-content">
                                            <h4 class="title">استجابة كاملة</h4>
                                            <p>ولكن علي أن أشرح لكم كيف كل هذه الفكرة الخاطئة في التنديد بالسرور والثناء.</p>
                                        </div>
                                    </div>
                                    <div class="add-features-item mb-50 wow fadeInUp" data-wow-delay=".4s">
                                        <div class="add-features-icon">
                                            <img src="{{ URL::asset('front')}}/assets/img/icons/app_features03.png" alt="">
                                        </div>
                                        <div class="add-features-content">
                                            <h4 class="title">تصميم رائع</h4>
                                            <p>ولكن علي أن أشرح لكم كيف كل هذه الفكرة الخاطئة في التنديد بالسرور والثناء.</p>
                                        </div>
                                    </div>
                                    <div class="add-features-item wow fadeInUp" data-wow-delay=".6s">
                                        <div class="add-features-icon">
                                            <img src="{{ URL::asset('front')}}/assets/img/icons/app_features05.png" alt="">
                                        </div>
                                        <div class="add-features-content">
                                            <h4 class="title">سريع جدا</h4>
                                            <p>ولكن علي أن أشرح لكم كيف كل هذه الفكرة الخاطئة في التنديد بالسرور والثناء.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="add-features-item mb-50 wow fadeInUp" data-wow-delay=".2s">
                                        <div class="add-features-icon">
                                            <img src="{{ URL::asset('front')}}/assets/img/icons/app_features02.png" alt="">
                                        </div>
                                        <div class="add-features-content">
                                            <h4 class="title">الضمان الممنوح</h4>
                                            <p>ولكن علي أن أشرح لكم كيف كل هذه الفكرة الخاطئة في التنديد بالسرور والثناء.</p>
                                        </div>
                                    </div>
                                    <div class="add-features-item mb-50 wow fadeInUp" data-wow-delay=".4s">
                                        <div class="add-features-icon">
                                            <img src="{{ URL::asset('front')}}/assets/img/icons/app_features04.png" alt="">
                                        </div>
                                        <div class="add-features-content">
                                            <h4 class="title">دردشة مجانية كاملة</h4>
                                            <p>ولكن علي أن أشرح لكم كيف كل هذه الفكرة الخاطئة في التنديد بالسرور والثناء.</p>
                                        </div>
                                    </div>
                                    <div class="add-features-item wow fadeInUp" data-wow-delay=".6s">
                                        <div class="add-features-icon">
                                            <img src="{{ URL::asset('front')}}/assets/img/icons/app_features06.png" alt="">
                                        </div>
                                        <div class="add-features-content">
                                            <h4 class="title">100٪ تحديث مجاني</h4>
                                            <p>ولكن علي أن أشرح لكم كيف كل هذه الفكرة الخاطئة في التنديد بالسرور والثناء.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="app-features-img">
                                <img src="{{ URL::asset('front')}}/assets/img/images/app-features_img.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- app-features-area -->

        <!-- app-screenshot-area -->
        <section id="screesnshot" class="app-screenshot-area pt-70 pb-70">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="section-title text-center mb-60">
                            <h2 class="title">لقطة شاشة التطبيقات</h2>
                            <p>لكن يجب أن أشرح لك كيف أن كل هذه الفكرة الخاطئة المتمثلة في إدانة المتعة والثناء على الألم ولدت ستعطي سردًا كاملاً.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container custom-container">
                <div class="row app-active">
                    <div class="col-12">
                        <div class="app-item">
                            <a href="{{ URL::asset('front')}}/assets/img/screenshot/01.jpg" class="popup-image"><img src="{{ URL::asset('front')}}/assets/img/screenshot/01.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="app-item">
                            <a href="{{ URL::asset('front')}}/assets/img/screenshot/02.jpg" class="popup-image"><img src="{{ URL::asset('front')}}/assets/img/screenshot/02.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="app-item">
                            <a href="{{ URL::asset('front')}}/assets/img/screenshot/03.jpg" class="popup-image"><img src="{{ URL::asset('front')}}/assets/img/screenshot/03.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="app-item">
                            <a href="{{ URL::asset('front')}}/assets/img/screenshot/04.jpg" class="popup-image"><img src="{{ URL::asset('front')}}/assets/img/screenshot/04.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="app-item">
                            <a href="{{ URL::asset('front')}}/assets/img/screenshot/05.jpg" class="popup-image"><img src="{{ URL::asset('front')}}/assets/img/screenshot/05.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="app-item">
                            <a href="{{ URL::asset('front')}}/assets/img/screenshot/01.jpg" class="popup-image"><img src="{{ URL::asset('front')}}/assets/img/screenshot/01.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- app-screenshot-area-end -->

        <!-- contact-area -->
        <section id="contact" class="contact-area pt-120 pb-200">
            <div class="contact-shape"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="section-title text-center mb-60">
                            <h2 class="title">اتصل بنا</h2>
                            <p>لكن يجب أن أشرح لك كيف أن كل هذه الفكرة الخاطئة المتمثلة في إدانة المتعة والثناء على الألم ولدت ستعطي سردًا كاملاً.</p>
                        </div>
                    </div>
                </div>
                <div class="contact-inner">
                    <form id="contact-form" class="contact-form" action="#" data-toggle="validator">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <input type="text" name="name" placeholder="اسم :" required="required" data-error="Name is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-grp">
                                    <input type="email" name="email" placeholder=": البريد الإلكتروني" required="required" data-error="Email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-grp">
                                    <input type="text" name="phone" placeholder="هاتف :" required="required" data-error="Phone is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <textarea name="message" placeholder="رسالة :" required="required" data-error="Message is required."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="contact-btn text-center mt-10">
                            <button type="submit" class="btn">أرسل رسالة</button>
                        </div>
                        <div class="messages"></div>
                    </form>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->

@endsection

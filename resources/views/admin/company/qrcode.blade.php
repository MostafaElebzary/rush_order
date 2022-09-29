@extends('admin.layouts.master')

@section('css')

    <link href="{{asset('/admin')}}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css"/>
    <style>
        table.print > thead > tr > td, table.print > thead > tr > th {
            color: #181c32;
            background: #f3f6f9;
            padding-right: 10px;
        }

        
        @media print {
            body {
                height:1px;
                overflow: hidden;
                visibility: hidden;
                display: none;
            }

            .hid {
                position: absolute;
                top: 0px;
                visibility: visible;
                overflow: inherit;
                height: auto;
            }

            .hidden-item {
                height:1px;
                overflow: hidden;
                visibility: hidden;
                display: none;
            }
            
        }
    </style>
@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">  </h1>
@endsection

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid hid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <!-- begin::Wrapper-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <div class="container-fluid invoice-container"> 
                            <!-- Header -->
                            <header>
                            <div class="row align-items-left">
                                <div class="col-sm-5 text-left">
                                    <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none" style="background: #000000;color: #ffffff !important;font-size: 18px;font-weight: bold;border: none !important;padding: 10px 25px;"> طباعه</a></div>
                                </div>
                                <div class="col-sm-7 text-left text-sm-start mb-3 mb-sm-0">  </div>
                                
                            </div>
                            <hr>
                            </header>
                            
                            <!-- Main Content -->
                            <main>
                                {{QrCode::size(800)->generate(url('company-details/'.$data))}}
                            </main>
                            <!-- Footer -->
                            <footer class="text-center">
                            {{-- <hr>
                            <p><strong>Koice Inc.</strong><br>
                                4th Floor, Plot No.22, Above Public Park, 145 Murphy Canyon Rd,<br>
                                Suite 100-18, San Diego CA 2028. </p>
                            <hr>
                            <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical signature.</p> --}}
                            
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end::Body-->

        </div>


        <!--end::Form-->





        <!--end::Content-->

    </div>
    <!--end::Container-->
    </div>
    <!--end::Post-->
    </div>
    <!--end::Content-->


@endsection

@section('js')
    <script src="{{ URL::asset('/admin/assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>

@endsection

@section('script')

@endsection

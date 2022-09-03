@extends('admin.layouts.master')

@section('css')
    <link href="{{asset('/admin')}}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/admin')}}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">تقرير الطلبات</h1>
    <h3 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">من {{$from}} :الى {{$to}} </h3>

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
                    <div class="card-header">
                        <div id="kt_account_settings_profile_details" class="collapse show">
                            <!--begin::Form-->
                            <form id="kt_account_profile_details_form" action="{{url('admin/reports/orders')}}"
                                  class="form"
                                  method="post" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Card body-->
                                <div class="card-body border-top p-24">
                                    <!--begin::Input group-->
                                    <div class="row">
                                        <div class="col-4 fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">من تاريخ</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="date" name="from"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="from" value="{{$from}}" required/>
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-4 fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">الى تاريخ</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="date" name="to"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="to" value="{{$to}}" required/>
                                            <!--end::Input-->
                                        </div>

                                        <div class="col-4 card-footer d-flex justify-content-end py-6 px-9">
                                            <button type="submit" class="btn btn-primary"
                                                    id="kt_account_profile_details_submit">حفظ
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Scroll-->
                                <!--begin::Actions-->

                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-4 gy-5" id="data_table">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->

                            <tr class="text-start text-muted bold  text-hover-primary fw-bolder fs-5 text-uppercase gs-0">
                                <th class="min-w-125px">عدد الطلبات</th>
                                <th class="min-w-125px">اجمالى المبالغ</th>
                                <th class="min-w-125px">اجمالى تكلفة التوصيل</th>
                                <th class="min-w-125px">نسب الالغاء</th>
                                <th class="min-w-125px">المنشأة الاكثر مبيعا</th>
                                <th class="min-w-125px">المنتج الاكثر مبيعا</th>

                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                            <tr>
                                <td>{{$count}}</td>
                                <td>{{$total_price}}</td>
                                <td>{{$delivery_price}}</td>
                                <td>{{$canceled / $count *100}} %</td>
                                <td>{{$most_sell_company?$most_sell_company->Company->title :"--"}}</td>
                                <td>{{$most_sell_product?$most_sell_product->CompanyProduct->title :"--"}}</td>
                            </tr>
                            </tbody>

                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->

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

@endsection

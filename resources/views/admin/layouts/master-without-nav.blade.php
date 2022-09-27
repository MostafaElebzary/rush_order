<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl">
	<!--begin::Head-->
	<head><base href="">
		<title>{{settings('site_title')}}</title>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		@include('admin.layouts.head')
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<!--begin::Root-->
		@yield('content')
		<!--end::Root-->
		<!--end::Main-->
		@include('admin.layouts.footer-script')
	</body>
	<!--end::Body-->
</html>
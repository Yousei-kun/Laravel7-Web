<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote-django/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Jul 2021 15:31:22 GMT -->
<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset("assets/admin/images/favicon.ico")}}">

    <!-- Bootstrap Css -->
    <link href="{{asset("assets/admin/css/bootstrap.min.css")}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset("assets/admin/css/icons.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset("assets/admin/css/app.min.css")}}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-sidebar="dark">
    @yield("content")
</body>

<!-- JAVASCRIPT -->
<script src="{{asset("assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/metismenu/metisMenu.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/simplebar/simplebar.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/node-waves/waves.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/jquery/jquery.min.js")}}"></script>

<!-- apexcharts -->
<script src="{{asset("assets/admin/libs/apexcharts/apexcharts.min.js")}}"></script>


<!-- dashboard blog init -->
<script src="{{asset("assets/admin/js/pages/dashboard-blog.init.js")}}"></script>

<script src="{{asset("assets/admin/js/app.js")}}"></script>


<!-- Mirrored from themesbrand.com/skote-django/layouts/dashboard-blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Jul 2021 15:30:57 GMT -->
</html>


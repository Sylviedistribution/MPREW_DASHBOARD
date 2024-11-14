<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset("assets/img/apple-icon.png")}}">
    <link rel="icon" type="image/png" href="{{asset("assets/img/favicon.png")}}">
    <title>
        Argon Dashboard 3 by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <!-- Nucleo Icons -->
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet"/>
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet"/>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset("assets/css/argon-dashboard.css?v=2.1.0")}}" rel="stylesheet"/>
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
</head>

<body id="page-top">
<!-- Page Wrapper -->
<div id="">

    <!-- Sidebar -->
    @include('#layouts.sidebar')
    <!-- End of Sidebar -->
    <main class="main-content position-relative border-radius-lg ">

        <!-- Navbar -->
        @include('#layouts.navbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->

        @yield('contents')
    </main>

</div>
        <!-- End of Main Content -->

<!-- Scroll to Top Button-->


<!--   Core JS Files   -->
<script src="{{asset("assets/js/core/popper.min.js")}}"></script>
<script src="{{asset("assets/js/core/bootstrap.min.js")}}"></script>
<script src="{{asset("assets/js/plugins/perfect-scrollbar.min.js")}}"></script>
<script src="{{asset("assets/js/plugins/smooth-scrollbar.min.js")}}"></script>
<script src="{{asset("assets/js/plugins/chartjs.min.js")}}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Dashboard Ma_Petite_Robe_En_Wax
    </title>

    <!-- YANGO API-->
    <script src="https://yastatic.net/taxi-widget/ya-taxi-widget.js"></script>

    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet"/>
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css?v=2.1.0') }}" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="{{asset("assets/img/logo_icon.png")}}">


    <!-- jQuery (required for Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Custom Script -->
    <script src="{{ asset('assets/js/myscript.js') }}"></script>
</head>

<body id="page-top">
<!-- Page Wrapper -->
<div id="">

    <!-- Sidebar -->
    @include('#layouts.sidebar')
    <!-- End of Sidebar -->
    <main class="main-content position-relative border-radius-lg ">

        @include('#layouts.navbar')
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        <!-- Begin Page Content -->
        @yield('contents')

    </main>

</div>
        <!-- End of Main Content -->

<!-- API YANGO -->
<!--   Core JS Files   -->
<script src="{{asset("assets/js/core/popper.min.js")}}"></script>
<script src="{{asset("assets/js/core/bootstrap.min.js")}}"></script>
<script src="{{asset("assets/js/plugins/perfect-scrollbar.min.js")}}"></script>
<script src="{{asset("assets/js/plugins/smooth-scrollbar.min.js")}}"></script>
<script src="{{asset("assets/js/plugins/chartjs.min.js")}}"></script>
</body>
</html>

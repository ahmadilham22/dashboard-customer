<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Kazee Inventory</title>

<!-- General CSS Files -->
<link rel="stylesheet" href="{{ asset('/stisla-2.2.0/dist/assets/modules/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('/stisla-2.2.0/dist/assets/modules/fontawesome/css/all.min.css') }}">

<!-- Plugins -->
<link rel="stylesheet" href="{{ asset('/stisla-2.2.0/dist/assets/modules/bootstrap-social/bootstrap-social.css') }}">
<link rel="stylesheet" href="{{ asset('/stisla-2.2.0/dist/assets/modules/select2/dist/css/select2.min.css') }}">

<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('/stisla-2.2.0/dist/assets/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('/stisla-2.2.0/dist/assets/css/components.css') }}">


{{-- chart --}}
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
<style>
    .select2{
        width: 100% !important;
    }

    table.table.form-table td {
        padding: 0 5px !important;
        height: 45px !important;
    }

    .main-sidebar .sidebar-menu li ul.dropdown-menu li a{
        padding-left: 30px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice, .select2-container--default .select2-results__option[aria-selected=true], .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #a23234;
        color: #fff;
    }
</style>
@yield('css')
</head>

<body>
<div id="app">
    <div class="main-wrapper">
        @include('layouts.partials._navbar')
        @include('layouts.partials._sidebar')

        @yield('content')

        @include('layouts.partials._footer')
      </div>
</div>


<!-- General JS Scripts -->
<script src="{{ asset('/stisla-2.2.0/dist/assets/modules/jquery.min.js') }}"></script>
<script src="{{ asset('/stisla-2.2.0/dist/assets/modules/popper.js') }}"></script>
<script src="{{ asset('/stisla-2.2.0/dist/assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('/stisla-2.2.0/dist/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/stisla-2.2.0/dist/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('/stisla-2.2.0/dist/assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('/stisla-2.2.0/dist/assets/js/stisla.js') }}"></script>

<!-- Plugins -->
 <script src="{{ asset('/stisla-2.2.0/dist/assets/modules/sweetalert/sweetalert.min.js') }}"></script>
 <script src="{{ asset('/stisla-2.2.0/dist/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{ asset('/stisla-2.2.0/dist/assets/js/scripts.js') }}"></script>
<script src="{{ asset('/stisla-2.2.0/dist/assets/js/custom.js') }}"></script>
<script type="text/javascript">
    @if(Session::has('alert-success'))
    swal("Success", "{{Session::get('alert-success')}}!", "success", {
      button: "Ok !",
    });
    @elseif(Session::has('alert-error'))
    swal("Error", "{{Session::get('alert-error')}}!", "error", {
      button: "Ok !",
    });
    @endif
</script>
@yield('js')
</body>
</html>

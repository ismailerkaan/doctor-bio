<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="{{asset('assets/backend/img/favicon.png')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/plugins/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/css/feather.css')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/plugins/select2/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/plugins/owl-carousel/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/plugins/daterangepicker/daterangepicker.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>


    <link rel="stylesheet" href="{{asset('assets/backend/plugins/datatables/datatables.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">

    <title>Document</title>
</head>
<body>
<div class="main-wrapper">
    {{--Header Başlangıç--}}
    @include('admin.layout.header')
    {{--Header Bitiş--}}

    {{--SİDEBAR BAŞLANGIÇ--}}
    @include('admin.layout.sidebar')
    {{--SİDEBAR BİTİŞ--}}


    {{--    Sayfa içeriği Başlangıç--}}
    <div class="page-wrapper">

        @if (count($errors)>0)

            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorAlert">

                @foreach ($errors->all() as $message)
                    {{$message}}<br>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="errorAlert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
            </div>
        @endif
        @yield('content')


    </div>
    {{--    Sayfa içeriği Bitiş--}}

</div>
<!-- language popover -->


<script src="{{asset('assets/backend/js/jquery-3.6.0.min.js')}}"></script>

<script src="{{asset('assets/backend/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/backend/js/feather.min.js')}}"></script>

<script src="{{asset('assets/backend/plugins/select2/js/select2.min.js')}}"></script>

<script src="{{asset('assets/backend/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<script src="{{asset('assets/backend/plugins/owl-carousel/owl.carousel.min.js')}}"></script>

<script src="{{asset('assets/backend/plugins/apexchart/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/apexchart/chart-data.js')}}"></script>

<script src="{{asset('assets/backend/js/moment.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/daterangepicker/daterangepicker.js')}}"></script>

<script src="{{asset('assets/backend/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables/datatables.min.js')}}"></script>

<script src="{{asset('assets/backend/js/script.js')}}"></script>


@yield('js')

</body>
</html>

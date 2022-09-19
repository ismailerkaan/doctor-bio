<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from template.doccure.io/html/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 May 2022 07:08:09 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Klinik Doktor</title>

    <link type="image/x-icon" href="{{asset('assets/frontend/img/favicon.png')}}" rel="icon">

    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/frontend/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/plugins/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/frontend/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    @yield('css')

</head>
<body>

<div class="main-wrapper">
    {{--Header Başlangıç--}}
    @include('frontend.layouts.header')
    {{--Header Bitiş--}}

    {{--    Content--}}
    @yield('content')
    {{--    Content--}}

    {{--Footer başlangıç--}}
    @include('frontend.layouts.footer')
    {{--Footer bitiş--}}

</div>


<script data-cfasync="false"
        src="{{asset('assets/frontend/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery-3.6.0.min.js')}}"></script>

<script src="{{asset('assets/frontend/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/frontend/js/slick.js')}}"></script>

<script src="{{asset('assets/frontend/js/aos.js')}}"></script>
<script src="{{asset('assets/frontend/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
<script src="{{asset('assets/frontend/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>
<script src="{{asset('assets/frontend/js/circle-progress.min.js')}}"></script>

<script src="{{asset('assets/frontend/js/script.js')}}"></script>


@yield('js')
</body>

<!-- Mirrored from template.doccure.io/html/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 May 2022 07:08:32 GMT -->
</html>

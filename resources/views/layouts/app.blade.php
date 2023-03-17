<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/toastr/toatr.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    {{-- :: Begin Main Wrapper :: --}}

    <div class="main-wrapper">

        {{-- :: Begin Header Section :: --}}

        @include('layouts.common.header')

        {{-- :: End Header Section :: --}}

        {{-- :: Begin Sidebar Section :: --}}

        @include('layouts.common.sidebar')

        {{-- :: End Sidebar Section :: --}}

        {{-- :: Begin Page Wrapper :: --}}

        <div class="page-wrapper pagehead">
            <div class="content">

                {{-- :: Begin Page Header :: --}}

                {{$header}}

                {{-- :: End Page Header :: --}}

                {{-- :: Begin Main Section :: --}}

                {{$slot}}

                {{-- :: End Main Section :: --}}

            </div>
        </div>

        {{-- :: End Page Wrapper :: --}}

    </div>

    {{-- :: End Main Wrapper :: --}}

    {{-- :: Begin Script Section --}}

    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sweetalert/sweetalerts.min.js')}}"></script>


    @yield('page_script')

    <script src="{{asset('assets/js/script.min.js')}}"></script>

    @if(Session::has('status'))
    @if(Session::get('status')['success'] === true)
    <script>
        $(document).ready(function(){
            toastr.success("Success", "{{Session::get('status')['message']}}", {
                closeButton: !0,
                tapToDismiss: !1,
            });
       });
    </script>
    @endif

    @if(Session::get('status')['success'] === false)
    <script>
       
        $(document).ready(function(){
            toastr.error("Error", "{{Session::get('status')['message']}}", {
                closeButton: !0,
                tapToDismiss: !1,
            });
       });
    </script>
    @endif
    @endif

    {{-- :: End Script Section --}}

</body>

</html>
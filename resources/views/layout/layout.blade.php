<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"  @if(app()->getLocale() == 'ar') dir="rtl" class="translated-ltr" @endif>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}" />
    <title>LY</title>
    @include('layout.style')
    @include('layout.js')

</head>
<body>
<!-- Top navbar -->
@include('layout.top')
<!-- Page container -->
<div class="page-container">
    <!-- Page content -->
    <div class="page-content">

    <!-- left Menu -->
    @include('layout.left')
    <!-- /left Menu -->

        <!-- Main content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /main content -->

    <!-- flash Session -->
    @include('layout.flash')
    <!-- /flash Session -->

    </div>
    <!-- /page content -->
</div>
<!-- /page container -->
</body>
</html>
<!-- Title -->
<title> @yield('title')</title>

@yield('css')
<!---Internal Owl Carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
<!---Internal  Multislider css-->
<link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
<!--- Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

<!--Internal Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@if(App::getLocale() == 'ar' )
    <!-- Favicon -->
    <link rel="icon" href="{{URL::asset('assets/img/brand/favicon.png')}}" type="image/x-icon"/>
    <!-- Icons css -->
    <link href="{{URL::asset('assets/css/icons.css')}}" rel="stylesheet">
    <!--  Custom Scroll bar-->
    <link href="{{URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
    <!--  Sidebar css -->
    <link href="{{URL::asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{URL::asset('assets/css-rtl/sidemenu.css')}}">
    <!--- Style css -->
    <link href="{{URL::asset('assets/css-rtl/style.css')}}" rel="stylesheet">
    <!--- Dark-mode css -->
    <link href="{{URL::asset('assets/css-rtl/style-dark.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{URL::asset('assets/css-rtl/skin-modes.css')}}" rel="stylesheet">

@else
         <!-- Favicon -->
    <link rel="icon" href="{{URL::asset('assets/img/brand/favicon.png')}}" type="image/x-icon"/>
    <!-- Icons css -->
    <link href="{{URL::asset('assets/css/icons.css')}}" rel="stylesheet">
    <!--  Custom Scroll bar-->
    <link href="{{URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
    <!--  Sidebar css -->
    <link href="{{URL::asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/sidemenu.css')}}">
    <!--- Style css -->
    <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet">
    <!--- Dark-mode css -->
    <link href="{{URL::asset('assets/css/style-dark.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{URL::asset('assets/css/skin-modes.css')}}" rel="stylesheet">
@endif

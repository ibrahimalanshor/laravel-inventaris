<!-- Required meta tags-->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="au theme template">
<meta name="author" content="Hau Nguyen">
<meta name="keywords" content="au theme template">

<!-- Title Page-->
<title>@yield('title')</title>

<!-- Fontfaces CSS-->
<link href="{{ asset('cool-admin/css/font-face.css') }}" rel="stylesheet" media="all">
<link href="{{ asset('cool-admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
<link href="{{ asset('cool-admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

<link href="{{ asset('cool-admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">

<!-- Bootstrap CSS-->
<link href="{{ asset('cool-admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

<!-- Vendor CSS-->

<!-- Main CSS-->
<link href="{{ asset('cool-admin/css/theme.css') }}" rel="stylesheet" media="all">

@stack('css')
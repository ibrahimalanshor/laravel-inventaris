<!DOCTYPE html>
<html lang="en">

<head>
    
    @include('_includes.head')

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        
        @include('_includes.header')

        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        @include('_includes.sidebar')
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('_includes.header-desktop')
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        @yield('content')
                        @include('_includes.footer')
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

   @stack('footer')

   @include('_includes.foot')

</body>

</html>
<!-- end document-->

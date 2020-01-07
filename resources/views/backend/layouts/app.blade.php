<!DOCTYPE html>
<html lang="en">
<head>
         <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="author" content="Mosaddek" />
    <meta name="keyword" content="slick, flat, dashboard, bootstrap, admin, template, theme, responsive, fluid, retina" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <link rel="shortcut icon" href="javascript:;" type="image/png">

    <title>@yield('title')</title>

    <!--easy pie chart-->
    <link href="{{URL('js/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen')}}" />

    <!--vector maps -->
    <link rel="stylesheet" href="{{URL('js/vector-map/jquery-jvectormap-1.1.1.css')}}">

    <!--right slidebar-->
    <link href="{{URL('css/slidebars.css')}}" rel="stylesheet">

    <!--switchery-->
    <link href="{{URL('js/switchery/switchery.min.css')}}" rel="stylesheet" type="text/css" media="screen" />

    <!--jquery-ui-->
    <link href="{{URL('js/jquery-ui/jquery-ui-1.10.1.custom.min.css')}}" rel="stylesheet" />

    <!--iCheck-->
    <link href="{{URL('js/icheck/skins/all.css')}}" rel="stylesheet">

    <link href="{{URL('css/owl.carousel.css')}}" rel="stylesheet">


    <!--common style-->
    <link href="{{URL('css/style.css')}}" rel="stylesheet">
    <link href="{{URL('css/style-responsive.css')}}" rel="stylesheet">

        @yield('meta')

        <!-- Styles -->
        @yield('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        @langrtl
            {{ Html::style(getRtlCss(mix('css/backend.css'))) }}
        @else
            {{ Html::style(mix('css/backend.css')) }}
        @endlangrtl

        {{ Html::style(mix('css/backend-custom.css')) }}
        @yield('after-styles')

        <!-- Html5 Shim and Respond.js IE8 support of Html5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        {{ Html::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
        {{ Html::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}
        <![endif]-->

        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([ 'csrfToken' => csrf_token() ]) !!};
        </script>
        <?php
            if (!empty($google_analytics)) {
                echo $google_analytics;
            }
        ?>
    </head>
    <body class="skin-{{ config('backend.theme') }} {{ config('backend.layout') }}">
        <div class="loading" style="display:none"></div>
        @include('includes.partials.logged-in-as')

        <div class="wrapper" id="app">
            @include('backend.includes.header')
            @include('backend.includes.sidebar-dynamic')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @yield('page-header')
                    <!-- Breadcrumbs would render from routes/breadcrumb.php -->
                    @if(Breadcrumbs::exists())
                        {!! Breadcrumbs::render() !!}
                    @endif
                </section>

                <!-- Main content -->
                <section class="content">
                    @include('includes.partials.messages')
                    @yield('content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            @include('backend.includes.footer')
        </div><!-- ./wrapper -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src="{{URL('js/jquery-1.10.2.min.js')}}"></script>

<!--jquery-ui-->
<script src="{{URL('js/jquery-ui/jquery-ui-1.10.1.custom.min.js')}}" type="text/javascript"></script>

<script src="{{URL('js/jquery-migrate.js')}}"></script>
<script src="{{URL('js/bootstrap.min.js')}}"></script>
<script src="{{URL('js/modernizr.min.js')}}"></script>

<!--Nice Scroll-->
<script src="{{URL('js/jquery.nicescroll.js')}}" type="text/javascript"></script>

<!--right slidebar-->
<script src="{{URL('js/slidebars.min.js')}}"></script>

<!--switchery-->
<script src="{{URL('js/switchery/switchery.min.js')}}"></script>
<script src="{{URL('js/switchery/switchery-init.js')}}"></script>

<!--flot chart -->
<script src="{{URL('js/flot-chart/jquery.flot.js')}}"></script>
<script src="{{URL('js/flot-chart/flot-spline.js')}}"></script>
<script src="{{URL('js/flot-chart/jquery.flot.resize.js')}}"></script>
<script src="{{URL('js/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{URL('js/flot-chart/jquery.flot.pie.js')}}"></script>
<script src="{{URL('js/flot-chart/jquery.flot.selection.js')}}"></script>
<script src="{{URL('js/flot-chart/jquery.flot.stack.js')}}"></script>
<script src="{{URL('js/flot-chart/jquery.flot.crosshair.js')}}"></script>


<!--earning chart init-->
<script src="{{URL('js/earning-chart-init.js')}}"></script>


<!--Sparkline Chart-->
<script src="{{URL('js/sparkline/jquery.sparkline.js')}}"></script>
<script src="{{URL('js/sparkline/sparkline-init.js')}}"></script>

<!--easy pie chart-->
<script src="{{URL('js/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
<script src="{{URL('js/easy-pie-chart.js')}}"></script>


<!--vectormap-->
<script src="{{URL('js/vector-map/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{URL('js/vector-map/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{URL('js/dashboard-vmap-init.js')}}"></script>

<!--Icheck-->
<script src="{{URL('js/icheck/skins/icheck.min.js')}}"></script>
<script src="{{URL('js/todo-init.js')}}"></script>

<!--jquery countTo-->
<script src="{{URL('js/jquery-countTo/jquery.countTo.js')}}"  type="text/javascript"></script>

<!--owl carousel-->
<script src="{{URL('js/owl.carousel.js')}}"></script>


<!--common scripts for all pages-->

<script src="{{URL('js/scripts.js')}}"></script>


<script type="text/javascript">

    $(document).ready(function() {

        //countTo

        $('.timer').countTo();

        //owl carousel

        $("#news-feed").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true,
            autoPlay:true
        });
    });

    $(window).on("resize",function(){
        var owl = $("#news-feed").data("owlCarousel");
        owl.reinit();
    });
</script>

        <!-- JavaScripts -->
        @yield('before-scripts')
        {{ Html::script(mix('js/backend.js')) }}
        {{ Html::script(mix('js/backend-custom.js')) }}
        @yield('after-scripts')
    </body>
</html>
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

    <link href="{{URL('js/data-table/css/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{URL('js/data-table/css/dataTables.tableTools.css')}}" rel="stylesheet">
    <link href="{{URL('js/data-table/css/dataTables.colVis.min.css')}}" rel="stylesheet">
    <link href="{{URL('js/data-table/css/dataTables.responsive.css')}}" rel="stylesheet">
    <link href="{{URL('js/data-table/css/dataTables.scroller.css')}}" rel="stylesheet">
    <!--common style-->
    @yield('style')
    <link href="{{URL('css/style.css')}}" rel="stylesheet">
    <link href="{{URL('css/style-responsive.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="sticky-header">

    <section>
       
        <!-- body content start-->
        @include('Backend.includes.sidebar')
        <div class="body-content" >
         
         @include('Backend.includes.header')
        

               <div class="page-head">
                <h3>
                     @yield('page-header')
                    <!-- Breadcrumbs would render from routes/breadcrumb.php -->
                    @if(Breadcrumbs::exists())
                        {!! Breadcrumbs::render() !!}
                    @endif
                </h3>
                @include('includes.partials.logged-in-as')
              
            </div>


            
            <!--body wrapper end-->
@include('includes.partials.messages')
         @yield('content')
            <!--footer section start-->

        </div>

        <!-- body content end-->
    </section>



<!-- Placed js at the end of the document so the pages load faster -->
<script src="{{URL('js/jquery-1.10.2.min.js')}}"></script>

<!--jquery-ui-->
<script src="{{URL('js/jquery-ui/jquery-ui-1.10.1.custom.min.js')}}" type="text/javascript"></script>

<script src="{{URL('js/jquery-migrate.js')}}"></script>
<script src="{{URL('js/bootstrap.min.js')}}"></script>
<script src="{{URL('js/modernizr.min.js')}}"></script>

<!--Nice Scroll-->
<!-- <script src="{{URL('js/jquery.nicescroll.js')}}" type="text/javascript"></script> -->

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
  @yield('before-scripts')
        
{{ Html::script(mix('js/backend-custom.js')) }}
@yield('after-scripts')


</body>
</html>

        <!-- sidebar left start-->
        <div class="sidebar-left">
            <!--responsive view logo start-->
            <div class="logo dark-logo-bg visible-xs-* visible-sm-*">
                <a href="index.html">
                    <img src="{{url('img/logo-icon.png')}}" alt="">
                    <!--<i class="fa fa-maxcdn"></i>-->
                    <span class="brand-name">StartUps</span>
                </a>
            </div>
            <!--responsive view logo end-->

            <div class="sidebar-left-info">
                <!-- visible small devices start-->
                <div class=" search-field">  </div>
                <!-- visible small devices end-->

                <!--sidebar nav start-->
                <ul class="nav nav-pills nav-stacked side-navigation">
                    <li>
                        <h3 class="navigation-title">Navigation</h3>
                    </li>
                    <li class="active"><a href=""><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
         
         <li class="menu-list">
                             @permission('view-access-management')
                        <a href=""><i class="fa fa-laptop"></i>  <span>{{ trans('menus.backend.access.title') }}</span></a>
                        <ul class="child-list">
                @permission('view-user-management')               
    <li><a href="{{ route('admin.access.user.index') }}">
    {{ trans('labels.backend.access.users.management') }}
    </a></li>
                     @endauth

                                             
                        </ul>
                    @endauth          

 <li class="menu-list">
                        <a href="#"><i class="fa fa-laptop"></i>  <span>InvestMent</span></a>
                        <ul class="child-list">
                       
    <li><a href="{{ route('admin.investment.list') }}">
  InvestMent Request List
    </a></li>
                             </li>
                   
                    </ul>
                </div>
                <!--sidebar widget end-->

            </div>
        </div>

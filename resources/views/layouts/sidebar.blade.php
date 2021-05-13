<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-light fixed-top">

    <!-- Header with logos -->
    <div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center">
        <div class="navbar-brand navbar-brand-md">
            <a href="{{ route('admin.dashboard') }}" class="d-inline-block" style="color: #fff;font-size: 16px;">
			ESCAPE CLUB
                <!--<img src="{{ asset('assets/images/yafe.png') }}" alt=""> -->
            </a>
        </div>

        <div class="navbar-brand navbar-brand-xs">
            <a href="{{ route('admin.dashboard') }}" class="d-inline-block">
               <!-- <img src="{{ asset('assets/images/yafe.png') }}" alt="">-->
            </a>
        </div>
    </div>
    <!-- /header with logos -->


    <!-- Mobile controls -->
    <div class="d-flex flex-1 d-md-none">
        <div class="navbar-brand mr-auto">
            <a href="#" class="d-inline-block">

                <img src="" alt="">
            </a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>

        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>
    <!-- /mobile controls -->


    <!-- Navbar content -->
    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block" data-popup="tooltip-demo" title="" data-placement="bottom" data-container="body" data-trigger="hover">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>

        <span class="badge bg-pink-400 badge-pill ml-md-3 mr-md-auto">16 orders</span>

        <ul class="navbar-nav">
            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('assets/images/profile02.jpg') }}" class="rounded-circle mr-2" height="34" alt="">
                    <span>Admin</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('admin.profile') }}" class="dropdown-item"><i class="feather icon-user"></i> My profile</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('admin.change_password') }}" class="dropdown-item"><i class="icon-cog5"></i> Change password</a>
                    <!--<a href="{{ route('admin.logout') }}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>-->
                </div>
            </li>
        </ul>
    </div>
    <!-- /navbar content -->

</div>
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">

    <!-- Main sidebar -->
    <div class="sidebar sidebar-dark sidebar-main sidebar-fixed sidebar-expand-md">

        <!-- Sidebar mobile toggler -->
        <div class="sidebar-mobile-toggler text-center">
            <a href="#" class="sidebar-mobile-main-toggle">
                <i class="icon-arrow-left8"></i>
            </a>
            Navigation
            <a href="#" class="sidebar-mobile-expand">
                <i class="icon-screen-full"></i>
                <i class="icon-screen-normal"></i>
            </a>
        </div>
        <!-- /sidebar mobile toggler -->


        <!-- Sidebar content -->
        <div class="sidebar-content">

            <!-- User menu -->
            <div class="sidebar-user">
                <div class="card-body">
                    <div class="media">
                        <div class="mr-3">
                            <a href="#"><img src="{{ asset('assets/images/profile02.jpg') }}" width="38" height="38" class="rounded-circle" alt=""></a>
                        </div>

                        <div class="media-body">

                            <div class="media-title font-weight-semibold"> Admin</div>
                            <div class="font-size-xs opacity-50"><i class="icon-pin font-size-sm"></i> &nbsp;
                               Coimbatore
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /user menu -->


            <!-- Main navigation -->
            <div class="card card-sidebar-mobile">
                <ul class="nav nav-sidebar" data-nav-type="accordion">


				@if(CommonLib::is_permitted('sm_dashboard'))
                @php $active = (Route::currentRouteName() == 'admin.dashboard') ? 'active' : ''; @endphp
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ $active }}">
                        <i class="icon-home4"></i>
                        <span>
                        {{ trans('menu.dashboard') }}
                        </span>
                    </a>
                </li>
                @endif







                    <li class="nav-item">
                        <a href="{{ route('admin.escape_rooms') }}" class="nav-link">
                            <i class="fa fa-key"></i>
                            <span>
                        {{ trans('menu.rooms') }}
                        </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.room_bookings') }}" class="nav-link">
                            <i class="fa fa-flag"></i>
                            <span>
                        {{ trans('menu.bookings') }}
                        </span>
                        </a>
                    </li>


                 <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="fa fa-gift"></i> <span>{{ trans('menu.gc') }}  </span></a>



                        <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                            <li class="nav-item"><a href="{{ route('admin.gift_card') }}" class="nav-link">Create cards</a></li>
                            <li class="nav-item"><a href="{{ route('admin.gc_purchase') }}" class="nav-link">Card Bookings</a></li>


                        </ul>
                    </li>









                @if(CommonLib::is_permitted('sm_cafe'))
                        <?php $open_active = (Route::currentRouteName() == 'admin.cafe' || Route::currentRouteName() == 'admin.cafe_edit') ? 'open active' : ''; ?>

                        <li class="nav-item nav-item-submenu {{ $open_active }}">
                            <a href="#" class="nav-link"><i class="sidenav-icon feather ion ion-ios-aperture"></i> <span>{{ trans('menu.lounge') }}</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                                <li class="nav-item {{ Route::currentRouteName() == 'admin.cafe' ? 'active' : '' }}"><a href="{{ route('admin.cafe') }}" class="nav-link">{{ trans('menu.cafe') }}</a></li>
                                <li class="nav-item {{ Route::currentRouteName() == 'admin.board_game' ? 'active' : '' }}"><a href="{{ route('admin.board_game') }}" class="nav-link">{{ trans('menu.bg') }}</a></li>

                            </ul>
                        </li>
                    @endif




                    <li class="nav-item">
                        <a href="{{ route('admin.time_slots') }}" class="nav-link">
                            <i class="fa fa-clock" aria-hidden="true"></i>
                            <span>
                        {{ trans('menu.ts') }}
                        </span>
                        </a>
                    </li>



                    <li class="nav-item">
                    <a href="{{ route('admin.promo_code') }}" class="nav-link">
                       <i class="fa fa-bullhorn" aria-hidden="true"></i>
                        <span>
                        {{ trans('menu.pc') }}
                        </span>
                    </a>
                </li>




                    <li class="nav-item">
                        <a href="{{ route('admin.tax') }}" class="nav-link">
                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                            <span>
                        {{ trans('menu.tax') }}
                        </span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('admin.vip') }}" class="nav-link">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <span>
                        {{ trans('menu.vip') }}
                        </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.payment_gateway') }}" class="nav-link">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                            <span>
                        {{ trans('menu.payment_gateway') }}
                        </span>
                        </a>
                    </li>



                    <li class="nav-item">
                        <a href="{{ route('admin.notification') }}" class="nav-link">
                            <i class="fa fa-bell" aria-hidden="true"></i>
                            <span>
                        {{ trans('menu.notifications') }}
                        </span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('admin.email_remainders') }}" class="nav-link">
                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                            <span>
                        {{ trans('menu.email_remainders') }}
                        </span>
                        </a>
                    </li>






                @if(CommonLib::is_permitted('sm_config'))
                        <?php $open_active = (Route::currentRouteName() == 'admin.roleRule' || Route::currentRouteName() == 'admin.role_rule_edit' ||  Route::currentRouteName() == 'admin.role' || Route::currentRouteName() == 'admin.role_edit' || Route::currentRouteName() == 'admin.permission' || Route::currentRouteName() == 'admin.permission_edit' || Route::currentRouteName() == 'admin.role_permission' || Route::currentRouteName() == 'admin.role_permission_edit') ? 'open active' : ''; ?>

                        <li class="nav-item nav-item-submenu {{ $open_active }}">
                            <a href="#" class="nav-link"><i class="sidenav-icon feather ion ion-ios-aperture"></i> <span>{{ trans('menu.configuration') }}</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                                <li class="nav-item {{ Route::currentRouteName() == 'admin.roleRule' ? 'active' : '' }}"><a href="{{ route('admin.roleRule') }}" class="nav-link">{{ trans('menu.role_rule') }}</a></li>
                                <li class="nav-item {{ Route::currentRouteName() == 'admin.role' ? 'active' : '' }}"><a href="{{ route('admin.role') }}" class="nav-link">{{ trans('menu.role') }}</a></li>
                                <li class="nav-item {{ Route::currentRouteName() == 'admin.permission' ? 'active' : '' }}"><a href="{{ route('admin.permission') }}" class="nav-link">{{ trans('menu.permission') }}</a></li>
                                <li class="nav-item {{ Route::currentRouteName() == 'admin.role_permission' ? 'active' : '' }}"><a href="{{ route('admin.role_permission') }}" class="nav-link">{{ trans('menu.role_permission') }}</a></li>
                            </ul>
                        </li>
                    @endif








	           @if(CommonLib::is_permitted('sm_message_template'))
                    @php $active = (Route::currentRouteName() == 'admin.message_template' || Route::currentRouteName() == 'admin.message_template_edit') ? 'active' : ''; @endphp
					<li class="nav-item">
                        <a href="{{ route('admin.message_template') }}" class="nav-link {{ $active }}">
                            <i class="sidenav-icon feather ion ion-md-mail-open"></i>
                            <span>
                            {{ trans('menu.message_template') }}
                            </span>
                        </a>
                    </li>
					@endif

					  @if(CommonLib::is_permitted('sm_settings'))
                      @php $active = (Route::currentRouteName() == 'admin.settings') ? 'active' : ''; @endphp
                      <li class="nav-item">
                        <a href="{{ route('admin.settings') }}" class="nav-link {{ $active }}">
                            <i class="icon-cog3"></i>
                            <span>
                            {{ trans('menu.settings') }}
                            </span>
                        </a>
                    </li>
					@endif

                </ul>
            </div>
            <!-- /main navigation -->
        </div>
        <!-- /sidebar content -->
    </div>
    <!-- /main sidebar -->
    <!-- Main content -->
    <div class="content-wrapper">
    <br />
        <!-- Content area -->
        <div class="content pt-0">
            @yield('content')
        </div>
        <!-- /content area -->
    </div>
    <!-- /main content -->
</div>
<!-- /page content -->

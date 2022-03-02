<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true" class="active">
    <div class="brand-logo">
        <a href="{{route('admin.dashborad')}}">
            <img src="{{asset('admin/assets/images/food-tray.png')}}" class="logo-icon" alt="logo icon">
            <h5 class="logo-text">FoodGardan</h5>
        </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        @can('dasboard-list')

        <hr>
        <li>
            <a href="{{route('admin.dashborad')}}">
                <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        @endcan
       @can('role-delete')

        <hr>
        <ul class="nav">
            <li class="nav-item menu-items ">
                <a class="nav-link" data-toggle="collapse" href="#ui-basica" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="zmdi zmdi-accounts-alt"></i> <span>Role</span>
                </a>
                <div class="collapse" id="ui-basica">
                    <ul class="nav flex-column sub-menu">
                        <ul class="dropdown">
                            <li><a href="{{route('admin.role.index')}}">Add Role</a></li>
                            <li><a href="{{route('admin.subadmin.index')}}">Regisert Sub-Admin</a></li>
                            <li><a href="{{route('admin.permission.index')}}">Add permission</a></li>


                        </ul>
                </div>
            </li>
        </ul>
        @endcan
        @can('resturant-list')
        <hr>
        <li>
            <a href="{{route('admin.restaurant.index')}}">
                <i class="zmdi zmdi-city"></i> <span>Restaurant List</span>
            </a>
        </li>
        @endcan
        @can('meal-list')
        <hr>
        <li>
            <a href="{{route('admin.meal.index')}}">
                <i class="zmdi zmdi-local-dining"></i> <span>Meal List</span>
            </a>
        </li>
        @endcan
        @can('user-list')
        <hr>
        <li>
            <a href="{{route('admin.userlist')}}">
                <i class="zmdi zmdi-accounts-add"></i> <span>User List</span>
            </a>
        </li>
        @endcan
        @can('order-list')

        <hr>
        <li>
            <a href="{{route('admin.order_view')}}">
                <i class="zmdi zmdi-money"></i> <span>Order List</span>
            </a>
        </li>
        @endcan
        @can('promocode-list')
        <hr>
        <li>
            <a href="{{route('admin.copun.index')}}">
                <i class="zmdi zmdi-plus-1"></i> <span>PromoCode List</span>
            </a>
        </li>
        @endcan
        @can('payment-list')


        <hr>
        <li>
            <a href="{{route('admin.payment.index')}}">
                <i class="zmdi zmdi-chart"></i> <span>Paymant</span>
            </a>
        </li>
        @endcan
        @can('qr code-list')

        <hr>
        <li>
            <a href="{{route('admin.qr_code')}}">
                <i class="zmdi zmdi-puzzle-piece"></i> <span>QR Code</span>
            </a>
        </li>
        @endcan
        @can('admin-list')


        <hr>
        <li>
            <a href="{{route('admin.profile.index')}}">
                <i class="zmdi zmdi-face"></i> <span> Admin Profile</span>
            </a>
        </li>
        @endcan
        <hr>
    </ul>
</div>
<!--End sidebar-wrapper-->
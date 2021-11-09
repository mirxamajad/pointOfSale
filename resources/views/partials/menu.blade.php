<div class="sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed">
                    <a href="" class="sidebar-link td-n">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer">
                                <div class="logo">
                                    <img src="/assets/static/images/logo.png" alt="">
                                </div>
                            </div>
                            <div class="peer peer-greed">
                                <h5 class="lh-1 mB-0 logo-text">
                                    {{ trans('panel.site_title') }}
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="peer">
                    <div class="mobile-toggle sidebar-toggle">
                        <a href="" class="td-n">
                            <i class="ti-arrow-circle-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu scrollable pos-r ps">
            <li class="nav-item mT-30">
                <a href="{{ route("admin.home") }}" class="sidebar-link">
                    <span class="icon-holder">
                        
                        <i class="c-blue-500 ti-home"></i>
                        {{-- <i class="nav-icon fas fa-fw fa-tachometer-alt"></i> --}}
                    </span>
                    <span class="title">{{ trans('global.dashboard') }}</span>
                </a>
            </li>
            @can('user_management_access')
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="#">
                        <span class="icon-holder">
                            <i class="fa-fw fas fa-users nav-icon"></i>
                        </span>
                        <span class="title">{{ trans('cruds.userManagement.title') }}</span>
                        <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('permission_access')
                            <li>
                                <a href="{{ route("admin.permissions.index") }}" class="sidebar-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li>
                                <a href="{{ route("admin.roles.index") }}" class="sidebar-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li>
                                <a href="{{ route("admin.users.index") }}" class="sidebar-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('product_management_access')
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="#">
                        <span class="icon-holder">
                            <i class="fa-fw fas fa-box-open nav-icon"></i>
                        </span>
                        <span class="title">{{ trans('cruds.productManagement.title') }}</span>
                        <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('category_access')
                            <li>
                                <a href="{{ route("admin.category.index") }}" class="sidebar-link {{ request()->is('admin/category') || request()->is('admin/category/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-boxes nav-icon">

                                    </i>
                                    {{ trans('cruds.category.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('brand_access')
                            <li>
                                <a href="{{ route("admin.brand.index") }}" class="sidebar-link {{ request()->is('admin/brand') || request()->is('admin/brand/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-tag nav-icon">

                                    </i>
                                    {{ trans('cruds.brand.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('color_access')
                            <li>
                                <a href="{{ route("admin.color.index") }}" class="sidebar-link {{ request()->is('admin/color') || request()->is('admin/color/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-fill-drip nav-icon">

                                    </i>
                                    {{ trans('cruds.color.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('size_access')
                            <li>
                                <a href="{{ route("admin.size.index") }}" class="sidebar-link {{ request()->is('admin/size') || request()->is('admin/size/*') ? 'active' : '' }}">
                                    <i class="fab fa-linode"></i>
                                    {{ trans('cruds.size.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('series_access')
                            <li>
                                <a href="{{ route("admin.series.index") }}" class="sidebar-link {{ request()->is('admin/series') || request()->is('admin/series/*') ? 'active' : '' }}">
                                    <i class="fas fa-barcode"></i>
                                    {{ trans('cruds.series.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('accessories_management_access')
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="#">
                        <span class="icon-holder">
                            <i class="fa-fw fas fa-keyboard nav-icon"></i>
                        </span>
                        <span class="title">{{ trans('cruds.accessoriesManagement.title') }}</span>
                        <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('category_access')
                            <li>
                                <a href="{{ route("admin.category.index") }}" class="sidebar-link {{ request()->is('admin/category') || request()->is('admin/category/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-boxes nav-icon">

                                    </i>
                                    {{ trans('cruds.category.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('brand_access')
                            <li>
                                <a href="{{ route("admin.brand.index") }}" class="sidebar-link {{ request()->is('admin/brand') || request()->is('admin/brand/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-tag nav-icon">

                                    </i>
                                    {{ trans('cruds.brand.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('accessories_access')
                            <li>
                                <a href="{{ route("admin.accessories.index") }}" class="sidebar-link {{ request()->is('admin/accessories') || request()->is('admin/accessories/*') ? 'active' : '' }}">
                                    <i class="fas fa-keyboard"></i>
                                    {{ trans('cruds.accessories.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <span class="icon-holder">
                        <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                    </span>
                    <span class="title">{{ trans('global.logout') }}</span>
                </a>
            </li>
        </ul>

    </div>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>

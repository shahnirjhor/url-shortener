@php
$c = Request::segment(1);
$m = Request::segment(2);
$RoleName = Auth::user()->getRoleNames();
@endphp

<aside class="main-sidebar elevation-4 sidebar-light-info">
    <a href="{{ url('/') }}" class="brand-link navbar-info">
        <img src="{{ asset('img/logo-text.png') }}" alt="{{ $ApplicationSetting->item_name }}" class="brand-image" style="opacity: .8; width :32px; height : 32px">
        <span class="brand-text font-weight-light">{{ $ApplicationSetting->item_name }}</span>
    </a>
    <div class="sidebar">
        <?php
            if(Auth::user()->photo == NULL)
            {
                $photo = "img/profile/male.png";
            } else {
                $photo = Auth::user()->photo;
            }
        ?>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset($photo) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info my-auto">
                {{ Auth::user()->name }}
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                @canany(['url-read', 'url-create', 'url-update', 'url-delete'])
                    <li class="nav-item">
                        <a href="{{ route('short-link.index') }}" class="nav-link @if($c == 'short-link') active @endif ">
                            <span class="mdi mdi-layers-outline nav-icon"></span>
                            <p>@lang('Short Link')</p>
                        </a>
                    </li>
                @endcanany

                @canany(['role-read', 'role-create', 'role-update', 'role-delete', 'role-export', 'user-read', 'user-create', 'user-update', 'user-delete', 'user-export', 'offline-payment-read', 'offline-payment-create', 'offline-payment-update', 'offline-payment-delete'])
                    <li class="nav-item has-treeview @if($c == 'roles' || $c == 'users' || $c == 'apsetting' || $c == 'smtp' || $c == 'offline-payment' ) menu-open @endif">
                        <a href="javascript:void(0)" class="nav-link @if($c == 'roles' || $c == 'users' || $c == 'apsetting' || $c == 'smtp' || $c == 'offline-payment' ) active @endif">
                            <span class="nav-icon mdi mdi-cog-outline"></span>
                            <p>
                                @lang('Settings')
                                <i class="right fas fa-angle-left"></i>
                                
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @canany(['role-read', 'role-create', 'role-update', 'role-delete', 'role-export'])
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link @if($c == 'roles') active @endif ">
                                        <span class="nav-icon mdi mdi-cube-outline"></span>
                                        <p>@lang('Role Management')</p>
                                    </a>
                                </li>
                            @endcanany
                            @canany(['user-read', 'user-create', 'user-update', 'user-delete', 'user-export'])
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link @if($c == 'users') active @endif ">
                                        <span class="nav-icon mdi mdi-account-group-outline"></span>
                                        <p>@lang('User Management')</p>
                                    </a>
                                </li>
                            @endcanany
                        </ul>
                    </li>
                @endcanany
            </ul>
        </nav>
    </div>
</aside>

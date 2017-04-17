<aside class="sidebar">
    <div class="sidebar-container">
        <div class="sidebar-header">
            <img src="{{ asset('assets/global/img/logo_include_white.png') }}" alt="" class="img-responsive logo">
        </div>
        <nav class="menu">
            <ul class="nav metismenu" id="sidebar-menu">
                @if( Gate::check('user-view') || Gate::check('role-view')|| Gate::check('permission-view') )

                <li {!! $module_name =='users' || $module_name =='roles' || $module_name =='permissions' ? 'class = "active open"' : ""  !!}>
                    <a href="">Usuários</a>
                    <ul>
                        @can('user-view') <li><a href="{{ route("users.index") }}">Usuários</a></li>@endcan
                        @can('role-view')<li><a href="{{ route("roles.index") }}">Papeis</a></li>@endcan
                        @can('permission-view')<li><a href="{{ route("permissions.index") }}">Permissões</a></li>@endcan
                    </ul>
                </li>
                @endif

                {{--<li {!! $module_name =='budgets' ? 'class = "active open"' : ""  !!}>--}}
                    {{--<a href="{{ route('budgets.index') }}"> <i class="fa fa fa-th-large"></i> Orçamento </a>--}}
                {{--</li>--}}


            </ul>
        </nav>
    </div>

</aside>
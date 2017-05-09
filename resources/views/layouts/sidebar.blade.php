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
                            @can('user-view')
                                <li><a href="{{ route("users.index") }}">Usuários</a></li>@endcan
                            @can('role-view')
                                <li><a href="{{ route("roles.index") }}">Papeis</a></li>@endcan
                            @can('permission-view')
                                <li><a href="{{ route("permissions.index") }}">Permissões</a></li>@endcan
                        </ul>
                    </li>
                @endif
                @if( Gate::check('company-view') || Gate::check('project-view')|| Gate::check('task-view') )

                    <li {!! $module_name =='companies' || $module_name =='projects' || $module_name =='tasks' ? 'class = "active open"' : ""  !!}>
                        <a href="">Gerenciamento</a>
                        <ul>
                            @can('import-view')
                                <li><a href="{{ route("imports.index") }}">Importação</a></li>@endcan
                            @can('company-view')
                                <li><a href="{{ route("companies.index") }}">Empresas</a></li>@endcan
                            @can('project-view')
                                <li><a href="{{ route("projects.index") }}">Projetos</a></li>@endcan
                            @can('task-view')
                                <li><a href="{{ route("tasks.index") }}">Tarefas</a></li>@endcan
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
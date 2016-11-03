<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="">Empresas</a></li>
            <li><a href="">Usuários</a></li>
            <li><a href="">Projetos</a></li>
            <li><a href="">Tarefas</a></li>
            <li><a href="">Linha do Tempo</a></li>
            <li><a href="">Relatórios</a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
@extends('backend.layouts.dashboard')
@section('page_styles')


@endsection

@section('content')
    <article class="content items-list-page">
        <div class="title-block">
            <h3 class="title">
                Usuário - {{ $user->name }}
            </h3>
            <p class="title-description"></p>
        </div>
        <section class="section">
            <div class="row sameheight-container">
                <!-- /.col-xl-6 -->
                <div class="col-xl-12">
                    <div class="card sameheight-item">
                        <div class="card-block">
                            <div class="card-title-block">
                                <h3 class="title">
                                   Usuário
                                </h3> </div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li class="nav-item"> <a href="" class="nav-link active" data-target="#home-pills" aria-controls="home-pills" data-toggle="tab" role="tab">Perfil</a> </li>
                                <li class="nav-item"> <a href="" class="nav-link" data-target="#profile-pills" aria-controls="profile-pills" data-toggle="tab" role="tab">Modulos</a> </li>
                                <li class="nav-item"> <a href="" class="nav-link" data-target="#messages-pills" aria-controls="messages-pills" data-toggle="tab" role="tab">Roles</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home-pills">
                                    <div class="row">
                                        <div class="col col-md-6">
                                            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg" alt="Perfil"></img>
                                        </div>
                                        <div class="col col-md-6">
                                            <p>Nome: {{ $user->name }}</p>
                                            <p>Email: {{ $user->email }}</p>
                                        </div>

                                    </div>


                                </div>
                                <div class="tab-pane fade" id="profile-pills">
                                    <h4>Profile Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum.</p>
                                </div>
                                <div class="tab-pane fade" id="messages-pills">
                                    <h4>Messages Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum.</p>
                                </div>
                                <div class="tab-pane fade" id="settings-pills">
                                    <h4>Settings Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-block -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-xl-6 -->
            </div>
        </section>
    </article>

@endsection

@section('page_scripts')
    <!-- Load JS here for greater good =============================-->

    <script>

        $(function(){

            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE ");

            /*if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {

             $('.modes #modeContent').parent().hide();

             } else {

             $('.modes #modeContent').parent().show();

             }*/




        })
@endsection
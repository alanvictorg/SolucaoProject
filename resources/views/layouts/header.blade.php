<header class="header">
    <div class="header-block header-block-collapse hidden-lg-up">
        <button class="collapse-btn" id="sidebar-collapse-btn">
            <i class="fa fa-bars"></i>
        </button>
    </div>
    <div class="header-block header-block-search hidden-sm-down">
        <form role="search">
            <div class="input-container"><i class="fa fa-search"></i> <input type="search" placeholder="Busca">
                <div class="underline"></div>
            </div>
        </form>
    </div>
    <div class="header-block header-block-buttons">
    </div>
    <div class="header-block header-block-nav">
        <ul class="nav-profile">
            <li class="notifications new">
                <a href="" data-toggle="dropdown"> <i class="fa fa-bell-o"></i> <sup><span
                                class="counter">{{ Auth::user() ? Auth::user()->unreadNotifications->count():'' }}</span></sup>
                </a>
                <div class="dropdown-menu notifications-dropdown-menu">
                    <ul class="notifications-container">
                        @if(Auth::user())
                            @forelse( Auth::user()->unreadNotifications as $notification)
                                <li>
                                    <a href="{{$notification->data['action']}}" class="notification-item">
                                        <div class="img-col">
                                            <div class="img"
                                                 style="background-image: url({{ asset('backend/admin/dist/assets/faces/3.jpg') }})"></div>
                                        </div>
                                        <div class="body-col">
                                            <p>{{ $notification->data['message']}}</p>
                                        </div>
                                    </a>
                                </li>
                            @empty

                            @endforelse
                        @endif
                    </ul>
                    <footer>
                        <ul>
                            <li><a href="">
                                    Veja todas
                                </a></li>
                        </ul>
                    </footer>
                </div>
            </li>
            <li class="profile dropdown">
                @if(Auth::user())
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false">
                        <div class="img"
                             style="background-image: url('https://avatars3.githubusercontent.com/u/3959008?v=3&s=40')"></div>
                        <span class="name">
                {{ Auth::user()->name}}
              </span> </a>
                    <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item" href="{{ route('users.show',[Auth::user()->id]) }}"> <i
                                    class="fa fa-user icon"></i> Perfil </a>
                        <a class="dropdown-item" href="#"> <i class="fa fa-bell icon"></i> Notificações </a>
                        <a class="dropdown-item" href="#"> <i class="fa fa-gear icon"></i> Configurações </a>
                        <div class="dropdown-divider"></div>
                        {{ Form::open(['url'=>'logout']) }}
                        <button type="submit" class="dropdown-item"><i class="fa fa-power-off icon"> Sair</i></button>
                        {{ Form::close() }}
                    </div>
                @endif
            </li>
        </ul>
    </div>
</header>
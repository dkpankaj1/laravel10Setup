<div class="header">

    <div class="header-left active">
        <a href="index.html" class="logo">
            <img src="{{asset('assets/img/logo.png')}}" alt="">
        </a>
        <a href="index.html" class="logo-small">
            <img src="{{asset('assets/img/logo-small.png')}}" alt="">
        </a>
        <a id="toggle_btn" href="javascript:void(0);">
        </a>
    </div>

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <ul class="nav user-menu">

        <li class="nav-item dropdown has-arrow flag-nav">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
                @if(Session::has('appSession'))
                <i class="fa fa-calendar"></i>&nbsp;<spanstyle="font-weight:bold">{{Session::get('appSession')['name']}}</spanstyle=>
                @else
                <span class="text-danger">{{_('No Session')}}</span>                
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                @foreach($appSessionList as $items)
                <a href="{{route('app.session.set',$items)}}" class="dropdown-item">
                    {{$items->name}}
                </a>
                @endforeach

            </div>
        </li>



        <li class="nav-item dropdown has-arrow main-drop">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                <span class="user-img"><img src="{{asset('assets/img/avatar.svg')}}" alt="">
                    <span class="status online"></span></span>
            </a>
            <div class="dropdown-menu menu-drop-user">
                <div class="profilename">
                    <div class="profileset">
                        <span class="user-img"><img src="{{asset('assets/img/avatar.svg')}}" alt="">
                            <span class="status online"></span></span>
                        <div class="profilesets">
                            <h6>{{auth()->user()->name}}</h6>
                            <h5>
                                @foreach (auth()->user()->roles->take(1) as $role)
                                {{$role->name}}
                                @endforeach
                            </h5>
                        </div>
                    </div>
                    <hr class="m-0">
                    <a class="dropdown-item" href="{{route('profile.edit')}}">
                        <i class="me-2" data-feather="user"></i>
                        {{_('My Profile')}}
                    </a>
                    <a class="dropdown-item" href="{{route('setting.system.manage','system')}}"><i class="me-2"
                            data-feather="settings"></i>Settings</a>
                    <hr class="m-0">


                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item logout pb-0" href="{{route('logout')}}"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            <img src="{{asset('assets/img/icons/log-out.svg')}}" class="me-2"
                                alt="img">{{_('Logout')}}</a>
                    </form>

                </div>
            </div>
        </li>
    </ul>


    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{route('profile.edit')}}">My Profile</a>
            <a class="dropdown-item" href="{{route('setting.system.manage','system')}}">Settings</a>
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item" href="{{route('logout')}}"
                    onclick="event.preventDefault(); this.closest('form').submit();">{{_('Logout')}}</a>
            </form>

            <hr>

            @foreach($appSessionList as $items)
            <a href="{{route('app.session.set',$items)}}" class="dropdown-item @if(Session::has('appSession')) @if(Session::get('appSession')['name'] == $items->name ) active @endif @endif">
                {{$items->name}}
            </a>
            @endforeach



        </div>
    </div>

</div>
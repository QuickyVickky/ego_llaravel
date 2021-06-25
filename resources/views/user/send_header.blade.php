<header id="header" class="inner-header">
    <nav class="navbar navbar-expand-md ">
        <!-- Brand -->
        <a href="{{url('/')}}" class="navbar-brand">
            <img src="{{ asset('front/images/logo.svg') }}" height="50" alt="">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse-side" data-target="#navbarCollapse">
            <i class="fas fa-bars"></i>
        </button>
        <div class="side-collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ">
                <!-- Links -->

                <ul class="navbar-nav ">
                    {{-- <li class="nav-item {{ Request::segment(1) == 'myaccount' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.dashboard') }}">All Activity</a>
                    </li> --}}

                    <li class="nav-item {{ Request::segment(1) == 'all-activity' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.allActivity') }}">All Activity</a>
                    </li>

                    <li class="nav-item {{ Request::segment(1) == 'send' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.send.enterpayment') }}">Send Money</a>
                    </li>

                    <li class="nav-item {{ (Request::segment(1) == 'recipient' || Request::segment(1) == 'add-recipient') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.front.recipient') }}">Recipients</a>
                    </li>

                    {{-- <li class="nav-item {{ Request::segment(1) == 'designer-flow' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('designerFlow') }}">Designer Flow</a>
                    </li> --}}


                </ul>

                <!-- Login View  -->
                <div class="loggedin-detail text-white">

                    <div class="user-login">
                        <div class="nav-item dropdown">
                            @if(isset(Auth::user()->first_name) && !empty(Auth::user()->first_name))
                                <a href="#" class="nav-link dropdown-toggle">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a>
                            @else
                                <a href="#" class="nav-link dropdown-toggle">{{ Auth::user()->email }}</a>
                            @endif

                            <div class="dropdown-menu p-2">
                                <a href="{{ route('user.getProfile') }}" class="dropdown-item">Profile</a>

                                <a href="{{ route('user.logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </nav>
    <div class="notification">
        <img src="{{ asset('front/images/notification.svg') }}" height="28" alt="">
    </div>
</header>

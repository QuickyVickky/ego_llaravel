@can('isAdmin')

    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">

        <nav id="sidebar">
            <div class="shadow-bottom"></div>
            <ul class="list-unstyled menu-categories" id="accordionExample">
                <li class="menu">
                    <a href="{{ route('dashboard') }}" data-active="{{ (request()->is('dashboard')) || Request::segment(2) == 'dashboard' ? 'true' : 'false' }}" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="{{ route('transaction.index') }}" data-active="{{ Request::segment(2) == 'transaction' ? 'true' : 'false' }}" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu">
                                <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                <rect x="9" y="9" width="6" height="6"></rect>
                                <line x1="9" y1="1" x2="9" y2="4"></line>
                                <line x1="15" y1="1" x2="15" y2="4"></line>
                                <line x1="9" y1="20" x2="9" y2="23"></line>
                                <line x1="15" y1="20" x2="15" y2="23"></line>
                                <line x1="20" y1="9" x2="23" y2="9"></line>
                                <line x1="20" y1="14" x2="23" y2="14"></line>
                                <line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                            <span>Transaction</span>
                        </div>
                    </a>
                </li>

                <li class="menu">
                    <a href="{{ route('user.index') }}" data-active="{{ Request::segment(2) == 'user' ? 'true' : 'false' }}" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span>Users</span>
                        </div>
                    </a>
                </li>

                <li class="menu">
                    <a href="{{ route('fees.index') }}" data-active="{{ Request::segment(2) == 'fees' ? 'true' : 'false' }}" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="file-text"></i>
                            <span>Egogram fees</span>
                        </div>
                    </a>
                </li>

                <li class="menu">
                    <a href="{{ route('bank_field.index') }}" data-active="{{ Request::segment(2) == 'bank_field' ? 'true' : 'false' }}" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="layers"></i>
                            <span>Add bank detail</span>
                        </div>
                    </a>
                </li>

                <li class="menu">
                    <a href="{{ route('zelle.index') }}" data-active="{{ Request::segment(2) == 'zelle' ? 'true' : 'false' }}" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="send"></i>
                            <span>Zelle</span>
                        </div>
                    </a>
                </li>

                {{-- <li class="menu">
                    <a href="{{ route('country.index') }}" data-active="{{ Request::segment(2) == 'country' ? 'true' : 'false' }}" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="map"></i>
                            <span>Country</span>
                        </div>
                    </a>
                </li> --}}
            </ul>
        </nav>

    </div>
    <!--  END SIDEBAR  -->
@endcan

<!-- Header -->
<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="content-header-section">
            <!-- Logo -->
            <div class="content-header-item">
                <a class="link-effect font-w700 mr-5" href="/">
                    <i class="fa fa-handshake-o text-primary"></i>
                    <span class="font-size-xl text-dual-primary-dark">Book</span><span class="font-size-xl text-primary">BS</span>
                </a>
            </div>
            <!-- END Logo -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="content-header-section">
            <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-navicon"></i>
            </button>
            <!-- END Toggle Sidebar -->
        </div>
        <!-- END Right Section -->

        <!-- Middle Section -->

        <div class="content-header-section d-none d-lg-block">
            <ul class="nav-main-header">
                @guest
                    <li>
                        <a class="{{ request()->is('/') ? 'active' : '' }}" href="/">
                            <i class="si si-home"></i>Home
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('viewbook') ? 'active' : '' }}" href="/viewbook">
                            <i class="si si-notebook"></i>Book
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('pagelist') ? 'active' : '' }}" href="/pagelist">
                            <i class="si si-list"></i>Pages List
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('pagerank') ? 'active' : '' }}" href="/pagerank">
                            <i class="si si-trophy"></i>Pages Rank
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('login') ? 'active' : '' }}" href="{{ route('login') }}">
                            <i class="si si-user"></i>Sign In
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="fa fa-plus"></i>Sign Up
                        </a>
                    </li>
                @else
                    <li>
                        <a class="{{ request()->is('home') ? 'active' : '' }}" href="/">
                            <i class="si si-home"></i>Home
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('viewbook') ? 'active' : '' }}" href="/viewbook">
                            <i class="si si-notebook"></i>Book
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('pagelist') ? 'active' : '' }}" href="/pagelist">
                            <i class="si si-list"></i>Pages List
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('pagerank') ? 'active' : '' }}" href="/pagerank">
                            <i class="si si-trophy"></i>Pages Rank
                        </a>
                    </li>
                    @if(Auth::user()->role_id == 1)
                    <li>
                        <a class="{{ request()->is('home') ? 'active' : '' }}" href="/home">
                            <i class="si si-login mr-10"></i>Dashboard
                        </a>
                    </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-black" href="{{ route('logout') }}"
                                onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                {{ __('Sign Out') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
            <!-- END Header Navigation -->
        </div>
        <!-- END Middle Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Loader -->
    <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
    <!-- <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header content-header-fullrow text-center">
            <div class="content-header-item">
                <i class="fa fa-sun-o fa-spin text-white"></i>
            </div>
        </div>
    </div> -->
    <!-- END Header Loader -->
</header>
<!-- END Header -->
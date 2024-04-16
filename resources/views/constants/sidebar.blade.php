<aside id="sidebar" class="js-custom-scroll side-nav">
    <ul id="sideNav" class="side-nav-menu side-nav-menu-top-level mb-0">
        @auth
            @php
                $id = Auth::user()->id;
                $user = App\Models\User::findOrFail($id);
            @endphp
            @if ($user->role === 'admin')
                <!-- Title -->
                <li class="sidebar-heading h6">Admin Panel</li>
                <!-- End Title -->

                <!-- Dashboard -->
                <li class="side-nav-menu-item active">
                    <a class="side-nav-menu-link media align-items-center" href="{{ route('admin.index') }}">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <i class="gd-dashboard"></i>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Admin Panel</span>
                    </a>
                </li>
                <!-- End Dashboard -->
            @endif
        @endauth


        <!-- Title -->
        <li class="sidebar-heading h6">Dashboard</li>
        <!-- End Title -->

        <!-- Dashboard -->
        <li class="side-nav-menu-item active">
            <a class="side-nav-menu-link media align-items-center" href="/">
                <span class="side-nav-menu-icon d-flex mr-3">
                    <i class="gd-dashboard"></i>
                </span>
                <span class="side-nav-fadeout-on-closed media-body">Dashboard</span>
            </a>
        </li>
        <!-- End Dashboard -->

        <li class="sidebar-heading h6">Coin</li>
        <!-- Coin -->
        <li class="side-nav-menu-item side-nav-has-menu">
            <a class="side-nav-menu-link media align-items-center" href="#" data-target="#subCoins">
                <span class="side-nav-menu-icon d-flex mr-3">
                    <i class="gd-money"></i>
                </span>
                <span class="side-nav-fadeout-on-closed media-body">Coin</span>
                <span class="side-nav-control-icon d-flex">
                    <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
                </span>
                <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
            </a>

            <!-- Coins: subCoins -->
            <ul id="subCoins" class="side-nav-menu side-nav-menu-second-level mb-0">
                <li class="side-nav-menu-item">
                    <a class="side-nav-menu-link" href="{{ route('all.coin') }}">All Coins</a>
                </li>
                @auth
                    @if ($user->role === 'admin')
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="{{ route('create.coin') }}">Add new</a>
                        </li>
                    @endif
                @endauth

            </ul>
            <!-- End Coins: subCoins -->
        </li>
        <!-- End Coin -->

        <li class="sidebar-heading h6">Network</li>
        <!-- Network -->
        <li class="side-nav-menu-item side-nav-has-menu">
            <a class="side-nav-menu-link media align-items-center" href="#" data-target="#subNetworks">
                <span class="side-nav-menu-icon d-flex mr-3">
                    <i class="gd-money"></i>
                </span>
                <span class="side-nav-fadeout-on-closed media-body">Network</span>
                <span class="side-nav-control-icon d-flex">
                    <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
                </span>
                <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
            </a>

            <!-- Networks: subNetworks -->
            <ul id="subNetworks" class="side-nav-menu side-nav-menu-second-level mb-0">
                <li class="side-nav-menu-item">
                    <a class="side-nav-menu-link" href="{{ route('all.network') }}">All Networks</a>
                </li>
                @auth
                    @if ($user->role === 'admin')
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="{{ route('create.network') }}">Add new</a>
                        </li>
                    @endif
                @endauth

            </ul>
            <!-- End Networks: subNetworks -->
        </li>
        <!-- End Network -->
        @auth
            <li class="sidebar-heading h6">Settings</li>
            <li class="side-nav-menu-item side-nav-has-menu">
                <a class="side-nav-menu-link media align-items-center" href="#" data-target="#subSettings">
                    <span class="side-nav-menu-icon d-flex mr-3">
                        <i class="gd-settings"></i>
                    </span>
                    <span class="side-nav-fadeout-on-closed media-body">Settings</span>
                    <span class="side-nav-control-icon d-flex">
                        <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
                    </span>
                    <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                </a>

                <!-- Pages: subPages -->
                <ul id="subSettings" class="side-nav-menu side-nav-menu-second-level mb-0">
                    <li class="side-nav-menu-item">
                        <a class="side-nav-menu-link" href="{{ route('change.user.password', $user->id) }}">Change
                            Password</a>
                    </li>
                    <li class="side-nav-menu-item">
                        <a class="side-nav-menu-link"
                            href="{{ $user->role === 'user' ? route('edit.user', $user->id) : route('admin.profile', $user->id) }}">Profile
                        </a>
                    </li>
                </ul>
            </li>
        @endauth


        <!-- Title -->
        <li class="sidebar-heading h6">Examples</li>
        <!-- End Title -->

        <!-- Authentication -->
        <li class="side-nav-menu-item side-nav-has-menu">
            <a class="side-nav-menu-link media align-items-center" href="#" data-target="#subPages">
                <span class="side-nav-menu-icon d-flex mr-3">
                    <i class="gd-lock"></i>
                </span>
                <span class="side-nav-fadeout-on-closed media-body">Authentication</span>
                <span class="side-nav-control-icon d-flex">
                    <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
                </span>
                <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
            </a>

            <!-- Pages: subPages -->
            <ul id="subPages" class="side-nav-menu side-nav-menu-second-level mb-0">
                <li class="side-nav-menu-item">
                    <a class="side-nav-menu-link" href="login.html">Login</a>
                </li>
                <li class="side-nav-menu-item">
                    <a class="side-nav-menu-link" href="register.html">Register</a>
                </li>
                <li class="side-nav-menu-item">
                    <a class="side-nav-menu-link" href="password-reset.html">Forgot Password</a>
                </li>
                <li class="side-nav-menu-item">
                    <a class="side-nav-menu-link" href="password-reset-2.html">Forgot Password 2</a>
                </li>
                <li class="side-nav-menu-item">
                    <a class="side-nav-menu-link" href="email-verification.html">Email Verification</a>
                </li>
            </ul>
            <!-- End Pages: subPages -->
        </li>
        <!-- End Authentication -->

        <!-- Settings -->
        <li class="side-nav-menu-item">
            <a class="side-nav-menu-link media align-items-center" href="settings.html">
                <span class="side-nav-menu-icon d-flex mr-3">
                    <i class="gd-settings"></i>
                </span>
                <span class="side-nav-fadeout-on-closed media-body">Settings</span>
            </a>
        </li>
        <!-- End Settings -->

        <!-- Static -->
        <li class="side-nav-menu-item">
            <a class="side-nav-menu-link media align-items-center" href="static-non-auth.html">
                <span class="side-nav-menu-icon d-flex mr-3">
                    <i class="gd-file"></i>
                </span>
                <span class="side-nav-fadeout-on-closed media-body">Static page</span>
            </a>
        </li>
        <!-- End Static -->

    </ul>
</aside>

@auth
    @php
        $id = Auth::user()->id;
        $user = App\Models\User::findOrFail($id);
    @endphp
@endauth

<header class="header bg-body">
    <nav class="navbar flex-nowrap p-0">
        <div class="navbar-brand-wrapper d-flex align-items-center col-auto">
            <!-- Logo For Mobile View -->
            <a class="navbar-brand navbar-brand-mobile" href="/">
                <img class="img-fluid w-100" src="{{ asset('img/logo-mini.png') }}" alt="Graindashboard">
            </a>
            <!-- End Logo For Mobile View -->

            <!-- Logo For Desktop View -->
            <a class="navbar-brand navbar-brand-desktop" href="/">
                <img class="side-nav-show-on-closed" src="{{ asset('img/logo-mini.png') }}" alt="Graindashboard"
                    style="width: auto; height: 33px;">
                <img class="side-nav-hide-on-closed" src="{{ asset('img/logo.png') }}" alt="Graindashboard"
                    style="width: auto; height: 33px;">
            </a>
            <!-- End Logo For Desktop View -->
        </div>

        <div class="header-content col px-md-3">
            <div class="d-flex align-items-center">
                <!-- Side Nav Toggle -->
                <a class="js-side-nav header-invoker d-flex mr-md-2" href="#" data-close-invoker="#sidebarClose"
                    data-target="#sidebar" data-target-wrapper="body">
                    <i class="gd-align-left"></i>
                </a>
                <!-- End Side Nav Toggle -->

                <!-- User Role -->
                <div class="user-role mx-auto">
                    @auth
                        @if ($user->role === 'admin')
                            {{-- <div class="d-flex justify-content-center">You Are an ADMIN</div> --}}
                            <h1 class="justify-content-center">You Are an ADMIN</h1>
                        @else
                            <h1>You Are an USER</h1>
                        @endif
                    @endauth
                </div>
                <!-- End User Role -->


                <!-- User Notifications -->
                <div class="dropdown ml-auto">
                    <a id="notificationsInvoker" class="header-invoker" href="#" aria-controls="notifications"
                        aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                        data-unfold-target="#notifications" data-unfold-type="css-animation" data-unfold-duration="300"
                        data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                        <span
                            class="indicator indicator-bordered indicator-top-right indicator-primary rounded-circle"></span>
                        <i class="gd-bell"></i>
                    </a>

                    <div id="notifications"
                        class="dropdown-menu dropdown-menu-center py-0 mt-4 w-18_75rem w-md-22_5rem unfold-css-animation unfold-hidden"
                        aria-labelledby="notificationsInvoker" style="animation-duration: 300ms;">
                        <div class="card">
                            <div class="card-header d-flex align-items-center border-bottom py-3">
                                <h5 class="mb-0">Notifications</h5>
                                <a class="link small ml-auto" href="#">Clear All</a>
                            </div>

                            <div class="card-body p-0">
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item list-group-item-action">
                                        <div class="d-flex align-items-center text-nowrap mb-2">
                                            <i class="gd-info-alt icon-text text-primary mr-2"></i>
                                            <h6 class="font-weight-semi-bold mb-0">New Update</h6>
                                            <span class="list-group-item-date text-muted ml-auto">just now</span>
                                        </div>
                                        <p class="mb-0">
                                            Order <strong>#10000</strong> has been updated.
                                        </p>
                                        <a class="list-group-item-closer text-muted" href="#"><i
                                                class="gd-close"></i></a>
                                    </div>
                                    <div class="list-group-item list-group-item-action">
                                        <div class="d-flex align-items-center text-nowrap mb-2">
                                            <i class="gd-info-alt icon-text text-primary mr-2"></i>
                                            <h6 class="font-weight-semi-bold mb-0">New Update</h6>
                                            <span class="list-group-item-date text-muted ml-auto">just now</span>
                                        </div>
                                        <p class="mb-0">
                                            Order <strong>#10001</strong> has been updated.
                                        </p>
                                        <a class="list-group-item-closer text-muted" href="#"><i
                                                class="gd-close"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End User Notifications -->
                @auth
                    <!-- User Avatar -->
                    <div class="dropdown mx-3 dropdown ml-2">
                        <a id="profileMenuInvoker" class="header-complex-invoker" href="#" aria-controls="profileMenu"
                            aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                            data-unfold-target="#profileMenu" data-unfold-type="css-animation" data-unfold-duration="300"
                            data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                            <img class="avatar rounded-circle mr-md-2"
                                src="{{ !empty($user->image) ? asset($user->image) : url('uploads/image/user.png') }}"
                                alt="{{ $user->name }}" />
                            {{-- <span class="mr-md-2 avatar-placeholder">{{ Str::upper($user->name[0]) }}</span> --}}
                            <span class="d-none d-md-block">{{ $user->name }}</span>
                            <i class="gd-angle-down d-none d-md-block ml-2"></i>
                        </a>

                        <ul id="profileMenu"
                            class="unfold unfold-user unfold-light unfold-top unfold-centered position-absolute pt-2 pb-1 mt-4 unfold-css-animation unfold-hidden fadeOut"
                            aria-labelledby="profileMenuInvoker" style="animation-duration: 300ms;">
                            <li class="unfold-item">
                                <a class="unfold-link d-flex align-items-center text-nowrap"
                                    href="{{ $user->role === 'user' ? route('edit.user', $user->id) : route('admin.profile', $user->id) }}">
                                    <span class="unfold-item-icon mr-3">
                                        <i class="gd-user"></i>
                                    </span>
                                    My Profile
                                </a>
                            </li>
                            <li class="unfold-item">
                                <a class="unfold-link d-flex align-items-center text-nowrap"
                                    href="{{ route('change.user.password', $user->id) }}">
                                    <span class="unfold-item-icon mr-3">
                                        <i class="gd-user"></i>
                                    </span>
                                    Change Password
                                </a>
                            </li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <li class="unfold-item unfold-item-has-divider">
                                    <a class="unfold-link d-flex align-items-center text-nowrap">
                                        <span class="unfold-item-icon mr-3">
                                            <i class="gd-power-off"></i>
                                        </span>
                                        <button type="submit" class="border-0 bg-transparent">Sign Out</button>
                                    </a>
                                </li>
                            </form>
                        </ul>
                    </div>
                    <!-- End User Avatar -->
                @else
                    <div class="dropdown mx-3 dropdown ml-2">
                        <a id="profileMenuInvoker" class="header-complex-invoker" href="#"
                            aria-controls="profileMenu" aria-haspopup="true" aria-expanded="false"
                            data-unfold-event="click" data-unfold-target="#profileMenu" data-unfold-type="css-animation"
                            data-unfold-duration="300" data-unfold-animation-in="fadeIn"
                            data-unfold-animation-out="fadeOut">
                            <!--img class="avatar rounded-circle mr-md-2" src="#" alt="John Doe"-->
                            <span class="d-none d-md-block">Login</span>
                            <i class="gd-angle-down d-none d-md-block ml-2"></i>
                        </a>
                        <ul id="profileMenu"
                            class="unfold unfold-user unfold-light unfold-top unfold-centered position-absolute pt-2 pb-1 mt-4 unfold-css-animation unfold-hidden fadeOut"
                            aria-labelledby="profileMenuInvoker" style="animation-duration: 300ms;">
                            <li class="unfold-item">
                                <a class="unfold-link d-flex align-items-center text-nowrap" href="{{ route('login') }}">
                                    <span class="unfold-item-icon mr-3">
                                        <i class="gd-user"></i>
                                    </span>
                                    Login
                                </a>
                            </li>
                            <li class="unfold-item">
                                <a class="unfold-link d-flex align-items-center text-nowrap"
                                    href="{{ route('admin.login') }}">
                                    <span class="unfold-item-icon mr-3">
                                        <i class="gd-user"></i>
                                    </span>
                                    Admin Login
                                </a>
                            </li>
                            <li class="unfold-item">
                                <a class="unfold-link d-flex align-items-center text-nowrap"
                                    href="{{ route('register') }}">
                                    <span class="unfold-item-icon mr-3">
                                        <i class="gd-user"></i>
                                    </span>
                                    Register
                                </a>
                            </li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <li class="unfold-item unfold-item-has-divider">
                                    <a class="unfold-link d-flex align-items-center text-nowrap">
                                        <span class="unfold-item-icon mr-3">
                                            <i class="gd-power-off"></i>
                                        </span>
                                        <button type="submit" class="border-0 bg-transparent">Sign Out</button>
                                    </a>
                                </li>
                            </form>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</header>

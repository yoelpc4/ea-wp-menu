<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">
                <b>
                    <img src="{{ asset('storage/images/default/logo-icon.png') }}" width="46.875" height="46.875"
                        alt="logo-thumb" class="light-logo" />
                    <img src="{{ asset('storage/images/default/logo-icon.png') }}" width="46.875" height="46.875"
                        alt="logo-thumb" class="dark-logo" />
                </b>
                <span>
                    <img src="{{ asset('storage/images/default/logo-text.png') }}" width="96.375" height="54.25"
                        alt="logo" class="light-logo" />
                    <img src="{{ asset('storage/images/default/logo-text.png') }}" width="96.375" height="54.25"
                        alt="logo" class="dark-logo" />
                </span>
            </a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                        href="javascript:void(0)">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
                        <div class="notify">
                            <span class="heartbit"></span> <span class="point"></span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                        <ul>
                            <li>
                                <div class="drop-title">Notifications</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <a href="javascript:void(0)">
                                        <div class="btn btn-danger btn-circle">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="mail-contnet">
                                            <h5>Meeting</h5>
                                            <span class="mail-desc">Business meeting at 10:00</span>
                                            <span class="time">09:30</span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center link" href="javascript:void(0);">
                                    <strong>See all notifications</strong> <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item right-side-toggle">
                    <a class="nav-link  waves-effect waves-light" href="javascript:void(0)">
                        <i class="ti-settings"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
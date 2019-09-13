<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <div class="user-profile">
            <div class="user-pro-body">
                <div>
                    <img src="{{ asset('storage/images/default/user.png') }}" alt="profile-image" class="img-circle">
                </div>
                <div class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu"
                        data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        @auth()
                            {{ Auth::user()->name }}
                        @endauth
                        <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu animated flipInY">
                        <a href="javascript:void(0)" class="dropdown-item">
                            <i class="fa fa-user"></i> My Profile
                        </a>
                        <a href="javascript:void(0)" class="dropdown-item">
                            <i class="fa fa-unlock"></i> Change Password
                        </a>
                        <div class="dropdown-divider"></div>
                        {!! Form::open(['method' => 'post', 'route' => 'logout']) !!}
                        <button type="submit" class="dropdown-item">
                            <i class="fa fa-sign-out-alt"></i> Logout
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a href="{{ route('home') }}" class="waves-effect waves-dark">
                        <i class="fa fa-tachometer-alt"></i><span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="fa fa-cubes"></i><span class="hide-menu">Master</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Users</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>

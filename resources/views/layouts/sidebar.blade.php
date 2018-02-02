    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <?php 
                        use App\UserDetail;
                        $avatar = UserDetail::where('user_id',Auth::user()->id)->pluck('avatar');

                        if(! ($avatar->isEmpty() ) ) {
                            $img = $avatar[0];
                        } else {
                            $img = "images/user.png";
                        }
                    ?>
                    <img src="{{asset($img)}}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="txt-name">{{Auth::user()->name}}</div>
                    <div class="email" id="txt-email">{{Auth::user()->email}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Sign Out</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                @if(Auth::user()->hasRole('ROLE_USER'))
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="{{ url('home')}}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="header">INFORMATION</li>
                    
                    <li class="">
                        <a href="{{ route('detail.edit', Auth::user()->id)}}">
                            <i class="material-icons">assignment</i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('cv.upload')}}">
                            <i class="material-icons">assignment</i>
                            <span>CV</span>
                        </a>
                    </li>
                </ul>
                @else
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="{{ url('home')}}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="header">INFORMATION</li>
                    
                    <li class="">
                        <a href="{{ route('manage_cv.index')}}">
                            <i class="material-icons">assignment</i>
                            <span>CV</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('manage_user.index')}}">
                            <i class="material-icons">assignment</i>
                            <span>USER</span>
                        </a>
                    </li>
                </ul>
                @endif
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>
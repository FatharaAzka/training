    <nav class="navbar" style="{{ (\Request::is('/','login','register','password/reset')) ? 'background:#fff' : 'background:#406586' }}">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href='javascript:void(0);' class='bars'></a>
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" style="{{ (\Request::is('/','login','register','password/reset')) ? 'color:#1f91f3' : '' }}"></a>
                <a class="navbar-brand" href="{{url('/')}}" style="{{ (\Request::is('/','login','register','password/reset')) ? 'color:#2f2f2f' : 'color:#fff' }}">JOB App</a>
            </div>
            <div class="collapse navbar-collapse" style="border-top: 1px solid #3a242430;" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                    <li class="dropdown">
                        <a href="{{route('login')}}" class="btn btn-primary btn-log waves-effect"><span class="font-bold">Login</span></a>
                    </li>
                    @else
                        @if(Auth::user()->hasAnyRole(['ROLE_USER','ROLE_ADMIN']))
                        <li class="dropdown">
                            <a href="{{route('home')}}" class="btn btn-primary btn-log waves-effect"><span class="font-bold" id="btn-name">{{Auth::user()->name}}</span></a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="btn btn-primary btn-log waves-effect" onclick="event.preventDefault(); document.getElementById('logout-form-nav').submit();">
                                <span class="font-bold">Logout</span>
                            </a>
                        </li>

                        <form id="logout-form-nav" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    </nav>
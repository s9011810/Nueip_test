@section('nav_style')
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">測試網站</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto ">
{{--                    @yield('nav_list')--}}
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="fas fa-home"></i>首頁</a>
                    </li>
                    @if(isset(Auth::user()->email))
                        <li class="nav-item">
                            <a class="nav-link" href="/member_detail/{{Auth::id()}}"><i class="fas fa-layer-group"></i>{{Auth::user()->email}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout"><i class="fas fa-sign-in-alt"></i>登出</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin_member/{{Auth::id()}}"><i class="fas fa-users-cog"></i>後端管理</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i>登入</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register"><i class="fas fa-user"></i>註冊</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
@endsection

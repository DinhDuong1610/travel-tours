<div class="container">
    <a class="navbar-brand" href="{{ route('pages.welcome') }}"><img style="border-radius: 50%;" width="80px"
            height="80px" src="{{ asset('images/logo.jpg') }}" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="{{ route('pages.welcome') }}" class="nav-link">Trang chủ</a></li>
            <li class="nav-item"><a href="{{ route('pages.packages') }}" class="nav-link">Điểm đến</a></li>
            <li class="nav-item"><a href="{{ route('pages.blog') }}" class="nav-link">Bài viết</a></li>
            <li class="nav-item"><a href="{{ route('pages.about') }}" class="nav-link">Giới thiệu</a></li>
            <li class="nav-item"><a href="{{ route('pages.contact') }}" class="nav-link">Liên hệ</a></li>
            {{-- <li class="nav-item cta"><a href="{{route('login')}}" class="nav-link">Đăng nhập</a></li> --}}
            @guest
                <li class="nav-item">
                    <a class="nav-link login" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link register" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        @if(Auth::user()->role === 'admin' || Auth::user()->role === 'employee')
                            <a class="dropdown-item" href="{{ route('admin.destinations.index') }}">
                                <i class="fa fa-cogs"></i> {{ __('Quản lý') }}
                            </a>
                        @endif

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                            {{ __('Đăng xuất') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</div>

@section('css')
<style>
    .login, .register {
        color: #fff !important;
        border: 1px solid #33313B !important;
        background: #33313B !important;
        padding: 5px 10px !important;
        border-radius: 5px !important;
        margin-right: 10px !important;

        &:hover {
            color: #33313B !important;
            background: none !important;
        }
    }
</style>
@endsection
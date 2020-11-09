@guest
<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item waves-effect"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="bx bxs-user-check font-size-22"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="{{route('login')}}">{{__('LOGIN')}}</a>
{{--        @if (Route::has('register'))--}}
{{--            <a class="dropdown-item" href="{{ route('register') }}">{{ __('REGISTER') }}</a>--}}
{{--        @endif--}}
    </div>
</div>
@else
    <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="rounded-circle header-profile-user" src="{{asset('images/users/avatar-1.jpg')}}"
                 alt="Header Avatar">
            <span class="d-none d-xl-inline-block ml-1" key="t-henry">{{auth()->user()->name}}</span>
            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right">
            <!-- item-->
            <a class="dropdown-item" href="{{route('home')}}"><i class="bx bx-user font-size-16 align-middle mr-1"></i> <span key="t-profile">Profile</span></a>
            <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle mr-1"></i> <span key="t-my-wallet">My Wallet</span></a>
            <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right">11</span><i class="bx bx-wrench font-size-16 align-middle mr-1"></i> <span key="t-settings">Settings</span></a>
            <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle mr-1"></i> <span key="t-lock-screen">Lock screen</span></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i><span key="t-logout">Logout</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
{{--            <a class="dropdown-item text-danger" href="#"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> <span key="t-logout">Logout</span></a>--}}
        </div>
    </div>
@endguest

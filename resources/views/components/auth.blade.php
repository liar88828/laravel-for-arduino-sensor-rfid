<div class="nav-item dropdown ">
    <a class="nav-link dropdown-toggle" href="#" role="button"
       data-bs-toggle="dropdown"
       aria-expanded="false">
        {{Auth::check() ? auth()->user()->name:'Auth'}}
    </a>

    <ul class="dropdown-menu ">
        @if(Auth::check())
            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
        @else
            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
            <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
        @endif
    </ul>
</div>

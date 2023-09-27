<nav class="navbar container-fluid navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="/media/logo-white.png" height="50px" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link link-custom" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-custom" aria-current="page" href="{{ route('announcement.index') }}">{{ __('ui.allAnnouncements')}}</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link link-custom" href="{{ route('announcement.create') }}">{{ __('ui.addAnnouncementNav')}}</a>
                    </li>
                @endauth
                <li class="nav-item dropdown">
                    <a class="nav-link link-custom dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('ui.genre')}}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item link-custom"
                                    href="{{ route('categoryIndex', compact('category')) }}">{{ __("category.{$category->name}") }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                
            </ul>

                
            <ul class="navbar-nav mb-2 mb-lg-0">
                <x-searchNav/>
            @auth
                <p class="d-none">
                    {{ $counter = App\Models\Announcement::toBeRevisionedCount() }}
                </p>

                <li class="nav-item dropdown ms-lg-auto mx-lg-5">
                    <a class="nav-link link-custom dropdown-toggle mx-lg-2" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                        @if (Auth::user()->is_revisor)
                            @if ($counter > 0)
                                <span class="badge rounded-pill bg-danger">
                                    {{ App\Models\Announcement::toBeRevisionedCount() }}
                                    <span class="visually-hidden">messaggi non letti</span>
                                </span>
                            @endif
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        @if (Auth::user()->is_revisor)
                            <li class="nav-item">
                                <a class="nav-link px-2 link-custom" href="{{ route('revisor.index') }}">{{__('ui.revisorArea')}}
                                    <span class="badge rounded-pill bg-danger">
                                        {{ App\Models\Announcement::toBeRevisionedCount() }}
                                        <span class="visually-hidden">messaggi non letti</span>
                                    </span>
                                </a>
                            </li>
                        @endif
                        <li class="nav-link px-2 link-custom">
                            <a class="nav_link link-custom" href="{{route('user.myAnnouncements')}}"
                                >{{__('ui.myAnn')}}</a>
                        </li>
                        <hr class="mx-2">
                        <li class="nav-link px-2 link-custom">
                            <a class="nav_link" href="/logout"
                                onclick="event.preventDefault();getElementById('form-logout').submit()">Logout</a>
                        </li>
                        <form id="form-logout" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </ul>
                </li>
            @endauth
            @guest
                <li class="nav-item dropdown ms-auto me-5">
                    <a class="nav-link link-custom dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('ui.guest')}}
                    </a>
                    <ul class="dropdown-menu ">
                        <li class="nav-item mx-2">
                            <a href="/login"
                                onclick="event.preventDefault();getElementById('form-login').submit()" class="nav-link px-2 link-custom">Login</a>
                        </li>
                        <form id="form-login" action="{{ route('login') }}" method="GET">
                        </form>
                        <hr class="mx-2">

                        <li class="nav-item dropdown mx-2">
                            <a href="/register"
                                onclick="event.preventDefault();getElementById('form-register').submit()" class="nav-link px-2 link-custom">{{__('ui.registered')}}</a>
                        </li>
                        <form id="form-register" action="{{ route('register') }}" method="GET">
                        </form>
                    </ul>
                </li>
            @endguest
            <button id="selectLeng" class="select-leng"><img src="/media/leng-3.png" class="imgSelectLeng" alt=""></button>
                <div id="lengIT" class="lengIT d-none"><x-_locale lang="it" nation="it"/></div>
                <div id="lengEN" class="lengEN d-none"><x-_locale lang="en" nation="gb"/></div>
                <div id="lengES" class="lengES d-none"><x-_locale lang="es" nation="es"/></div>
            {{-- <button id="selectLeng" class="select-leng"><img src="/media/leng-3.png" class="imgSelectLeng" alt=""></button>
            <li id="lengIT" class="lengIT nav-item"><x-_locale lang="it" nation="it"/></li>
            <li id="lengEN" class="lengEN nav-item"><x-_locale lang="en" nation="gb"/></li>
            <li id="lengES" class="lengES nav-item"><x-_locale lang="es" nation="es"/></li> --}}
        </div>



    </div>
</nav>

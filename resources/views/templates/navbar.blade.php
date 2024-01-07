<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <span class="me-2 logo-title"><a class="navbar-brand text-primary" href="#">sri-blog</a><span class="mx-3 text-secondary fw-light hide">|</span></span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item me-3">
                    <a class="nav-link {{ Request::is('posts') ? 'active' : '' }}" href="/"><i class="fas fa-file-alt icon me-1"></i> Posts</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}" href="/categories"><i class="fas fa-shapes icon me-1"></i> Categories</a>
                </li>
                @auth
                <li class="nav-item me-3 hide">
                    <a href="/dashboard" class="nav-link">
                        <small><i class="fas fa-tachometer-alt icon me-1"></i></small> Dashboard
                    </a>
                </li>
                <li class="nav-item me-3 hide">
                    <a href="/dashboard/users/{{ auth()->user()->id }}" class="nav-link {{ Request::is('dashboard/posts') ? 'active' : '' }}">
                        <i class="fas fa-user icon me-1"></i> Profile
                    </a>
                </li>
                <li class="nav-item me-3 hide">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#logout">
                        <i class="fas fa-sign-out-alt icon me-1"></i> Sign Out
                    </a>
                </li>
                @endauth
                @guest
                <li class="nav-item me-3 hide">
                    <a class="nav-link" href="/signin"><i class="fas fa-sign-in-alt icon me-1"></i> Sign in</a>
                </li>
                @endguest
            </ul>
        </div>

        @guest
        <li class="nav-item navbar-nav ms-md-auto">
            <a class="nav-link" href="/signin"><i class="fas fa-sign-in-alt icon me-1"></i> Sign In</a>
        </li>
        @else
        <li class="nav-item dropdown navbar-nav ms-auto">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->name }} <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="{{ auth()->user()->name }}" class="mx-2 rounded-circle" width="30">
            </a>
            <ul class="dropdown-menu ps-2 border-0 shadow-sm" aria-labelledby="navbarDropdownMenuLink">
                <li>
                    <a href="/dashboard/posts" class="nav-link">
                        <small><i class="fas fa-tachometer-alt icon"></i></small> Dashboard
                    </a>
                </li>
                <li>
                    <a href="/dashboard/users/{{ auth()->user()->id }}" class="nav-link {{ Request::is('dashboard/posts') ? 'active' : '' }}">
                        <i class="fas fa-user icon me-1"></i> Profile
                    </a>
                </li>
                <li>
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#logout">
                        <i class="fas fa-sign-out-alt icon me-1"></i> Sign Out
                    </a>
                </li>
            </ul>
        </li>
        @endguest
    </div>
</nav>

@include('templates/modalLogout')

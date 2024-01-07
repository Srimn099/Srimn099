<a href="/" class="py-3 mb-md-0 me-md-auto text-decoration-none logo-title">
    <span class="fs-3 d-none d-sm-inline navbar-brand text-center text-white">b-l0g</span>
</a>

<ul class="sidebar nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
    <li class="nav-item active">
        <a href="/dashboard/posts" class="nav-link align-middle {{ Request::is('dashboard') || Request::is('dashboard/posts') || Request::is('dashboard/posts/*/edit') ? 'active' : '' }}">
            <i class="fas fa-file-alt icon"></i> <span class="ms-1 d-none d-sm-inline">Posts</span>
        </a>
    </li>
    <li>
        <a href="/dashboard/posts/create" class="{{ Request::is('dashboard/posts/create') ? 'active' : '' }} nav-link align-middle">
            <small><i class="fas fa-plus-circle icon"></i></small> <span class="ms-1 d-none d-sm-inline">New Post</span></a>
    </li>
    @can('admin')
    <li>
        <a href="/dashboard/users" class="{{ Request::is('dashboard/users') ? 'active' : '' }} nav-link align-middle">
            <i class="fas fa-user icon"></i> <span class="ms-1 d-none d-sm-inline">Users</span> </a>
    </li>
    <li>
        <a href="/dashboard/categories" class="{{ Request::is('dashboard/categories') || Request::is('dashboard/categories/*/edit') ? 'active' : '' }} nav-link align-middle">
            <small><i class="fas fa-shapes icon"></i></small> <span class="ms-1 d-none d-sm-inline">Categories</span> </a>
    </li>
    <li>
        <a href="/dashboard/categories/create" class="{{ Request::is('dashboard/categories/create') ? 'active' : '' }} nav-link align-middle">
            <small><i class="fas fa-plus-circle icon"></i></small> <span class="ms-1 d-none d-sm-inline">New Category</span> </a>
    </li>
    @endcan
</ul>

<hr>

<div class="dropdown pb-3">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ asset('assets/img/profile-sample.jpeg') }}" alt="{{ auth()->user()->name }}" width="30" height="30" class="rounded-circle">
        <span class="d-none d-sm-inline ms-2"> Kusuma Wecitra</span>
    </a>
    <ul class="dropdown-menu text-small border-0 shadow">
        <li><a class="dropdown-item" href="/">
                <small><i class="fas fa-home icon me-2 text-primary"></i></small>Home
            </a></li>
        <li><a class="dropdown-item" href="#">
                <small><i class="fas fa-user icon me-2 text-primary"></i></small>Profile
            </a></li>
        <li>
        </li>
        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout">
                <small><i class="fas fa-sign-out-alt icon me-1 text-primary"></i></small> Sign out</a>
        </li>
    </ul>
</div>

@include('templates/modalLogout')

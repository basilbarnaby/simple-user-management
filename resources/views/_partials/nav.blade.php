<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('home') }}">
                    <span data-feather="home"></span>
                    Home <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <span data-feather="user"></span>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('roles.index') }}">
                    <span data-feather="users"></span>
                    Roles
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('permissions.index') }}">
                    <span data-feather="user-x"></span>
                    Permissions
                </a>
            </li>
        </ul>
    </div>
</nav>
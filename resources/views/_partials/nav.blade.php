<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('home') }}">
                    <span data-feather="home"></span>
                    Home <span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>
        @if (Laratrust::hasRole(['superadmin|administrator']))
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Administrator</span>
                <a class="d-flex align-items-center text-muted" href="#">
                    <span data-feather="chevrons-down"></span>
                </a>
            </h6>
        @endif
        <ul class="nav flex-column">
            @if (Laratrust::hasRole(['superadmin|administrator']))    
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">
                        <span data-feather="user"></span>
                        Users
                    </a>
                </li>
            @endif
            @if (Laratrust::hasRole(['superadmin']))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('roles.index') }}">
                        <span data-feather="users"></span>
                        Roles
                    </a>
                </li>
            @endif
            @if (Laratrust::hasRole(['superadmin']))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('permissions.index') }}">
                        <span data-feather="user-x"></span>
                        Permissions
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
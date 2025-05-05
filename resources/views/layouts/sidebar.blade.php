@php
    $current_url = $_SERVER['REQUEST_URI'];
    $current_user = Auth::user();
@endphp

<div class="sidebar border-end" style="height: 100vh;">
    <div class="sidebar-header border-bottom">
        <div class="sidebar-brand">Application</div>
    </div>
    <ul class="sidebar-nav">
        @if (Auth::user()->checkAccess(\App\Models\Role::ACCESS_DASHBOARD))
            <li class="nav-item">
                <a class="nav-link @if ($current_url == '/dashboard') active @endif" href="/dashboard">
                    <i class="nav-icon cil-speedometer"></i> Dashboard
                </a>
            </li>
        @endif
        @if (Auth::user()->checkAccess(\App\Models\Role::ACCESS_ROLE_LIST))
            <li class="nav-item">
                <a class="nav-link" href="/role">
                    <i class="nav-icon cil-speedometer"></i> Role
                </a>
            </li>
        @endif
        @if (Auth::user()->checkAccess(\App\Models\Role::ACCESS_USER_LIST))
            <li class="nav-item">
                <a class="nav-link" href="/user">
                    <i class="nav-icon cil-speedometer"></i> User
                </a>
            </li>
        @endif
    </ul>
    <div class="sidebar-footer border-top d-flex">
        <a href="/logout">
            <button class="btn btn-primary">Logout</button>
        </a>
    </div>
</div>

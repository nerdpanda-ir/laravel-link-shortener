<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('dashboard.home')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-layout-wtf" viewBox="0 0 16 16">
                        <path d="M5 1v8H1V1h4zM1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm13 2v5H9V2h5zM9 1a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9zM5 13v2H3v-2h2zm-2-1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1H3zm12-1v2H9v-2h6zm-6-1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1H9z"/>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home align-text-bottom" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard.link.view-all')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                        <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                        <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                    </svg>
                    Links
                </a>
            </li>
        </ul>
        @canany(['create-permission','view-all-permissions'])
            <x-partials.sidebar-heading name="Permission" uri="{{route('dashboard.permission.create')}}"/>
            <ul class="nav flex-column mb-2">
                @can('view-all-permissions')
                    <x-partials.sidebar-link-item title="All" uri="{{route('dashboard.permission.view-all')}}"/>
                @endcan
                @can('create-permission')
                     <x-partials.sidebar-link-item title="Create" uri="{{route('dashboard.permission.create')}}"/>
                @endcan
            </ul>
        @endcanany
        @canany(['create-role','view-all-roles'])
            <x-partials.sidebar-heading name="Roles" uri="{{route('dashboard.role.create')}}"/>
            <ul class="nav flex-column mb-2">
                @can('view-all-roles')
                    <x-partials.sidebar-link-item title="All" uri="{{route('dashboard.role.view-all')}}" />
                @endcan
                @can('create-role')
                    <x-partials.sidebar-link-item title="Create" uri="{{route('dashboard.role.create')}}"/>
                @endcan
            </ul>
        @endcanany
        @canany(['create-user','view-all-users'])
            <x-partials.sidebar-heading name="Users" uri="{{route('dashboard.user.create')}}"/>
            <ul class="nav flex-column mb-2">
                @can('view-all-users')
                    <x-partials.sidebar-link-item title="All" uri="{{route('dashboard.user.view-all')}}"/>
                @endcan
                @can('create-user')
                    <x-partials.sidebar-link-item title="Create" uri="{{route('dashboard.user.create')}}"/>
                @endcan
            </ul>
        @endcanany

    </div>
</nav>

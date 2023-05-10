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
                <a class="nav-link" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file align-text-bottom" aria-hidden="true"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                    Orders
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
                    <x-partials.sidebar-link-item title="Create" uri="{{route('dashboard.permission.create')}}"/>
                @endcan
            </ul>
        @endcanany
    </div>
</nav>

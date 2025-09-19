<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.index') }}" class="brand-link">
        <img src="/logo.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.events.index') }}" class="nav-link  {{ Str::of(request()->getPathInfo())->contains('events')?'active':'' }}">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>
                            Events
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.clients.index') }}" class="nav-link  {{ Str::of(request()->getPathInfo())->contains('clients')?'active':'' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Clients
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.menu_types.index') }}" class="nav-link  {{ Str::of(request()->getPathInfo())->contains('menu_types')?'active':'' }}">
                        <i class="nav-icon fas fa-utensils"></i>
                        <p>
                            Menu Types
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.menu_items.index') }}" class="nav-link  {{ Str::of(request()->getPathInfo())->contains('menu_items')?'active':'' }}">
                        <i class="nav-icon fas fa-pizza-slice"></i>
                        <p>
                            Menu Items
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.staffs.index') }}" class="nav-link  {{ Str::of(request()->getPathInfo())->contains('staffs')?'active':'' }}">
                        <i class="nav-icon fas fa-people-carry"></i>
                        <p>
                            Staff
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.equipments.index') }}" class="nav-link  {{ Str::of(request()->getPathInfo())->contains('equipments')?'active':'' }}">
                        <i class="nav-icon fas fa-toolbox"></i>
                        <p>
                            Equipments
                        </p>
                    </a>
                </li>


                <div class="user-panel mt-1 pb-1 mb-1 d-flex">
                </div>

                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-door-open"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

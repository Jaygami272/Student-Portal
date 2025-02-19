<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a href="{{ route('dashboard.index') }}" class="nav-link {{ Request::is('dashboard*') ? '' : 'collapsed' }}">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
        </li>

        @if (Auth::user()->role->slug=="admin")

        <li class="nav-item">
            <a class="nav-link {{ Request::is('departments*') ? '' : 'collapsed' }}" data-bs-target="#units-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Departments</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="units-nav" class="nav-content collapse {{ Request::is('departments*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('departments.index') }}" class="{{ Request::is('departments*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Departments</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif
        @if (Auth::user()->role->slug=="hod")
        <li class="nav-item">
            <a href="{{ route('subjects.index') }}" class="nav-link {{ Request::is('subjects*') ? '' : 'collapsed' }}">
                <i class="bi bi-speedometer2"></i>
                <span>Subjects</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('facultys*') ? '' : 'collapsed' }}" data-bs-target="#facultys-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Facultys</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="facultys-nav" class="nav-content collapse {{ Request::is('facultys*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('facultys.index') }}" class="{{ Request::is('facultys*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Faculty</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('timetables*') ? '' : 'collapsed' }}" data-bs-target="#timetables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Time Table</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="timetables-nav" class="nav-content collapse {{ Request::is('timetables*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                   
                    <a href={{ route('timetables.index') }} class="{{ Request::is('timetables/create','timetables') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Lecture TT</span>
                    </a>
                </li>

                <li>
                    <a href={{ route('timetables.eindex') }} class="{{ Request::is('timetables / eindex','timetables / ecreate') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Mid-Exam TT</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('teachs*') ? '' : 'collapsed' }}" data-bs-target="#teachs-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Teaching</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="teachs-nav" class="nav-content collapse {{ Request::is('teachs*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('teachs.index') }}" class="{{ Request::is('teachs*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Assign subject</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('semesters*') ? '' : 'collapsed' }}" data-bs-target="#semesters-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Semesters</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="semesters-nav" class="nav-content collapse {{ Request::is('semesters*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#" class="{{ Request::is('semesters*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Sem 1</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="{{ Request::is('semesters*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Sem 2</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="{{ Request::is('semesters*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Sem 3</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="{{ Request::is('semesters*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Sem 4</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="{{ Request::is('semesters*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Sem 5</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="{{ Request::is('semesters*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Sem 6</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="{{ Request::is('semesters*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Sem 7</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="{{ Request::is('semesters*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Sem 8</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif
       

        {{-- <li class="nav-item">
            <a class="nav-link {{ Request::is('unit_charcoal_purchases*','unit_wood_purchases*') ? '' : 'collapsed' }}" data-bs-target="#units-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Purchase Management</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="units-nav" class="nav-content collapse {{ Request::is('unit_charcoal_purchases*','unit_wood_purchases*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('unit_charcoal_purchases.index') }}" class="{{ Request::is('unit_charcoal_purchases*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Charcoal Purchase</span>
                    </a>
                    <a href="{{ route('unit_wood_purchases.index') }}" class="{{ Request::is('unit_wood_purchases*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Wood Purchase</span>
                    </a>
                </li>
            </ul>
        </li> --}}

        {{-- <li class="nav-item">
            <a href="{{ route('unit_account.index') }}" class="nav-link {{ Request::is('unit_account*') ? '' : 'collapsed' }}">
                <i class="bi bi-person"></i>
                <span>Account</span>
            </a>
        </li> --}}

        {{-- <li class="nav-item">
            <a href="{{ route('charcoal_stock.index') }}" class="nav-link {{ Request::is('charcoal_stock*') ? '' : 'collapsed' }}">
                <i class="bi bi-grid"></i>
                <span>Charcoal Stock</span>
            </a>
        </li> --}}

        {{-- <li class="nav-item">
            <a href="{{ route('wood_stock.index') }}" class="nav-link {{ Request::is('wood_stock*') ? '' : 'collapsed' }}">
                <i class="bi bi-inboxes"></i>
                <span>Wood Stock</span>
            </a>
        </li> --}}

        {{-- <li class="nav-item">
            <a href="{{ route('unit_customers.index') }}" class="nav-link {{ Request::is('unit_customers*') ? '' : 'collapsed' }}">
                <i class="bi bi-people"></i>
                <span>Customers</span>
            </a>
        </li> --}}
       

       
        {{-- <li class="nav-item">
            <a class="nav-link {{ Request::is('purchases*','purchase*') ? '' : 'collapsed' }}" data-bs-target="#purchase-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Purchase Management</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="purchase-nav" class="nav-content collapse {{ Request::is('purchases*','purchase*') ? 'show' : '' }} " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('purchase_orders.index') }}" class="{{ Request::is('purchase_orders*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Purchase order</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('purchases.index') }}" class="{{ Request::is('purchases*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Purchase</span>
                    </a>
                </li>
            </ul>
        </li> --}}
     

        
        {{-- <li class="nav-item">
            <a class="nav-link {{ Request::is('sales*') ? '' : 'collapsed' }}" data-bs-target="#sale-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-card-list"></i></i><span>Sales Management</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="sale-nav" class="nav-content collapse {{ Request::is('sales*') ? 'show' : '' }} " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('sales.index') }}" class="{{ Request::is('sales*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Sales</span>
                    </a>
                </li>
            </ul>
        </li>
        --}}

        
        {{-- <li class="nav-item">
            <a class="nav-link {{ Request::is('#*') ? '' : 'collapsed' }}" data-bs-target="#acc-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-dash-circle"></i></i><span>Accounts</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="acc-nav" class="nav-content collapse  {{ Request::is('#*') ? 'show' : '' }} " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#" class="{{ Request::is('#*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Purchase Invoice</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="{{ Request::is('#*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Sales Invoice</span>
                    </a>
                </li>
            </ul>
        </li> --}}
       
        
        @if(Auth::user()->role->slug=="admin")
        <li class="nav-item">
            <a class="nav-link {{ Request::is('vendors*','customers*','materials*','transporters*','users*','roles*','permissions*','expences*','manns*') ? '' : 'collapsed' }}" data-bs-target="#master-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="master-nav" class="nav-content collapse {{ Request::is('vendors*','customers*','materials*','transporters*','users*','roles*','permissions*','expences*','manns*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                {{-- <li>
                    <a href="{{ route('vendors.index') }}" class="{{ Request::is('vendors*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Vendor</span>
                    </a>
                </li> --}}

                {{-- <li>
                    <a href="{{ route('customers.index') }}" class="{{ Request::is('customers*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Customer</span>
                    </a>
                </li> --}}

                {{-- <li>
                    <a href="{{ route('transporters.index') }}" class="{{ Request::is('transporters*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Transporter</span>
                    </a>
                </li> --}}
                {{-- <li>
                    <a href="{{ route('materials.index') }}" class="{{ Request::is('materials*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Material</span>
                    </a>
                </li> --}}
                {{-- <li>
                    <a href="{{ route('expences.index') }}" class="{{ Request::is('expences*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Expenses</span>
                    </a>
                </li> --}}

                {{-- <li>
                    <a href="{{ route('manns.index') }}" class="{{ Request::is('manns*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i>
                        <span>Manns</span>
                    </a>
                </li> --}}

                <li class="nav-header">
                    <strong style="margin-left: 37px;color:rgb(22, 121, 129)">Admin</strong>
                </li>
                <li>
                    <a href="{{ route('users.index') }}" class="{{ Request::is('users*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('roles.index') }}" class="{{ Request::is('roles*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Roles</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('permissions.index') }}" class="{{ Request::is('permissions*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Permission</span>
                    </a>
                </li> --}}



            </ul>
        </li>
     @endif
    </ul>
</aside>
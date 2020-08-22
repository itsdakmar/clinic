<style>
    .layout-horizontal-bar .header-topnav .topnav ul ul li {
        width: auto !important;
    }
</style>
<div class="horizontal-bar-wrap">
    <div class="header-topnav">
        <div class="container-fluid">
            <div class=" topnav rtl-ps-none" id="" data-perfect-scrollbar data-suppress-scroll-x="true">
                <ul class="menu float-left">
                    @hasanyrole('administrator|doctor|nurse')
                        <li class="{{ request()->is('patients/*') ? 'active' : '' }}">
                            <div>
                                <div>
                                    <label class="toggle" for="drop-2">
                                        Patient
                                    </label>
                                    <a href="#">
                                        <i class="nav-icon mr-2 i-Love-User"></i>
                                        Patient
                                    </a>
                                    <input type="checkbox" id="drop-2">
                                    <ul>
                                        <li class="nav-item ">
                                            <a class="{{ Route::currentRouteName()=='patients.index' ? 'open' : '' }}"
                                               href="{{route('patients.index')}}">
                                                <i class="nav-icon mr-2 i-Find-User"></i>
                                                <span class="item-name">List of patient</span>
                                            </a>
                                        </li>
                                        @hasanyrole('nurse')
                                        <li class="nav-item ">
                                            <a class="{{ Route::currentRouteName()=='patients.create' ? 'open' : '' }}"
                                               href="{{route('patients.create')}}">
                                                <i class="nav-icon mr-2 i-Add-User"></i>
                                                <span class="item-name">Create patient</span>
                                            </a>
                                        </li>
                                        @endhasanyrole
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endhasanyrole
                    @hasanyrole('administrator|nurse')
                    <li class="{{ request()->is('doctors/*') ? 'active' : '' }}">
                        <div>
                            <div>
                                <label class="toggle" for="drop-2">
                                    Doctor
                                </label>
                                <a href="#">
                                    <i class="nav-icon mr-2 i-Love-User"></i>
                                    Doctor
                                </a>
                                <input type="checkbox" id="drop-2">
                                <ul>
                                    <li class="nav-item ">
                                        <a class="{{ Route::currentRouteName()=='doctors.index' ? 'open' : '' }}"
                                           href="{{route('doctors.index')}}">
                                            <i class="nav-icon mr-2 i-Find-User"></i>
                                            <span class="item-name">List of doctor</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="{{ Route::currentRouteName()=='doctors.create' ? 'open' : '' }}"
                                           href="{{route('doctors.create')}}">
                                            <i class="nav-icon mr-2 i-Add-User"></i>
                                            <span class="item-name">Create doctor</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    @endhasanyrole
                    @hasanyrole('administrator')
                    <li class="{{ request()->is('nurses/*') ? 'active' : '' }}">
                        <div>
                            <div>
                                <label class="toggle" for="drop-2">
                                    Nurse
                                </label>
                                <a href="#">
                                    <i class="nav-icon mr-2 i-Love-User"></i>
                                    Nurse
                                </a>
                                <input type="checkbox" id="drop-2">
                                <ul>
                                    <li class="nav-item ">
                                        <a class="{{ Route::currentRouteName()=='nurses.index' ? 'open' : '' }}"
                                           href="{{route('nurses.index')}}">
                                            <i class="nav-icon mr-2 i-Find-User"></i>
                                            <span class="item-name">List of nurse</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="{{ Route::currentRouteName()=='nurses.create' ? 'open' : '' }}"
                                           href="{{route('nurses.create')}}">
                                            <i class="nav-icon mr-2 i-Add-User"></i>
                                            <span class="item-name">Create nurse</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    @endhasanyrole
                    @hasanyrole('administrator|nurse')
                    <li class="{{ request()->is('pharmacists/*') ? 'active' : '' }}">
                        <div>
                            <div>
                                <label class="toggle" for="drop-2">
                                    Pharmacist
                                </label>
                                <a href="#">
                                    <i class="nav-icon mr-2 i-Love-User"></i>
                                    Pharmacist
                                </a>
                                <input type="checkbox" id="drop-2">
                                <ul>
                                    <li class="nav-item ">
                                        <a class="{{ Route::currentRouteName()=='pharmacists.index' ? 'open' : '' }}"
                                           href="{{route('pharmacists.index')}}">
                                            <i class="nav-icon mr-2 i-Find-User"></i>
                                            <span class="item-name">List of pharmacist</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="{{ Route::currentRouteName()=='pharmacists.create' ? 'open' : '' }}"
                                           href="{{route('pharmacists.create')}}">
                                            <i class="nav-icon mr-2 i-Add-User"></i>
                                            <span class="item-name">Create pharmacists</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    @endhasanyrole
                    @hasanyrole('administrator|doctor|nurse|pharmacist')
                    <li class="{{ request()->is('appointments/*') ? 'active' : '' }}">
                        <div>
                            <div>
                                <label class="toggle" for="drop-2">
                                    Appointment
                                </label>
                                <a href="#">
                                    <i class="nav-icon mr-2 i-Calendar-3"></i>
                                    Appointment
                                </a>
                                <input type="checkbox" id="drop-2">
                                <ul>
                                    @hasanyrole('administrator|doctor|nurse|pharmacist')
                                    <li class="nav-item ">
                                        <a class="{{ Route::currentRouteName()=='appointments.today' ? 'open' : '' }}"
                                           href="{{route('appointments.today')}}">
                                            <i class="nav-icon mr-2 i-Find-User"></i>
                                            <span class="item-name">Appointment List ( Today )</span>
                                        </a>
                                    </li>
                                    @endhasanyrole
                                    @hasanyrole('administrator|doctor|nurse')
                                    <li class="nav-item ">
                                        <a class="{{ Route::currentRouteName()=='appointments.weekly' ? 'open' : '' }}"
                                           href="{{route('appointments.weekly')}}">
                                            <i class="nav-icon mr-2 i-Find-User"></i>
                                            <span class="item-name">Appointment List</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{ Route::currentRouteName()=='appointments.index' ? 'open' : '' }}"
                                           href="{{route('appointments.index')}}">
                                            <i class="nav-icon mr-2 i-Find-User"></i>
                                            <span class="item-name">Calendar (Weekly)</span>
                                        </a>
                                    </li>
                                    @endhasanyrole
                                    @hasanyrole('nurse')
                                    <li class="nav-item ">
                                        <a class="{{ Route::currentRouteName()=='appointments.create' ? 'open' : '' }}"
                                           href="{{route('appointments.create')}}">
                                            <i class="nav-icon mr-2 i-Add-User"></i>
                                            <span class="item-name">Book For Appointment</span>
                                        </a>
                                    </li>
                                    @endhasanyrole
                                </ul>
                            </div>
                        </div>
                    </li>
                    @endhasanyrole
                    @hasanyrole('administrator|pharmacist')
                    <li class="{{ request()->is('drugs/*') ? 'active' : '' }}">
                        <div>
                            <div>
                                <label class="toggle" for="drop-2">
                                    Drug
                                </label>
                                <a href="#">
                                    <i class="nav-icon mr-2 i-Medicine-2"></i>
                                    Drug
                                </a>
                                <input type="checkbox" id="drop-2">
                                <ul>
                                    <li class="nav-item ">
                                        <a class="{{ Route::currentRouteName()=='drugs.index' ? 'open' : '' }}"
                                           href="{{route('drugs.index')}}">
                                            <i class="nav-icon mr-2 i-Find-User"></i>
                                            <span class="item-name">View list</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="{{ Route::currentRouteName()=='drugs.create' ? 'open' : '' }}"
                                           href="{{route('drugs.create')}}">
                                            <i class="nav-icon mr-2 i-Add-User"></i>
                                            <span class="item-name">Register new</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    @endhasanyrole
                    @hasanyrole('administrator|pharmacist')
                    <li class="{{ request()->is('supplier/*') ? 'active' : '' }}">
                        <div>
                            <div>
                                <label class="toggle" for="drop-2">
                                    Supplier
                                </label>
                                <a href="#">
                                    <i class="nav-icon mr-2 i-Calendar-3"></i>
                                    Supplier
                                </a>
                                <input type="checkbox" id="drop-2">
                                <ul>
                                    <li class="nav-item ">
                                        <a class="{{ Route::currentRouteName()=='suppliers.index' ? 'open' : '' }}"
                                           href="{{route('suppliers.index')}}">
                                            <i class="nav-icon mr-2 i-Find-User"></i>
                                            <span class="item-name">View list</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="{{ Route::currentRouteName()=='suppliers.create' ? 'open' : '' }}"
                                           href="{{route('suppliers.create')}}">
                                            <i class="nav-icon mr-2 i-Add-User"></i>
                                            <span class="item-name">Register new</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    @endhasanyrole
                    @hasanyrole('administrator|nurse|doctor')
                    <li class="{{ request()->is('reporting/*') ? 'active' : '' }}">
                        <div>
                            <div>
                                <label class="toggle" for="drop-2">
                                    Reporting
                                </label>
                                <a href="{{route('home')}}">
                                    <i class="nav-icon mr-2 i-File-Graph"></i>
                                    Reporting
                                </a>
                            </div>
                        </div>
                    </li>
                    @endhasanyrole
                    @hasanyrole('patient')
                    <li class="{{ request()->is('patients/*') ? 'active' : '' }}">
                        <div>
                            <div>
                                <label class="toggle" for="drop-2">
                                    Profile
                                </label>
                                <a href="{{route('patients.show', \Illuminate\Support\Facades\Auth::id())}}">
                                    <i class="nav-icon mr-2 i-Add-UserStar"></i>
                                    Profile
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="{{ request()->is('appointments/*') ? 'active' : '' }}">
                        <div>
                            <div>
                                <label class="toggle" for="drop-2">
                                    Book An Appointment
                                </label>
                                <a href="{{route('appointments.create')}}">
                                    <i class="nav-icon mr-2 i-Add-Window"></i>
                                    Book An Appointment
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="{{ request()->is('appointments/*') ? 'active' : '' }}">
                        <div>
                            <div>
                                <label class="toggle" for="drop-2">
                                    Upcoming Appointment
                                </label>
                                <a href="{{route('appointments.upcoming')}}">
                                    <i class="nav-icon mr-2 i-Calendar-4"></i>
                                    Upcoming Appointment
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="{{ request()->is('reporting/*') ? 'active' : '' }}">
                        <div>
                            <div>
                                <label class="toggle" for="drop-2">
                                    Appointment History
                                </label>
                                <a href="{{route('appointments.history')}}">
                                    <i class="nav-icon mr-2 i-Calendar-3"></i>
                                    Appointment History
                                </a>
                            </div>
                        </div>
                    </li>
                    @endhasanyrole
                    <!-- end ui kits -->
                </ul>
            </div>
        </div>
    </div>
</div>
<!--=============== Horizontal bar End ================-->

<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('/') }}/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title"></div>
                <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <div class="dropdown-divider"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#"
                        onclick="event.preventDefault();
                    this.closest('form').submit();"
                        class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>

            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">{{ @$seoSetting->title }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">DW</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item {{ setSidebarActive(['dashboard']) }}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header">MCA-NEPAL</li>
            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.bod.director-section-setting', 'admin.bod.designation', 'admin.bod.director']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-tie"></i>
                    <span>Board Of Directors</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.bod.director-section-setting']) }}">
                        <a class="nav-link" href="{{ route('admin.bod.director-section-setting') }}">Section
                            Settings</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.bod.designation']) }}">
                        <a class="nav-link" href="{{ route('admin.bod.designation') }}">Designation</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.bod.director']) }}">
                        <a class="nav-link" href="{{ route('admin.bod.director') }}">List Of Directors</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ setSidebarActive([]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-tie"></i>
                    <span>Executive Teams</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.bod.executive-section-setting.index']) }}">
                        <a class="nav-link" href="{{ route('admin.bod.executive-section-setting.index') }}">Section
                            Settings</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.bod.executive-teams.index']) }}">
                        <a class="nav-link" href="{{ route('admin.bod.executive-teams.index') }}">Executive Teams</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ setSidebarActive([]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-sitemap"></i>
                    <span>Organizational Chart</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.bod.organizational-chart-settings.index']) }}">
                        <a class="nav-link" href="{{ route('admin.bod.organizational-chart-settings.index') }}">Section
                            Settings</a>
                    </li>
                </ul>
            </li>

            <li class="menu-header">Projects</li>
            <li class="nav-item dropdown {{ setSidebarActive(['admin.project-categories.*', 'admin.projects.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Projects</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.project-categories.*']) }}">
                        <a class="nav-link" href="{{ route('admin.project-categories.index') }}">Project Categories</a>
                    </li>
                    <li class="{{ setSidebarActive([]) }}">
                        <a class="nav-link" href="{{ route('admin.projects.index') }}">Projects</a>
                    </li>
                </ul>
            </li>

            <li class="menu-header">Documents & Reports</li>
            <li class="nav-item dropdown {{ setSidebarActive([]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Documents & Reports</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive([]) }}">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="{{ setSidebarActive([]) }}">
                        <a class="nav-link" href="#">Documents & Reports</a>
                    </li>
                </ul>
            </li>

            <li class="menu-header">Media/Notices</li>
            <li class="nav-item {{ setSidebarActive([]) }}">
                <a href="#" class="nav-link"><i class="fas fa-columns"></i><span>News</span></a>
            </li>
            <li class="nav-item {{ setSidebarActive([]) }}">
                <a href="#" class="nav-link"><i class="fas fa-columns"></i><span>Community Voice</span></a>
            </li>
            <li class="nav-item dropdown {{ setSidebarActive([]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Articles / Interviews</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive([]) }}">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="{{ setSidebarActive([]) }}">
                        <a class="nav-link" href="#">Articles / Interviews</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ setSidebarActive([]) }}">
                <a href="#" class="nav-link"><i class="fas fa-columns"></i><span>Notice</span></a>
            </li>
            <li class="nav-item {{ setSidebarActive([]) }}">
                <a href="#" class="nav-link"><i class="fas fa-columns"></i><span>Press Releases</span></a>
            </li>
            <li class="nav-item dropdown {{ setSidebarActive([]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Photo Gallery</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive([]) }}">
                        <a class="nav-link" href="#">Album</a>
                    </li>
                    <li class="{{ setSidebarActive([]) }}">
                        <a class="nav-link" href="#">Photo Gallery</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ setSidebarActive([]) }}">
                <a href="#" class="nav-link"><i class="fas fa-columns"></i><span>Video Gallery</span></a>
            </li>

            <li class="menu-header">Procurement</li>
            <li class="nav-item dropdown {{ setSidebarActive([]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Notices</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive([]) }}">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="{{ setSidebarActive([]) }}">
                        <a class="nav-link" href="#">Notices</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ setSidebarActive([]) }}">
                <a href="#" class="nav-link"><i class="fas fa-columns"></i><span>Guidelines</span></a>
            </li>
            <li class="nav-item {{ setSidebarActive([]) }}">
                <a href="#" class="nav-link"><i class="fas fa-columns"></i><span>Bid Challenge
                        System</span></a>
            </li>
            <li class="nav-item {{ setSidebarActive([]) }}">
                <a href="#" class="nav-link"><i class="fas fa-columns"></i><span>Contract Award
                        Notice</span></a>
            </li>

            <li class="menu-header">Jobs</li>
            <li class="nav-item dropdown {{ setSidebarActive([]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Jobs</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive([]) }}">
                        <a class="nav-link" href="#">Section Settings</a>
                    </li>
                    <li class="{{ setSidebarActive([]) }}">
                        <a class="nav-link" href="#">Jobs</a>
                    </li>
                </ul>
            </li>

            <li class="menu-header">Faqs</li>
            <li class="nav-item {{ setSidebarActive([]) }}">
                <a href="#" class="nav-link"><i class="fas fa-columns"></i><span>Faqs</span></a>
            </li>


            <li class="menu-header">Contact</li>
            <li class="nav-item {{ setSidebarActive([]) }}">
                <a href="#" class="nav-link"><i class="fas fa-columns"></i><span>Contact</span></a>
            </li>

            <li class="menu-header">Settings</li>
            {{-- Setting --}}
            <li class="{{ setSidebarActive(['admin.setting.*']) }}">
                <a class="nav-link" href="{{ route('admin.setting.index') }}"><i class="fas fa-cogs"></i>
                    <span>Settings</span>
                </a>
            </li>
            {{-- Setting --}}
        </ul>
    </aside>
</div>

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
                <img alt="image" src="{{ asset('/') }}/assets/img/avatar/avatar-1.png"
                    class="rounded-circle mr-1">
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
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset($generalSetting?->logo) }}" alt="logo" width="75">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset($generalSetting?->logo) }}" alt="logo" width="50">
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item {{ setSidebarActive(['dashboard']) }}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">General</li>
            <li class="nav-item {{ setSidebarActive(['admin.about.*']) }}">
                <a href="{{ route('admin.about.index') }}" class="nav-link"><i class="fas fa-user-cog"></i><span>About
                        Setting</span></a>
            </li>
            <li class="nav-item {{ setSidebarActive(['admin.moving-texts.*']) }}">
                <a href="{{ route('admin.moving-texts.index') }}" class="nav-link"><i
                        class="fas fa-user-cog"></i><span>Moving
                        Text Setting</span></a>
            </li>
            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.service.*', 'admin.service-section-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Services</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.service-section-setting.*']) }}">
                        <a class="nav-link" href="{{ route('admin.service-section-setting.index') }}">Section
                            Setting</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.service.*']) }}">
                        <a class="nav-link" href="{{ route('admin.service.index') }}">Services Item</a>
                    </li>
                </ul>
            </li>

            <li class="menu-header">About</li>
            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.bod.director-section-setting', 'admin.bod.designation*', 'admin.bod.director*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-tie"></i>
                    <span>Board Of Directors</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.bod.director-section-setting']) }}">
                        <a class="nav-link" href="{{ route('admin.bod.director-section-setting') }}">Section
                            Settings</a>
                    </li>
                    <li
                        class="{{ setSidebarActive(['admin.bod.designation', 'admin.bod.designation.create', 'admin.bod.designation.edit']) }}">
                        <a class="nav-link" href="{{ route('admin.bod.designation') }}">Designation</a>
                    </li>
                    <li
                        class="{{ setSidebarActive(['admin.bod.director', 'admin.bod.director.create', 'admin.bod.director.edit']) }}">
                        <a class="nav-link" href="{{ route('admin.bod.director') }}">List Of Directors</a>
                    </li>
                </ul>
            </li>


            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.bod.executive-section-setting.*', 'admin.bod.executive-teams.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-tie"></i>
                    <span>Executive Teams</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.bod.executive-section-setting.*']) }}">
                        <a class="nav-link" href="{{ route('admin.bod.executive-section-setting.index') }}">Section
                            Settings</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.bod.executive-teams.*']) }}">
                        <a class="nav-link" href="{{ route('admin.bod.executive-teams.index') }}">Executive Teams</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ setSidebarActive(['admin.bod.organizational-chart-settings.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-sitemap"></i>
                    <span>Organizational Chart</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.bod.organizational-chart-settings.*']) }}">
                        <a class="nav-link"
                            href="{{ route('admin.bod.organizational-chart-settings.index') }}">Section
                            Settings</a>
                    </li>
                </ul>
            </li>

            <li class="menu-header">What do we do</li>
            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.water-sanitation.*', 'admin.water-sanitation-section-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>Water & Sanitation</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.water-sanitation-section-setting.index']) }}">
                        <a class="nav-link"
                            href="{{ route('admin.water-sanitation-section-setting.index') }}">Section Setting</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.water-sanitation.index']) }}">
                        <a class="nav-link" href="{{ route('admin.water-sanitation.index') }}">Water & Sanitation</a>
                    </li>
                </ul>
            </li>
            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.teaching-leading.*', 'admin.teaching-leading-section-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>Teaching & Leading</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.teaching-leading-section-setting.*']) }}">
                        <a class="nav-link"
                            href="{{ route('admin.teaching-leading-section-setting.index') }}">Section Setting</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.teaching-leading.*']) }}">
                        <a class="nav-link" href="{{ route('admin.teaching-leading.index') }}">Teaching & Leading</a>
                    </li>
                </ul>
            </li>
            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.administrative.*', 'admin.administrative-section-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>Administrative</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.administrative-section-setting.index']) }}">
                        <a class="nav-link" href="{{ route('admin.administrative-section-setting.index') }}">Section
                            Setting</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.administrative.index']) }}">
                        <a class="nav-link" href="{{ route('admin.administrative.index') }}">Administrative</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ setSidebarActive(['admin.documents-section-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Documents</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.documents-section-setting.*']) }}">
                        <a class="nav-link" href="{{ route('admin.documents-section-setting.index') }}">Section
                            Setting</a>
                    </li>
                </ul>
            </li>
            <li class="menu-header">Documents</li>
            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.documents-reports-categories.*', 'admin.documents-reports-files.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Documents</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.documents-reports-categories.*']) }}">
                        <a class="nav-link"
                            href="{{ route('admin.documents-reports-categories.index') }}">Categories</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.documents-reports-files.*']) }}">
                        <a class="nav-link" href="{{ route('admin.documents-reports-files.index') }}">Files</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ setSidebarActive(['admin.vendors.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-user-tie"></i>
                    <span>Vendors</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.vendors.*']) }}">
                        <a class="nav-link" href="{{ route('admin.vendors.index') }}">List
                            Vendors</a>
                    </li>
                </ul>
            </li>

            <li class="menu-header">Projects</li>
            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.article.category.*', 'admin.article.*', 'admin.article-section-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Publications</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.article-section-setting.*']) }}">
                        <a class="nav-link" href="{{ route('admin.article-section-setting.index') }}">Section
                            Setting</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.article.category.*']) }}">
                        <a class="nav-link" href="{{ route('admin.article.category.index') }}">Categories</a>
                    </li>
                    <li
                        class="{{ setSidebarActive(['admin.article.index', 'admin.article.create', 'admin.article.edit']) }}">
                        <a class="nav-link" href="{{ route('admin.article.index') }}">Publications</a>
                    </li>
                </ul>
            </li>

            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.categories.*', 'admin.posts.*', 'admin.posts-section-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Blogs</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.posts-section-setting.*']) }}">
                        <a class="nav-link" href="{{ route('admin.posts-section-setting.index') }}">Section
                            Setting</a>
                    </li>
                    <li class="nav-item {{ setSidebarActive(['admin.categories.*']) }}">
                        <a href="{{ route('admin.categories.index', []) }}"
                            class="nav-link"><span>Categories</span></a>
                    </li>
                    <li class="nav-item {{ setSidebarActive(['admin.posts.*']) }}">
                        <a href="{{ route('admin.posts.index', []) }}" class="nav-link"><span>Posts</span></a>
                    </li>
                </ul>
            </li>

            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.video-section-setting.*', 'admin.video-project.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Video</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.video-section-setting.*']) }}">
                        <a class="nav-link" href="{{ route('admin.video-section-setting.index') }}">Section
                            Setting</a>
                    </li>
                    <li class="nav-item {{ setSidebarActive(['admin.video-project.*']) }}">
                        <a href="{{ route('admin.video-project.index') }}" class="nav-link"><span>Videos</span></a>
                    </li>
                </ul>
            </li>

            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.photo-project.album.*', 'admin.photo-project.*', 'admin.photo-section-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Photo Projects</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.photo-section-setting.*']) }}">
                        <a class="nav-link" href="{{ route('admin.photo-section-setting.index') }}">Section
                            Setting</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.photo-project.album.*']) }}">
                        <a class="nav-link" href="{{ route('admin.photo-project.album.index') }}">Album</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.photo-project.index', 'admin.photo-project.edit']) }}">
                        <a class="nav-link" href="{{ route('admin.photo-project.index') }}">Photo Project</a>
                    </li>
                </ul>
            </li>

            <li class="menu-header">Public Outreach</li>

            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.press-release.*', 'admin.press-release-section-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>Press Releases</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.press-release-section-setting.index']) }}">
                        <a class="nav-link" href="{{ route('admin.press-release-section-setting.index') }}">Section
                            Setting</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.press-release.index']) }}">
                        <a class="nav-link" href="{{ route('admin.press-release.index') }}">Press Releases</a>
                    </li>
                </ul>
            </li>


            <li class="nav-item dropdown {{ setSidebarActive(['admin.news.*', 'admin.news-section-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>News</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.news-section-setting.index']) }}">
                        <a class="nav-link" href="{{ route('admin.news-section-setting.index') }}">Section
                            Setting</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.news.index']) }}">
                        <a class="nav-link" href="{{ route('admin.news.index') }}">News</a>
                    </li>
                </ul>
            </li>

            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.community-voice.*', 'admin.community-voice-section-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>Events Announcements</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.community-voice-section-setting.index']) }}">
                        <a class="nav-link" href="{{ route('admin.community-voice-section-setting.index') }}">Section
                            Setting</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.community-voice.*']) }}">
                        <a class="nav-link" href="{{ route('admin.community-voice.index') }}">Events
                            Announcements</a>
                    </li>
                </ul>
            </li>

            {{-- <li class="nav-item dropdown {{ setSidebarActive(['admin.article.category.*', 'admin.article.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Articles / Interviews</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.article.category.*']) }}">
                        <a class="nav-link" href="{{ route('admin.article.category.index') }}">Categories</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.article.*']) }}">
                        <a class="nav-link" href="{{ route('admin.article.index') }}">Articles / Interviews</a>
                    </li>
                </ul>
            </li> --}}
            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.video-gallery.*', 'admin.video-gallery-section-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>Videos Events</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.video-gallery-section-setting.index']) }}">
                        <a class="nav-link" href="{{ route('admin.video-gallery-section-setting.index') }}">Section
                            Setting</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.video-gallery.index']) }}">
                        <a class="nav-link" href="{{ route('admin.video-gallery.index') }}">Videos Events</a>
                    </li>
                </ul>
            </li>


            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.photo-gallery.album.*', 'admin.photo-gallery.*', 'admin.photo-gallery-section-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Photo Events</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.photo-gallery-section-setting.index']) }}">
                        <a class="nav-link" href="{{ route('admin.photo-gallery-section-setting.index') }}">Section
                            Setting</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.photo-gallery.album.*']) }}">
                        <a class="nav-link" href="{{ route('admin.photo-gallery.album.index') }}">Album</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.photo-gallery.index', 'admin.photo-gallery.edit']) }}">
                        <a class="nav-link" href="{{ route('admin.photo-gallery.index') }}">Photo Event</a>
                    </li>
                </ul>
            </li>
            {{-- <li class="nav-item {{ setSidebarActive(['admin.video-gallery.*']) }}">
                <a href="{{ route('admin.video-gallery.index') }}" class="nav-link"><i
                        class="fas fa-columns"></i><span>Video Gallery</span></a>
            </li> --}}

            <li class="menu-header">Procurement</li>
            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.spesific-procurements-notices.*', 'admin.general-procurements-notices.*', 'admin.notices-section-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Procurement</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.notices-section-setting.index']) }}">
                        <a class="nav-link"
                            href="{{ route('admin.notices-section-setting.index', ['locale' => session('locale', 'en')]) }}">Section
                            Settings</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.spesific-procurements-notices.*']) }}">
                        <a class="nav-link" href="{{ route('admin.spesific-procurements-notices.index') }}">Spesific
                            Procurement</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.general-procurements-notices.*']) }}">
                        <a class="nav-link" href="{{ route('admin.general-procurements-notices.index') }}">General
                            Procurement</a>
                    </li>
                </ul>
            </li>
            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.procurements-guidelines.*', 'admin.procurements-guidelines-section-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>Guidelines</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.procurements-guidelines-section-setting.index']) }}">
                        <a class="nav-link"
                            href="{{ route('admin.procurements-guidelines-section-setting.index') }}">Section
                            Setting</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.procurements-guidelines.index']) }}">
                        <a class="nav-link" href="{{ route('admin.procurements-guidelines.index') }}">Guidelines</a>
                    </li>
                </ul>
            </li>

            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.bid-challenge-system-section-setting.index', 'admin.procurements-bid-challenge-systems.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>Bid Challenge Systems</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.bid-challenge-system-section-setting.index']) }}">
                        <a class="nav-link"
                            href="{{ route('admin.bid-challenge-system-section-setting.index') }}">Section
                            Setting</a>
                    </li>
                    <li class="nav-item {{ setSidebarActive(['admin.procurements-bid-challenge-systems.*']) }}">
                        <a href="{{ route('admin.procurements-bid-challenge-systems.index') }}"
                            class="nav-link"><span>Bid Challenge
                                System</span></a>
                    </li>
                </ul>
            </li>

            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.contract-award-notice-section-setting.index', 'admin.procurements-contract-award-notices.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>Contract Award Notice</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.contract-award-notice-section-setting.index']) }}">
                        <a class="nav-link"
                            href="{{ route('admin.contract-award-notice-section-setting.index') }}">Section
                            Setting</a>
                    </li>
                    <li class="nav-item {{ setSidebarActive(['admin.procurements-contract-award-notices.*']) }}">
                        <a href="{{ route('admin.procurements-contract-award-notices.index', []) }}"
                            class="nav-link"><span>Contract Award
                                Notice</span></a>
                    </li>
                </ul>
            </li>


            <li class="menu-header">Vacancies</li>
            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.job-section-setting.index', 'admin.job-lists*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>HR Vacancies</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.job-section-setting.index']) }}">
                        <a class="nav-link"
                            href="{{ route('admin.job-section-setting.index', ['locale' => session('locale', 'en')]) }}">Section
                            Settings</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.job-lists*']) }}">
                        <a class="nav-link" href="{{ route('admin.job-lists.index') }}">HR Vacancies</a>
                    </li>
                </ul>
            </li>



            <li class="menu-header">Faqs</li>
            <li class="nav-item {{ setSidebarActive(['admin.faqs.index']) }}">
                <a href="{{ route('admin.faqs.index') }}" class="nav-link"><i
                        class="fas fa-columns"></i><span>Faqs</span></a>
            </li>


            <li class="menu-header">Contact</li>
            <li class="nav-item {{ setSidebarActive(['admin.contacts.index']) }}">
                <a href="{{ route('admin.contacts.index') }}" class="nav-link"><i
                        class="fas fa-columns"></i><span>Contact</span></a>
            </li>

            <li class="menu-header">Settings</li>


            <li class="nav-item {{ setSidebarActive(['admin.hero.*']) }}">
                <a href="{{ route('admin.hero.index') }}" class="nav-link"><i
                        class="fas fa-columns"></i><span>Sliders</span></a>
            </li>

            <li
                class="nav-item dropdown {{ setSidebarActive(['admin.footer-social.*', 'admin.footer-info.*', 'admin.footer-useful-links.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Footer</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setSidebarActive(['admin.footer-social.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-social.index') }}">Social Links</a></li>
                    <li class="{{ setSidebarActive(['admin.footer-info.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-info.index') }}">Footer Information</a></li>
                    <li class="{{ setSidebarActive(['admin.footer-useful-links.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-useful-links.index') }}">Footer Useful Link</a></li>
                </ul>
            </li>
            {{-- Setting --}}
            <li class="{{ setSidebarActive(['Favicon Preview.*']) }}">
                <a class="nav-link" href="{{ route('admin.setting.index') }}"><i class="fas fa-cogs"></i>
                    <span>Settings</span>
                </a>
            </li>
            {{-- Setting --}}
        </ul>
    </aside>
</div>

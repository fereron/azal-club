<div class="site-menubar">
    {{--<div class="site-menubar-header">--}}
        {{--<div class="cover overlay">--}}
            {{--<img class="cover-image" src="../assets//examples/images/dashboard-header.jpg" alt="...">--}}
            {{--<div class="overlay-panel vertical-align overlay-background">--}}
                {{--<div class="vertical-align-middle">--}}
                    {{--<a class="avatar avatar-lg" href="{{ route('profile') }}">--}}
                        {{--<img src="{{ Auth::user()->avatar_path }}" alt="">--}}
                    {{--</a>--}}
                    {{--<div class="site-menubar-info">--}}
                        {{--<h5 class="site-menubar-user">{{ Auth::user()->full_name }}</h5>--}}
                        {{--<p class="site-menubar-email">{{ Auth::user()->email }}</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu" data-plugin="menu">
                    <li class="site-menu-category"></li>
                    <li class="site-menu-item @if(url()->current() == route('profile')) active @endif">
                        <a class="animsition-link" href="{{ route('profile') }}">
                            <i class="site-menu-icon md-account" aria-hidden="true"></i>
                            <span class="site-menu-title">Профиль</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
                            <span class="site-menu-title">Layouts</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../layouts/menu-collapsed.html">
                                    <span class="site-menu-title">Menu Collapsed</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../layouts/menu-expended.html">
                                    <span class="site-menu-title">Menu Expended</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../layouts/grids.html">
                                    <span class="site-menu-title">Grid Scaffolding</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../layouts/layout-grid.html">
                                    <span class="site-menu-title">Layout Grid</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../layouts/headers.html">
                                    <span class="site-menu-title">Different Headers</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../layouts/panel-transition.html">
                                    <span class="site-menu-title">Panel Transition</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../layouts/boxed.html">
                                    <span class="site-menu-title">Boxed Layout</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../layouts/two-columns.html">
                                    <span class="site-menu-title">Two Columns</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../layouts/bordered-header.html">
                                    <span class="site-menu-title">Bordered Header</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../layouts/menubar-flipped.html">
                                    <span class="site-menu-title">Menubar Flipped</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../layouts/menubar-native-scrolling.html">
                                    <span class="site-menu-title">Menubar Native Scrolling</span>
                                </a>
                            </li>
                            <li class="site-menu-item has-sub">
                                <a href="javascript:void(0)">
                                    <span class="site-menu-title">Page Aside</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <ul class="site-menu-sub">
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="../layouts/aside-left-static.html">
                                            <span class="site-menu-title">Left Static</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="../layouts/aside-right-static.html">
                                            <span class="site-menu-title">Right Static</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="../layouts/aside-left-fixed.html">
                                            <span class="site-menu-title">Left Fixed</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="../layouts/aside-right-fixed.html">
                                            <span class="site-menu-title">Right Fixed</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon md-google-pages" aria-hidden="true"></i>
                            <span class="site-menu-title">Группы</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item has-sub">
                                <a href="javascript:void(0)">
                                    <span class="site-menu-title">Errors</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <ul class="site-menu-sub">
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="../pages/error-400.html">
                                            <span class="site-menu-title">400</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="../pages/error-403.html">
                                            <span class="site-menu-title">403</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="../pages/error-404.html">
                                            <span class="site-menu-title">404</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="../pages/error-500.html">
                                            <span class="site-menu-title">500</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="../pages/error-503.html">
                                            <span class="site-menu-title">503</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../pages/faq.html">
                                    <span class="site-menu-title">FAQ</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../pages/gallery.html">
                                    <span class="site-menu-title">Gallery</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../pages/gallery-grid.html">
                                    <span class="site-menu-title">Gallery Grid</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../pages/search-result.html">
                                    <span class="site-menu-title">Search Result</span>
                                </a>
                            </li>
                            <li class="site-menu-item has-sub">
                                <a href="javascript:void(0)">
                                    <span class="site-menu-title">Maps</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <ul class="site-menu-sub">
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="../pages/map-google.html">
                                            <span class="site-menu-title">Google Maps</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="../pages/map-vector.html">
                                            <span class="site-menu-title">Vector Maps</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../pages/maintenance.html">
                                    <span class="site-menu-title">Maintenance</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../pages/forgot-password.html">
                                    <span class="site-menu-title">Forgot Password</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../pages/lockscreen.html">
                                    <span class="site-menu-title">Lockscreen</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../pages/login.html">
                                    <span class="site-menu-title">Login</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../pages/register.html">
                                    <span class="site-menu-title">Register</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../pages/login-v2.html">
                                    <span class="site-menu-title">Login V2</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../pages/register-v2.html">
                                    <span class="site-menu-title">Register V2</span>
                                    <div class="site-menu-label">
                                        <span class="badge badge-info badge-round">new</span>
                                    </div>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../pages/login-v3.html">
                                    <span class="site-menu-title">Login V3</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../pages/register-v3.html">
                                    <span class="site-menu-title">Register V3</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../pages/user.html">
                                    <span class="site-menu-title">User List</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../pages/invoice.html">
                                    <span class="site-menu-title">Invoice</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../pages/blank.html">
                                    <span class="site-menu-title">Blank Page</span>
                                </a>
                            </li>
                            <li class="site-menu-item has-sub">
                                <a href="javascript:void(0)">
                                    <span class="site-menu-title">Email</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <ul class="site-menu-sub">
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="../pages/email-articles.html">
                                            <span class="site-menu-title">Articles</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="../pages/email-welcome.html">
                                            <span class="site-menu-title">Welcome</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="../pages/email-post.html">
                                            <span class="site-menu-title">Post</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="../pages/email-thumbnail.html">
                                            <span class="site-menu-title">Thumbnail</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="../pages/email-news.html">
                                            <span class="site-menu-title">News</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../pages/code-editor.html">
                                    <span class="site-menu-title">Code Editor</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../pages/profile.html">
                                    <span class="site-menu-title">Profile</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../pages/profile-v2.html">
                                    <span class="site-menu-title">Profile V2</span>
                                    <div class="site-menu-label">
                                        <span class="badge badge-info badge-round">new</span>
                                    </div>
                                </a>
                            </li>
                            <li class="site-menu-item active">
                                <a class="animsition-link" href="../pages/profile-v3.html">
                                    <span class="site-menu-title">Profile V3</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../pages/site-map.html">
                                    <span class="site-menu-title">Sitemap</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../pages/project.html">
                                    <span class="site-menu-title">Project</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="site-menu-category">Панель администратора</li>
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon md-apps" aria-hidden="true"></i>
                            <span class="site-menu-title">Админ</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../apps/contacts/contacts.html">
                                    <span class="site-menu-title">Contacts</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../apps/calendar/calendar.html">
                                    <span class="site-menu-title">Calendar</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../apps/notebook/notebook.html">
                                    <span class="site-menu-title">Notebook</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../apps/taskboard/taskboard.html">
                                    <span class="site-menu-title">Taskboard</span>
                                </a>
                            </li>
                            <li class="site-menu-item has-sub">
                                <a href="javascript:void(0)">
                                    <span class="site-menu-title">Documents</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <ul class="site-menu-sub">
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="../apps/documents/articles.html">
                                            <span class="site-menu-title">Articles</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="../apps/documents/categories.html">
                                            <span class="site-menu-title">Categories</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="../apps/documents/article.html">
                                            <span class="site-menu-title">Article</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../apps/forum/forum.html">
                                    <span class="site-menu-title">Forum</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../apps/message/message.html">
                                    <span class="site-menu-title">Message</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../apps/projects/projects.html">
                                    <span class="site-menu-title">Projects</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../apps/mailbox/mailbox.html">
                                    <span class="site-menu-title">Mailbox</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../apps/media/overview.html">
                                    <span class="site-menu-title">Media</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../apps/work/work.html">
                                    <span class="site-menu-title">Work</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../apps/location/location.html">
                                    <span class="site-menu-title">Location</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../apps/travel/travel.html">
                                    <span class="site-menu-title">Travel</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="site-menubar-footer">
        <a href="{{ route('settings') }}" class="fold-show" data-placement="top" data-toggle="tooltip"
           data-original-title="Settings">
            <span class="icon md-settings" aria-hidden="true"></span>
        </a>
        <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
            <span class="icon md-eye-off" aria-hidden="true"></span>
        </a>
        <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
            <span class="icon md-power" aria-hidden="true"></span>
        </a>
    </div>
</div>


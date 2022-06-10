<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="" class="brand-link">
        {{--        FIXME Buraya bır gorsel sart --}}
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">File System</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">

                {{--                FIXME Buraya Profıl fotosu gelecek sıstemde suanda olmadıgından default bırtane ındır--}}
                <img src="{{asset('dist/img/blankprofil.webp')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Muhammet Taha Bilecen</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-header">Menu</li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            {{__('project.dashboard')}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            {{__('project.decorator')}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>
                            {{__('project.employee')}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-file-archive"></i>
                        <p>
                            {{__('project.document')}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            {{__('project.fair')}}
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-list"></i>
                        <p>
                            {{__('project.fairperformance')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="fas fa-question-circle nav-icon"></i>
                                <p>  {{__('project.fairperformancequestion')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="fas fa-check-circle nav-icon"></i>
                                <p>  {{__('project.fairperformanceresult')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{__('project.user')}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/gallery.html" class="nav-link">
                        <i class="nav-icon fa fa-archive"></i>
                        <p>
                            {{__('project.activearchive')}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/gallery.html" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            {{__('project.profil')}}
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>

</aside>

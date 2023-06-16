<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>@yield('title')</title>
    @yield('vite')
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

    <link rel="icon" href="assets/images/logo_sogepie.jpg">

	<!-- ================== BEGIN core-css ================== -->
    {{-- <link rel="stylesheet" href="assets/css/vendor.min.css"> --}}
    <link rel="stylesheet" href={{url('assets/css/vendor.min.css')}}>
    <link rel="stylesheet" href="css/app.css">
        {{-- <link rel="stylesheet" href="assets/css/default/app.min.css"> --}}
    <link rel="stylesheet" href={{url('assets/css/default/app.min.css')}}>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href={{url('css/style.css')}}> --}}
    @livewireStyles


	<!-- ================== END core-css ================== -->
</head>

    <body>
        <!-- BEGIN #loader -->
        <div id="loader" class="app-loader">
            <span class="spinner"></span>
        </div>
        <!-- END #loader -->

        <!-- BEGIN #app -->
        <div id="app" class="app app-header-fixed app-sidebar-fixed">
            <!-- BEGIN #header -->
            <div id="header" class="app-header">
                <!-- BEGIN navbar-header -->
                <div class="navbar-header">
                    <a href="{{route('home')}}" class="navbar-brand"><span class="navbar-logo"></span> <b class="me-1">ANL</b></a>
                    <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- END navbar-header -->
                <!-- BEGIN header-nav -->
                <div class="navbar-nav">

                    @yield('search')

                    <div class="navbar-item dropdown">
                        <a href="#" data-bs-toggle="dropdown" class="navbar-link dropdown-toggle icon">
                            <i class="fa fa-bell"></i>
                            <span class="badge"> {{ auth()->user()->unreadNotifications->count()}}</span>
                        </a>
                        <div class="dropdown-menu media-list dropdown-menu-end">
                            <div class="dropdown-header">NOTIFICATIONS
                            </div>
                            @forelse(auth()->user()->unreadNotifications->take(4) as $notif)
                            <a href="javascript:;" class="dropdown-item media">
                                <div class="media-left">
                                    <img style="width:20px;height:20px;" src="assets/images/{{$notif->data['picture']}}" alt="">
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading">{{$notif->data['user']}} {{ strlen($notif->data['title']) > 50 ? substr($notif->data['title'], 0, 40).'...' : $notif->data['title'] }}</h6>
                                </div>
                            </a>
                            @empty
                            <div class="media-body">
                                <h6 class="media-heading ms-2"> <span>il y a pas de notification</span> <span class="d-flex justify-content-center fs-4  mt-2"><i class="fa fa-exclamation-circle text-danger"></i></span> </h6>
                            </div>
                            @endforelse
                            @if(auth()->user()->unreadNotifications->count() > 4)
                            <div class="dropdown-footer text-center">
                                <a href="{{url('notifications')}}" class="text-decoration-none">View more</a>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="navbar-item navbar-user dropdown">
                        <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                            <img src="{{ asset('assets/images/' . (Auth::user()->profile_image ?: 'default.png')) }}" alt="" />
                            <span>
                                <span class="d-none d-md-inline"></span>
                                <b class="caret"></b>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end me-1">
                            <a href="{{ route('profile.edit') }}" class="dropdown-item">Edit Profile</a>

                            <a href="javascript:;" class="dropdown-item d-flex align-items-center">
                                Inbox
                                <span class="badge bg-danger rounded-pill ms-auto pb-4px">2</span>
                            </a>
                            <a href="javascript:;" class="dropdown-item">Calendar</a>
                            <a href="javascript:;" class="dropdown-item">Setting</a>
                            <div class="dropdown-divider"></div>
                            <form action="{{route('user.logout')}}" method="POST">
                              @csrf
                              <button type="submit" class="dropdown-item" name="logout">Déconexion</button>
                            </form>
                        </div>


                    </div>
                </div>
                <!-- END header-nav -->
            </div>
            <!-- END #header -->

            <!-- BEGIN #sidebar -->
            <div id="sidebar" class="app-sidebar">
                <!-- BEGIN scrollbar -->
                <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
                    <!-- BEGIN menu -->
                    <div class="menu">
                        <div class="menu-profile">
                            <a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile" data-target="#appSidebarProfileMenu">
                                <div class="menu-profile-cover with-shadow"></div>
                                <div class="menu-profile-image">
                                    <img src="{{ asset('assets/images/' . (Auth::user()->profile_image ?: 'default.png')) }}" alt="" />
                                </div>
                                <div class="menu-profile-info">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            {{ Str::limit(auth()->user()->full_name,20)}}
                                        </div>
                                        <div class="menu-caret ms-auto"></div>
                                    </div>
                                    <small>{{auth()->user()->roles[0]->name}}r</small>
                                </div>
                            </a>
                        </div>
                        <div id="appSidebarProfileMenu" class="collapse">
                            <div class="menu-item pt-5px">
                                <a href="javascript:;" class="menu-link">
                                    <div class="menu-icon"><i class="fa fa-cog"></i></div>
                                    <div class="menu-text">Settings</div>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="javascript:;" class="menu-link">
                                    <div class="menu-icon"><i class="fa fa-pencil-alt"></i></div>
                                    <div class="menu-text"> Send Feedback</div>
                                </a>
                            </div>
                            <div class="menu-item pb-5px">
                                <a href="javascript:;" class="menu-link">
                                    <div class="menu-icon"><i class="fa fa-question-circle"></i></div>
                                    <div class="menu-text"> Helps</div>
                                </a>
                            </div>
                            <div class="menu-divider m-0"></div>
                        </div>
                        <div class="menu-header">Navigation</div>

                        <div class="menu-item">
                            @can('modifier-demandes')
                            <a href="{{url('statistiques')}}" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fa fa-list-check"></i>
                                </div>
                                <div class="menu-text">statistiques</div>
                            </a>
                            @endcan
                            @can('lister-utilisateurs')
                            <a href="{{url('utilisateurs')}}" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fa fa-list-check"></i>
                                </div>
                                <div class="menu-text">Utilisateurs</div>
                            </a>
                            @endcan
                            @can('lister-rôles')
                            <a href="{{url('roles')}}" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fa fa-list-check"></i>
                                </div>
                                <div class="menu-text">Rôles</div>
                            </a>
                            @endcan
                            <a href="{{url('demandes')}}" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fa fa-list-check"></i>
                                </div>
                                <div class="menu-text">demandes</div>
                            </a>
                            <a href="{{url('notifications')}}" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fa fa-list-check"></i>
                                </div>
                                <div class="menu-text">notification</div>
                            </a>
                        </div>

                        <!-- BEGIN minify-button -->
                        <div class="menu-item d-flex">
                            <a href="javascript:;" class="app-sidebar-minify-btn ms-auto" data-toggle="app-sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
                        </div>
                        <!-- END minify-button -->
                    </div>
                    <!-- END menu -->
                </div>
                <!-- END scrollbar -->
            </div>
            <div class="app-sidebar-bg"></div>
            <div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>
            <!-- END #sidebar -->

            <!-- BEGIN #content -->
            <div id="content" class="app-content" style="min-height: 100vh; background-size: 360px; background-position: right bottom;">
                <div class="d-flex align-items-center mb-3">
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;">Accueille</a></li>
                            <li class="breadcrumb-item active">tableau de bord</li>
                        </ol>
                        <!-- BEGIN page-header -->
                        <h1 class="page-header mb-0">
                            Bienvenu {{auth()->user()->full_name}}
                        </h1>
                        <!-- END page-header -->
                    </div>

                    <div class="ms-auto">
                    <a href='@yield('button-link')' id="addButton" data-bs-toggle="modal" class="btn btn-success btn-rounded px-4 rounded-pill"><i class="fa fa-plus fa-lg me-2 ms-n2 text-success-900"></i>@yield('button-name')</a>
                    </div>
                </div>


                @yield('content')


            </div>
            <!-- END #content -->


            <!-- BEGIN scroll-top-btn -->
            <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
            <!-- END scroll-top-btn -->
        </div>
        <!-- END #app -->



        <!-- Editor -->
           
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- ================== BEGIN core-js ================== -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        <!-- ================== END core-js ================== -->
        <script src="js/script.js"></script>
        @yield('script')

        @livewireScripts


    </body>


</html>

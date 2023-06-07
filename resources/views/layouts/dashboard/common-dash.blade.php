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
    {{-- @livewireStyles --}}


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
                    <a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b class="me-1">ANL</b></a>
                    <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- END navbar-header -->
                <!-- BEGIN header-nav -->
                <div class="navbar-nav">
                    <div class="navbar-item navbar-form">
                        <form action="" method="POST" name="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter keyword" />
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="navbar-item dropdown">
                        <a href="#" data-bs-toggle="dropdown" class="navbar-link dropdown-toggle icon">
                            <i class="fa fa-bell"></i>
                            <span class="badge"> {{ auth()->user()->unreadNotifications->count()}}</span>
                        </a>
                        <div class="dropdown-menu media-list dropdown-menu-end">
                            <div class="dropdown-header">NOTIFICATIONS 
                            </div>
                            @forelse(auth()->user()->unreadNotifications as $notif)
                            <a href="javascript:;" class="dropdown-item media">
                                {{-- <div class="media-left">
                                    <img style="width:40px;height:40px;" src="assets/images/{{$notif->data['picture']}}" alt="">
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading"{{$notif->data['user']}} {{ $notif->data['title']}} <i class="fa fa-exclamation-circle text-danger"></i></h6>
                                </div> --}}
                            </a>
                            @empty
                            <div class="media-body">
                                <h6 class="media-heading">il y a pas de notification <i class="fa fa-exclamation-circle text-danger"></i></h6>
                            </div>
                            @endforelse
                            <div class="dropdown-footer text-center">
                                <a href="javascript:;" class="text-decoration-none">View more</a>
                            </div>
                        </div>
                    </div>

                    <div class="navbar-item navbar-user dropdown">
                        <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                            <img src="assets/img/user/user-15.jpg" alt="" />
                            <span>
                                <span class="d-none d-md-inline"></span>
                                <b class="caret"></b>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end me-1">
                            <a href="javascript:;" class="dropdown-item">Edit Profile</a>
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
                                    <img src="assets/img/user/user-15.jpg" alt="" />
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
                            <a href="index.html" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fa fa-list-check"></i>
                                </div>
                                <div class="menu-text">Scrum Board</div>
                            </a>
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

        <!-- TASK MODAL TO ADD PRODUCT -->
        {{-- <div class="modal fade" id="modal-task">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="scripts.php" method="POST" id="form-task">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Task</h5>
                            <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                        </div>
                        <div class="modal-body">
                                <!-- This Input Allows Storing Task Index  -->
                                <input type="hidden" id="task-id" name="task-id">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="task-title" class="form-control" id="task-title"/>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Type</label>
                                    <div class="ms-3">
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" name="task-type" type="radio" value="1" id="task-type-1"/>
                                            <label class="form-check-label" for="task-type-feature">Feature</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="task-type" type="radio" value="2" id="task-type-2"/>
                                            <label class="form-check-label" for="task-type-bug">Bug</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Priority</label>
                                    <select class="form-select" name="priorities-option" id="task-priority">
                                        <option value="" selected disabled>Please select</option>
                                        <option value="1">Low</option>
                                        <option value="2">Medium</option>
                                        <option value="3">High</option>
                                        <option value="4">Critical</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status-options" id="task-status">
                                        <option value="">Please select</option>
                                        <option value="1">To Do</option>
                                        <option value="2">In Progress</option>
                                        <option value="3">Done</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Date</label>
                                    <input type="date" class="form-control" name="date" id="task-date"/>
                                </div>
                                <div class="mb-0">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="description" rows="10" id="task-description"></textarea>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" name="delete" class="d-none" id="buttonDelete"></a>
                            <button type="submit"  name="delete" class="btn btn-danger task-action-btn" id="task-delete-btn">Delete</a>
                            <button type="submit" name="update" class="btn btn-warning task-action-btn" id="task-update-btn">Update</a>
                            <button type="submit" name="save" class="btn btn-primary task-action-btn" id="task-save-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}



        <!-- EDIT TASK MODAL -->
        {{-- <div class="modal fade" id="edit-modal-task">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="scripts.php" method="POST" id="form-task">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Task</h5>
                            <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                        </div>
                        <div class="modal-body">
                                <!-- This Input Allows Storing Task Index  -->
                                <input type="text" id="task-id" value="">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="task-title" class="form-control" id="task-title"/>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Type</label>
                                    <div class="ms-3">
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" name="task-type" type="radio" value="1" id="task-type-1"/>
                                            <label class="form-check-label" for="task-type-feature">Feature</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="task-type" type="radio" value="2" id="task-type-2"/>
                                            <label class="form-check-label" for="task-type-bug">Bug</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Priority</label>
                                    <select class="form-select" name="priorities-option" id="task-priority">
                                        <option value="" selected disabled>Please select</option>
                                        <option value="1">Low</option>
                                        <option value="2">Medium</option>
                                        <option value="3">High</option>
                                        <option value="4">Critical</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status-options" id="task-status">
                                        <option value="">Please select</option>
                                        <option value="1">To Do</option>
                                        <option value="2">In Progress</option>
                                        <option value="3">Done</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Date</label>
                                    <input type="date" class="form-control" name="date" id="task-date"/>
                                </div>
                                <div class="mb-0">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="description" rows="10" id="task-description"></textarea>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" name="delete" class="btn btn-danger task-action-btn" id="task-delete-btn">Delete</a>
                            <button type="submit" name="update" class="btn btn-warning task-action-btn" id="task-update-btn">Update</a>
                            <button type="submit" name="save" class="btn btn-primary task-action-btn" id="task-save-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}

        <!-- Editor -->
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

        <!-- ================== BEGIN core-js ================== -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        <!-- ================== END core-js ================== -->
        <script src="js/script.js"></script>
        @yield('script')

    </body>


</html>

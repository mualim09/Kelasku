<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kelaspace</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/kelaspace.min.css" rel="stylesheet">

    <style>
        #detail-classroom {
            font-weight: bold;
            background-color: #f8f9fc;
            border: none;
            color: #2052e6;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 24px;
            cursor: pointer;
        }
      </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <img class="img-profile rounded-rectangle" src="../img/kelaspace.ico">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!--Bagian Kiri Dasboard-->
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-home fa-4x"></i>
                    <span>Classes</span>
                </a>
            </li>

            <!-- Nav Item - Settings -->
            <li class="nav-item">
                <a class="nav-link" href="/setting">
                    <i class="fas fa-fw fa-cog fa-4x"></i>
                    <span>Settings</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                @csrf
                                {{ Auth::user()->firstname . ' ' . Auth::user()->lastname}}</span>
                                <img class="img-profile rounded-circle"
                                    src="../../img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#CreateClassModal">
                                    Create Class
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#JoinClassModal">
                                    Join Class
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Topbar -->
				
            <!-- Begin Page Content -->
			<div class="container-fluid mt-4 mb-4">
                @foreach(collect($classrooms)->chunk(3) as $items)
                    <div class="col-md-12 mb-12">
                        <div class="card-deck mb-4">
                            @foreach ($items as $classroom)
                                <div class="card">
                                    <div class= "card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <form
                                            <?php if(array_key_exists('teacher_id', $classroom)) { ?>
                                                id="teacher"
                                                action="teacher/{{ $classroom['name'] . '-' . $classroom['code'] }}"
                                            <?php } else { ?>
                                                id="student"
                                                action="student/{{ $classroom['name'] . '-' . $classroom['code'] }}"
                                            <?php } ?>
                                            
                                            method="GET">
                                            {{-- @csrf --}}
                                            
                                            <h3 class="m-0 font-weight-bold border-light mb-3">
                                                <?php if((array_key_exists('teacher_id', $classroom))) { ?>                                
                                                    <input type="hidden" name="role" value="teacher">
                                                    <input type="hidden" name="classroom_id" value="{{ $classroom['classroom_id'] }}">

                                                    <input id="detail-classroom" type="submit" value="{{ $classroom['name'] }}">
                                                <?php } else { ?>
                                                    <input type="hidden" name="role" value="student">
                                                    <input type="hidden" name="classroom_id" value="{{ $classroom['classroom_id'] }}">
                                                    
                                                    <input id="detail-classroom" type="submit" value="{{ $classroom['name'] }}">
                                                <?php } ?>
                                            </h3>
                                        </form>
                                    
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            
                                            <form action="/unenroll/{{ $classroom['id'] }}" method="POST">
                                                @csrf
                                                @method("DELETE")
        
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                    <button type="submit" class="dropdown-item" name="unenroll">Unenroll</button>
                                                    <input 
                                                        type="hidden"
                                                        name="classroom_id"

                                                        <?php if((array_key_exists('teacher_id', $classroom))) { ?>
                                                            value="teacher,{{ $classroom['classroom_id'] }}";
                                                        <?php } else { ?>
                                                            value="student,{{ $classroom['classroom_id'] }}";
                                                        <?php } ?>
                                                    >
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="card-body">To Do Date</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link class="btn btn-primary"
                            :href="route('logout')"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                            
                            <span class="text-light">{{ __('Log out') }}</span>
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Create Class -->
    <div class="modal fade" id="CreateClassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="create-classroom">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Class Name:</label>
                            <input type="text" class="form-control" id="name" name="classroom_name">
                        </div>

                        <input type="hidden" class="form-control" id="teacher_id" name="teacher_id" value="{{ Auth::user()->id }}">
                    </div>

                    <div class="modal-footer">
                        <input type="hidden" name="teach" value="true">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="create" value="true" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Join Class -->
    <div class="modal fade" id="JoinClassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="join-classroom">
                @csrf
                
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Join Class</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Class Code:</label>
                            
                            <input type="text" class="form-control" id="class-code" name="classroom_code">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        
                        <button type="submit" class="btn btn-primary">Join</button>
                    </div>

                    <input type="hidden" class="form-control" id="student_id" name="student_id" value="{{ Auth::user()->id }}">
                </div>
            </form>
        </div>
    </div>
    
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>
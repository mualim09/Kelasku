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

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->firstname . ' ' . Auth::user()->lastname}}</span>
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
                <!-- End of Topbar -->
				 
                <div class="container col-md-30">
                    <div class="d-flex justify-content-center">        
                        <div class="col-md-10 col-sm-8 p-0">
                            <div class="card-body profil">
                                <div class="card-header">
                                   <h1 class="text-center">Profile</h1>
                                </div>
                                <table class="table">
                                    <tr>
                                        <td><img src="../../img/undraw_profile.svg" style="width: 100px; height:100px;"></td>
                                        <td><a href="" data-toggle="modal" data-target="#changeProfilePicture">Change</a></td>
                                    </tr>

                                    <tr>
                                        <td>{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</td>
                                        <td><a href="" data-toggle="modal" data-target="#changeName">Change</a></td>
                                    </tr>
                                
                                    <tr>
                                        <td>{{ Auth::user()->email}}</td>
                                        <td><a href="" data-toggle="modal" data-target="#changeEmail">Change</a></td>
                                    </tr>
                                    <tr>
                                        <td>Your Password</td>
                                        <td><a href="" data-toggle="modal" data-target="#changePassword">Change</a></td>
                                    </tr>
                                    
                                </table>                           
                            </div>
                        </div>
                    </div>        
                </div>
            
        </div>
    
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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
                <div class="modal-body">
                    <form>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Class:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Section:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Join Class -->
    <div class="modal fade" id="JoinClassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Join Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Class Code:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Join</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Change Profile Picture -->
    <div class="modal fade" id="changeProfilePicture" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Profile Picture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="edit-profile">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>

                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                    </div>

                    <div class="modal-footer">
                        <input type="hidden" name="edit" value="edit_profile_picture">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="create" value="true" class="btn btn-primary">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Change Name -->
    <div class="modal fade" id="changeName" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="edit-profile">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Firstname</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{ Auth::user()->firstname }}">
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Lastname</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ Auth::user()->lastname }}">
                        </div>

                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                    </div>

                    <div class="modal-footer">
                        <input type="hidden" name="edit" value="edit_name">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="create" value="true" class="btn btn-primary">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Change Email -->
    <div class="modal fade" id="changeEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="edit-profile">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
                        </div>

                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                    </div>

                    <div class="modal-footer">
                        <input type="hidden" name="edit" value="edit_email">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="create" value="true" class="btn btn-primary">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Change Password -->
    <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="edit-profile">
                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Old Password</label>
                            <input type="text" class="form-control" id="old-password" name="old_password">
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">New Password</label>
                            <input type="text" class="form-control" id="new_password" name="new_password">
                        </div>

                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                    </div>

                    <div class="modal-footer">
                        <input type="hidden" name="edit" value="edit_password">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="create" value="true" class="btn btn-primary">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/kelaspace.min.js"></script>

</body>

</html>
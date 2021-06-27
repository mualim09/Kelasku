<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Member | Kelaspace</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/kelaspace.min.css" rel="stylesheet">
</head>

<style type= "text/css">
    .profil{
        margin-right: 6px;
    }
</style>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <img class="img-profile rounded-rectangle" src="/img/kelaspace.ico">
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
                    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                        <a class="navbar-brand mr-auto" href="#">{{ $classroom[0]->name }}</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>

                    <!-- Nav Item - Stream-Classwork-Member -->
                    <div class="mx-auto order-0">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link text-secondary pt-1" href="{{ url('teacher/' .  $classroom[0]->name . '-' . $classroom[0]->code) . '?role=' . $_GET['role'] . '&classroom_id=' . $_GET['classroom_id'] }}">Stream</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary pt-1" href="{{ url('teacher/classwork/' .  $classroom[0]->name . '-' . $classroom[0]->code . '?role=' . $_GET['role'] . '&classroom_id=' . $classroom[0]->id) }}">Classwork</a>
                            </li>
                            <li class="nav-item border-bottom-primary">
                                <a class="nav-link text-primary pt-1" href="{{ url('teacher/member/' . $classroom[0]->name . '-' . $classroom[0]->code . '?role=' . $_GET['role'] . '&classroom_id=' . $classroom[0]->id) }}">Member</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary pt-1" href="{{ url('teacher/mark/' . $classroom[0]->name . '-' . $classroom[0]->code . '?role=' . $_GET['role'] . '&classroom_id=' . $classroom[0]->id) }}">Marks</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Nav Item - User Information -->
                    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                        <ul class="navbar-nav ml-auto">
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
                                    <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End of Topbar -->

                <!--Teacher-->
                <div class="container col-md-10">
                    <div class="card-body">
                        <h3>Teacher</h3>
                        <hr size="20px" width = "99%">
                    </div>
                    <div class= profil>
                        <div class="row row-cols-1 row-cols-md-6 g-4 text-center">
                            <div class="col">                    
                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>        
                                </svg>

                                <div class="card-body float-center">
                                    <h6>{{ $teacher[0]->firstname . ' ' . $teacher[0]->lastname }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Student-->
                    <div class="card-body">
                        <h3>Student</h3>
                        <hr size="50px" width = "99%">
                    </div>
                    <div class="row row-cols-1 row-cols-md-6 g-4 text-center">
                        @foreach ($students as $student)
                            <div class="col" >
                                <form method="POST" action="delete-member/{{ $student->student_id }}">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                                        <span class="pb-5" style="color: red" aria-hidden="true">&times;</span>
                                        <input type="hidden" name="member_id" value="{{ $student->student_id }}">
                                    </button>                                    
                                </form>

                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>        
                                </svg>

                                <div class="card-body float-center">
                                    <h6>{{ $student->firstname }}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>    
                <!--Akhir Tampilan Member-->
            </div>
        <!-- End of Content Wrapper -->
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        Made with <span style="color: #e25555;">&#9829;</span> by Kelaspace Team &#128516;
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
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

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/kelaspace.min.js"></script>
</body>
</html>
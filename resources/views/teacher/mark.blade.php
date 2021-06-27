<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <style>
        /* Hide Input Number Arrows */
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        /* Placeholder center alignment */
        input[type="number"]::placeholder {   
            /* Firefox, Chrome, Opera */ 
            text-align: center; 
        } 

        /* Input center alignment */
        input[type="number"] { 
            text-align: center;
            border: 0
        }
    </style>

    <title>Marks | Kelaspace</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/kelaspace.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

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
                            <li class="nav-item">
                                <a class="nav-link text-secondary pt-1" href="{{ url('teacher/member/' . $classroom[0]->name . '-' . $classroom[0]->code . '?role=' . $_GET['role'] . '&classroom_id=' . $classroom[0]->id) }}">Member</a>
                            </li>
                            <li class="nav-item border-bottom-primary">
                                <a class="nav-link text-primary pt-1" href="{{ url('teacher/mark/' . $classroom[0]->name . '-' . $classroom[0]->code . '?role=' . $_GET['role'] . '&classroom_id=' . $classroom[0]->id) }}">Marks</a>
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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Marks Table -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center text-gray-900" id="marksTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            @foreach($marks as $mark)
                                                @foreach($mark as $key=>$val)
                                                    <th>{{ $val->title }}</th>
                                                @endforeach
                                            @endforeach
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                    @foreach($marks as $mark)
                                        @foreach($mark as $key=>$val)
                                        <tr>
                                            <td>{{ $val->firstname }} {{ $val->lastname }}</td>
                                            <td>
                                                <div class="card-header d-flex flex-row align-items-center bg-transparent">
                                                    <input type="number"
                                                        class="form-control"
                                                        id="exampleInputNumber"
                                                        placeholder="0/100"
                                                        onfocus="(this.placeholder='')"
                                                        onblur="(this.placeholder='0/100')"
                                                        min='0'
                                                    >
                                                    <div class="dropdown no-arrow">
                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                            aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="#">Return</a>
                                                            <a class="dropdown-item" href="/teacher/view-assignment">View Submission</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End of Main Content -->

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
        <!-- End of Content Wrapper -->
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

    <!-- Page level plugins -->
    <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../../vendor/datatables/dataTables.fixedColumns.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/datatables-demo.js"></script>

</body>
</html>
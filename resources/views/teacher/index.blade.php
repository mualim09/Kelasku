{{-- {{ dd($classroom) }} --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Stream | Kelaspace</title>
    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
                    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                        <a class="navbar-brand mr-auto" href="#">{{ $classroom[0]->name }}</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>

                    <!-- Nav Item - Stream-Classwork-Member -->
                    <div class="mx-auto order-0">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item border-bottom-primary">
                                <a class="nav-link text-primary pt-1" href="{{ url('teacher/' .  $classroom[0]->name . '-' . $classroom[0]->code) . '?role=' . $_GET['role'] . '&classroom_id=' . $_GET['classroom_id'] }}">Stream</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary pt-1" href="{{ url('teacher/classwork/' .  $classroom[0]->name . '-' . $classroom[0]->code . '?role=' . $_GET['role'] . '&classroom_id=' . $classroom[0]->id) }}">Classwork</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary pt-1" href="{{ url('teacher/member/' . $classroom[0]->name . '-' . $classroom[0]->code . '?role=' . $_GET['role'] . '&classroom_id=' . $classroom[0]->id) }}">Member</a>
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

                <div class="container col-md-10">
                    <!-- Header -->
                    <div class= "card shadow bg-gradient-primary text-gray-100 mb-4">
                        <div class="card-body">
                            <h1>{{ $classroom[0]->name }}</h1>
                            <h5>Classroom code : {{ $classroom[0]->code }}</h5><br><br><br>  
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <!-- Upcoming Tasks -->
                        <div class="col-md-2 col-sm-4 p-0">
                            <div class="card shadow mr-4">
                                <div class="card-body">
                                    <h5 class="card-title">Upcoming</h5>
                                </div>
                            </div>
                        </div>

                        <!-- Stream Post -->
                        <div class="col-md-10 col-sm-8 p-0">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <form name="form_create_announce" action="{{ ('/teacher/create_announce/' .  $classroom[0]->name . '-' . $classroom[0]->code) . '?role=' . $_GET['role'] . '&classroom_id=' . $_GET['classroom_id'] }}" method="POST">
                                    {{ csrf_field() }}
                                    
                                        <input type="text" class="form-control"
                                        id="exampleInputText" name="desc" placeholder="Announce something to your class">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button type="submit" class="btn btn-primary btn-sm">Post</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            @foreach($announcement as $announce)
                            <div class="card shadow mb-4">
                            <!-- for Annoucement -->
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <b>{{$announce->author}}</b> Posted A New Annoucement:
                                    </h6>
                                    <p class="card-text">{{$announce->description}}</p>
                                    <p class="card-text"><small class="text-muted">Date Post: {{$announce->created_at}}</small></p>
                                </div>
                            </div>
                            @endforeach
                           
                            <!-- Material -->
                            @foreach($post_material as $mate)
                            <div class="card shadow mb-4">
                                <?php
                                    $mat_id = $mate->id;
                                    // echo $mat_id;
                                ?>
                                <a href="{{ url('teacher/material/' .  $classroom[0]->name . '-' . $classroom[0]->code . '-' . $mate->id) . '?role=' . $_GET['role'] . '&classroom_id=' . $_GET['classroom_id'] . '&material_id=' . $mat_id}}">
                                <!-- . '&material_id=' . $mat_id -->
                                    <div class="card-body">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
                                            <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z"/>
                                            <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z"/>
                                        </svg>
                                        <span class="pull-left">
                                        <b>{{$mate->author}}</b> Posted A New Material: <b>{{$mate->title}}</b></span>
                                    </div>
                                </a>
                            </div>
                            @endforeach

                            <!-- Assignment -->
                            @foreach($post_assignment as $assign)
                            <div class="card shadow mb-4">
                                <?php
                                    $assign_id = $assign->id;
                                ?>
                                <a href="{{ url('teacher/assignment/' .  $classroom[0]->name . '-' . $classroom[0]->code) . '?role=' . $_GET['role'] . '&classroom_id=' . $_GET['classroom_id'] . '&assignment_id=' . $assign_id}}">
                                    <div class="card-body">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                                        </svg>
                                        <span class="pull-left">
                                        <b>{{$assign->author}}</b> Posted A New Assignment: <b>{{$assign->title}}</b></span>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>              
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
</body>
</html>
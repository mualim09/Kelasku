<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <style>
        /* Custom Student Dropdown */
        .dropdown-menu {
            max-height:300px;
            overflow-y:auto;
        }

        /* Rotate & align right dropdown arrow */
        .dropdown-toggle::after {
            -ms-transform: rotate(+90deg); /* IE 9 */
            -webkit-transform: rotate(+90deg); /* Chrome, Safari, Opera */
            transform: rotate(+90deg);
            float:right;
            margin-top: 5px;
        }

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
        }
    </style>

    <title>Assignment Name</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/kelaspace.min.css" rel="stylesheet">
</head>
<script>
        // read file
        // function readfile() {
        //     alert(document.getElementById('fileViewer').contentDocument.body.firstChild.innerHTML);
        // }

        $("fileViewer").each(function(index){
            $(this).contents().find('.test').css({background: '#f00'});
        });
    </script>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <div class="shadow mb-4">
                    <nav class="navbar navbar-expand navbar-light bg-white topbar static-top">
                        <!-- Navbar Text -->
                        <h1 class="h3 mb-0 text-gray-800">Assignment Name</h1>

                        <!-- 1st Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                    <img class="img-profile rounded-circle"
                                        src="../../img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>

                    <nav class="navbar navbar-expand navbar-light bg-white topbar static-top">
                        <!-- 2nd Topbar Navbar -->
                        <div class="container col-md-4">

                            <!-- Student Dropdown -->
                            <ul class="navbar-nav mr-auto w-100">
                                <li class="nav-item dropdown mr-auto w-100">
                                    <div class="dropdown w-100">
                                        <a class="btn btn-secondary dropdown-toggle text-left w-100" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <img class="img-profile rounded-circle"
                                                src="../../img/undraw_profile.svg"
                                                style="width:32px; height:32px;">
                                            <span class="medium text-gray-100 ml-2">Student Name</span>
                                        </a>
                                        <div class="dropdown-menu animated--fade-in w-100"
                                            aria-labelledby="dropdownMenuButton">
                                            <a class="nav-link dropdown-item" href="#">
                                                <img class="img-profile rounded-circle"
                                                    src="../../img/undraw_profile.svg"
                                                    style="width:32px; height:32px;">
                                                <span class="small text-gray-800 ml-2">Student Name</span>
                                            </a>
                                            <a class="nav-link dropdown-item" href="#">
                                                <img class="img-profile rounded-circle"
                                                    src="../../img/undraw_profile.svg"
                                                    style="width:32px; height:32px;">
                                                <span class="small text-gray-800 ml-2">Student Name</span>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="container col-md-8">
                            <ul class="navbar-nav ml-auto">
                                <!-- Return Button -->
                                <li class="nav-item">
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <a class="btn btn-primary" style="width:100px">
                                                Return
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-center">
                            <!-- File Viewer -->
                            <div class="col-md-9 embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" id="fileViewer" src="test.txt" onload="readfile()">

                                </iframe>
                            </div>

                            <div class="col-md-3">
                                <div class="card shadow">
                                    <!-- Files -->
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Files</h6>
                                        <span style="font-size:70%">Turned in on Apr 2, 1:16 PM</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="btn-group-vertical w-100 m-0">
                                            <button type="button" class="btn btn-outline-dark text-left" style="font-size:80%">FileName.txt</button>
                                            <button type="button" class="btn btn-outline-dark text-left" style="font-size:80%">FileName.docx</button>
                                            <button type="button" class="btn btn-outline-dark text-left" style="font-size:80%">FileName.py</button>
                                        </div>
                                    </div>
                                    <hr class="style17 m-0">
                                    <!-- Grade -->
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Grade</h6>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group">
                                                <input type="number"
                                                    class="form-control border-bottom-primary m-auto"
                                                    id="exampleInputNumber"
                                                    placeholder="0/100"
                                                    onfocus="(this.placeholder='')"
                                                    onblur="(this.placeholder='0/100')"
                                                    min='0'
                                                >
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

           <!-- Footer -->
           <footer class="footer fixed-bottom bg-white">
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
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
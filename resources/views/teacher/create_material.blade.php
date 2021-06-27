<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <style>
        /* Thin Font Awesome Close Icon */
        .fa-times-thin:before {
            content: '\00d7';
        }
    </style>

    <title>Create Material</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/kelaspace.min.css" rel="stylesheet">
</head>
<script>
    // Display selected file name
    var selDiv = "";
    
    document.addEventListener("DOMContentLoaded", init, false);
    
    function init() {
        document.querySelector('#file').addEventListener('change', handleFileSelect, false);
        selDiv = document.querySelector("#selectedFiles");
    }
        
    function handleFileSelect(e) {
        if(!e.target.files) return;
        
        selDiv.innerHTML = "";
        
        var files = e.target.files;
        for(var i=0; i<files.length; i++) {
            var f = files[i];
            
            selDiv.innerHTML += f.name + "<br/>";
        }
    }
</script>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Close Button -->
                    <div>
                        <a href="{{ url('teacher/classwork/' .  $classroom[0]->name . '-' . $classroom[0]->code . '?role=' . $_GET['role'] . '&classroom_id=' . $classroom[0]->id) }}" type="button" class="close" aria-label="Close">
                            <i class="fa fa-times-thin fa-2x"></i>
                        </a>
                    </div>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Navbar Text -->
                    <h1 class="h3 mb-0 text-gray-800">Material</h1>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card-body p-0">
                        <div class="p-5">

                            <!-- Form -->
                            <form class="formMaterial" action="{{ ('/teacher/create_new_material/' .  $classroom[0]->name . '-' . $classroom[0]->code) . '?role=' . $_GET['role'] . '&classroom_id=' . $_GET['classroom_id'] }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                
                                <div class = "d-flex justify-content-center">
                                    <div class="col-md-10">

                                        <!-- Title -->
                                        <div class="form-group">
                                            <input type="text" class="form-control border-bottom-primary" id="title"
                                                placeholder="Title" name="title" value="{{ old('title') }}" required>
                                        </div>

                                        <!-- Description -->
                                        <div class="form-group">
                                            <textarea class="form-control border-bottom-primary" id="description"
                                                placeholder="Description (optional)" name="description" value="{{ old('description') }}"
                                                rows="6" style="resize:none"></textarea>
                                        </div>

                                        <!-- Add File  -->
                                        <div class="row ml-auto">
                                            <div class="form-group">
                                                <label class="btn btn-primary btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-paperclip"></i>
                                                    </span>
                                                    <span class="text">Add File</span>
                                                    <input type="file" id="file" name="file" value="{{ old('file') }}" hidden multiple>
                                                </label>
                                            </div>

                                            <!-- Display Selected File Name -->
                                            <div class="text-gray-800 pl-2" id="selectedFiles"></div>
                                        </div>
                                    </div>

                                    <!-- Button Post -->
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit" style="width:100px">
                                                Post
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                            
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
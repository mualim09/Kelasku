<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register | Kelaspace</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/kelaspace.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account</h1>
                            </div>

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            
                            <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}" class="user" >
                                @csrf
                                
                                <div class="form-group row">
                                    <!-- Firstname -->
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <x-input
                                            id="firstname"
                                            class="form-control form-control-user"
                                            type="text"
                                            name="firstname" :value="old('firstname')"
                                            placeholder="First Name"
                                            required autofocus
                                        />
                                    </div>
                                    
                                    <!-- Lastname -->
                                    <div class="col-sm-6">                        
                                        <x-input
                                            id="lastname"
                                            class="form-control form-control-user"
                                            type="text" name="lastname" :value="old('lastname')"
                                            placeholder="Last Name"
                                            required autofocus />
                                    </div>
                                </div>
                                
                                <!-- Email Address -->
                                <div class="form-group">
                                    <div class="mt-4">
                                        <x-input
                                            id="email"
                                            class="form-control form-control-user"
                                            type="email" name="email" :value="old('email')"
                                            placeholder="Email Address"
                                            required />
                                    </div>
                                </div>
                                
                                <!-- Password -->
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">                        
                                        <x-input id="password" class="form-control form-control-user"
                                                        type="password"
                                                        name="password"
                                                        placeholder="Password"
                                                        required autocomplete="new-password" />
                                    </div>

                                    <div class="col-sm-6">
                                        <x-input
                                                id="password_confirmation"
                                                class="form-control form-control-user"
                                                type="password"
                                                placeholder="Repeat Password"
                                                name="password_confirmation" required
                                        />
                                    </div>
                                </div>

                                <!-- Profile Picture -->
                                <div class="mt-4">
                                    <x-label for="profile_picture" :value="__('Profile Picture')" />

                                    <x-input id="profile_picture" class="block mt-1 w-full" type="file" name="profile_picture" :value="old('profile_picture')" required />
                                </div>

                                <x-button class="btn btn-primary btn-user btn-block mt-4">
                                    {{ __('Register') }}
                                </x-button>

                                <hr>
                                
                                <div class="text-center">
                                    @if(Route::has('login'))
                                        <a href="{{ route('login') }}" class="small">Login</a>
                                    @endif
                                </div>
                            </form>
                            <hr>
                        </div>
                    </div>
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
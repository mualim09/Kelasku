<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login | Kelaspace</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/kelaspace.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Login</h1>
                            </div>

                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            
                            <form class="user" method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email Address -->
                                <div class="form-group">
                                    {{-- <x-label for="email" :value="__('Email')" /> --}}

                                    <x-input
                                        id="email"
                                        placeholder="Enter Email Address..."
                                        class="form-control form-control-user"
                                        type="email"
                                        name="email" :value="old('email')"
                                        required autofocus
                                    />
                                </div>

                                 <!-- Password -->
                                <div class="form-group">
                                    {{-- <x-label for="password" :value="__('Password')" /> --}}

                                    <x-input
                                        id="password"
                                        class="form-control form-control-user"
                                        type="password"
                                        name="password"
                                        required
                                        autocomplete="current-password" />
                                </div> 

                                <!-- Remember Me -->
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="customCheck" type="checkbox" class="custom-control-input" name="remember">
                                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                                        </label>
                                    </div>
                                </div>

                                <x-button class="btn btn-primary btn-user btn-block">
                                    {{ __('Log in') }}
                                </x-button>

                                <hr>

                                <div class="text-center">
                                    @if (Route::has('password.request'))
                                        <a class="small" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                </div>
                                
                                <div class="text-center">
                                    @if(Route::has('register'))
                                        <a href="{{ route('register') }}" class="small">Creata An Account</a>
                                    @endif
                                </div>
                            </form>
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
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="/asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/asset/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<body class="bg-gradient-primary">

    <div class="container ">

        <!-- Outer Row -->
        <div class="row justify-content-center mt-2">

            @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="col-xl-4 col-lg-12 col-md-9 mt-5">

                <div class="card o-hidden border-0 shadow-lg mt-5">

                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">

                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="/login" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control form-control-user @error('username') is-invalid @enderror"
                                                id="exampleInputusername" aria-describedby="usernameHelp"
                                                placeholder="Enter Your Username..." name="username" required
                                                value="{{ old('username') }}">
                                            @error('username')
                                            <div class="invalid-feedback">
                                                {{ $messege }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                                id="exampleInputPassword" placeholder="Password" name="password"
                                                required>
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $messege }}
                                            </div>
                                            @enderror
                                        </div>
                                        {{-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> --}}
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>

                                        <hr>
                                        {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> --}}
                                    </form>
                                    {{-- <hr> --}}
                                    {{-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> --}}
                                    <div class="text-center">
                                        <a class="small" href="/register">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/asset/vendor/jquery/jquery.min.js"></script>
    <script src="/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/asset/js/sb-admin-2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>

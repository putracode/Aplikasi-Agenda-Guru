{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/skydash/template/vendors/feather/feather.css">
    <link rel="stylesheet" href="/skydash/template/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/skydash/template/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/skydash/template/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/skydash/template/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0"  style="background-image: url(/asset/img/tebes.jpg); background-repeat: no-repeat; background-size: cover; background-position: left bottom">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left  px-4 px-sm-5 rounded" style="padding-top: 60px; padding-bottom: 60px">
                            <div class="brand-logo text-center">
                                <img src="/asset/img/tb.png" alt="logo" style="width: 70px;">
                            </div>
                            <h4 class="text-center">Welcome to Starbhak Agenda!</h4>
                            <h6 class="font-weight-light text-center">Sign in to continue.</h6>
                            <form class="pt-4" action="/login" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="ti-user text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg border-left-0 @error('username') is-invalid @enderror"
                                        id="exampleInputEmail" placeholder="Enter Your Username..." name="username" required value="{{ old('username') }}">
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $messege }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="ti-lock text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control form-control-lg border-left-0 @error('password') is-invalid @enderror"
                                        id="exampleInputPassword" placeholder="Password" name="password">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $messege }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="my-3">
                                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                    LOGIN
                                  </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/skydash/template/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/skydash/template/js/off-canvas.js"></script>
    <script src="/skydash/template/js/hoverable-collapse.js"></script>
    <script src="/skydash/template/js/template.js"></script>
    <script src="/skydash/template/js/settings.js"></script>
    <script src="/skydash/template/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/skydash/template/vendors/feather/feather.css">
    <link rel="stylesheet" href="/skydash/template/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/skydash/template/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/skydash/template/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/skydash/template/images/favicon.png" />
    
</head>

<body style="position: fixed; overflow-y: hidden; width: 100%;">
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow pb-5">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center py-5" >
                        <div class="auth-form-transparent text-left p-3 py-5">
                            <center>
                                <div class="brand-logo">
                                    <img src="/asset/img/tbb.png" alt="logo" style="width: 55px;">
                                </div>
                                <h4>Welcome back!</h4>
                                <h6 class="font-weight-light">to Starbhak Agenda</h6>
                            </center>

                            <form class="pt-4" action="/login" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="ti-user text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg border-left-0 @error('username') is-invalid @enderror"
                                        id="exampleInputEmail" placeholder="Enter Your Username..." name="username" required value="{{ old('username') }}">
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $messege }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="ti-lock text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control form-control-lg border-left-0 @error('password') is-invalid @enderror"
                                        id="exampleInputPassword" placeholder="Password" name="password">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $messege }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="my-3">
                                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                    LOGIN
                                  </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 half-bg d-flex flex-row" style="background-image: url(/asset/img/tebes.jpg); background-repeat: no-repeat; background-size: cover; background-position: left bottom">
                        
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/skydash/template/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/skydash/template/js/off-canvas.js"></script>
    <script src="/skydash/template/js/hoverable-collapse.js"></script>
    <script src="/skydash/template/js/template.js"></script>
    <script src="/skydash/template/js/settings.js"></script>
    <script src="/skydash/template/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>

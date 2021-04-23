<!doctype html>
<html lang="en">
    <head>
        <title>Login | SiPusDi</title>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="{{asset('template')}}/assets/img/logo septi.png" type="image/png">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{asset('template')}}/assets/css/style.css" rel="stylesheet" />
    </head>
    <body>
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-5">
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="{{asset('template')}}/assets/img/logo septi.png" width="60%">
                            </div>
                            <h3 class="text-center mb-4">SISTEM PERPUSTAKAAN DIGITAL</h3>

                            @if (session('pesan'))
                                <div class="alert alert-danger alert-dismissable">
                                    {{session('pesan')}}
                                </div>
                            @endif
                            <form action="/authenticate" class="login-form" method="POST">
                            @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control rounded-left" placeholder="Email" required name="email">
                                </div>
                                <div class="form-group d-flex">
                                    <input type="password" class="form-control rounded-left" placeholder="Password" required name="password">
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50">
                                        <label class="checkbox-wrap checkbox-primary">Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary rounded submit p-3 px-5"><strong>Lanjutkan</strong></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="{{asset('template')}}/assets/js/jquery-1.10.2.js"></script>
          <!-- BOOTSTRAP SCRIPTS -->
        <script src="{{asset('template')}}/assets/js/bootstrap.min.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="{{asset('template')}}/assets/js/jquery.metisMenu.js"></script>
          <!-- CUSTOM SCRIPTS -->
        <script src="{{asset('template')}}/assets/js/custom.js"></script>
    </body>
</html>

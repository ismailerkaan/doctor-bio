<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from template.doccure.io/html/template/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 May 2022 07:11:00 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Login</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/backend/img/favicon.png')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/css/feather.css')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">
</head>
<body>

<div class="main-wrapper">
    <div class="header d-none">

        <ul class="nav nav-tabs user-menu">

            <li class="nav-item">
                <a href="#" id="dark-mode-toggle" class="dark-mode-toggle">
                    <i class="feather-sun light-mode"></i><i class="feather-moon dark-mode"></i>
                </a>
            </li>

        </ul>

    </div>
    <div class="row">

        <div class="col-md-6 login-bg">
            <div class="login-banner"></div>
        </div>

        <div class="col-md-6 login-wrap-bg">

            <div class="login-wrapper">
                <div class="loginbox">
                    <div class="img-logo">
                        <img src="{{asset('assets/backend/img/logo.png')}}" class="img-fluid" alt="Logo">
                    </div>
                    <h3>Giriş</h3>
                    <p class="account-subtitle">Hoşgeldiniz bilgilerinizi girip sisteme giriş yapabilirsiniz.</p>
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $key => $error)
                                <ul>{{ ($key+1).' - '.$error}}</ul>
                            @endforeach
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="errorAlert">
                            {{session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{route('admin.login.post')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-focus">
                            <input type="email" class="form-control floating" name="email">
                            <label class="focus-label">E-Posta</label>
                        </div>
                        <div class="form-group form-focus">
                            <input type="password" class="form-control floating" name="password">
                            <label class="focus-label">Parola</label>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary" type="submit">Giriş</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<script src="{{asset('assets/backend/js/jquery-3.6.0.min.js')}}"></script>

<script src="{{asset('assets/backend/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/backend/js/script.js')}}"></script>
</body>

<!-- Mirrored from template.doccure.io/html/template/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 May 2022 07:11:01 GMT -->
</html>

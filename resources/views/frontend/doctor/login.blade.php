@extends('frontend.MasterPage')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 col-lg-6 login-left">
                            <img src="{{asset('assets/frontend/img/login-banner.png')}}" class="img-fluid"
                                 alt="Doccure Login">
                        </div>
                        <div class="col-md-12 col-lg-6 login-right">
                            @if (count($errors)>0)

                                <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                     id="errorAlert">

                                    @foreach ($errors->all() as $message)
                                        {{$message}}<br>
                                    @endforeach
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endif
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="errorAlert">
                                        {{session('success')}}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                    </div>
                                @endif
                            <div class="login-header">
                                <h3>Doktor Paneli <span>Girişi</span></h3>
                            </div>
                            <form action="{{route('doctor.login.post')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group form-focus">
                                    <input type="email" class="form-control floating" name="email">
                                    <label class="focus-label">E-Posta</label>
                                </div>
                                <div class="form-group form-focus">
                                    <input type="password" class="form-control floating" name="password">
                                    <label class="focus-label">Şifre</label>
                                </div>
                                {{--                                <div class="text-end">--}}
                                {{--                                    <a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>--}}
                                {{--                                </div>--}}
                                <button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Giriş Yap</button>
                                <div class="login-or">
                                    <span class="or-line"></span>
                                    <span class="span-or">veya </span>
                                </div>
                                <div class="row form-row social-login">
                                    <div class="col-12">
                                        <a href="#" class="btn btn-facebook w-100"> Hasta Girişi</a>
                                    </div>
                                    {{--                                                                        <div class="col-6">--}}
                                    {{--                                                                            <a href="#" class="btn btn-google w-100"><i class="fab fa-google me-1"></i> Login</a>--}}
                                    {{--                                                                        </div>--}}
                                </div>

                                <div class="text-center dont-have">Hesabın Yokmu ?  Hemen <a href="{{route('doctor.register')}}"> Kayıt Ol</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@extends('frontend.MasterPage')

@section('content')

    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Anasayfa</a></li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Şifremi Değiştir</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

                    @include('frontend.doctor.sidebar')


                </div>
                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="doc-review review-listing custom-edit-service">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="pb-3">Şifremi Değiştir</h4>
                                <form method="post" enctype="multipart/form-data" autocomplete="on" id="update_service"
                                      action="{{route('doctor.password.reset')}}">
                                    @csrf
                                    <input type="hidden" name="csrf_token_name"
                                           value="0146f123a4c7ae94253b39bca6bd5a5e">
                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Mevcut Şifre <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="password" id="password"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Yeni Şifre <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="new_password" id="new_password"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Yeni Şifre Tekrar<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="new_password_reply" id="new_password_reply"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section">
                                        <button class="btn btn-primary submit-btn" style="float:right;" type="submit">Kaydet
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('js')

@endsection


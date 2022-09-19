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
                    <h2 class="breadcrumb-title">Yeni Blog</h2>
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
                                <h4 class="pb-3">Yeni Blog</h4>
                                <form method="post" enctype="multipart/form-data" autocomplete="on" id="update_service"
                                      action="{{route('doctor.blog.add')}}">
                                    @csrf
                                    <input type="hidden" name="csrf_token_name"
                                           value="0146f123a4c7ae94253b39bca6bd5a5e">
                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Başlık <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="header" id="header" value="{{old('header')}}"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>İçerik <span class="text-danger">*</span></label>
                                                    <textarea id="about" class="form-control service-desc"
                                                              name="content" required>{{old('content')}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <span>Blog Resmi</span>
                                                <input class="form-control" type="file" name="file" id="images" multiple=""
                                                       accept="image/jpeg, image/png, image/gif,">
{{--                                                <div class="service-upload">--}}
{{--                                                    <i class="fas fa-cloud-upload-alt"></i>--}}

{{--                                                </div>--}}
                                                {{--                                                <div id="uploadPreview">--}}
                                                {{--                                                    <ul class="upload-wrap">--}}
                                                {{--                                                        <li>--}}
                                                {{--                                                            <div class=" upload-images">--}}
                                                {{--                                                                <img alt="Blog Image" src="assets/img/img-01.jpg">--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </li>--}}
                                                {{--                                                        <li>--}}
                                                {{--                                                            <div class=" upload-images">--}}
                                                {{--                                                                <img alt="Blog Image" src="assets/img/img-02.jpg">--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </li>--}}
                                                {{--                                                        <li>--}}
                                                {{--                                                            <div class=" upload-images">--}}
                                                {{--                                                                <img alt="Blog Image" src="assets/img/img-03.jpg">--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </li>--}}
                                                {{--                                                    </ul>--}}
                                                {{--                                                </div>--}}
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



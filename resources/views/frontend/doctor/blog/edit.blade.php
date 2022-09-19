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
                    <h2 class="breadcrumb-title">Blog Bilgileri Düzenle</h2>
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
                                <h4 class="pb-3">Blog Bilgileri Düzenle</h4>
                                <form method="post" enctype="multipart/form-data" autocomplete="on" id="update_service"
                                      action="{{route('doctor.blog.update',$blog->id)}}">
                                    @csrf
                                    <input type="hidden" name="csrf_token_name"
                                           value="0146f123a4c7ae94253b39bca6bd5a5e">
                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Başlık <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="header" id="header"
                                                           value="{{old('header',$blog->header)}}"
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
                                                              name="content"
                                                              required>{{old('content',$blog->content)}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($blog->status != 2 &&  $blog->status != 3)
                                        <div class="service-fields mb-3">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Durumu <span class="text-danger">*</span></label>
                                                        <select class="form-control" name="status" required>
                                                            <option>Seçiniz</option>
                                                            <option value="1" @if($blog->status==1) selected @endif>
                                                                Aktif
                                                            </option>
                                                            <option value="0" @if($blog->status==0) selected @endif>
                                                                Pasif
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <span>Yeni Blog Resmi</span>
                                                <input class="form-control" type="file" name="file" id="images"
                                                       multiple=""
                                                       accept="image/jpeg, image/png, image/gif,">


                                            </div>
                                            <div class="col-md-6">
                                                <span>Blog Resmi</span>

                                                <div class="upload-images">
                                                    @if(empty($blog->image))
                                                        <img src="{{asset('assets/no_image.jpeg')}}"
                                                             class="img-fluid">
                                                    @else
                                                        <img src="{{asset($blog->image)}}" class="img-fluid">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section">
                                        <button class="btn btn-primary submit-btn" style="float:right;" type="submit">
                                            Güncelle
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



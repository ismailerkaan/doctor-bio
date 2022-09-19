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
                    <h2 class="breadcrumb-title">Bloglarım</h2>
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
                    <div class="doc-review review-listing">
                        <div class="row mb-5">
                            <div class="col">
                                <h3 class="pb-3">Bloglarım</h3>
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-primary btn-sm" href="{{route('doctor.blog.create')}}"><i
                                        class="fas fa-plus me-1"></i> Yeni Blog</a>
                            </div>
                        </div>

                        @if(count($blogs)==0)
                            <div class="alert alert-success alert-dismissible fade show" role="alert" id="errorAlert">
                                Daha önce hiç blog girilmemiş isteseniz hemen bir tane oluşturabilirsiniz...
                            </div>
                        @endif
                        <div class="row blog-grid-row">
                            @foreach($blogs as $blog)
                                <div class="col-md-6 col-xl-4 col-sm-12">
                                    <div class="blog grid-blog">
                                        <div class="row">
                                            <div class="col-md-12" style="text-align: center">
                                                @if($blog->status==2)
                                                    <span class="badge badge-warning" style="width: 100%">Admin Onayı Bekliyor</span>
                                                @elseif($blog->status==0)
                                                    <span class="badge badge-danger"
                                                          style="width: 100%">Pasif</span>
                                                @elseif($blog->status==3)
                                                    <span class="badge badge-danger"
                                                          style="width: 100%">Admin Tarafından Reddedildi</span>
                                                @elseif($blog->status==1)
                                                    <span class="badge badge-success" style="width: 100%">Aktif</span>

                                                @endif
                                            </div>
                                        </div>
                                        <div class="blog-image">
                                            @if(empty($blog->image))
                                                <img src="{{asset('assets/no_image.jpeg')}}" class="img-fluid">
                                            @else
                                                <img src="{{asset($blog->image)}}" class="img-fluid">
                                            @endif
                                        </div>
                                        <div class="blog-content">
                                            <ul class="entry-meta meta-item">
                                                <li>
                                                    <div class="post-author">
                                                        <a href="doctor-profile.html">
                                                            @if(empty($blog->doctor->image))
                                                                <img src="{{asset('assets/no_image.jpeg')}}"
                                                                     class="img-fluid">
                                                            @else
                                                                <img src="{{asset($blog->doctor->image)}}"
                                                                     class="img-fluid">
                                                            @endif
                                                            <span>{{$blog->doctor->name}}</span>
                                                        </a>
                                                    </div>
                                                </li>
                                                <li style="font-size: 12px"><i
                                                        class="far fa-clock"></i> {{substr($blog->created_at,0,10)}}
                                                </li>
                                            </ul>
                                            {{-- TODO::Bloglara tıklanınca detay sayfasına götür --}}
                                            <h3 class="blog-title"><a
                                                    href=3"">{{substr($blog->header,0,50)}}
                                                    ...</a></h3>
                                            <p class="mb-0">{{substr($blog->content,0,100)}}...</p>
                                        </div>
                                        <div class="row pt-3">
                                            <div class="col">
                                                <a href="{{route('doctor.blog.edit',$blog->id)}}" class="text-success">
                                                    <i class="far fa-edit"></i> Düzenle</a></div>
                                            <div class="col text-end">
                                                <a class="text-danger" onclick="deleteBlog({{$blog->id}})"
                                                ><i class="far fa-trash-alt"></i> Sil</a>
                                                {{--                                                <a  class="text-danger"--}}
                                                {{--                                                   ddata-bs-toggle="modal"--}}
                                                {{--                                                   data-bs-target="#deleteModal" onclick="addHref({{$blog->id}})">--}}
                                                {{--                                                    <i class="far fa-trash-alt"></i> Sil</a></div>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal fade contentmodal" id="deleteModal" tabindex="-1" aria-hidden="true"
                     style="z-index: 999999">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content doctor-profile">
                            <div class="modal-header border-bottom-0 justify-content-end">
                                <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                                        class="feather-x-circle"></i></button>
                            </div>
                            <div class="modal-body">
                                <form action="https://template.doccure.io/html/template/admin/ratings.html">
                                    <div class="delete-wrap text-center">
                                        <div class="del-icon"><i class="feather-x-circle"></i></div>
                                        <h2>Silmek İsediğinize Eminmisiniz ?</h2>
                                        <p>Silinen Kayıt Geri Alınamaz</p>
                                        <div class="submit-section">
                                            <a href="" class="btn btn-success me-2" id="yesNo">Evet</a>

                                            <a href="#" class="btn btn-danger" data-bs-dismiss="modal">Hayır</a>
                                        </div>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function deleteBlog(id) {
            Swal.fire({
                title: 'Eminmisiniz ?',
                text: "Silinen Kayıt Geri Alınamaz!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet, sil!',
                cancelButtonText: 'İptal!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{url('doctor/blog/delete/')}}" + '/' + id;
                    ü
                }
            })
        }
    </script>
@endsection


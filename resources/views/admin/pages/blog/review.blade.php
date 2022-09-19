@extends('admin.MasterPage')


@section('content')
    <div class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">

                <div class="blog-view">
                    <div class="blog-single-post">
                        <a href="{{route('admin.blog')}}" class="back-btn"><i class="feather-chevron-left"></i> Geri</a>
                        <div class="blog-image">
                            <a href="javascript:void(0);">
                                @if(empty($blog->image))
                                    <img src="{{asset('assets/no_image.jpeg')}}" class="img-fluid">
                                @else
                                    <img src="{{asset($blog->image)}}" class="img-fluid">
                                @endif
                            </a>
                        </div>
                        <h3 class="blog-title">{{$blog->header}}</h3>
                        <div class="blog-info">
                            <div class="post-list">
                                <ul>
                                    <li>
                                        <div class="post-author">
                                            <a href="profile.html">
                                                @if(empty($blog->doctor->image))
                                                    <img src="{{asset('assets/no_image.jpeg')}}"
                                                         class="img-fluid">
                                                @else
                                                    <img src="{{asset($blog->doctor->image)}}"
                                                         class="img-fluid">
                                                @endif
                                                <span>{{$blog->doctor->name}} </span></a>
                                        </div>
                                    </li>
                                    <li><i class="feather-clock"></i> {{substr($blog->created_at,0,10)}}</li>
                                    <li><i class="fa fa-thumbs-up"></i> {{$blog->like.' '}} Beğenme</li>
                                    <li><i class="fa fa-thumbs-down"></i>{{$blog->dislike.' '}} Beğenmeme</li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog-content">
                            <p>
                                {{$blog->content}}
                            </p>
                        </div>
                    </div>

                    <div class="card author-widget clearfix">
                        <div class="card-header">
                            <h4 class="card-title">Blog Durumu</h4>
                        </div>
                        <form method="post" action="{{route('admin.blog.status')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="about-author">
                                    <div class="col-md-6">
                                        <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                        <select class="form-control" name="status">
                                            <option>Seçiniz</option>
                                            <option value="0" @if($blog->status==0) selected @endif >Pasif</option>
                                            <option value="1" @if($blog->status==1) selected @endif >Aktif</option>
                                            <option value="2" @if($blog->status==2) selected @endif >Admin Onayı
                                                Bekliyor
                                            </option>
                                            <option value="3" @if($blog->status==3) selected @endif >Admin Tarafından
                                                Reddedildi
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-5">
                                        <button class="btn btn-success">Kaydet</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                    {{--                    <div class="card blog-comments">--}}
                    {{--                        <div class="card-header">--}}
                    {{--                            <h4 class="card-title">Comments (5)</h4>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="card-body pb-0">--}}
                    {{--                            <ul class="comments-list">--}}
                    {{--                                <li>--}}
                    {{--                                    <div class="comment">--}}
                    {{--                                        <div class="comment-author">--}}
                    {{--                                            <img class="avatar" alt="" src="assets/img/profiles/avatar-06.jpg">--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="comment-block">--}}
                    {{--                                            <div class="comment-by">--}}
                    {{--                                                <h5 class="blog-author-name">Michelle Fairfax <span--}}
                    {{--                                                        class="blog-date"> <i class="feather-clock me-2"></i>Dec 6, 2017</span>--}}
                    {{--                                                </h5>--}}
                    {{--                                            </div>--}}
                    {{--                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra--}}
                    {{--                                                euismod odio, gravida pellentesque urna varius vitae, gravida--}}
                    {{--                                                pellentesque urna varius vitae. Lorem ipsum dolor sit amet, consectetur--}}
                    {{--                                                adipiscing elit.</p>--}}
                    {{--                                            <a class="comment-btn" href="#">--}}
                    {{--                                                <img class="me-1" alt="icon" src="assets/img/icon/reply-icon.png"> Reply--}}
                    {{--                                            </a>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                    <ul class="comments-list reply">--}}
                    {{--                                        <li>--}}
                    {{--                                            <div class="comment">--}}
                    {{--                                                <div class="comment-author">--}}
                    {{--                                                    <img class="avatar" alt="" src="assets/img/profiles/avatar-07.jpg">--}}
                    {{--                                                </div>--}}
                    {{--                                                <div class="comment-block">--}}
                    {{--                                                    <div class="comment-by">--}}
                    {{--                                                        <h5 class="blog-author-name">Gina Moore <span class="blog-date"> <i--}}
                    {{--                                                                    class="feather-clock me-2"></i> 6 Dec 2022</span>--}}
                    {{--                                                        </h5>--}}
                    {{--                                                    </div>--}}
                    {{--                                                    <p>gravida pellentesque urna varius vitae. Lorem ipsum dolor sit--}}
                    {{--                                                        amet, consectetur</p>--}}
                    {{--                                                    <a class="comment-btn" href="#">--}}
                    {{--                                                        <img class="me-1" alt="icon"--}}
                    {{--                                                             src="assets/img/icon/reply-icon.png"> Reply--}}
                    {{--                                                    </a>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </li>--}}
                    {{--                                        <li>--}}
                    {{--                                            <div class="comment">--}}
                    {{--                                                <div class="comment-author">--}}
                    {{--                                                    <img class="avatar" alt="" src="assets/img/profiles/avatar-08.jpg">--}}
                    {{--                                                </div>--}}
                    {{--                                                <div class="comment-block">--}}
                    {{--                                                    <div class="comment-by">--}}
                    {{--                                                        <h5 class="blog-author-name">Carl Kelly <span class="blog-date"> <i--}}
                    {{--                                                                    class="feather-clock me-2"></i> 7 Dec 2022</span>--}}
                    {{--                                                        </h5>--}}
                    {{--                                                    </div>--}}
                    {{--                                                    <p> pellentesque urna varius vitae, gravida pellentesque urna--}}
                    {{--                                                        consectetur adipiscing elit. Nam viverra euismod.</p>--}}
                    {{--                                                    <a class="comment-btn" href="#">--}}
                    {{--                                                        <img class="me-1" alt="icon"--}}
                    {{--                                                             src="assets/img/icon/reply-icon.png"> Reply--}}
                    {{--                                                    </a>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </li>--}}
                    {{--                                    </ul>--}}
                    {{--                                </li>--}}
                    {{--                                <li>--}}
                    {{--                                    <div class="comment">--}}
                    {{--                                        <div class="comment-author">--}}
                    {{--                                            <img class="avatar" alt="" src="assets/img/profiles/avatar-09.jpg">--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="comment-block">--}}
                    {{--                                            <div class="comment-by">--}}
                    {{--                                                <h5 class="blog-author-name">Elsie Gilley <span class="blog-date"> <i--}}
                    {{--                                                            class="feather-clock me-2"></i> 7 Dec 2022</span></h5>--}}
                    {{--                                            </div>--}}
                    {{--                                            <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut--}}
                    {{--                                                enim ad minim veniam, quis nostrud exercitation.</p>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </li>--}}
                    {{--                                <li>--}}
                    {{--                                    <div class="comment">--}}
                    {{--                                        <div class="comment-author">--}}
                    {{--                                            <img class="avatar" alt="" src="assets/img/profiles/avatar-10.jpg">--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="comment-block">--}}
                    {{--                                            <div class="comment-by">--}}
                    {{--                                                <h5 class="blog-author-name">Joan Gardner <span class="blog-date"> <i--}}
                    {{--                                                            class="feather-clock me-2"></i> 12 Dec 2022</span></h5>--}}
                    {{--                                            </div>--}}
                    {{--                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>--}}
                    {{--                                            <a class="comment-btn" href="#">--}}
                    {{--                                                <img class="me-1" alt="icon" src="assets/img/icon/reply-icon.png"> Reply--}}
                    {{--                                            </a>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </li>--}}
                    {{--                            </ul>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}


                    {{--                    <div class="card new-comment clearfix">--}}
                    {{--                        <div class="card-header">--}}
                    {{--                            <h4 class="card-title">Leave Comment</h4>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="card-body">--}}
                    {{--                            <form>--}}
                    {{--                                <div class="form-group form-focus">--}}
                    {{--                                    <input type="text" class="form-control floating">--}}
                    {{--                                    <label class="focus-label">Name <span class="text-danger">*</span></label>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="form-group form-focus">--}}
                    {{--                                    <input type="email" class="form-control floating">--}}
                    {{--                                    <label class="focus-label">Your Email Address <span--}}
                    {{--                                            class="text-danger">*</span></label>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="form-group">--}}
                    {{--                                    <textarea rows="4" class="form-control bg-grey" placeholder="Comments"></textarea>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="submit-section">--}}
                    {{--                                    <button class="btn btn-primary submit-btn" type="submit">Submit</button>--}}
                    {{--                                </div>--}}
                    {{--                            </form>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="card blog-share clearfix">--}}
                    {{--                        <div class="card-header">--}}
                    {{--                            <h4 class="card-title">Share the post</h4>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="card-body">--}}
                    {{--                            <ul class="social-share">--}}
                    {{--                                <li><a href="#"><i class="feather-twitter"></i></a></li>--}}
                    {{--                                <li><a href="#"><i class="feather-facebook"></i></a></li>--}}
                    {{--                                <li><a href="#"><i class="feather-linkedin"></i></a></li>--}}
                    {{--                                <li><a href="#"><i class="feather-instagram"></i></a></li>--}}
                    {{--                                <li><a href="#"><i class="feather-youtube"></i></a></li>--}}
                    {{--                            </ul>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script>


        function addDoctorId(id) {
            $('#doctor_id').val(id);
        }

    </script>
@endsection

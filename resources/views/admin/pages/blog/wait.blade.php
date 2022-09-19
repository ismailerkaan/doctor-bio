@extends('admin.MasterPage')


@section('content')

    <div class="content container-fluid">
        <h4>Onay Bekleyen Bloglar</h4>
        @if(count($blogs)==0)
            <div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorAlert">
               Şuanda Onay Bekleyen Blog Bulunmamaktadır
            </div>
        @endif
        <div class="row">

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
                                        <a href="#">
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
                            {{--                            TODO::Bloglara tıklanınca detay sayfasına götür--}}
                            <h3 class="blog-title"><a
                                    href="{{route('admin.blog.detail',$blog->id)}}">{{substr($blog->header,0,50)}}
                                    ...</a></h3>
                            <p class="mb-0">{{substr($blog->content,0,100)}}...</p>
                        </div>
                        <div class="row pt-3">
                            <div class="col">
                                <a href="{{route('admin.blog.detail',$blog->id)}}" class="text-primary">
                                    <i class="fa fa-eye"></i> İncele</a>
                            </div>

                            <div class="col">
                                <a href="{{route('admin.blog.accept',['accept',$blog->id])}}" class="text-success">
                                    <i class="fa fa-check"></i> Kabult Et</a>
                            </div>

                            <div class="col text-end">
                                <a class="text-danger" href="{{route('admin.blog.accept',['notAccept',$blog->id])}}"
                                ><i class="fa fa-minus-circle"></i> Reddet</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>

        {{ $blogs->links('vendor.pagination.custom') }}

    </div>

@endsection

@section('js')

@endsection

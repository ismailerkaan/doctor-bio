@extends('admin.MasterPage')


@section('content')

    <div class="content container-fluid">
        <form method="post" action="{{route('admin.blog.filter')}}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="col-md-3">
                    <label>Doktor Adı</label>
                    <input type="text" class="form-control" name="doctor_name"
                           value="{{isset($postData['doctor_name'])?$postData['doctor_name']:null}}">
                </div>
                <div class="col-md-3">
                    <label>Departman</label>
                    <select class="form-control" name="department_id">
                        <option value="">Seçiniz</option>
                        @foreach($departments as $department)
                            @if(isset($postData['department_id']) && $postData['department_id']==$department->id)
                                <option value="{{$department->id}}" selected>{{$department->name}}</option>
                            @else
                                <option value="{{$department->id}}">{{$department->name}}</option>

                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Durumu</label>
                    <select class="form-control" name="status">
                        <option value="">Seçiniz</option>
                        <option value="1" @if(isset($postData['status']) && $postData['status']==1) selected @endif >
                            Aktif
                        </option>
                        <option value="0" @if(isset($postData['status']) && $postData['status']==0) selected @endif>
                            Pasif
                        </option>
                        <option value="2" @if(isset($postData['status']) && $postData['status']==2) selected @endif>Onay
                            Bekliyor
                        </option>
                        <option value="3" @if(isset($postData['status']) && $postData['status']==3) selected @endif>
                            Red
                        </option>
                    </select>
                </div>
                <div class="col-md-3" style="margin-top: 30px">
                    <button class="btn btn-outline-success" type="submit"> Filtrele</button>
                </div>
                <hr class="mt-4">
            </div>
        </form>
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
                            {{--                            @if($blog->status==2)--}}
                            {{--                                <div class="col">--}}
                            {{--                                    <a href="{{route('doctor.blog.edit',$blog->id)}}" class="text-success">--}}
                            {{--                                        <i class="fa fa-check"></i> Kabult Et</a>--}}
                            {{--                                </div>--}}
                            {{--                            @endif--}}

                            {{--                            @if($blog->status==3)--}}
                            {{--                                <div class="col">--}}
                            {{--                                    <a href="{{route('doctor.blog.edit',$blog->id)}}" class="text-warning">--}}
                            {{--                                        <i class="fa fa-redo"></i> Tekrar İncele</a>--}}
                            {{--                                </div>--}}
                            {{--                            @endif--}}
                            {{--                            <div class="col text-end">--}}
                            {{--                                <a class="text-danger" onclick="deleteBlog({{$blog->id}})"--}}
                            {{--                                ><i class="fa fa-minus-circle"></i> Reddet</a>--}}
                            {{--                            </div>--}}
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

@extends('frontend.MasterPage')

@section('content')

    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Doktorlar</a></li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">{{$doctors->total()}} Adet Doktor</h2>
                </div>
                {{--                <div class="col-md-4 col-12 d-md-block d-none">--}}
                {{--                    <div class="sort-by">--}}
                {{--                        <span class="sort-title">Sort by</span>--}}
                {{--                        <span class="sortby-fliter">--}}
                {{--                            <select class="select form-select">--}}
                {{--                            <option>Select</option>--}}
                {{--                            <option class="sorting">Rating</option>--}}
                {{--                            <option class="sorting">Popular</option>--}}
                {{--                            <option class="sorting">Latest</option>--}}
                {{--                            <option class="sorting">Free</option>--}}
                {{--                            </select>--}}
                {{--                        </span>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">

                    <div class="card search-filter">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Aranan Filtreler</h4>
                        </div>
                        <form action="{{route('doctors.search')}}" method="get" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="filter-widget">
                                    <h4>İl</h4>
                                    <div>
                                        <select class="form-control" name="city" id="city_id"
                                                onchange="getDistrict(this)">
                                            <option selected></option>
                                            @foreach($city as $citys)
                                                <option value="{{$citys->number_plate}}"
                                                        @if($citys->id == $filterData['city'])selected @endif>{{$citys->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="filter-widget">
                                    <h4>İlçe</h4>
                                    <div>
                                        <select class="form-control" name="district" id="disctrict_id">
                                            <option selected></option>

                                            @foreach($district as $row)
                                                <option value="{{$row->id}}"
                                                        @if($row->id == $filterData['district'])selected @endif>{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="filter-widget">
                                    <h4>Bölüm</h4>
                                    <div>
                                        <select class="form-control" name="department" id="department">
                                            <option selected></option>

                                            @foreach($department as $row)
                                                <option value="{{$row->id}}"
                                                        @if($row->id == $filterData['department'])selected @endif>{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="btn-search">
                                    <button type="submit" class="btn w-100">Filtrele</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-md-12 col-lg-8 col-xl-9">

                    @foreach($doctors as $doctor)
                        <div class="card">
                            <div class="card-body">
                                <div class="doctor-widget">
                                    <div class="doc-info-left">
                                        <div class="doctor-img">
                                            <a href="{{route('doctors.profile',$doctor->id)}}">
                                                @if(empty($doctor->image))
                                                    <img src="{{asset('assets/no_image.jpeg')}}" class="img-fluid">
                                                @else
                                                    <img src="{{asset($doctor->image)}}" style="max-height: 210px"
                                                         class="img-fluid">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="doc-info-cont">
                                            <h4 class="doc-name"><a
                                                    href="{{route('doctors.profile',$doctor->id)}}">{{$doctor->name}}</a>
                                            </h4>
                                            <p class="doc-speciality">{{!empty($doctor->details->description)}}</p>
                                            <h5 class="doc-department">{{$doctor->departments->name}}</h5>
                                            <div class="rating">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star"></i>
                                                {{--   TODO::Yorum Sayısı--}}
                                                <span class="d-inline-block average-rating">(17)</span>
                                            </div>
                                            <div class="clinic-details">
                                                <p class="doc-location"><i
                                                        class="fas fa-map-marker-alt"></i> {{$doctor->district->name}}
                                                    - {{$doctor->city->name}}
                                                </p>
                                            </div>
                                            {{--                                        <div class="clinic-services">--}}
                                            {{--                                            <span>Dental Fillings</span>--}}
                                            {{--                                            <span> Whitneing</span>--}}
                                            {{--                                        </div>--}}
                                        </div>
                                    </div>
                                    <div class="doc-info-right">
                                        <div class="clini-infos">
                                            <ul>
                                                @if($doctor->like != 0 && $doctor->dislike!=0)
                                                    <li>
                                                        <i class="far fa-thumbs-up"></i> {{ceil(($doctor->like * 100)/($doctor->like+$doctor->dislike))}}
                                                        %
                                                    </li>
                                                @else
                                                    <li><i class="far fa-thumbs-up"></i> 0</li>
                                                @endif
                                                <li><i class="far fa-comment"></i> 0 Yorum</li>
                                                <li>
                                                    <i class="fas fa-map-marker-alt"></i> {{$doctor->district->name.'-'.$doctor->city->name}}
                                                </li>
                                                <li>
                                                    <i class="far fa-money-bill-alt"></i> {{!empty($doctor->details->avarage_price)?$doctor->details->avarage_price:'0'}}
                                                    <i
                                                        class="fas fa-info-circle" data-bs-toggle="tooltip"
                                                        title="Fiyatlar ortalama fiyatlardır. Net fiyat bilgisi için iletişime geçin."></i>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="clinic-booking">
                                            <a class="view-pro-btn" href="{{route('doctors.profile',$doctor->id)}}">Profili
                                                İncele</a>
                                            <a class="apt-btn" href="{{route('doctors.profile',$doctor->id)}}">Randevu
                                                Defteri</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                    <div class="load-more text-center">
                        {{ $doctors->appends(request()->query())->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('assets/frontend/js/plugins/select2/js/select2.min.js')}}"></script>

    <script src="{{asset('assets/frontend/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
    <script src="{{asset('assets/frontend/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>

    <script src="{{asset('assets/frontend/plugins/select2/js/select2.min.js')}}"></script>

    <script src="{{asset('assets/frontend/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/bootstrap-datetimepicker.min.js')}}"></script>

    <script src="{{asset('assets/frontend/plugins/fancybox/jquery.fancybox.min.js')}}"></script>

    <script src="{{asset('assets/frontend/js/feather.min.js')}}"></script>

    <script src="{{asset('assets/frontend/js/script.js')}}"></script>
    <script>
        function getDistrict(sel) {

            $("#disctrict_id").html('<option selected></option>');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: '{{url('get-district/')}}' + '/' + sel.value,
                data: {'city': sel.value},
                error: function (data) {
                    alert('Bir Hata oluştu')
                },
                success: function (data) {
                    $.each(data.data, function (key, value) {
                        $("#disctrict_id").append('<option value=' + value['id'] + '>' + value['name'] + '</option>');
                    });

                }
            })
        }

    </script>
@endsection


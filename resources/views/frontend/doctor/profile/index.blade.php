@extends('frontend.MasterPage')

@section('content')

    <style>
        .text-information {
            font-size: 10px;
            color: #878787;
        }
    </style>
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Anasayfa</a></li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Profil Ayarları</h2>
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
                                <h4 class="pb-3">Profil Bilgilerim</h4>
                                <form method="post" enctype="multipart/form-data" autocomplete="on" id="update_service"
                                      action="{{route('doctor.profile.save')}}">
                                    @csrf

                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Ad Soyad <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="name" id="name"
                                                           value="{{old('name',$doctor->name)}}"
                                                           required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Alanım <span class="text-danger">*</span></label>
                                                    <select class="form-control" type="text" name="department"
                                                            id="department"
                                                            required>
                                                        <option>Seçiniz</option>
                                                        @foreach($departments as $department)
                                                            <option value="{{$department->id}}"
                                                                    @if($department->id==$doctor->department_id) selected @endif>
                                                                {{$department->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Telefon Numaram <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="phone_number"
                                                           id="phone_number"
                                                           value="{{old('phone_number',isset($doctor->phone_number)?$doctor->phone_number:'')}}"
                                                           required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>E-posta Adresi <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="email"
                                                           id="email"
                                                           value="{{old('email',isset($doctor->email)?$doctor->email:'')}}"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Hakkımda <span class="text-information">(Profilinizde hakkımda alanında görünür.)</span></label>
                                                    <textarea id="about" class="form-control "
                                                              name="about"
                                                              required>{{old('about',isset($doctor->details->about)?$doctor->details->about:'')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Açıklama <span class="text-information">(Profilinizde adınızın altında görünür.)</span></label>
                                                    <textarea id="description" class="form-control "
                                                              name="description"
                                                              required>{{old('description',isset($doctor->details->description)?$doctor->details->description:'')}}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>İl <span class="text-danger">*</span></label>
                                                    <select class="form-control" type="text" name="city"
                                                            id="city"
                                                            onchange="getDistrict(this)"
                                                            required>
                                                        <option>Seçiniz</option>
                                                        @foreach($citys as $city)
                                                            <option value="{{$city->id}}"
                                                                    @if($city->id==$doctor->city_id) selected @endif>
                                                                {{$city->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>İlçe <span class="text-danger">*</span></label>
                                                    <select class="form-control" type="text" name="discricts"
                                                            id="disctrict_id"
                                                            required>
                                                        <option>Seçiniz</option>
                                                        @foreach($districts as $district)
                                                            <option value="{{$district->id}}"
                                                                    @if($district->id==$doctor->district_id) selected @endif>
                                                                {{$district->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Firma Adı <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="company_name"
                                                           id="company_name"
                                                           value="{{old('company_name',isset($doctor->details->company_name)?$doctor->details->company_name:'')}}"
                                                           required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Firma Adresi <span class="text-danger">*</span></label>
                                                    <textarea rows="2" name="company_adress"
                                                              class="form-control">{{old('company_adress',isset($doctor->details->company_adress)?$doctor->details->company_adress:'')}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Ortalama Fiyat <span class="text-information">(Ortalama muayne ücretiniz)*</span></label>
                                                    <input class="form-control" type="text" name="avarage_price"
                                                           id="avarage_price"
                                                           value="{{old('avarage_price',isset($doctor->details->avarage_price)?$doctor->details->avarage_price:'')}}"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <span>Yeni Profil Resmi</span>
                                                <input class="form-control" type="file" name="file" id="images"
                                                       multiple=""
                                                       accept="image/jpeg, image/png, image/gif,">


                                            </div>
                                            <div class="col-md-6">
                                                <span>Profil Resmi</span>

                                                <div class="upload-images">
                                                    @if(empty($doctor->image))
                                                        <img src="{{asset('assets/no_image.jpeg')}}"
                                                             class="img-fluid">
                                                    @else
                                                        <img src="{{asset($doctor->image)}}" class="img-fluid">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section">
                                        <button class="btn btn-primary submit-btn" style="float:right;" type="submit">
                                            Kaydet
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

    <script>
        function getDistrict(sel) {
            $("#disctrict_id").html('<option >İlçe</option>');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: '{{url('admin/get-district/')}}' + '/' + sel.value,
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

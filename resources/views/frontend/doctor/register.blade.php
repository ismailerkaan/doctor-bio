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
                                <div class="alert alert-success alert-dismissible fade show" role="alert"
                                     id="errorAlert">
                                    {{session('success')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="login-header">
                                <h3>Doktor Kayıt <span> </span></h3>
                            </div>
                            <form action="{{route('doctor.register.post')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group form-focus">
                                    <input type="text" class="form-control floating" name="name"
                                           value="{{old('name')}}">
                                    <label class="focus-label">Ad Soyad</label>
                                </div>
                                <div class="form-group form-focus">
                                    <input type="email" class="form-control floating" name="email"
                                           value="{{old('email')}}">
                                    <label class="focus-label">E-Posta</label>
                                </div>
                                <div class="form-group form-focus">
                                    <input type="text" class="form-control floating" name="phone_number"
                                           value="{{old('phone_number')}}">
                                    <label class="focus-label">Telefon Numarası</label>
                                </div>
                                <div class="form-group form-focus">
                                    <input type="text" class="form-control floating" name="password">
                                    <label class="focus-label">Şifre</label>
                                </div>


                                <div class="form-group form-focus">
                                    <select class="form-control" name="city_id" onchange="getDistrict(this)">
                                        <option>Seçiniz</option>
                                        @foreach($city as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                    <label class="focus-label">İl</label>
                                </div>

                                <div class="form-group form-focus">
                                    <select class="form-control" name="district_id" id="disctrict_id">
                                        <option>İlçe</option>

                                    </select>
                                </div>

                                <div class="form-group form-focus">
                                    <select class="form-control" name="department_id">
                                        <option>Seçiniz</option>
                                        @foreach($departmans as $departman)
                                            @if(old('department_id') == $departman->id)
                                                <option value="{{$departman->id}}"
                                                        selected>{{$departman->name}}</option>
                                            @else
                                                <option value="{{$departman->id}}">{{$departman->name}}</option>

                                            @endif
                                        @endforeach
                                    </select>
                                    <label class="focus-label">Departman</label>
                                </div>

                                <div class="form-group form-focus">
                                    <input type="text" class="form-control floating" name="company_name"
                                           value="{{old('company_name')}}">
                                    <label class="focus-label">Firma Adı</label>
                                </div>

                                <div class="form-group form-focus">
                                    <input type="text" class="form-control floating" name="company_adress"
                                           value="{{old('company_adress')}}">
                                    <label class="focus-label">Firma Adresi</label>
                                </div>


                                {{--                                                                <div class="text-end">--}}
                                {{--                                                                    <a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>--}}
                                {{--                                                                </div>--}}
                                <button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Kayıt Ol</button>
                                <div class="login-or">
                                    <span class="or-line"></span>
                                    <span class="span-or">veya </span>
                                </div>
                                <div class="row form-row social-login">
                                    <div class="col-12">
                                        <a href="#" class="btn btn-facebook w-100"> Hasta Kayıt</a>
                                    </div>
                                </div>

                                <div class="text-center dont-have">Hesabın Varmı ? <a
                                        href="{{route('doctor.login.page')}}"> Giriş Yap</a>
                                </div>
                            </form>
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

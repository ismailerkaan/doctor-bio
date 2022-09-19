@extends('admin.MasterPage')

@section('content')

    <div class="content container-fluid">

        <div class="row">
            <div class="col-md-12">
                <h5 class="mb-3">Doktor Bilgileri Düzenle</h5>
                <form action="{{route('doctor.update',$doctor->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="add-wrap">
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" name="name" value="{{$doctor->name}}">
                            <label class="focus-label">Doktor Adı <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" name="email" value="{{$doctor->email}}">
                            <label class="focus-label">E-Posta <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-group">
                            <select class="select" name="department_id">
                                <option>Bölümü</option>
                                @foreach($departments as $row)
                                    <option value="{{$row->id}}"
                                            @if($row->id ==$doctor->department_id) selected @endif>{{$row->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" name="phone_number"
                                   value="{{$doctor->phone_number}}">
                            <label class="focus-label">Telefon Numarası<span
                                    class="text-danger">*</span></label>
                        </div>
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" name="password">
                            <label class="focus-label">Giriş Şifresi<span
                                    class="text-danger">*</span></label>
                        </div>
                        <div class="form-group">
                            <select class="select" name="city_id" onchange="getDistrict(this)">
                                <option>il</option>
                                @foreach($city as $row)
                                    <option value="{{$row->id}}"
                                            @if($row->id ==$doctor->city_id) selected @endif>{{$row->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="select" name="district_id" id="district_id">
                                <option>İlçe</option>
                                @foreach($districts as $row)
                                    <option value="{{$row->id}}"
                                            @if($row->id ==$doctor->district_id) selected @endif>{{$row->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-focus">
                            <input type="date" class="form-control floating" name="licance_start"
                                   value="{{date('Y-m-d',strtotime($doctor->licance_start))}}">
                            <label class="focus-label">Lisans Başlangıç<span
                                    class="text-danger">*</span></label>
                        </div>
                        <div class="form-group form-focus">
                            <input type="date" class="form-control floating" name="licance_end"
                                   value="{{date('Y-m-d',strtotime($doctor->licance_end))}}">
                            <label class="focus-label">Lisans Bitiş<span
                                    class="text-danger">*</span></label>
                        </div>
                        <div class="form-group form-focus">
                            <label class="toggle-switch" for="status1">
                                Durumu
                                <input type="checkbox" class="toggle-switch-input" id="status1" name="status" value="1"
                                       @if($doctor->status==1) checked @endif>
                                <span class="toggle-switch-label">
                            <span class="toggle-switch-indicator"></span>
                            </span>

                            </label>
                        </div>
                        <div class="form-group form-focus">
                            <div class="row">

                                <div class="col-md-6">
                                    @if(empty($doctor->image))
                                        <img src="{{asset('assets/no_image.jpeg')}}" class="img-fluid">
                                    @else
                                        <img src="{{asset($doctor->image)}}" class="img-fluid">
                                    @endif

                                    <label class="focus-label">Doktor Resmi<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="file" class="form-control floating" name="file">
                                    <label class="focus-label">Doktor Resmi<span
                                            class="text-danger">*</span></label>
                                </div>
                            </div>


                        </div>

                        <div class="submit-section">
                            <button type="submit" onclick="formSubmit()" class="btn btn-primary btn-save">
                                Güncelle
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection

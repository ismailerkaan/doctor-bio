@extends('admin.MasterPage')


@section('content')
    <div class="content container-fluid">


        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-md-12 d-flex justify-content-end">
                    <div class="doc-badge me-3">Toplam Doktor <span class="ms-1">{{count($doctors)}}</span></div>
                    <div class="SortBy">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#addDoctor"
                           class="btn btn-primary btn-add btn-sm"> Yeni Kayıt</a>

                        {{--                         <button class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#exampleModal">Yeni Kayıt</button>--}}
                        <div id="checkBox">
                            <form action="https://template.doccure.io/html/template/admin/doctor-list.html">
                                <p class="lab-title">Specialities</p>
                                <label class="custom_radio w-100">
                                    <input type="radio" name="year">
                                    <span class="checkmark"></span> Number of Appointment
                                </label>
                                <label class="custom_radio w-100">
                                    <input type="radio" name="year">
                                    <span class="checkmark"></span> Total Income
                                </label>
                                <label class="custom_radio w-100 mb-4">
                                    <input type="radio" name="year">
                                    <span class="checkmark"></span> Ratings
                                </label>
                                <p class="lab-title">Sort By</p>
                                <label class="custom_radio w-100">
                                    <input type="radio" name="sort">
                                    <span class="checkmark"></span> Ascending
                                </label>
                                <label class="custom_radio w-100 mb-4">
                                    <input type="radio" name="sort">
                                    <span class="checkmark"></span> Descending
                                </label>
                                <button type="submit" class="btn w-100 btn-primary">Apply</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title">Doktorlar</h5>
                            </div>
                            <div class="col-auto d-flex flex-wrap">
                                <div class="form-custom me-2">
                                    <div id="tableSearch" class="dataTables_wrapper"></div>
                                </div>
                                {{--                                <div class="multipleSelection">--}}
                                {{--                                    <div class="selectBox">--}}
                                {{--                                        <p class="mb-0 me-2"><i class="feather-filter me-1"></i> Filter By Speciality--}}
                                {{--                                        </p>--}}
                                {{--                                        <span class="down-icon"><i class="feather-chevron-down"></i></span>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div id="checkBoxes">--}}
                                {{--                                        <form action="https://template.doccure.io/html/template/admin/doctor-list.html">--}}
                                {{--                                            <p class="lab-title">Specialities</p>--}}
                                {{--                                            <div class="selectBox-cont">--}}
                                {{--                                                <label class="custom_check w-100">--}}
                                {{--                                                    <input type="checkbox" name="year" checked>--}}
                                {{--                                                    <span class="checkmark"></span> Urology--}}
                                {{--                                                </label>--}}
                                {{--                                                <label class="custom_check w-100">--}}
                                {{--                                                    <input type="checkbox" name="year">--}}
                                {{--                                                    <span class="checkmark"></span> Neurology--}}
                                {{--                                                </label>--}}
                                {{--                                                <label class="custom_check w-100">--}}
                                {{--                                                    <input type="checkbox" name="year">--}}
                                {{--                                                    <span class="checkmark"></span> Orthopedic--}}
                                {{--                                                </label>--}}
                                {{--                                                <label class="custom_check w-100">--}}
                                {{--                                                    <input type="checkbox" name="year">--}}
                                {{--                                                    <span class="checkmark"></span> Cardiologist--}}
                                {{--                                                </label>--}}
                                {{--                                                <label class="custom_check w-100">--}}
                                {{--                                                    <input type="checkbox" name="year">--}}
                                {{--                                                    <span class="checkmark"></span> Dentist--}}
                                {{--                                                </label>--}}
                                {{--                                                <label class="custom_check w-100">--}}
                                {{--                                                    <input type="checkbox" name="year">--}}
                                {{--                                                    <span class="checkmark"></span> Gynacologist--}}
                                {{--                                                </label>--}}
                                {{--                                                <label class="custom_check w-100">--}}
                                {{--                                                    <input type="checkbox" name="year">--}}
                                {{--                                                    <span class="checkmark"></span> Pediatrist--}}
                                {{--                                                </label>--}}
                                {{--                                                <label class="custom_check w-100">--}}
                                {{--                                                    <input type="checkbox" name="year">--}}
                                {{--                                                    <span class="checkmark"></span> Orthopedic--}}
                                {{--                                                </label>--}}
                                {{--                                            </div>--}}
                                {{--                                            <button type="submit" class="btn w-100 btn-primary">Apply</button>--}}
                                {{--                                        </form>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="datatable table table-borderless hover-table" id="data-table">
                                <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Adı</th>
                                    <th>E-posta</th>
                                    <th>Bölümü</th>
                                    <th>İletişim Numarası</th>
                                    <th>İl</th>
                                    <th>İlçe</th>
                                    <th>Lisans Bitiş</th>
                                    <th>İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($doctors as $doctor)
                                    <tr>
                                        <td>{{$doctor->id}}</td>
                                        <td>{{$doctor->name}}</td>
                                        <td>{{$doctor->email}}</td>
                                        <td>{{$doctor->departments->name}}</td>
                                        <td>{{$doctor->phone_number}}</td>
                                        <td>{{$doctor->city->name}}</td>
                                        <td>{{$doctor->district->name}}</td>
                                        <td>{{$doctor->licance_end}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">İşlem
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                       href="{{route('doctor.edit',$doctor->id)}}">Düzenle</a>
                                                    <a class="dropdown-item" href="#">Profili İncele</a>

                                                    @if($doctor->best==1)
                                                        <a class="dropdown-item"
                                                           href="{{route('doctor.stand',['remove',$doctor->id])}}" }>Öne
                                                            Çıkandan Kaldır</a>
                                                    @elseif($doctor->best==0 ||$doctor->best==null)
                                                        <a class="dropdown-item"
                                                           href="{{route('doctor.stand',['up',$doctor->id])}}">Öne
                                                            Çıkar</a>
                                                    @endif
                                                    <a class="dropdown-item" data-bs-toggle="modal"
                                                       data-bs-target="#deleteModal" onclick="addHref({{$doctor->id}})"
                                                    >Sil</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <div id="tablepagination" class="dataTables_wrapper"></div>
            </div>
        </div>

    </div>
    <div class="modal fade contentmodal" id="addDoctor" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content doctor-profile">
                <div class="modal-header">
                    <h3 class="mb-0">Yeni Doktor Kayıt</h3>
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                            class="feather-x-circle"></i></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorAlert"
                         style="display: none">
                        <ul id="messageArea">

                        </ul>

                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                    </div>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert"
                         style="display: none">
                        Yeni doktor kaydı yapıldı.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                    </div>
                    <form action="{{route('admin.doctor.create')}}" method="post" enctype="multipart/form-data"
                          id="doctorForm">
                        @csrf
                        <div class="add-wrap">
                            <div class="form-group form-focus">
                                <input type="text" class="form-control floating" name="name">
                                <label class="focus-label">Doktor Adı <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-group form-focus">
                                <input type="text" class="form-control floating" name="email">
                                <label class="focus-label">E-Posta <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-group">
                                <select class="select" name="department_id">
                                    <option>Bölümü</option>
                                    @foreach($departments as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group form-focus">
                                <input type="text" class="form-control floating" name="phone_number">
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
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="select" name="district_id" id="disctrict_id">
                                    <option>İlçe</option>

                                </select>
                            </div>
                            <div class="form-group form-focus">
                                <input type="date" class="form-control floating" name="licance_start">
                                <label class="focus-label">Lisans Başlangıç<span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="form-group form-focus">
                                <input type="date" class="form-control floating" name="licance_end">
                                <label class="focus-label">Lisans Bitiş<span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="submit-section">
                                <button type="button" onclick="formSubmit()" class="btn btn-primary btn-save">
                                    Kaydet
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade contentmodal" id="deleteModal" tabindex="-1" aria-hidden="true">
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

@endsection

@section('js')
    <script>

        function formSubmit() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{route('admin.doctor.create')}}',
                data: $('#doctorForm').serialize(),
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    $('#errorAlert').show();
                    var i = 0;
                    $.each(errors.errors, function (key, value) {
                        i++;
                        $('#messageArea').append("<li>" + i + "-> " + value + "</li>");

                    });

                },
                success: function (data) {
                    if (data.status === 'success') {
                        alert('Yeni Doktor Kaydı Yapıldı');
                        window.location.reload();
                    }

                }
            })
        }

        function addHref(id) {
            $("#yesNo").attr("href", '{{url('/admin/delete-doctor/')}}' + '/' + id)
        }

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

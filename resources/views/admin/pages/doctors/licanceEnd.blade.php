@extends('admin.MasterPage')


@section('content')
    <div class="content container-fluid">


        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-md-12 d-flex justify-content-end">
                    <div class="doc-badge me-3">Toplam Doktor <span class="ms-1">{{count($doctors)}}</span></div>
                    <div class="SortBy">
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header mb-2">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title">Lisansı Bitmiş Doktorlar</h5>
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
                                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                                    data-bs-target="#updateModal"
                                                    onclick="addDoctorId({{$doctor->id}})">Lisans Süresi Uzat
                                            </button>
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

    <div class="modal fade contentmodal" id="updateModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content doctor-profile">
                <div class="modal-header">
                    <h3 class="mb-0">Lisans Süresi Güncelleme</h3>
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                            class="feather-x-circle"></i></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('doctor.licance.update')}}" method="post" enctype="multipart/form-data"
                          id="licanceUpdate">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input name="doctor_id" id="doctor_id" type="hidden">
                                <label>Bir Sonraki Lisans Bitiş Tarihi</label>
                                <input type="date" class="form-control" name="licance_end">
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-success" onclick="formSubmit()">Güncelle</button>
                    <button class="btn btn-outline-danger" data-bs-dismiss="modal">İptal</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>

        function formSubmit() {
            $('#licanceUpdate').submit();
        }

        function addDoctorId(id) {
            $('#doctor_id').val(id);
        }

    </script>
@endsection

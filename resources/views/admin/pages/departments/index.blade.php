@extends('admin.MasterPage')


@section('content')
    <div class="content container-fluid">


        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-md-12 d-flex justify-content-end">
                    <div class="doc-badge me-3">Toplam Bölüm <span class="ms-1">{{count($departments)}}</span></div>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addDepartment">Yeni
                        Bölüm
                    </button>

                </div>

            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title">Bölümler</h5>
                            </div>
                            <div class="col-auto d-flex flex-wrap">
                                <div class="form-custom me-2">
                                    <div id="tableSearch" class="dataTables_wrapper"></div>
                                </div>

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
                                    <th>İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($departments as $department)
                                    <tr>
                                        <td>{{$department->id}}</td>
                                        <td>{{$department->name}}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm float-end">
                                                <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">İşlem
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                       onclick="editDepartment({{$department->id}})">Düzenle</a>

                                                    <a class="dropdown-item" data-bs-toggle="modal"
                                                       data-bs-target="#deleteModal"
                                                       onclick="addHref({{$department->id}})"
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

    <div class="modal fade contentmodal" id="addDepartment" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content doctor-profile">
                <div class="modal-header">
                    <h3 class="mb-0">Yeni Bölüm Kayıt</h3>
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                            class="feather-x-circle"></i></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.department.create')}}" method="post" enctype="multipart/form-data"
                          id="doctorForm">
                        @csrf
                        <div class="add-wrap">
                            <div class="form-group form-focus">
                                <input type="text" class="form-control floating" name="name">
                                <label class="focus-label">Bölüm Adı <span class="text-danger">*</span></label>
                            </div>

                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary btn-save">
                                    Kaydet
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade contentmodal" id="editDepartment" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content doctor-profile">
                <div class="modal-header">
                    <h3 class="mb-0">Bölüm Bilgisi Güncelleme</h3>
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                            class="feather-x-circle"></i></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.department.update')}}" method="post" enctype="multipart/form-data"
                          id="doctorForm">
                        @csrf
                        <div class="add-wrap">
                            <div class="form-group form-focus">
                                <input type="hidden" class="form-control floating" name="id" id="department_id">

                                <input type="text" class="form-control floating" name="name" id="department_name">
                                <label class="focus-label">Bölüm Adı <span class="text-danger">*</span></label>
                            </div>

                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary btn-save">
                                    Kaydet
                                </button>
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

        function editDepartment(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: '{{url('admin/departments/edit/',)}}' + '/' + id,
                error: function (data) {
                    alert('Bir Hata Oluştu Daha Sonra Tekrar Deneyiniz');
                },
                success: function (data) {
                    $('#editDepartment').modal('show');
                    $('#department_name').val(data.data.name);
                    $('#department_id').val(data.data.id);

                }
            })
        }

        function addHref(id) {
            $("#yesNo").attr("href", '{{url('/admin/departments/delete/')}}' + '/' + id)
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

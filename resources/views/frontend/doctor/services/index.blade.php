@extends('frontend.MasterPage')


<form id="accounts_form" method="post" action="{{route('doctor.service.add')}}">
    @csrf
    <div class="modal fade custom-modal" id="account_modal" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Hizmet Bilgileri</h3>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Hizmet Adı</label>
                                <input type="text" name="service_name" class="form-control"
                                       placeholder="Hizmet Adı Giriniz">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="submit" id="acc_btn" class="btn btn-primary">Kaydet</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form id="edit_form" method="post" action="{{route('doctor.service.update')}}">
    @csrf
    <div class="modal fade custom-modal" id="edit_modal" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Hizmet Bilgileri</h3>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Hizmet Adı</label>
                                <input type="text" name="service_name" id="service_name" class="form-control"
                                       placeholder="Hizmet Adı Giriniz">
                                <input type="hidden" name="service_id" id="service_id" class="form-control"
                                       placeholder="Hizmet Adı Giriniz">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="submit" id="acc_btn" class="btn btn-primary">Kaydet</button>
                </div>
            </div>
        </div>
    </div>
</form>

@section('content')

    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Anasayfa</a></li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Hizmetlerim</h2>
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
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#account_modal" data-bs-toggle="modal" class="btn btn-success btn-sm"
                               style="float: right"><i class="fa fa-plus"></i> Yeni
                                Hizmet
                            </a>
                            <h4 class="mb-4">Hizmetlerim</h4>
                            <div class="appointment-tab">
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="upcoming-appointments">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                        <tr>
                                                            <th>Hizmet</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($services as $service)
                                                            <tr>
                                                                <td>{{$service->name}}</td>
                                                                <td>
                                                                    <button class="btn btn-primary"><i
                                                                            class="fa fa-edit"
                                                                            onclick="editService({{$service->id}})"></i>
                                                                    </button>

                                                                    <button class="btn btn-danger"><i
                                                                            class="fa fa-minus" onclick="deleteService({{$service->id}})"></i></button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        function editService(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: '{{url('doctor/service/edit')}}' + '/' + id,
                error: function (data) {
                    alert('Bir Hata oluştu')
                },
                success: function (data) {
                    $("#edit_modal").modal('show');
                    $("#service_name").val(data.data.name);
                    $("#service_id").val(data.data.id);
                }
            })
        }
    </script>

    <script>
        function deleteService(id) {
            Swal.fire({
                title: 'Eminmisiniz ?',
                text: "Silinen Kayıt Geri Alınamaz!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet, sil!',
                cancelButtonText: 'İptal!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{url('doctor/service/delete/')}}" + '/' + id;
                    ü
                }
            })
        }
    </script>

@endsection


@extends('frontend.MasterPage')

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
                    <h2 class="breadcrumb-title">Çalışma Saatleri</h2>
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
                            <h4 class="mb-4">Çalışma Saatleri</h4>
                            <div class="appointment-tab">
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="upcoming-appointments">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <form method="post" action="{{route('doctor.workHours.save')}}">
                                                    @csrf
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-center mb-0">
                                                            <thead>
                                                            <tr>
                                                                <th>Günler</th>
                                                                <th>Açılış Saati</th>
                                                                <th>Kapanış Saati</th>
                                                                <th>Kapalı</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    Pazartesi
                                                                </td>
                                                                <td>
                                                                    <input type="time" class="form-control"
                                                                           name="startDate[]"
                                                                           value="{{$hours[0]->hour_start}}">
                                                                </td>
                                                                <td>
                                                                    <input type="time" class="form-control"
                                                                           name="endDate[]"
                                                                           value="{{$hours[0]->hour_end}}">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="closed[]">
                                                                        <option value="0"
                                                                                @if($hours[0]->is_closed==0) selected @endif>
                                                                            Hayır
                                                                        </option>
                                                                        <option value="1"
                                                                                @if($hours[0]->is_closed==1) selected @endif>
                                                                            Evet
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Salı
                                                                </td>
                                                                <td>
                                                                    <input type="time" class="form-control"
                                                                           name="startDate[]"
                                                                           value="{{$hours[1]->hour_start}}">
                                                                </td>
                                                                <td>
                                                                    <input type="time" class="form-control"
                                                                           name="endDate[]"
                                                                           value="{{$hours[1]->hour_end}}">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="closed[]">
                                                                        <option value="0"@if($hours[1]->is_closed==0) selected @endif>Hayır</option>
                                                                        <option value="1"@if($hours[1]->is_closed==1) selected @endif>Evet</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Çarşamba
                                                                </td>
                                                                <td>
                                                                    <input type="time" class="form-control"
                                                                           name="startDate[]"
                                                                           value="{{$hours[2]->hour_start}}">
                                                                </td>
                                                                <td>
                                                                    <input type="time" class="form-control"
                                                                           name="endDate[]"
                                                                           value="{{$hours[2]->hour_end}}">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="closed[]">
                                                                        <option value="0"@if($hours[2]->is_closed==0) selected @endif>Hayır</option>
                                                                        <option value="1"@if($hours[2]->is_closed==1) selected @endif>Evet</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Perşembe
                                                                </td>
                                                                <td>
                                                                    <input type="time" class="form-control"
                                                                           name="startDate[]"
                                                                           value="{{$hours[3]->hour_start}}">
                                                                </td>
                                                                <td>
                                                                    <input type="time" class="form-control"
                                                                           name="endDate[]"
                                                                           value="{{$hours[3]->hour_end}}">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="closed[]">
                                                                        <option value="0"@if($hours[3]->is_closed==0) selected @endif>Hayır</option>
                                                                        <option value="1"@if($hours[3]->is_closed==1) selected @endif>Evet</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Cuma
                                                                </td>
                                                                <td>
                                                                    <input type="time" class="form-control"
                                                                           name="startDate[]"
                                                                           value="{{$hours[4]->hour_start}}">
                                                                </td>
                                                                <td>
                                                                    <input type="time" class="form-control"
                                                                           name="endDate[]"
                                                                           value="{{$hours[4]->hour_end}}">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="closed[]">
                                                                        <option value="0"@if($hours[4]->is_closed==0) selected @endif>Hayır</option>
                                                                        <option value="1"@if($hours[4]->is_closed==1) selected @endif>Evet</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Cumartesi
                                                                </td>
                                                                <td>
                                                                    <input type="time" class="form-control"
                                                                           name="startDate[]"
                                                                           value="{{$hours[5]->hour_start}}">
                                                                </td>
                                                                <td>
                                                                    <input type="time" class="form-control"
                                                                           name="endDate[]"
                                                                           value="{{$hours[5]->hour_end}}">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="closed[]">
                                                                        <option value="0"@if($hours[5]->is_closed==0) selected @endif>Hayır</option>
                                                                        <option value="1"@if($hours[5]->is_closed==1) selected @endif>Evet</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Pazar
                                                                </td>
                                                                <td>
                                                                    <input type="time" class="form-control"
                                                                           name="startDate[]"
                                                                           value="{{$hours[6]->hour_start}}">
                                                                </td>
                                                                <td>
                                                                    <input type="time" class="form-control"
                                                                           name="endDate[]"
                                                                           value="{{$hours[6]->hour_end}}">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="closed[]">
                                                                        <option value="0"@if($hours[6]->is_closed==0) selected @endif>Hayır</option>
                                                                        <option value="1"@if($hours[6]->is_closed==1) selected @endif>Evet</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                            <tfoot>
                                                            <tr colspan="7">
                                                                <td>
                                                                    <button class="btn btn-outline-primary btn-block"
                                                                            type="submit">
                                                                        Kaydet
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane" id="today-appointments">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                        <tr>
                                                            <th>Patient Name</th>
                                                            <th>Appt Date</th>
                                                            <th>Purpose</th>
                                                            <th>Type</th>
                                                            <th class="text-center">Paid Amount</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html"
                                                                       class="avatar avatar-sm me-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="assets/img/patients/patient6.jpg"
                                                                            alt="User Image"></a>
                                                                    <a href="patient-profile.html">Elsie Gilley <span>#PT0006</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>14 Nov 2019 <span
                                                                    class="d-block text-info">6.00 PM</span></td>
                                                            <td>Fever</td>
                                                            <td>Old Patient</td>
                                                            <td class="text-center">$300</td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html"
                                                                       class="avatar avatar-sm me-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="assets/img/patients/patient7.jpg"
                                                                            alt="User Image"></a>
                                                                    <a href="patient-profile.html">Joan Gardner <span>#PT0006</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>14 Nov 2019 <span
                                                                    class="d-block text-info">5.00 PM</span></td>
                                                            <td>General</td>
                                                            <td>Old Patient</td>
                                                            <td class="text-center">$100</td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html"
                                                                       class="avatar avatar-sm me-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="assets/img/patients/patient8.jpg"
                                                                            alt="User Image"></a>
                                                                    <a href="patient-profile.html">Daniel Griffing
                                                                        <span>#PT0007</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>14 Nov 2019 <span
                                                                    class="d-block text-info">3.00 PM</span></td>
                                                            <td>General</td>
                                                            <td>New Patient</td>
                                                            <td class="text-center">$75</td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html"
                                                                       class="avatar avatar-sm me-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="assets/img/patients/patient9.jpg"
                                                                            alt="User Image"></a>
                                                                    <a href="patient-profile.html">Walter Roberson
                                                                        <span>#PT0008</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>14 Nov 2019 <span
                                                                    class="d-block text-info">1.00 PM</span></td>
                                                            <td>General</td>
                                                            <td>Old Patient</td>
                                                            <td class="text-center">$350</td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html"
                                                                       class="avatar avatar-sm me-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="assets/img/patients/patient10.jpg"
                                                                            alt="User Image"></a>
                                                                    <a href="patient-profile.html">Robert Rhodes <span>#PT0010</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>14 Nov 2019 <span
                                                                    class="d-block text-info">10.00 AM</span></td>
                                                            <td>General</td>
                                                            <td>New Patient</td>
                                                            <td class="text-center">$175</td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html"
                                                                       class="avatar avatar-sm me-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="assets/img/patients/patient11.jpg"
                                                                            alt="User Image"></a>
                                                                    <a href="patient-profile.html">Harry Williams <span>#PT0011</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>14 Nov 2019 <span
                                                                    class="d-block text-info">11.00 AM</span></td>
                                                            <td>General</td>
                                                            <td>New Patient</td>
                                                            <td class="text-center">$450</td>
                                                            <td class="text-end">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
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



@extends('frontend.MasterPage')

@section('content')

    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-light">Doktor Proifili</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">{{$doctor->name}}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">

            <div class="card">
                <div class="card-body">
                    <div class="doctor-widget">
                        <div class="doc-info-left">
                            <div class="doctor-img">
                                @if(empty($doctor->image))
                                    <img src="{{asset('assets/no_image.jpeg')}}" class="img-fluid">
                                @else
                                    <img src="{{asset($doctor->image)}}" style="max-height: 210px"
                                         class="img-fluid">
                                @endif
                            </div>
                            <div class="doc-info-cont">
                                <h4 class="doc-name">{{$doctor->name}}</h4>
                                <p class="doc-speciality">{{!empty($doctor->details->description)}}</p>
                                <p class="doc-department">{{!empty($doctor->departments->name)}}</p>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(35)</span>
                                </div>
                                <div class="clinic-details">
                                    <p class="doc-location"><i
                                            class="fas fa-map-marker-alt"></i> {{$doctor->district->name}}
                                        - {{$doctor->city->name}} </p>
                                </div>

                            </div>
                        </div>
                        <div class="doc-info-right">
                            <div class="clini-infos">
                                <ul>
                                    @if($doctor->like != 0 && $doctor->dislike!=0)
                                        <li><i class="far fa-thumbs-up"></i> {{ceil(($doctor->like * 100)/($doctor->like+$doctor->dislike))}}
                                            %</li>
                                    @else
                                        <li><i class="far fa-thumbs-up"></i> 0</li>
                                    @endif
                                    <li><i class="far fa-comment"></i> 0 Yorum</li>
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i> {{$doctor->district->name.'-'.$doctor->city->name}}
                                    </li>
                                    <li><i class="far fa-money-bill-alt"></i> {{!empty($doctor->details->avarage_price)}} </li>
                                </ul>
                            </div>
                            <div class="clinic-booking">
                                <a class="apt-btn" href="booking.html">Randevu Defteri</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body pt-0">

                    <nav class="user-tabs mb-4">
                        <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" href="#doc_overview" data-bs-toggle="tab">Genel Bilgiler</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_locations" data-bs-toggle="tab">Lokasyon</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_reviews" data-bs-toggle="tab">Yorumlar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_business_hours" data-bs-toggle="tab">Çalışma Saatleri</a>
                            </li>
                        </ul>
                    </nav>


                    <div class="tab-content pt-0">

                        <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-md-12 col-lg-9">

                                    <div class="widget about-widget">
                                        <h4 class="widget-title">Doktor Hakkında</h4>
                                        <p>
                                            {{!empty($doctor->details->about)}}
                                        </p>
                                    </div>

                                    <div class="service-list">
                                        <h4>Hizmetler</h4>
                                        <ul class="clearfix">
                                            @foreach($doctor->services as $service)
                                                <li>{{$service->name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div role="tabpanel" id="doc_locations" class="tab-pane fade">


                            <div class="location-list">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="clinic-content">
                                            <h4 class="clinic-name"><a href="#">Smile Cute Dental Care Center</a></h4>
                                            <p class="doc-speciality">MDS - Periodontology and Oral Implantology,
                                                BDS</p>
                                            <div class="rating">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="d-inline-block average-rating">(4)</span>
                                            </div>
                                            <div class="clinic-details mb-0">
                                                <h5 class="clinic-direction"><i class="fas fa-map-marker-alt"></i> 2286
                                                    Sundown Lane, Austin, Texas 78749, USA <br><a
                                                        href="javascript:void(0);">Get Directions</a></h5>
                                                <ul>
                                                    <li>
                                                        <a href="assets/img/features/feature-01.jpg"
                                                           data-fancybox="gallery2">
                                                            <img src="assets/img/features/feature-01.jpg"
                                                                 alt="Feature Image">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="assets/img/features/feature-02.jpg"
                                                           data-fancybox="gallery2">
                                                            <img src="assets/img/features/feature-02.jpg"
                                                                 alt="Feature Image">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="assets/img/features/feature-03.jpg"
                                                           data-fancybox="gallery2">
                                                            <img src="assets/img/features/feature-03.jpg"
                                                                 alt="Feature Image">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="assets/img/features/feature-04.jpg"
                                                           data-fancybox="gallery2">
                                                            <img src="assets/img/features/feature-04.jpg"
                                                                 alt="Feature Image">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="clinic-timing">
                                            <div>
                                                <p class="timings-days">
                                                    <span> Mon - Sat </span>
                                                </p>
                                                <p class="timings-times">
                                                    <span>10:00 AM - 2:00 PM</span>
                                                    <span>4:00 PM - 9:00 PM</span>
                                                </p>
                                            </div>
                                            <div>
                                                <p class="timings-days">
                                                    <span>Sun</span>
                                                </p>
                                                <p class="timings-times">
                                                    <span>10:00 AM - 2:00 PM</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="consult-price">
                                            $250
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="location-list">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="clinic-content">
                                            <h4 class="clinic-name"><a href="#">The Family Dentistry Clinic</a></h4>
                                            <p class="doc-speciality">MDS - Periodontology and Oral Implantology,
                                                BDS</p>
                                            <div class="rating">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="d-inline-block average-rating">(4)</span>
                                            </div>
                                            <div class="clinic-details mb-0">
                                                <p class="clinic-direction"><i class="fas fa-map-marker-alt"></i> 2883
                                                    University Street, Seattle, Texas Washington, 98155 <br><a
                                                        href="javascript:void(0);">Get Directions</a></p>
                                                <ul>
                                                    <li>
                                                        <a href="assets/img/features/feature-01.jpg"
                                                           data-fancybox="gallery2">
                                                            <img src="assets/img/features/feature-01.jpg"
                                                                 alt="Feature Image">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="assets/img/features/feature-02.jpg"
                                                           data-fancybox="gallery2">
                                                            <img src="assets/img/features/feature-02.jpg"
                                                                 alt="Feature Image">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="assets/img/features/feature-03.jpg"
                                                           data-fancybox="gallery2">
                                                            <img src="assets/img/features/feature-03.jpg"
                                                                 alt="Feature Image">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="assets/img/features/feature-04.jpg"
                                                           data-fancybox="gallery2">
                                                            <img src="assets/img/features/feature-04.jpg"
                                                                 alt="Feature Image">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="clinic-timing">
                                            <div>
                                                <p class="timings-days">
                                                    <span> Tue - Fri </span>
                                                </p>
                                                <p class="timings-times">
                                                    <span>11:00 AM - 1:00 PM</span>
                                                    <span>6:00 PM - 11:00 PM</span>
                                                </p>
                                            </div>
                                            <div>
                                                <p class="timings-days">
                                                    <span>Sat - Sun</span>
                                                </p>
                                                <p class="timings-times">
                                                    <span>8:00 AM - 10:00 AM</span>
                                                    <span>3:00 PM - 7:00 PM</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="consult-price">
                                            $350
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div role="tabpanel" id="doc_reviews" class="tab-pane fade">

                            <div class="widget review-listing">
                                <ul class="comments-list">

                                    <li>
                                        <div class="comment">
                                            <img class="avatar avatar-sm rounded-circle" alt="User Image"
                                                 src="assets/img/patients/patient.jpg">
                                            <div class="comment-body">
                                                <div class="meta-data">
                                                    <span class="comment-author">Richard Wilson</span>
                                                    <span class="comment-date">Reviewed 2 Days ago</span>
                                                    <div class="review-count rating">
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                </div>
                                                <p class="recommended"><i class="far fa-thumbs-up"></i> I recommend the
                                                    doctor</p>
                                                <p class="comment-content">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    Ut enim ad minim veniam, quis nostrud exercitation.
                                                    Curabitur non nulla sit amet nisl tempus
                                                </p>
                                                <div class="comment-reply">
                                                    <a class="comment-btn" href="#">
                                                        <i class="fas fa-reply"></i> Reply
                                                    </a>
                                                    <p class="recommend-btn">
                                                        <span>Recommend?</span>
                                                        <a href="#" class="like-btn">
                                                            <i class="far fa-thumbs-up"></i> Yes
                                                        </a>
                                                        <a href="#" class="dislike-btn">
                                                            <i class="far fa-thumbs-down"></i> No
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="comments-reply">
                                            <li>
                                                <div class="comment">
                                                    <img class="avatar avatar-sm rounded-circle" alt="User Image"
                                                         src="assets/img/patients/patient1.jpg">
                                                    <div class="comment-body">
                                                        <div class="meta-data">
                                                            <span class="comment-author">Charlene Reed</span>
                                                            <span class="comment-date">Reviewed 3 Days ago</span>
                                                            <div class="review-count rating">
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <p class="comment-content">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                            sed do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua.
                                                            Ut enim ad minim veniam.
                                                            Curabitur non nulla sit amet nisl tempus
                                                        </p>
                                                        <div class="comment-reply">
                                                            <a class="comment-btn" href="#">
                                                                <i class="fas fa-reply"></i> Reply
                                                            </a>
                                                            <p class="recommend-btn">
                                                                <span>Recommend?</span>
                                                                <a href="#" class="like-btn">
                                                                    <i class="far fa-thumbs-up"></i> Yes
                                                                </a>
                                                                <a href="#" class="dislike-btn">
                                                                    <i class="far fa-thumbs-down"></i> No
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>

                                    </li>


                                    <li>
                                        <div class="comment">
                                            <img class="avatar avatar-sm rounded-circle" alt="User Image"
                                                 src="assets/img/patients/patient2.jpg">
                                            <div class="comment-body">
                                                <div class="meta-data">
                                                    <span class="comment-author">Travis Trimble</span>
                                                    <span class="comment-date">Reviewed 4 Days ago</span>
                                                    <div class="review-count rating">
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                </div>
                                                <p class="comment-content">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    Ut enim ad minim veniam, quis nostrud exercitation.
                                                    Curabitur non nulla sit amet nisl tempus
                                                </p>
                                                <div class="comment-reply">
                                                    <a class="comment-btn" href="#">
                                                        <i class="fas fa-reply"></i> Reply
                                                    </a>
                                                    <p class="recommend-btn">
                                                        <span>Recommend?</span>
                                                        <a href="#" class="like-btn">
                                                            <i class="far fa-thumbs-up"></i> Yes
                                                        </a>
                                                        <a href="#" class="dislike-btn">
                                                            <i class="far fa-thumbs-down"></i> No
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>

                                <div class="all-feedback text-center">
                                    <a href="#" class="btn btn-primary btn-sm">
                                        Show all feedback <strong>(167)</strong>
                                    </a>
                                </div>


                            </div>


                            <div class="write-review">
                                <h4>Write a review for <strong>Dr. Darren Elder</strong></h4>

                                <form>
                                    <div class="form-group">
                                        <label>Review</label>
                                        <div class="star-rating">
                                            <input id="star-5" type="radio" name="rating" value="star-5">
                                            <label for="star-5" title="5 stars">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                            <input id="star-4" type="radio" name="rating" value="star-4">
                                            <label for="star-4" title="4 stars">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                            <input id="star-3" type="radio" name="rating" value="star-3">
                                            <label for="star-3" title="3 stars">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                            <input id="star-2" type="radio" name="rating" value="star-2">
                                            <label for="star-2" title="2 stars">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                            <input id="star-1" type="radio" name="rating" value="star-1">
                                            <label for="star-1" title="1 star">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Title of your review</label>
                                        <input class="form-control" type="text"
                                               placeholder="If you could say it in one sentence, what would you say?">
                                    </div>
                                    <div class="form-group">
                                        <label>Your review</label>
                                        <textarea id="review_desc" maxlength="100" class="form-control"></textarea>
                                        <div class="d-flex justify-content-between mt-3"><small class="text-muted"><span
                                                    id="chars">100</span> characters remaining</small></div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="terms-accept">
                                            <div class="custom-checkbox">
                                                <input type="checkbox" id="terms_accept">
                                                <label for="terms_accept">I have read and accept <a href="#">Terms &amp;
                                                        Conditions</a></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section">
                                        <button type="submit" class="btn btn-primary submit-btn">Add Review</button>
                                    </div>
                                </form>

                            </div>

                        </div>


                        <div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">

                                    <div class="widget business-widget">
                                        <div class="widget-content">
                                            <div class="listing-hours">
                                                <div class="listing-day current">
                                                    <div class="day">Bugün
                                                        <span>{{\Carbon\Carbon::now()->format('d-m-Y').' '.$days[(\Carbon\Carbon::now()->dayOfWeek+1)]}}</span>
                                                    </div>
                                                    <div class="time-items">
                                                        @if(!empty($doctor->hours[\Carbon\Carbon::now()->dayOfWeek]->is_closed) && $doctor->hours[\Carbon\Carbon::now()->dayOfWeek]->is_closed == 0 )
                                                            <span class="open-status"><span
                                                                    class="badge bg-success-light">Açık</span>
                                                            </span>
                                                            <span class="time">
                                                                {{substr($doctor->hours[\Carbon\Carbon::now()->dayOfWeek]->hour_start,0,5).' - '.substr($doctor->hours[\Carbon\Carbon::now()->dayOfWeek]->hour_end,0,5)}}
                                                            </span>

                                                        @else
                                                            <span class="time"><span
                                                                    class="badge bg-danger-light">Kapalı</span></span>
                                                        @endif
                                                    </div>
                                                </div>
                                                @foreach($doctor->hours as $key => $row)

                                                    @if($row->is_closed == 0)
                                                        <div class="listing-day">
                                                            <div class="day">{{$days[($key+1)]}}</div>
                                                            <div class="time-items">
                                                            <span
                                                                class="time">{{substr($row->hour_start,0,5) .' - '.substr($row->hour_end,0,5)}}
                                                            </span>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="listing-day closed">
                                                            <div class="day">{{$days[($key+1)]}}</div>
                                                            <div class="time-items">
                                                        <span class="time"><span
                                                                class="badge bg-danger-light">Kapalı</span></span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
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



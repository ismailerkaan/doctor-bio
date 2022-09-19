@extends('frontend.MasterPage')


@section('content')
    <section class="section section-search">
        <div class="container-fluid">
            <div class="banner-wrapper">
                <div class="banner-header text-center aos" data-aos="fade-up">
                    <h1>Doktor Ara, Randevu Al</h1>
                    <p>Size en yakın şehirdeki en iyi doktorları, kliniği ve hastaneyi keşfedin.</p>
                </div>

                <div class="search-box aos" data-aos="fade-up" style="margin-left: -10%">
                    <form action="#">
                        <div class="form-group search-location">
                            {{--                            <input type="text" class="form-control" placeholder="İl">--}}
                            <select class="form-control" name="city_id" onchange="getDistrict(this)">
                                <option>İl</option>
                                @foreach($citys as $city)
                                    <option value="{{$city->number_plate}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                            <span class="form-text">Hangi İl'de ?</span>
                        </div>
                        <div class="form-group search-location">
                            <select class="form-control" name="district_id" id="disctrict_id">
                                <option>İlçe</option>

                            </select>
                            <span class="form-text">Hangi İlçe'de ?</span>
                        </div>
                        <div class="form-group search-info">
                            <select class="form-control" name="department" id="department">
                                <option>Bölüm</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>

                                @endforeach
                            </select>
                            <span class="form-text">Hangi Bölüm ?</span>
                        </div>
                        <button type="submit" class="btn btn-primary search-btn mt-0"><i class="fas fa-search"></i>
                            <span>Ara</span></button>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <section class="section home-tile-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 m-auto">
                    <div class="section-header text-center aos" data-aos="fade-up">
                        <h2>Ne Arıyorsun?</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 mb-3 aos" data-aos="fade-up">
                            <div class="card text-center doctor-book-card">
                                <img src="{{asset('assets/frontend/img/doctors/doctor-07.jpg')}}" alt=""
                                     class="img-fluid">
                                <div class="doctor-book-card-content tile-card-content-1">
                                    <div>
                                        <h3 class="card-title mb-0">Visit a Doctor</h3>
                                        <a href="search.html" class="btn book-btn1 px-3 py-2 mt-3 btn-one-light"
                                           tabindex="0">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3 aos" data-aos="fade-up">
                            <div class="card text-center doctor-book-card">
                                <img src="{{asset('assets/frontend/img/img-pharmacy1.jpg')}}" alt="" class="img-fluid">
                                <div class="doctor-book-card-content tile-card-content-1">
                                    <div>
                                        <h3 class="card-title mb-0">Find a Pharmacy</h3>
                                        <a href="pharmacy-search.html"
                                           class="btn book-btn1 px-3 py-2 mt-3 btn-one-light" tabindex="0">Find Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3 aos" data-aos="fade-up">
                            <div class="card text-center doctor-book-card">
                                <img src="{{asset('assets/frontend/img/lab-image.jpg')}}" alt="" class="img-fluid">
                                <div class="doctor-book-card-content tile-card-content-1">
                                    <div>
                                        <h3 class="card-title mb-0">Find a Lab</h3>
                                        <a href="javascript:void(0);" class="btn book-btn1 px-3 py-2 mt-3 btn-one-light"
                                           tabindex="0">Coming Soon</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-specialities">
        <div class="container-fluid">
            <div class="section-header text-center aos" data-aos="fade-up">
                <h2>Klinik ve Uzmanlıklar</h2>
                <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-9 aos" data-aos="fade-up">

                    <div class="specialities-slider slider">

                        <div class="speicality-item text-center">
                            <div class="speicality-img">
                                <img src="{{asset('assets/frontend/img/specialities/specialities-01.png')}}"
                                     class="img-fluid" alt="Speciality">
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                            </div>
                            <p>Urology</p>
                        </div>


                        <div class="speicality-item text-center">
                            <div class="speicality-img">
                                <img src="{{asset('assets/frontend/img/specialities/specialities-02.png')}}"
                                     class="img-fluid" alt="Speciality">
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                            </div>
                            <p>Neurology</p>
                        </div>


                        <div class="speicality-item text-center">
                            <div class="speicality-img">
                                <img src="{{asset('assets/frontend/img/specialities/specialities-03.png')}}"
                                     class="img-fluid" alt="Speciality">
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                            </div>
                            <p>Orthopedic</p>
                        </div>


                        <div class="speicality-item text-center">
                            <div class="speicality-img">
                                <img src="{{asset('assets/frontend/img/specialities/specialities-04.png')}}"
                                     class="img-fluid" alt="Speciality">
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                            </div>
                            <p>Cardiologist</p>
                        </div>


                        <div class="speicality-item text-center">
                            <div class="speicality-img">
                                <img src="{{asset('assets/frontend/img/specialities/specialities-05.png')}}"
                                     class="img-fluid" alt="Speciality">
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                            </div>
                            <p>Dentist</p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="section section-doctor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-header aos" data-aos="fade-up">
                        <h2>Doktorunuzu Ayırtın</h2>
                        <p>Lorem Ipsum is simply dummy text </p>
                    </div>
                    <div class="about-content aos" data-aos="fade-up">
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout. The point of using Lorem Ipsum.</p>
                        <p>web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem
                            ipsum' will uncover many web sites still in their infancy. Various versions have evolved
                            over the years, sometimes</p>
                        <a href="javascript:;">Doktorlar</a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="doctor-slider slider aos" data-aos="fade-up">

                        @foreach($doctors as $doctor)
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="{{route('doctors.profile',$doctor->id)}}">
                                        @if(empty($doctor->image))
                                            <img src="{{asset('assets/no_image.jpeg')}}" class="img-fluid">
                                        @else
                                            <img src="{{asset($doctor->image)}}" style="max-height: 210px"
                                                 class="img-fluid">
                                        @endif
                                    </a>

                                </div>
                                <div class="pro-content">
                                    <h3 class="title">
                                        <a href="{{route('doctors.profile',$doctor->id)}}">{{$doctor->name}}</a>
                                        <i class="fas fa-check-circle verified"></i>
                                    </h3>
                                    <p class="speciality">{{$doctor->departments->name}}</p>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star "></i>
                                        <span class="d-inline-block average-rating">(17)</span>
                                    </div>
                                    <ul class="available-info">
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i> {{$doctor->district->name.'-'.$doctor->city->name}}
                                        </li>
                                        <li>
                                            <i class="far fa-money-bill-alt"></i>
                                            @if(!empty($doctor->details->avarage_price))
                                                {{$doctor->details->avarage_price.'₺'}}
                                            @else
                                                Belirtilmemiş
                                            @endif
                                            <i class="fas fa-info-circle" data-bs-toggle="tooltip"
                                               title="Fiyatlar ortalama fiyat olup net fiyat için lüften doktorlar ile iletişime geçin"></i>
                                        </li>
                                    </ul>
                                    <div class="row row-sm">
                                        <div class="col-6">
                                            <a href="doctor-profile.html" class="btn view-btn">Profili İncele</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="booking.html" class="btn book-btn">Randevu Al</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section section-features">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 features-img aos" data-aos="fade-up">
                    <img src="{{asset('assets/frontend/img/features/feature.png')}}" class="img-fluid" alt="Feature">
                </div>
                <div class="col-md-7">
                    <div class="section-header aos" data-aos="fade-up">
                        <h2 class="mt-2">Availabe Features in Our Clinic</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout. </p>
                    </div>
                    <div class="features-slider slider aos" data-aos="fade-up">

                        <div class="feature-item text-center">
                            <img src="{{asset('assets/frontend/img/features/feature-01.jpg')}}" class="img-fluid"
                                 alt="Feature">
                            <p>Patient Ward</p>
                        </div>


                        <div class="feature-item text-center">
                            <img src="{{asset('assets/frontend/img/features/feature-02.jpg')}}" class="img-fluid"
                                 alt="Feature">
                            <p>Test Room</p>
                        </div>


                        <div class="feature-item text-center">
                            <img src="{{asset('assets/frontend/img/features/feature-03.jpg')}}" class="img-fluid"
                                 alt="Feature">
                            <p>ICU</p>
                        </div>


                        <div class="feature-item text-center">
                            <img src="{{asset('assets/frontend/img/features/feature-04.jpg')}}" class="img-fluid"
                                 alt="Feature">
                            <p>Laboratory</p>
                        </div>


                        <div class="feature-item text-center">
                            <img src="{{asset('assets/frontend/img/features/feature-05.jpg')}}" class="img-fluid"
                                 alt="Feature">
                            <p>Operation</p>
                        </div>


                        <div class="feature-item text-center">
                            <img src="{{asset('assets/frontend/img/features/feature-06.jpg')}}" class="img-fluid"
                                 alt="Feature">
                            <p>Medical</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-blogs">
        <div class="container-fluid">

            <div class="section-header text-center aos" data-aos="fade-up">
                <h2>Blogs and News</h2>
                <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua.</p>
            </div>

            <div class="row blog-grid-row aos" data-aos="fade-up">
                <div class="col-md-6 col-lg-3 col-sm-12">

                    <div class="blog grid-blog">
                        <div class="blog-image">
                            <a href="blog-details.html"><img class="img-fluid"
                                                             src="{{asset('assets/frontend/img/blog/blog-01.jpg')}}"
                                                             alt="Post Image"></a>
                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="doctor-profile.html"><img
                                                src="{{asset('assets/frontend/img/doctors/doctor-thumb-01.jpg')}}"
                                                alt="Post Author"> <span>Dr. Ruby Perrin</span></a>
                                    </div>
                                </li>
                                <li><i class="far fa-clock"></i> 4 Dec 2019</li>
                            </ul>
                            <h3 class="blog-title"><a href="blog-details.html">Doccure – Making your clinic painless
                                    visit?</a></h3>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod
                                tempor.</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 col-lg-3 col-sm-12">

                    <div class="blog grid-blog">
                        <div class="blog-image">
                            <a href="blog-details.html"><img class="img-fluid"
                                                             src="{{asset('assets/frontend/img/blog/blog-02.jpg')}}"
                                                             alt="Post Image"></a>
                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="doctor-profile.html"><img
                                                src="{{asset('assets/frontend/img/doctors/doctor-thumb-02.jpg')}}"
                                                alt="Post Author"> <span>Dr. Darren Elder</span></a>
                                    </div>
                                </li>
                                <li><i class="far fa-clock"></i> 3 Dec 2019</li>
                            </ul>
                            <h3 class="blog-title"><a href="blog-details.html">What are the benefits of Online Doctor
                                    Booking?</a></h3>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod
                                tempor.</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 col-lg-3 col-sm-12">

                    <div class="blog grid-blog">
                        <div class="blog-image">
                            <a href="blog-details.html"><img class="img-fluid"
                                                             src="{{asset('assets/frontend/img/blog/blog-03.jpg')}}"
                                                             alt="Post Image"></a>
                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="doctor-profile.html"><img
                                                src="{{asset('assets/frontend/img/doctors/doctor-thumb-03.jpg')}}"
                                                alt="Post Author"> <span>Dr. Deborah Angel</span></a>
                                    </div>
                                </li>
                                <li><i class="far fa-clock"></i> 3 Dec 2019</li>
                            </ul>
                            <h3 class="blog-title"><a href="blog-details.html">Benefits of consulting with an Online
                                    Doctor</a></h3>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod
                                tempor.</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 col-lg-3 col-sm-12">

                    <div class="blog grid-blog">
                        <div class="blog-image">
                            <a href="blog-details.html"><img class="img-fluid"
                                                             src="{{asset('assets/frontend/img/blog/blog-04.jpg')}}"
                                                             alt="Post Image"></a>
                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="doctor-profile.html"><img
                                                src="{{asset('assets/frontend/img/doctors/doctor-thumb-04.jpg')}}"
                                                alt="Post Author"> <span>Dr. Sofia Brient</span></a>
                                    </div>
                                </li>
                                <li><i class="far fa-clock"></i> 2 Dec 2019</li>
                            </ul>
                            <h3 class="blog-title"><a href="blog-details.html">5 Great reasons to use an Online
                                    Doctor</a></h3>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod
                                tempor.</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="view-all text-center aos" data-aos="fade-up">
                <a href="blog-list.html" class="btn btn-primary">View All</a>
            </div>
        </div>
    </section>
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

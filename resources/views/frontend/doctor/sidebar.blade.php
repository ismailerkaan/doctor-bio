@if (count($errors)>0)
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorAlert">
        @foreach ($errors->all() as $message)
            {{$message}}<br>
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="errorAlert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button>
    </div>
@endif

<div class="profile-sidebar">
    <div class="widget-profile pro-widget-content">
        <div class="profile-info-widget">
            <a href="#" class="booking-doc-img">
                <img src="{{asset(\Illuminate\Support\Facades\Auth::guard('doctor')->user()->image)}}" alt="User Image">
            </a>
            <div class="profile-det-info">
                <h3>{{\Illuminate\Support\Facades\Auth::guard('doctor')->user()->name}}</h3>
                <div class="patient-details">
                    <h5 class="mb-0">{{\Illuminate\Support\Facades\Auth::guard('doctor')->user()->departments->name}}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-widget">
        <nav class="dashboard-menu">
            <ul>
                <li class="{{Request::segment(2) =='dashboard' ? 'active ' : '' }}">
                    <a href="{{route('doctor.dashboard')}}">
                        <i class="fas fa-columns"></i>
                        <span>Anasayfa</span>
                    </a>
                </li>
                <li>
                    <a href="appointments.html">
                        <i class="fas fa-calendar-check"></i>
                        <span>Radevular</span>
                    </a>
                </li>
                <li class="{{Request::segment(2) =='services' ? 'active ' : '' }}">
                    <a href="{{route('doctor.services')}}">
                        <i class="fas fa-concierge-bell "></i>
                        <span>Hizmetlerim</span>
                    </a>
                </li>
                <li>
                    <a href="my-patients.html">
                        <i class="fas fa-user-injured"></i>
                        <span>Hastalar</span>
                    </a>
                </li>
                <li class="{{Request::segment(2)=='blog' ? 'active ' : '' }}">
                    <a href="{{route('doctor.blog.index')}}">
                        <i class="fas fa-book"></i>
                        <span>Bloglarım</span>
                    </a>
                </li>
                <li>
                    <a href="schedule-timings.html">
                        <i class="fas fa-hourglass-start"></i>
                        <span>Üyelik Bilgilerim</span>
                    </a>
                </li>
                <li class="{{Request::segment(2)=='profile-settings' ? 'active ' : '' }}">
                    <a href="{{route('doctor.profile')}}">
                        <i class="fas fa-user-edit"></i>
                        <span>Profil Ayarlarım</span>
                    </a>
                </li>
                <li class="{{Request::segment(2) =='work-hours' ? 'active ' : '' }}">
                    <a href="{{route('doctor.workHours')}}">
                        <i class="fas fa-clock"></i>
                        <span>Çalışma Saatleri</span>
                    </a>
                </li>
                <li class="{{Request::segment(2) =='password' ? 'active ' : '' }}">
                    <a href="{{route('doctor.password')}}">
                        <i class="fas fa-lock"></i>
                        <span>Şifremi Değiştir</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('doctor.logout')}}">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Çıkış</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>


<header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
<span class="bar-icon bar-icon-one">
<span></span>
<span></span>
<span></span>
</span>
            </a>
            <a href="{{url('/')}}" class="navbar-brand logo">
                <img src="{{asset('assets/frontend/img/logo.png')}}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="{{url('/')}}" class="menu-logo">
                    <img src="{{asset('assets/frontend/img/logo.png')}}'" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav">
                <li class="has-submenu active ">
                    <a href="{{url('/')}}">Anasayfa</a>
                </li>
                <li class="has-submenu ">
                    <a href="#">Doktorlar</a>
                </li>
                <li class="has-submenu ">
                    <a href="#">Bloglar</a>
                </li>
                <li class="has-submenu ">
                    <a href="#">Hakkımızda</a>
                </li>
                <li class="has-submenu ">
                    <a href="#">İletişim</a>
                </li>

            </ul>

        </div>

        <ul class="nav header-navbar-rht">
{{--                        <li class="nav-item contact-item">--}}
{{--                            <div class="header-contact-img">--}}
{{--                                <i class="far fa-hospital"></i>--}}
{{--                            </div>--}}
{{--                            <div class="header-contact-detail">--}}
{{--                                <p class="contact-header">Contact</p>--}}
{{--                                <p class="contact-info-header"> +1 315 369 5943</p>--}}
{{--                            </div>--}}
{{--                        </li>--}}
            <li class="nav-item">
                <a class="nav-link header-login btn-one-light" href="{{route('doctor.login.page')}}">Giriş Yap </a>
            </li>
        </ul>
    </nav>
</header>

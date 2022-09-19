<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>Main</span></li>
                <li class="{{Request::segment(2) =='dashboard' ? 'active ' : '' }}">
                    <a href="{{route('admin.dashboard')}}"><i class="feather-grid"></i> <span>Dashboard</span></a>
                </li>
                <li class="submenu {{Request::segment(2) =='doctor' ? ' active ' : '' }}">
                    <a href="#"><i class="fas fa-user-md"></i> <span> Doktor Menüsü</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{route('admin.doctors')}}">Doktorlar</a></li>
                        <li><a href="{{route('doctor.licanceEnd')}}">Lisansı Bitmiş Doktorlar</a></li>
                        <li><a href="{{route('doctor.wait')}}">Onay Bekleyen Doktorlar</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-procedures"></i> <span> Hasta Menüsü</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="appointment-report.html">Appointment Report</a></li>
                        <li><a href="income-report.html">Income Report</a></li>
                        <li><a href="invoice-report.html">Invoice Report</a></li>
                        <li><a href="user-reports.html">Users Report</a></li>
                    </ul>
                </li>
                <li class="submenu {{Request::segment(2) =='blog' ? ' active ' : '' }}">
                    <a href="#"><i class="fas fa-book"></i> <span> Blog Menüsü</span> <span
                            class="menu-arrow"></span></a>
                    <ul >
                        <li><a href="{{route('admin.blog')}}">Bloglar</a></li>
                        <li><a href="{{route('admin.blog.wait')}}">Onay Bekleyen Bloglar</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-american-sign-language-interpreting"></i> <span>Değerlendirmeler</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="appointment-report.html">Puanlama</a></li>
                        <li><a href="income-report.html">Yorumalr</a></li>
                    </ul>
                </li>
                <li class="{{Request::segment(2) =='departments' ? ' active ' : '' }}">
                    <a href="{{route('admin.departments')}}"><i class="fas fa-puzzle-piece"></i> <span>Doktor Bölümleri</span></a>
                </li>
                <li>
                    <a href="doctor-list.html"><i class="feather-user-plus"></i> <span>Fiyatlandırma</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>

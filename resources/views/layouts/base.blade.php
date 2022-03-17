
<body class="sb-nav-fixed" style="font-family: 'Times New Roman', serif  !important">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-1" href="index.php" style="font-family: 'Times New Roman', Times, serif">Sky Technologies</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-5 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>

        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <!-- <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div> -->
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li>
                <img src="{{asset ('storage/images/'.Auth::user()->image)}}"style="border-radius: 100%;width: 40px; height: 40px;" alt="Profile Photo">
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ Auth::user()->name }}</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                    <li>
                        <a  class="dropdown-item" href="{{route('logout')}}">Logout</a>
                    </li>
                    <li>
                        <a  class="dropdown-item" href="{{route('profile')}}">Profile</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav" style="font-family: 'Times New Roman', Times, serif">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="sb-sidenav-menu-heading">EMS</div>
                    <ul>
                    <li class="nav-item">
                            <a class="nav-link" href="{{ url('profile') }}">


                              <img src="{{asset ('storage/images/'.Auth::user()->image)}}"style="border-radius: 100%;width: 100px; height: 100px;" alt="Profile Photo">

                              <span class="menu-title"style="font-family:'Times New Roman', Times, serif">View Profile</span>
                            </a>
                          </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('home') }}">
                              <span class="menu-title" style="font-family: 'Times New Roman', Times, serif">Dashboard</span>
                              <i class="fas fa-tachometer-alt float-right"></i>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ url('jobtitles') }}">
                              <span class="menu-title"  style="font-family: 'Times New Roman', Times, serif">Job Titles</span>
                              <i class="fa fa-address-book float-right"></i>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ url('department') }}">
                              <span class="menu-title"  style="font-family: 'Times New Roman', Times, serif">Departments</span>
                              <i class="fa fa-sitemap float-right"></i>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ url('employees') }}">
                              <span class="menu-title"  style="font-family: 'Times New Roman', Times, serif">Employees</span>
                              <i class="fa fa-users float-right"></i>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ url('company_users') }}">
                              <span class="menu-title"  style="font-family: 'Times New Roman', Times, serif">Company Users</span>
                              <i class="fa fa-user-circle float-right"></i>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ url('companies') }}">
                              <span class="menu-title"  style="font-family: 'Times New Roman', Times, serif">Companies</span>
                              <i class="fa fa-users float-right"></i>
                            </a>
                          </li>

                    </ul>
                    {{-- <div class="nav">
                        <div class="sb-sidenav-menu-heading">EMS</div>
                        <a class="nav-link" href="{{ url('home') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="{{ url('jobtitles') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-address-book"></i></div>
                            Job Titles
                        </a>
                        <a class="nav-link" href="{{ url('department') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-sitemap"></i></div>
                            Departments
                        </a>
                        <a class="nav-link" href="{{ url('employees') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                            Employees
                        </a>

                    </div> --}}
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Sky Technologies
                </div>
            </nav>
        </div>

    </div>
</body>


</html>


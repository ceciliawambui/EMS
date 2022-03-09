<body class="sb-nav-fixed" style="font-family: 'Times New Roman', serif">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php" style="font-family: 'Times New Roman', Times, serif">Sky Technologies</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
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
                <img src=" {{ Auth::user()->image }}"class="rounded-circle" width="50px" alt="Profile Photo">
            </li>
            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">

                    {{-- <i class="fas fa-user fa-fw"></i> --}}
                    {{ auth()->user()->name }}</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
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
                                 {{-- <img src=" {{ Auth::user()->image }}"class="rounded-circle" alt="Profile Photo"> --}}
                                {{-- <i class="fas fa-user-alt" style="align-items:center"></i> --}}

                              <img src=" {{ Auth::user()->image }}"class="rounded-circle" width="100px" alt="Profile Photo">

                              <span class="menu-title">View Profile</span>
                            </a>
                          </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('home') }}">
                              <span class="menu-title" style="margin-right:90px" style="font-family: 'Times New Roman', Times, serif">Dashboard</span>
                              <i class="fas fa-tachometer-alt"></i>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ url('jobtitles') }}">
                              <span class="menu-title"  style="margin-right:100px"style="font-family: 'Times New Roman', Times, serif">Job Titles</span>
                              <i class="fa fa-address-book"></i>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ url('department') }}">
                              <span class="menu-title"  style="margin-right:75px"style="font-family: 'Times New Roman', Times, serif">Departments</span>
                              <i class="fa fa-sitemap"></i>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ url('employees') }}">
                              <span class="menu-title"  style="margin-right:85px"style="font-family: 'Times New Roman', Times, serif">Employees</span>
                              <i class="fa fa-users"></i>
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

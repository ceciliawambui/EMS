
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">Sky Technologies</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
                <h3 style="color:white">Employee Management System</h3>
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
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <!-- <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li> -->

                    <li><a class="dropdown-item"  href="{{ route('login') }}" data-toggle="modal" data-target="#logoutModal">Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
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

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small"> Sky Technologies</div>
                  
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            @yield('content')
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <!-- <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol> -->
                    <div class="row">
                        <div class="col-xl-4 col-md-4 text-center">
                            <div class="card bg-primary text-white mb-4">
                            <i style="width:350px"class="fa fa-address-book fa-7x"></i>
                                <div class="card-body" style="font-size:20px">Job Titles</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{ url('jobtitles') }}">View
                                        Job Titles</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 text-center">
                            <div class="card bg-primary text-white mb-4">
                            <i style="width:350px"class="fa fa-sitemap fa-7x"></i>
                                <div class="card-body" style="font-size:20px">Departments</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{ url('department') }}">View
                                        Departments</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 text-center">
                            <div class="card bg-primary text-white mb-4">
                            <i style="width:350px"class="fa fa-users fa-7x"></i>
                                <div class="card-body" style="font-size:20px">Employees</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{url ('employees') }}">View
                                        Employees</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
            
                </div>
            </main>
            @include('layouts.footer')
        </div>
    </div>
</body>

</html>
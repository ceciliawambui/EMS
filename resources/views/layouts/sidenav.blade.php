<body class="sb-nav-fixed">
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            @yield('content')
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4"style="font-size:40px">Dashboard <i class="fas fa-tachometer-alt"></i> </h1>
                    <div class="row">
                        <div class="col-md-4">
                            <div
                                class=" p-3 m-3 max-w-sm bg-white rounded-sm border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5
                                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                Job
                                                Titles
                                            </h5>
                                        </div>
                                        <div class="col-md-2 offset-md-4">
                                            <i class="fa fa-address-book fa-2x"></i>

                                        </div>


                                    </div>


                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the Job Titles in
                                    the Company.
                                </p>
                                <div class="h1 mb-0 font-weight-normal text-gray-800">{{$countJobTitles}}</div>

                                <a href="{{ url('jobtitles') }}"
                                    class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    More Info
                                    <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div
                                class="p-3 m-3 max-w-sm bg-white rounded-sm border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5
                                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                Departments
                                            </h5>
                                        </div>
                                        <div class="col-md-2 offset-md-4">
                                            <i class="fa fa-sitemap fa-2x"></i>
                                        </div>


                                    </div>


                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the Departments in
                                    the Company
                                </p>
                                <div class="h1 mb-0 font-weight-normal text-gray-800">{{$countDepartment}}</div>
                                <a href="{{ url('department') }}"
                                    class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    More Info
                                    <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div
                                class="p-3 m-3 max-w-sm bg-white rounded-sm border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">

                                    <a href="#">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5
                                                    class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                    Employees
                                                </h5>
                                            </div>
                                            <div class="col-md-2 offset-md-4">
                                                <i class="fa fa-users fa-2x"></i>
                                            </div>


                                        </div>

                                    </a>

                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the Employees in
                                    the Company.
                                </p>
                                <div class="h1 mb-0 font-weight-normal text-gray-800">{{$countEmployees}}</div>
                                <a href="{{ url('employees') }}"
                                    class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    More Info
                                    <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
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

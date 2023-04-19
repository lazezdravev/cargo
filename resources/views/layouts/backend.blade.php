<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!--Bootstrap icons-->
    <link href="/dashboard/assets/fonts/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!--Google web fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Figtree:wght@300..900&family=IBM+Plex+Mono:ital@0;1&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0"/>
    <!--Simplebar css-->
    <link rel="stylesheet" href="/dashboard/assets/vendor/css/simplebar.min.css">
    <!--Choices css-->
    <link rel="stylesheet" href="/dashboard/assets/vendor/css/choices.min.css">

    <!--Upload style-->
    <link rel="stylesheet" href="/dashboard/assets/vendor/css/dropzone.min.css">

    <link href="/dashboard/assets/vendor/css/quill.snow.css" rel="stylesheet">

    <!--Date range picker-->
    <link rel="stylesheet" href="/dashboard/assets/vendor/css/daterangepicker.css">
    <!--Main style-->
    <link rel="stylesheet" href="/dashboard/assets/css/style.min.css">

    <link rel="stylesheet" href="/dashboard/assets/css/custom.css">
</head>

<body>


<!--////////////////// PreLoader Start//////////////////////-->
<div class="loader bg-gradient-primary text-white">
    <div
        class="content flex-column p-4 pb-0 d-flex justify-content-center align-items-center flex-column-fluid position-relative">
        <div class="w-100 h-100 position-relative d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-loader spinner-grow  me-2">
                <line x1="12" y1="2" x2="12" y2="6"/>
                <line x1="12" y1="18" x2="12" y2="22"/>
                <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"/>
                <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"/>
                <line x1="2" y1="12" x2="6" y2="12"/>
                <line x1="18" y1="12" x2="22" y2="12"/>
                <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"/>
                <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"/>
            </svg>
            <div>
                <span>Loading...</span>
            </div>
        </div>
    </div>
</div>
<!--////////////////// /.PreLoader END//////////////////////-->


<div class="d-flex flex-column flex-root">
    <!--Page-->
    <div class="page d-flex flex-row flex-column-fluid">


        <!--///////////Page sidebar begin///////////////-->
        <aside class="page-sidebar">
            <div class="h-100 flex-column d-flex justify-content-start">

                <!--Aside-logo-->
                <div
                    class="aside-logo d-flex align-items-center flex-shrink-0 justify-content-start px-5 position-relative">
                    <a href="/admin" class="d-block">
                        <div class="d-flex align-items-center flex-no-wrap text-truncate">
                            <!--Sidebar-icon-->
                            <span
                                class="sidebar-icon size-40 d-flex align-items-center justify-content-center fs-4 lh-1 text-white rounded-3 bg-gradient-primary fw-bolder"> CDL </span>
                            <span class="sidebar-text">
                    <!--Sidebar-text-->
                    <span class="sidebar-text text-truncate fs-3 fw-bold">Admin
                    </span>
                  </span>
                        </div>
                    </a>
                </div>
                <!--Sidebar-Menu-->
                <div class="aside-menu px-3 my-auto" data-simplebar>
                    <nav class="flex-grow-1 h-100" id="page-navbar">
                        <!--:Sidebar nav-->
                        <ul class="nav flex-column collapse-group collapse d-flex">
                            <li class="nav-item sidebar-title text-truncate opacity-50 small">
                                <i class="bi bi-three-dots"></i>
                                <span>Main</span>
                            </li>
                            <li class="nav-item">
                                <a href="/admin" class="nav-link d-flex align-items-center text-truncate">
                      <span class="sidebar-icon">
                       <i class="fs-2 text-primary d-block mb-2 bi bi-gear-wide-connected"></i>
                      </span>
                                    <!--Sidebar nav text-->
                                    <span class="sidebar-text">Settings</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/users"
                                   class="nav-link d-flex align-items-center text-truncate ">
                      <span class="sidebar-icon">
                       <i class="fs-2 text-primary d-block mb-2 bi bi-person-fill"></i>
                      </span>
                                    <!--Sidebar nav text-->
                                    <span class="sidebar-text">Users</span>
                                </a>
                            </li>



                            <li class="nav-item">
                                <a href="/admin/slider"
                                   class="nav-link d-flex align-items-center text-truncate ">
                      <span class="sidebar-icon">
                        <i class="fs-2 text-primary d-block mb-2 bi bi-images"></i>
                      </span>
                                    <span class="sidebar-text">Slider</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/categories"
                                   class="nav-link d-flex align-items-center text-truncate ">
                      <span class="sidebar-icon">
                     <i class="fs-2 text-primary d-block mb-2 bi bi-list-check"></i>
                      </span>
                                    <span class="sidebar-text">Services</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#jobs" data-bs-toggle="collapse" aria-expanded="false"
                                   class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="fs-2 text-primary d-block mb-2 bi bi-truck"></i>
                              </span>
                                    <!--Sidebar nav text-->
                                    <span class="sidebar-text">Jobs</span>
                                </a>
                                <ul id="jobs" class="sidebar-dropdown list-unstyled collapse @@components_collapse">

                                    <li class="sidebar-item"><a class="sidebar-link @@component_avatars_active" href="{{ route('jobs.index') }}">Jobs</a></li>
                                    <li class="sidebar-item"><a class="sidebar-link @@component_avatars_active" href="{{ route('job.applicants') }}">Applicants</a></li>
                                </ul>
                            </li>





                            <li class="nav-item">
                                <a href="/admin/static_pages"
                                   class="nav-link d-flex align-items-center text-truncate ">
                      <span class="sidebar-icon">
                       <i class="fs-2 text-primary d-block mb-2 bi bi-patch-plus"></i>
                      </span>
                                    <span class="sidebar-text">Static Pages</span>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="/admin/referrals"
                                   class="nav-link d-flex align-items-center text-truncate ">
                      <span class="sidebar-icon">
                      <i class="fs-2 text-primary d-block mb-2 bi bi-shield-fill-check"></i>
                      </span>
                                    <span class="sidebar-text">Referrals</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/scripts"
                                   class="nav-link d-flex align-items-center text-truncate ">
                      <span class="sidebar-icon">
                        <i class="fs-2 text-primary d-block mb-2 bi bi-code-slash"></i>
                      </span>
                                    <span class="sidebar-text">Scripts</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/admin/blogs"
                                   class="nav-link d-flex align-items-center text-truncate ">
                      <span class="sidebar-icon">
                        <i class="fs-2 text-primary d-block mb-2 bi bi-postcard-fill"></i>
                      </span>
                                    <span class="sidebar-text">Blog</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/admin/testimonials"
                                   class="nav-link d-flex align-items-center text-truncate ">
                      <span class="sidebar-icon">
                        <i class="fs-2 text-primary d-block mb-2 bi bi-stars"></i>
                      </span>
                                    <span class="sidebar-text">Testimonials</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/admin/subscribers"
                                   class="nav-link d-flex align-items-center text-truncate ">
                      <span class="sidebar-icon">
                     <i class="fs-2 text-primary d-block mb-2 bi bi-envelope-check-fill"></i>
                      </span>
                                    <span class="sidebar-text">Subscribers</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/admin/applicants"
                                   class="nav-link d-flex align-items-center text-truncate ">
                      <span class="sidebar-icon">
                     <i class="fs-2 text-primary d-block mb-2 bi bi-truck-flatbed"></i>
                      </span>
                                    <span class="sidebar-text">Applicants</span>
                                </a>
                            </li>

                        </ul>

                    </nav>

                </div>
            </div>
        </aside>
        <!--///////////Page Sidebar End///////////////-->

        <!--///Sidebar close button for 991px or below devices///-->
        <div
            class="sidebar-close d-lg-none">
            <a href="#"></a>
        </div>
        <!--///.Sidebar close end///-->


        <!--///////////Page content wrapper///////////////-->
        <main class="page-content d-flex flex-column flex-row-fluid">

            <!--//page-header//-->
            <header
                class="navbar mb-3 px-3 px-lg-6 px-3 px-lg-6 align-items-center page-header navbar-expand navbar-light">
                <a href="index.html" class="navbar-brand d-block d-lg-none">
                    <div class="d-flex align-items-center flex-no-wrap text-truncate">
                        <!--Sidebar-icon-->
                        <span class="sidebar-icon bg-gradient-primary rounded-3 size-40 fw-bolder text-white">
                  A
                </span>
                    </div>
                </a>
                <ul class="navbar-nav d-flex align-items-center h-100">
                    <li class="nav-item d-none d-lg-flex flex-column h-100 me-2 align-items-center justify-content-center"
                        data-tippy-placement="bottom-start" data-tippy-content="Toggle Sidebar">
                        <a href="javascript:void(0)"
                           class="sidebar-trigger nav-link size-40 d-flex align-items-center justify-content-center p-0">
                  <span class="material-symbols-rounded">
                    menu_open
                    </span>
                        </a>
                    </li>

                </ul>
                <ul class="navbar-nav ms-auto d-flex align-items-center h-100">
                    <li class="nav-item d-flex align-items-center justify-content-center flex-column h-100 me-2">

                        <label
                            class="dark-mode-checkbox size-40 d-flex align-items-center justify-content-center nav-link p-0"
                            for="ChangeTheme">
                            <input type="checkbox" id="ChangeTheme"/> <span class="slide"></span>
                        </label>
                    </li>

                    <li class="nav-item dropdown d-flex align-items-center justify-content-center flex-column h-100">
                        <a href="#"
                           class="nav-link dropdown-toggle height-40 px-2 d-flex align-items-center justify-content-center"
                           aria-expanded="false" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                            <div class="d-flex align-items-center">

                                <!--Avatar with status-->
                                <div class="avatar-status status-online me-sm-2 avatar xs">
                                    <img src="{{ "/assets/img/users/thumbnails/" . auth()->user()->image }}" class="rounded-circle img-fluid"
                                         alt="">
                                </div>
                                <span class="d-none d-md-inline-block">{{ \Auth::user()->name }}</span>
                            </div>
                        </a>

                        <div class="dropdown-menu mt-0 p-0 dropdown-menu-end overflow-hidden">
                            <!--User meta-->
                            <div
                                class="position-relative overflow-hidden px-3 pt-4 pb-7 bg-gradient-primary text-white">
                                <!--Divider-->
                                <svg style="transform: rotate(-180deg)" preserveAspectRatio="none"
                                     class="position-absolute start-0 bottom-0 w-100 dropdown-wave" fill="currentColor"
                                     height="24" viewBox="0 0 1200 120"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54 16.88 218.2 35.26 69.27 18 138.3 24.88 209.4 13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z"
                                        opacity=".25"/>
                                    <path
                                        d="M0 0v15.81c13 21.11 27.64 41.05 47.69 56.24C99.41 111.27 165 111 224.58 91.58c31.15-10.15 60.09-26.07 89.67-39.8 40.92-19 84.73-46 130.83-49.67 36.26-2.85 70.9 9.42 98.6 31.56 31.77 25.39 62.32 62 103.63 73 40.44 10.79 81.35-6.69 119.13-24.28s75.16-39 116.92-43.05c59.73-5.85 113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z"
                                        opacity=".5"/>
                                    <path
                                        d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63 112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z"/>
                                </svg>
                                <div class="position-relative">
                                    <h5 class="mb-1">{{ \Auth::user()->name }}</h5>

                                </div>
                            </div>
                            <div class="pt-2">
                                <a href="/admin/users/{{ \Auth()->user()->id }}" class="dropdown-item d-flex align-items-center">
                      <span
                          class="material-symbols-rounded align-middle me-2 size-30 fs-5 d-flex align-items-center justify-content-center bg-primary text-white rounded-2">
                      account_circle
                      </span>
                                    <span class="flex-grow-1">Profile</span>
                                </a>
                                <a href="/admin" class="dropdown-item d-flex align-items-center">
                      <span
                          class="material-symbols-rounded align-middle me-2 size-30 fs-5 d-flex align-items-center justify-content-center bg-danger text-white rounded-2">
                      settings
                      </span>
                                    <span class="flex-grow-1">Settings</span>
                                </a>

                                <hr class="my-2">





                                <a href="href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item d-flex align-items-center">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                      <span
                          class="material-symbols-rounded align-middle me-2 size-30 fs-5 d-flex align-items-center justify-content-center bg-warning text-white rounded-2">
                      logout
                      </span>
                                    <span class="flex-grow-1">Logout</span>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li
                        class="nav-item dropdown ms-2 d-flex d-lg-none align-items-center justify-content-center flex-column h-100">
                        <a href="javascript:void(0)"
                           class="nav-link sidebar-trigger-lg-down size-40 p-0 d-flex align-items-center justify-content-center">
                            <span class="material-symbols-rounded align-middle">menu</span>
                        </a>
                    </li>
                </ul>
            </header>
            <!--Main Header End-->







            <!--//Page content//-->
            <div class="content px-3 px-lg-6 pt-3 pb-0 d-flex flex-column-fluid position-relative">
                <div class="container-fluid px-0">
                    @yield('content')
                </div>
            </div>
            <!--//Page content End//-->

            <!--//Page-footer//-->
            <footer class="pb-3 pb-lg-5 px-3 px-lg-6">
                <div class="container-fluid px-0">
                <span class="d-block lh-sm small text-muted text-end">&copy;
                  <script>
                    document.write(new Date().getFullYear())
                  </script> PINGDEVS
                </span>
                </div>
            </footer>
            <!--/.Page Footer End-->

        </main>
        <!--///////////Page content wrapper End///////////////-->
    </div>
</div>

<!--////////////Theme Core scripts Start/////////////////-->
<script src="/dashboard/assets/js/theme.bundle.js"></script>

<!--////////////Theme Core scripts End/////////////////-->


<!--Dashboard duration calendar-->
<script src="/dashboard/assets/vendor/moment.min.js"></script>
<script src="/dashboard/assets/vendor/daterangepicker.js"></script>
<script src="/dashboard/assets/vendor/quill.min.js"></script>

<script src="/dashboard/assets/js/tagsinput.js"></script>
<script>
    $('a').on("click", function() { $('a').removeClass('active'); $(this).addClass('active'); });
</script>

@yield('scripts')
<script>
    $(function () {

        var start = moment().subtract(30, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('D MMM') + ' - ' + end.format('D MMM'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                    'month')]
            }
        }, cb);

        cb(start, end);

    });

</script>

<!--Dashboard charts begin-->
<script src="/dashboard/assets/vendor/apexcharts.min.js"></script>
<script>
    //Chart Sales overview
    var optionsSalesOverview = {
        colors: [utils.getColor('primary'), utils.getColor('warning')],
        series: [{
            name: 'Direct',
            data: [144, 155, 187, 156, 261, 247, 163,
                144, 155, 257, 156, 261, 224, 163,
                144, 155, 257, 156, 261, 198, 163,
                144, 155, 257, 156, 261, 274, 163, 257, 156
            ],
        },
            {
                name: 'Ads',
                data: [76, 85, 101, 98, 87, 124, 91,
                    76, 85, 101, 98, 54, 105, 97,
                    76, 85, 101, 124, 87, 94, 91,
                    76, 85, 101, 78, 104, 135, 104, 98, 87
                ],
            },
        ],

        chart: {
            type: 'area',
            height: 350,
            fontFamily: 'Inherit',
            toolbar: {
                show: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: 3,
            curve: 'smooth',
        },
        grid: {
            strokeDashArray: 2,
            padding: {
                top: 0,
                bottom: 0,
                right: 20
            },
            xaxis: {
                lines: {
                    show: true,
                },
            },
            yaxis: {
                lines: {
                    show: false,
                },
            },
        },
        labels: ["Jan 1", "Jan 2", "Jan 3", "Jan 4", "Jan 5", "Jan 6", "Jan 7",
            "Jan 8", "Jan 9", "Jan 10", "Jan 11", "Jan 12", "Jan 13", "Jan 14",
            "Jan 15", "Jan 16", "Jan 17", "Jan 18", "Jan 19", "Jan 20", "Jan 21",
            "Jan 22", "Jan 23", "Jan 24", "Jan 25", "Jan 26", "Jan 27", "Jan 28", "Jan 29", "Jan 30",
        ],

        yaxis: {
            labels: {
                show: true
            },
        },
        xaxis: {

            tickAmount: 6,
            labels: {
                show: true,
                rotate: 0
            },
            tooltip: {
                enabled: false
            },
            axisTicks: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: .25,
                opacityTo: 0,
                stops: [0, 100]
            }
        },
        tooltip: {
            shared: true,
            intersect: false,
            y: {
                formatter: function (val) {
                    return val + ' <span class="fw-normal text-muted">Products sold</span>';
                },
            },
        },
        markers: {
            strokeWidth: 5,
            strokeOpacity: 1,
            strokeColors: [utils.getColor('white'), utils.getColor('white'), utils.getColor('white')],
        },
    };
    var chartOverview = new ApexCharts(
        document.querySelector('#chart_overview'),
        optionsSalesOverview
    );
    chartOverview.render();

    //top countries
    var countryColors = [utils.getColor('primary'), utils.getColor('danger'), utils.getColor('info'), utils.getColor('warning'), utils.getColor('success')];
    var optionsCountries = {

        series: [{
            name: "Visitors",
            data: [
                87, 82, 68, 49, 41
            ]
        }],
        chart: {
            type: 'bar',
            height: 300,
            fontFamily: 'inherit',
            toolbar: {
                show: false
            }
        },
        legend: {
            show: false
        },
        colors: countryColors,
        grid: {
            strokeDashArray: 4,
            padding: {
                right: 30,
                left: 10,
                bottom: -10
            },
            xaxis: {
                lines: {
                    show: false,
                },
            },
            yaxis: {
                lines: {
                    show: true,
                },
            },
        },
        plotOptions: {
            bar: {
                columnWidth: '30%',
                horizontal: false,
                distributed: true,
                borderRadius: 6,
                dataLabels: {
                    position: 'top',
                },
            }
        },
        labels: {
            show: false
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            show: false
        },
        xaxis: {
            categories: ['USA', 'India', 'UK', 'France', 'Canada'],
            axisTicks: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
        },
        yaxis: {
            labels: {
                show: true
            },
            axisTicks: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + 'k <span class="fw-normal text-muted"></span>';
                },
            },
        },
    };

    var chartCountries = new ApexCharts(document.querySelector("#chart_top_countries"), optionsCountries);
    chartCountries.render();


    //Chart categories
    var optionsCategories = {
        colors: [utils.getColor('primary'), utils.getColor('success'), utils.getColor('warning')],
        series: [58, 49, 36],
        chart: {
            fontFamily: 'inherit',
            height: 190,
            type: 'radialBar',
            sparkline: {
                enabled: true
            }
        },
        plotOptions: {
            radialBar: {
                hollow: {
                    margin: 0,
                    size: '45%',
                    background: 'transparent',
                },
                track: {
                    show: true,
                    background: "transparent",
                },
                dataLabels: {
                    total: {
                        show: true,
                        label: 'Sales',
                        color: 'var(--bs-gray-500)',
                        fontSize: '12',
                        formatter: function (w) {
                            return 67 + "k"
                        }
                    },
                    name: {
                        show: true,
                        offsetY: -8
                    },
                    value: {
                        show: true,
                        offsetY: 7,
                        fontSize: '24',
                        fontWeight: 'bold',
                        color: 'var(--bs-body-color)'
                    },
                }
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                shadeIntensity: 0.5,
                inverseColors: true,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 50, 53, 91]
            },
        },
        labels: ['Shoes', 'Jeans', 'T-Shirts'],
    };

    var chartCategories = new ApexCharts(document.querySelector("#chart_top_categories"), optionsCategories);
    chartCategories.render();

</script>
@include('ckfinder::setup')
<script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script>
<script>CKFinder.config( { connectorPath: '/ckfinder/connector' } );</script>
<script type="text/javascript" src="/js/ckeditor/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'editor1', {
        // Use named CKFinder browser route
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
        // Use named CKFinder connector route
        filebrowserUploadUrl: '{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files'
    } );
</script>
@yield('scripts')

<script>


    var Size = Quill.import('attributors/style/size');
    Size.whitelist = ['14px', '16px', '18px'];
    Quill.register(Size, true);

    var toolbarOptions = [
        ["bold", "underline"],
        ["link", "blockquote", "code", "image"],
        [{list: "ordered"}, {list: "bullet"}],
        [{ 'size': ['14px', '16px', '18px'] }]
    ];


    $('.quill-editor').each(function (i, el) {
        var el = $(this), id = 'quilleditor-' + i, val = el.val(), editor_height = 200;
        var div = $('<div/>').attr('id', id).css('height', editor_height + 'px').html(val);
        el.addClass('d-none');
        el.parent().append(div);

        var quill = new Quill('#' + id, {
            modules: {toolbar: toolbarOptions},
            theme: 'snow'
        });
        quill.on('text-change', function () {
            console.log(quill.container.firstChild.innerHTML);
            el.html();

            $("#description").val(quill.container.firstChild.innerHTML);
            $("#homepage_description").val(quill.container.firstChild.innerHTML);
        });
    });


</script>
<script>
    $("#inputImage").on('change', function() {
        let file = $(this).val().split('\\').pop();
        $("#inputImage").parent().find('span').remove();
        $("#inputImage").parent().append("<span>" + file + "</span>");
    });
</script>


</body>

</html>

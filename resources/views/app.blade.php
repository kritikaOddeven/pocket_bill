<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Pocket Bill</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        .calendar-icon {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            color: #666;
            pointer-events: none;
            /* icon won't interfere with input clicks */
        }
        .table > tbody > tr > td{
            padding: 5px 2px !important;
        }
        .table > thead > tr > th{
            padding: 5px 2px !important;
        }
    </style>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ url('dashboard') }}" class="app-brand-link">
                        <span class="app-brand-logo demo">

                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">Pocket Bill</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
                        <a href="{{ url('dashboard') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>


                    <li class="menu-item {{ request()->is('customers*') ? 'active open' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle {{ request()->is('customers*') ? 'active' : '' }}">
                            <i class="menu-icon icon-base bx bx-user"></i>
                            <div data-i18n="Coustomer">Customer</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item {{ request()->is('customers') ? 'active' : '' }}">
                                <a href="{{ route('customers.index') }}" class="menu-link">
                                    <div data-i18n="List">List</div>
                                </a>
                            </li>
                            <li class="menu-item {{ request()->is('customers/add') ? 'active' : '' }}">
                                <a href="{{ route('customers.create') }}" class="menu-link">
                                    <div data-i18n="Add">Add</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ request()->is('categories*') ? 'active open' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon icon-base bx bx-category"></i>
                            <div data-i18n="Categories">Categories</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item {{ request()->is('categories') ? 'active' : '' }}">
                                <a href="{{ route('categories.index') }}" class="menu-link">
                                    <div data-i18n="List">List</div>
                                </a>
                            </li>
                            <li class="menu-item {{ request()->is('categories/create') ? 'active' : '' }}">
                                <a href="{{ route('categories.create') }}" class="menu-link">
                                    <div data-i18n="Add">Add</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ request()->is('subcategories*') ? 'active open' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon icon-base bx bx-subdirectory-right"></i>
                            <div data-i18n="Subcategories">Subcategories</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item {{ request()->is('subcategories') ? 'active' : '' }}">
                                <a href="{{ route('subcategories.index') }}" class="menu-link">
                                    <div data-i18n="List">List</div>
                                </a>
                            </li>
                            <li class="menu-item {{ request()->is('subcategories/create') ? 'active' : '' }}">
                                <a href="{{ route('subcategories.create') }}" class="menu-link">
                                    <div data-i18n="Add">Add</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ request()->is('invoice*') ? 'active open' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon icon-base bx bx-food-menu"></i>
                            <div data-i18n="Invoice">Invoice</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item {{ request()->is('invoice') ? 'active' : '' }}">
                                <a href="{{ url('invoice') }}" class="menu-link">
                                    <div data-i18n="Basic">List</div>
                                </a>
                            </li>
                            <li class="menu-item {{ request()->is('invoice/create') ? 'active' : '' }}">
                                <a href="{{ url('invoice/create') }}" class="menu-link">
                                    <div data-i18n="Basic">Create</div>
                                </a>
                            </li>
                            {{-- <li class="menu-item">
                                <a href="{{ url('invoice/view') }}" class="menu-link" >
                                    <div data-i18n="Basic">Preview</div>
                                </a>
                            </li> --}}
                        </ul>
                    </li>


                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @include('partials._header')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    @yield('admin-content')
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('partials._footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr(".flatpickr-input", {
            altInput: true,
            altFormat: "d-m-Y",
            dateFormat: "Y-m-d"
        });
    </script>
</body>

</html>

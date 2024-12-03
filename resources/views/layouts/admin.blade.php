<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>VyHa</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->

    @yield('css')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        /* Định dạng lại các item trong menu sidebar */
        /* .list-group-item {
            border-radius: 0.375rem;
            margin-bottom: 10px;
            transition: all 0.3s ease;
            padding: 10px 20px;
            font-weight: 600;
        }

        .list-group-item:hover {
            background-color: #f8f9fa;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            color: #007bff;
        } */

        /* Sidebar */
        .sidebar {
            background-color: #f7f7f7;
            height: 100%;
            position: fixed;
            width: 250px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            padding-top: 20px;
        }

        .sidebar .list-group-item {
            background-color: transparent;
            border: none;
            padding: 10px 20px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
            font-weight: 600;
            border-radius: 0.375rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Thêm shadow */
        }

        .sidebar .list-group-item:hover {
            background-color: #cdcccc;
            color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Tăng shadow khi hover */
        }

        /* Header */
        .navbar-light {
            background-color: #ffffff;
            border-bottom: 1px solid #e0e0e0;
        }

        .navbar-brand {
            font-size: 1.6rem;
            font-weight: bold;
            color: #343a40;
        }

        .navbar-nav .nav-link {
            font-size: 1rem;
            color: #343a40;
        }

        .navbar-nav .nav-link:hover {
            color: #111315;
        }

        /* Alert Styles */
        .alert {
            border-radius: 0.375rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .alert-success {
            background-color: #28a745;
            border-color: #28a745;
            color: white;
        }

        .alert-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
        }

        /* Content Layout */
        .container {
            margin-top: 20px;
        }

        .main-content {
            margin-left: 270px;
            padding: 20px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-md-4 {
            flex: 1;
            padding: 15px;
        }

        .col-md-8 {
            flex: 3;
            padding: 15px;
        }

        /* Sidebar menu links */
        .list-group-item a {
            text-decoration: none;
            color: #333;
        }

        .list-group-item a:hover {
            /* color: #fff; */
        }

        /* Sidebar Icons */
        .sidebar-icon {
            font-size: 20px;
            color: #000000;
            margin-right: 10px;
        }

        /* Footer */
        .footer {
            position: absolute;
            bottom: 10px;
            left: 0;
            width: 100%;
            background-color: #f7f7f7;
            padding: 15px;
            text-align: center;
            font-size: 0.9rem;
            color: #6c757d;
        }

    </style>

    
</head>

<body>
    <div id="app">
        @include('partials.admin-nav')

        <main class="">
            @auth
            <div class="container-fluid">
                <div class="row w-100">
                    <!-- Sidebar -->
                    @include('partials.admin-sidebar')

                    <!-- Main Content -->
                    <div class="col-md-8 main-content mw-100">
                        @yield('content')
                    </div>
                </div>
            </div>
            @else
            @yield('content')
            @endauth
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>

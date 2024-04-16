<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Dashboard | Graindashboard UI Kit</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <!-- DEMO CHARTS -->
    <link rel="stylesheet" href="{{ asset('demo/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('demo/chartist-plugin-tooltip.css') }}">

    <!-- Template -->
    <link rel="stylesheet" href="{{ asset('graindashboard/css/graindashboard.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body class="has-sidebar has-fixed-sidebar-and-header">
    <!-- Header -->
    @include('constants.header')
    <!-- End Header -->
    <main class="main">
        <!-- Sidebar Nav -->
        @include('constants.sidebar')
        <!-- End Sidebar Nav -->
        <div class="content">
            <div class="py-4 px-3 px-md-4">
                @yield('main')
            </div>
            <!-- Footer -->
            @include('constants.footer')
            <!-- End Footer -->
        </div>
    </main>



    <script src="{{ asset('graindashboard/js/graindashboard.js') }}"></script>
    <script src="{{ asset('graindashboard/js/graindashboard.vendor.js') }}"></script>

    <!-- DEMO CHARTS -->
    <script src="{{ asset('demo/resizeSensor.js') }}"></script>
    <script src="{{ asset('demo/chartist.js') }}"></script>
    <script src="{{ asset('demo/chartist-plugin-tooltip.js') }}"></script>
    <script src="{{ asset('demo/gd.chartist-area.js') }}"></script>
    <script src="{{ asset('demo/gd.chartist-bar.js') }}"></script>
    <script src="{{ asset('demo/gd.chartist-donut.js') }}"></script>
    <script>
        $.GDCore.components.GDChartistArea.init('.js-area-chart');
        $.GDCore.components.GDChartistBar.init('.js-bar-chart');
        $.GDCore.components.GDChartistDonut.init('.js-donut-chart');
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;
                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;
                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;
                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
</body>

</html>

<html>
<head>
    <title>App Name - @yield('title')</title>

    <link href="/admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="/admin/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/admin/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    @yield('head')

</head>


<body>


@yield('content')

<!-- jQuery -->
<script src="/admin/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript
<script src="/admin/bower_components/raphael/raphael-min.js"></script>
<script src="/admin/bower_components/morrisjs/morris.min.js"></script>
<script src="/admin/js/morris-data.js"></script>


@yield('footer')



<!-- Custom Theme JavaScript -->
<script src="/admin/dist/js/sb-admin-2.js"></script>

</body>
</html>

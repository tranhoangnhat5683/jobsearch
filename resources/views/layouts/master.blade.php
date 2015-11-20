<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Job search</title>
@include('includes.css')
</head>

<body class="page-md page-header-fixed page-quick-sidebar-over-content">
@include('layouts.header')
@yield('stylesheet')

<div class="clearfix">
</div>

<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN CONTENT -->
    @yield('content')
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

@include('layouts.footer')
@include('includes.js')

@yield('script')
</body>
</html>

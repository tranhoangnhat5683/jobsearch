<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Job search</title>
@include('includes.css')
@include('jobsearch/index')
@include('jobsearch/list')
</head>

@yield('stylesheet')
<body class="page-md page-header-fixed page-quick-sidebar-over-content">
@include('layouts.header')

<!-- BEGIN CONTAINER -->
<div class="page-container" ng-app="jobSearchApp" ng-controller='homeController'>
    <!-- BEGIN CONTENT -->
    @yield('content_index')
    @yield('content_list')
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

@include('layouts.footer')
@include('includes.js')
@yield('script_index')
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> @yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/color2/spectrum.css') }}">


    <!-- MetisMenu CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/admin/metisMenu.min.css') }}">


    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/admin/sb-admin-2.css') }}">




    <!-- Custom Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/font-awesome/css/font-awesome.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

            <h4 class="text-center">

            @yield('topbar')
            </h4>




        <div class="navbar-default sidebar" role="navigation">
            @yield('sidebar')

            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                   @yield('title')
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">

           @yield('pageContent')


        </div>

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script type="text/javascript" src="{{ asset('libs/jquery/jquery-2.1.4.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->

<script type="text/javascript" src="{{ asset('libs/admin/metisMenu.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('libs/color2/spectrum.js') }}"></script>



<!-- Custom Theme JavaScript -->

<script type="text/javascript" src="{{ asset('libs/admin/sb-admin-2.js') }}"></script>
<script>
  @yield('js')
</script>

</body>

</html>

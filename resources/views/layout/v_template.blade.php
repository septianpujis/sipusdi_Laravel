<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{asset('template')}}/assets/img/logo septi.png" type="image/png">
    <title>{{$title ?? 'Home'}} | SiPusDi</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{asset('template')}}/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    {{-- <link href="{{asset('template')}}/assets/css/font-awesome.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CUSTOM STYLES-->
    <link href="{{asset('template')}}/assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet" type='text/css' />
    {{-- ICON --}}
    
</head>
<body>
    <div id="wrapper">
        @include('layout.v_header')

        @include('layout.v_nav')

        @yield('content')
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="{{asset('template')}}/assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{asset('template')}}/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="{{asset('template')}}/assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="{{asset('template')}}/assets/js/custom.js"></script>
    
   
</body>
</html>

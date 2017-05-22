<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $title or "Fed Up Project!" }}</title>  
    <!-- <link rel="shortcut icon" type="image/png" href="images/selection/minitab1.png"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" > 
    @yield('_header')
    <!-- Dev site css --> 
    <link rel="stylesheet" type="text/css" href="sass/compiled_css/dev_lara5.css"> 

    <!-- Live site css  --> 
    <!-- <link rel="stylesheet" type="text/css" href="../deploy_css/selection.min.css">  --> 


    <link rel="stylesheet" type="text/css" href="/packages/jquery-1.11.1.min/vendor/jquery-ui-1.10.4.custom/css/no-theme/jquery-ui-1.10.4.custom.min.css"/>
    <!-- <script src="https://maps-api-ssl.google.com/maps/api/js"></script> -->
    <!-- <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> -->
    <script src="../livereload.js"></script>
</head>
<body>


     

    
    @include('public.header') 
    @yield('content')
    @include('public.footer') 

        

</body>
</html>

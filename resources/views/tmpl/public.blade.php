<!DOCTYPE html>
<html> 
	<head>
    	<title>Fed Up Project - Health Food Cafe South Melbourne</title>  
      <!-- <link rel="shortcut icon" type="image/png" href="images/selection/minitab1.png"> -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0" > 
      <meta name="google-site-verification" content="XTA383C88m1oiHGjCNYXH1banrvYjHb6RouftJdy1iw" /> 
      <meta name="language" content="English" />
      <meta http-equiv="content-language" content="en" />
      <meta name="charset" content="utf-8" />
      <meta http-equiv="content-Type" content="text/html; charset=utf-8" />
      <meta name="title" content="Fed Up Project - Health Food Cafe South Melbourne">
      <meta name="description" content="Get Fed Up & Experience Nourishing Foods & Education With Like Minded Healthy Foodies" />
      <meta name="keywords" content="Health Food, Nutrition, Education, Fresh, Cafe, South Melbourne, Coffee" />
      <link rel="icon" type="image/x-icon" href="/images/site/fav.png" />
      

      <!-- Live site css PUBLIC --> 
      <!-- <link rel="stylesheet" type="text/css" href="/deploy_css/lara5.min.css">   -->

      <!-- Dev site css -->  
      <link rel="stylesheet" type="text/css" href="/sass/compiled_css/dev_lara5.css"> 
      
      <!-- <link rel="stylesheet" type="text/css" href="/packages/jquery-1.11.1.min/vendor/jquery-ui-1.10.4.custom/css/no-theme/jquery-ui-1.10.4.custom.min.css"/> -->
      <!-- <script src="/packages/jquery-1.11.1.min/jquery-1.11.1.min.js"></script> -->
      <!-- <script type="text/javascript" src="/packages/jquery-1.11.1.min/vendor/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.min.js"></script> -->
      <link rel="stylesheet" type="text/css" href="/packages/jquery-1.11.1.min/vendor/jquery-ui-1.10.4.custom/css/no-theme/jquery-ui-1.10.4.custom.min.css"/>  
      <!-- <script src="https://maps-api-ssl.google.com/maps/api/js"></script> -->
      <!-- <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> -->
      <!-- <script src="../livereload.js"></script> -->
      @yield('_header')
      
  </head>

 
  <body>  
    @yield('image')
    <section id="container" class="page-wrap">
     
        <!-- <header class="header"> -->  
        <header id="header" class="band header">

            <a href="/menu" class="link">Menu</a>
            <a href="/catering" class="link show-large-up">Catering</a> 
            <a href="/project" class="link show-large-up">Project</a>
            <a href="/events" class="link show-large-up">Events</a>
            <a href="96966701" class="phone_icon hide-large-up"><img class="" src="/images/site/phone1.png"/></a>
            <a href="96966701" class="link show-large-up">96966701</a>
            <!-- <a id="target" class="logo__text" href="/">{{ $title or "Fed Up Project" }}</a> -->
            <a href="/" class="lt_logo"><span class="logo__image"></span></a>  
            <!-- <img class="menu__icon" src="/images/site/menu_icon.png"/> -->
            <a class="trigger-menu"><span class="menu__icon"></span></a>
            <!-- <a class=" trigger-menu"><span class="menu__image"></span></a> -->
        </header> 
        <!-- </header> -->

        <div id="body" class="content-slot"> 
          @yield('content')
          <!-- <div class="footer__push"></div> -->
          
        </div>
         
    </section>
    <section class="site-footer">
      @include('public.footer')  
    </section>
    
 
      
    

    <aside 
      id="panel--right"  
      class="panel--right"> <!-- //panel -->
        <div id="navigation" class="">
        <!-- <a href="#" class="menu__name">Fed Up Project</a> -->
            <nav class="nav__block">
                @if (Auth::check())  
                    <a class="{{((Request::segment(1) === '/admin')? 'navTab_active' : 'side--nav')}}" href="/admin">Dashboard</a>
                    <a class="{{((Request::segment(1) === '/book-table')? 'navTab_active' : 'side--nav')}}" href="/book-table">Book Table</a>
                    <a class="{{((Request::segment(1) === '/menu')? 'navTab_active' : 'side--nav')}}" href="/menu">Menu</a>
                    <a class="{{((Request::segment(1) === '/catering')? 'navTab_active' : 'side--nav')}}" href="/catering">Catering</a>
                    <a class="{{((Request::segment(1) === '/cakes')? 'navTab_active' : 'side--nav')}}" href="/cakes">Cakes</a>
                    <a class="{{((Request::segment(1) === '/events')? 'navTab_active' : 'side--nav')}}" href="/events">Events</a>
                    <a class="{{((Request::segment(1) === '/blog')? 'navTab_active' : 'side--nav')}}" href="/blog">Blog</a>
                    <a class="{{((Request::segment(1) === '/project')? 'navTab_active' : 'side--nav')}}" href="/project">Project</a>
                    <a class="{{((Request::segment(1) === '/')? 'navTab_active' : 'side--nav')}}" href="/">Home</a>
                @else
                    <a class="{{((Request::segment(1) === '/book-table')? 'navTab_active' : 'side--nav')}}" href="/book-table">Book Table</a>
                    <a class="{{((Request::segment(1) === '/menu')? 'navTab_active' : 'side--nav')}}" href="/menu">Menu</a>
                    <a class="{{((Request::segment(1) === '/catering')? 'navTab_active' : 'side--nav')}}" href="/catering">Catering</a>
                    <a class="{{((Request::segment(1) === '/cakes')? 'navTab_active' : 'side--nav')}}" href="/cakes">Cakes</a>
                    <a class="{{((Request::segment(1) === '/events')? 'navTab_active' : 'side--nav')}}" href="/events">Events</a>
                    <a class="{{((Request::segment(1) === '/blog')? 'navTab_active' : 'side--nav')}}" href="/blog">Blog</a>
                    <a class="{{((Request::segment(1) === '/project')? 'navTab_active' : 'side--nav')}}" href="/project">Project</a>
                    <a class="{{((Request::segment(1) === '/')? 'navTab_active' : 'side--nav')}}" href="/">Home</a>
                @endif
            </nav>
        </div>
        <div class="aside_phone_icon"> 
            <a href="mailto:eat@fedupproject.com.au" class="aside_email">
              eat@fedupproject.com.au
            </a> 
            <a href="96966701" class="phone_icon"><img class="" src="/images/site/phone1.png" style="width: 5rem;" /></a>
            <!-- <a href="96966701" class="link show-large-up">96966701</a> -->
            <!-- <a id="target" class="logo__text" href="/">{{ $title or "Fed Up Project" }}</a> -->
            <!-- <a href="/about-us" class="lt_logo"><span class="logo__image"></span></a>   -->
            <!-- <img class="menu__icon" src="/images/site/menu_icon.png"/> -->
        </div>
    </aside><!-- /panel -->
    
    

    
    <!-- JS 
    ====================================  -->
    <script src="/bower_components/jquery/dist/jquery.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
    <script src="/bower_components/jquery-swipetouch/jquery.swipetouch.min.js"></script>
    <script src="/bower_components/foundation/js/foundation/foundation.js"></script>
    <script src="/bower_components/foundation/js/foundation/foundation.tab.js"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5439fba30c5e8a76" async></script>  -->

    @yield('_footer')
   

    <script>


      $(function() {   
        $(document).foundation();
        // Enable swiping...
        // $("body").swipe( {
        //   //Generic swipe handler for all directions
        //   swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

        //     if(direction == "left"){
        //       $("body").addClass("showPanel")
        //     }
        //     else if(direction == "right"){
        //       $("body").removeClass("showPanel")
        //     }
        //   },
        //   allowPageScroll: "vertical",
        //   excludedElements: "button, input, select, textarea, .noSwipe"
        // });


        // //Trigger menu
        $(".trigger-menu").click(function($event){

          console.log('Show Menu');

          if($( "body" ).hasClass( "showPanel" )){
            $("body").removeClass("showPanel");
            // $("body").addClass("no_panel");
          } 
          else if(!$( "body" ).hasClass( "showPanel" )){
            $("body").addClass("showPanel");
            $event.stopPropagation();
          }
        });

        //Click to close menu
        $(".page").click(function($event) {
          console.log(".page click");
          if($( "body" ).hasClass( "showPanel" )){
            $("body").removeClass("showPanel");
            $event.preventDefault();
          }
        });










        // $("#book_table").click(function($event){

        //   console.log('Show Form');

        //   if($( ".bgimg" ).hasClass( "book_form" )){
        //     $(".bgimg").removeClass("book_form");
        //     // $("body").addClass("no_panel");
        //   } 
        //   else if(!$( ".bgimg" ).hasClass( "book_form" )){
        //     $(".bgimg").addClass("book_form");
        //     $event.stopPropagation();
        //   }
        // });

        // //Click to close menu
        // $(".bgimg").click(function($event) {
        //   console.log(".page clicked");
        //   if($( ".bgimg" ).hasClass( "book_form" )){
        //     $(".bgimg").removeClass("book_form");
        //     $event.preventDefault();
        //   }
        // });




        // $( "#target" ).click(function() {
        //   alert( "Handler for .click() called." );
        //   console.log('hi');
        // });



      });

    </script> 
    
    <!-- Google Tag Manager -->
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-N294FC"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-N294FC');</script>
    <!-- End Google Tag Manager -->


    </body>
</html>

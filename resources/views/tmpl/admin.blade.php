<!DOCTYPE html>

<html> 
  <head>
      <title>{{ $title or "Fed Up Project" }}</title>  
      <!-- <link rel="shortcut icon" type="image/png" href="images/selection/minitab1.png"> -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0" > 
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" type="text/css" href="/sass/css/dropzone.min.css">
      <!-- Dev site css --> 
      <link rel="stylesheet" type="text/css" href="/sass/compiled_css/dev_lara5.css"> 
      
      <!-- Live site css  ADMIN--> 
      <!-- <link rel="stylesheet" type="text/css" href="/public/deploy_css/lara5.min.css">   -->
      
      <!-- <link rel="stylesheet" type="text/css" href="/public/deploy_css/lara5.min.css">   -->
 
      <script src="/packages/jquery-1.11.1.min/jquery-1.11.1.min.js"></script>

      <script type="text/javascript" src="/packages/jquery-1.11.1.min/vendor/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.min.js"></script>
      <link rel="stylesheet" type="text/css" href="/packages/jquery-1.11.1.min/vendor/jquery-ui-1.10.4.custom/css/no-theme/jquery-ui-1.10.4.custom.min.css"/>  
      <script src="/bower_components/foundation/js/foundation.min.js"></script>
      <link src="/bower_components/foundation/css/foundation.min.css"></link>
      <!-- <link src="cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></link> -->
      
      


      @yield('__header')
  </head>

 
  <body>  

   
    <section id="container" class="admin_page-wrap"> 
     
        <!-- <header class="header"> -->  
          @include('admin.header')  
        <!-- </header> -->

        <div id="body" class="content-slot admin_dark"> 
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
            <nav class="nav__block">
                <a class="{{((Request::segment(1) === '/admin')? 'navTab_active' : 'side--nav')}}" href="/admin">Dashboard</a>
                <a class="{{((Request::segment(1) === '/admin/blog')? 'navTab_active' : 'side--nav')}}" href="/admin/blog">Blog</a> 
                <a class="{{((Request::segment(1) === '/admin/menu')? 'navTab_active' : 'side--nav')}}" href="/admin/menu">Menu</a> 
                <a class="{{((Request::segment(1) === '/admin/catering')? 'navTab_active' : 'side--nav')}}" href="/admin/catering">Catering</a>
                <a class="{{((Request::segment(1) === '/admin/cake')? 'navTab_active' : 'side--nav')}}" href="/admin/cake">Cakes</a>
                <a class="{{((Request::segment(1) === '/admin/event')? 'navTab_active' : 'side--nav')}}" href="/admin/event">Events</a>
                <a class="{{((Request::segment(1) === '/admin/project')? 'navTab_active' : 'side--nav')}}" href="/admin/project">Project</a>
                <a class="{{((Request::segment(1) === 'logout')? 'navTab_active' : 'side--nav')}}" href="/logout">Logout</a>  
                
                <!-- <a class="video__link" href="http://www.dogloversshow.com.au">Video Credit: Dog Lovers Show</a> -->
            </nav>
        </div>

    </aside><!-- /panel --> 
     
    

    
    <!-- JS 
    ====================================  -->



    <script src="/bower_components/jquery-swipetouch/jquery.swipetouch.min.js"></script>

    <script src="/bower_components/fastclick/lib/fastclick.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script> 
    <script src="/bower_components/foundation/js/foundation.min.js"></script>
    <script src="/bower_components/foundation/js/foundation/foundation.tab.js"></script>
    <script src="/bower_components/modernizr/modernizr.js"></script>
    <script src="/js/app.js"></script>

    <script>
        $(document).foundation();
    </script>


    @yield('_footer') 
   

    <script>
 

      $(function() {   
        // $(document).foundation();
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

          console.log('hi');

          if($( "body" ).hasClass( "showPanel" )){
            $("body").removeClass("showPanel")
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




      });

    </script> 
    
    <!-- Google Tag Manager -->
    <!-- <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-N294FC"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-N294FC');</script> -->
    <!-- End Google Tag Manager -->

    <script type="text/javascript">
        // Prevent the backspace key from navigating back.
        $(document).unbind('keydown').bind('keydown', function (event) {
            var doPrevent = false;
            if (event.keyCode === 8) {
                console.log('Backspace');
                var d = event.srcElement || event.target;
                if ((d.tagName.toUpperCase() === 'INPUT' && 
                     (
                         d.type.toUpperCase() === 'TEXT' ||
                         d.type.toUpperCase() === 'PASSWORD' || 
                         d.type.toUpperCase() === 'FILE' || 
                         d.type.toUpperCase() === 'SEARCH' || 
                         d.type.toUpperCase() === 'EMAIL' || 
                         d.type.toUpperCase() === 'NUMBER' || 
                         d.type.toUpperCase() === 'DATE' )
                     ) || 
                     d.tagName.toUpperCase() === 'TEXTAREA') {
                    doPrevent = d.readOnly || d.disabled;
                }
                else {
                    doPrevent = true;
                }
            }

            if (doPrevent) {
                event.preventDefault();
                console.log('Backspace');
            }
        });
    </script>
    </body>
</html>

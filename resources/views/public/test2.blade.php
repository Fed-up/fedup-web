
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Multi-page template</title>
<!-- 	<link rel="stylesheet" href="../css/themes/default/jquery.mobile-1.4.2.min.css">
	<link rel="stylesheet" href="../_assets/css/jqm-demos.css"> -->
	<link rel="shortcut icon" href="../favicon.ico">
	<!-- <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" /> -->
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->
    <script src="/bower_components/jquery-swipetouch/jquery.swipetouch.min.js"></script>
    <style type="text/css">
/*    	.box{
    		height: 20rem;
    		background-color: #e0e0e0;
    	}

    	.ui-dialog-contain {
		    width: 100%; 
		    max-width: 100%; 
		    margin: 0% auto 0em; 
		    padding: 0; 
		    position: static; 
		    top: 0em; 
		}*/

		body,
		html {
		  height: 100%;
		  margin: 0;
		  overflow: hidden;
		  font-family: helvetica;
		  font-weight: 100;
		}

		.container {
		  position: relative;
		  height: 100%;
		  width: 100%;
		  left: 0;
		}

		/*.container.open-sidebar { left: 240px; }*/

		.swipe-area {
		  position: absolute;
		  width: 50px;
		  left: 0;
		  top: 0;
		  height: 100%;
		  background: #f3f3f3;
		  z-index: 2;
		}

		#sidebar {
		    background: #DF314D;
		    position: absolute;
		    width: 240px;
		    height: 100%;
		    bottom: -100%;
		    margin-left: 49px;
		    z-index: 2;
		    box-sizing: border-box;
		    -webkit-transition: bottom 1s ease-in-out;
		    -moz-transition: bottom 1s ease-in-out;
		    -ms-transition: bottom 1s ease-in-out;
		    -o-transition: bottom 1s ease-in-out;
		    transition: bottom 1s ease-in-out;
		}

		#sidebar ul {
		  margin: 0;
		  padding: 0;
		  list-style: none;
		}

		#sidebar ul li { margin: 0; }

		#sidebar ul li a {
		  padding: 15px 20px;
		  font-size: 16px;
		  font-weight: 100;
		  color: white;
		  text-decoration: none;
		  display: block;
		  border-bottom: 1px solid #C9223D;
		  -webkit-transition: background 3s ease-in-out;
		  -moz-transition: background 3s ease-in-out;
		  -ms-transition: background 3s ease-in-out;
		  -o-transition: background 3s ease-in-out;
		  transition: background 3s ease-in-out;
		}

		#sidebar ul li:hover a { background: #C9223D; }

		.main-content {
		  width: 100%;
		  height: 100%;
		  padding: 10px;
		  box-sizing: border-box;
		  -moz-box-sizing: border-box;
		  position: relative;
		}

		.main-content .content {
		  box-sizing: border-box;
		  -moz-box-sizing: border-box;
		  padding-left: 60px;
		  width: 100%;
		}

		.main-content .content h1 { font-weight: 100; }

		.main-content .content p {
		  width: 100%;
		  line-height: 160%;
		}

		.main-content #sidebar-toggle {
		  background: #DF314D;
		  border-radius: 3px;
		  display: block;
		  position: relative;
		  padding: 10px 7px;
		  float: left;
		  z-index: 2;
		}

		.main-content #sidebar-toggle .bar {
		  display: block;
		  width: 18px;
		  margin-bottom: 3px;
		  height: 2px;
		  background-color: #fff;
		  border-radius: 1px;
		}

		.main-content #sidebar-toggle .bar:last-child { margin-bottom: 0; }

		.container.open-sidebar #sidebar {
		    bottom: -0px;
		    margin-left: 49px;
		}

		.c-mask {
		    z-index: 1;
		    top: 0;
		    left: 0;
		    width: 0;
		    height: 0;
		    background-color: #000;
		    opacity: 0;
		    margin-left: 49px;
		    -webkit-transition: opacity .3s,width 0s .3s,height 0s .3s;
		    transition: opacity .3s,width 0s .3s,height 0s .3s;
		    position: absolute;
		}


		.c-mask.is-active {
		    width: 100%;
		    height: 100%;
		    opacity: .8;
		    -webkit-transition: opacity 1.5s;
		    transition: opacity 1.5s;
		}
	</style>
      </head>

      <body>
      <div class="container">
        <div id="sidebar">
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">About</a></li>
          </ul>
        </div>

        <div class="main-content">
          <div class="swipe-area"></div>
          <a href="#" data-toggle=".container" id="sidebar-toggle"> <span class="bar"></span> <span class="bar"></span> <span class="bar"></span> </a>
          <div class="content">
            <h1>Touch Swipeable Sidebar Menu Demo</h1>

            <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
          </div>
        </div>
        <div id="c-mask" class="c-mask"></div>
      </div>
<!--       <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js"></script>  -->
      <script>
  		$(window).load(function(){
        $("[data-toggle]").click(function() {
          var toggle_el = $(this).data("toggle");
          $(toggle_el).toggleClass("open-sidebar");
          var toggle_ele = $(this).data("toggle");
          $(toggle_ele).toggleClass("is-active");

        });
        $("#sidebar-toggle").click(function() {
          var toggle_el = $(this).data("toggle");
          $(toggle_el).toggleClass("open-sidebar");

        });
        $(".swipe-area").swipe({
              swipeStatus:function(event, phase, direction, distance, duration, fingers)
                  {
                      if (phase=="move" && direction =="up") {
                           $(".container").addClass("open-sidebar");
                           $(".c-mask").addClass("is-active");
                           return false;
                      }
                      if (phase=="move" && direction =="down") {
                           $(".container").removeClass("open-sidebar");
                           $(".c-mask").removeClass("is-active");
                           return false;
                      }
                  }
          }); 
      });
</script>


</body>
</html>
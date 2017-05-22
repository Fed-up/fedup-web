
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Multi-page template</title>
<!-- 	<link rel="stylesheet" href="../css/themes/default/jquery.mobile-1.4.2.min.css">
	<link rel="stylesheet" href="../_assets/css/jqm-demos.css"> -->
	<link rel="shortcut icon" href="../favicon.ico">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <script src="/bower_components/jquery-swipetouch/jquery.swipetouch.min.js"></script>
    <style type="text/css">
    	.box{
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
		}
    </style>
</head>

<body>

<!-- Start of first page: #one -->
<div data-role="page" id="one">

	<div data-role="header">
		<h1>Multi-page</h1>
	</div><!-- /header -->

	<div role="main" class="ui-content" >
		<h2>One</h2>

		<p>I have an <code>id</code> of "one" on my page container. I'm first in the source order so I'm shown when the page loads.</p>

		<p>This is a multi-page boilerplate template that you can copy to build your first jQuery Mobile page. This template contains multiple "page" containers inside, unlike a single page template that has just one page within it.</p>
		<p>Just view the source and copy the code to get started. All the CSS and JS is linked to the jQuery CDN versions so this is super easy to set up. Remember to include a meta viewport tag in the head to set the zoom level.</p>
		<p>You link to internal pages by referring to the <code>id</code> of the page you want to show. For example, to <a href="#two" >link</a> to the page with an <code>id</code> of "two", my link would have a <code>href="#two"</code> in the code.</p>
		<div id="swipe">
		<h1>Swipe Me</h1>
		</div>
		


		<h3>Show internal pages:</h3>
		<p><a href="#two" class="ui-btn ui-shadow ui-corner-all">Show page "two"</a></p>
		<p><a href="#popup" class="ui-btn ui-shadow ui-corner-all" data-rel="dialog" data-transition="slideup" >Show page "popup" (as a dialog)</a></p>

		<div class="container">
					
			<script id='code_1'>
				$(function() {			
					//Enable swiping...
					$("#test").swipe( {
						//Generic swipe handler for all directions
						swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
							$(this).text("You swiped " + direction );	
						},
						//Default is 75px, set to 0 for demo so any distance triggers swipe
					   threshold:0
					});
				});
			</script>

			<script type="text/javascript">
				$("#swipe").swipe( {
				swipe:function(event, direction, distance, duration, fingerCount) {
				var content = $('#popup').html()
				$(this).html(content);
				},
				threshold:50
				});
			</script>

			<span class='title'></span>
				<h4>events: <span class='events'><code>swipe</code>,<code>swipeLeft</code>, <code>swipeRight</code>, <code>swipeUp</code>, <code>swipeDown</code></span></h4>
				<p>By using the <code>swipe</code> handler, you can detect all 4 directions, or use the individual methods <code>swipeLeft</code>, <code>swipeRight</code>, <code>swipeUp</code>, <code>swipeDown</code></p>
				
				<button class='btn btn-small btn-info example_btn'>Jump to Example</button>
				<pre class="prettyprint" data-src='code_1'></pre>
			<span class='navigation'></span>

			<div id="test" class="box">Swipe me</div>

			<span class='navigation'></span>
		</div>	

	</div><!-- /content -->

	<div data-role="footer" data-theme="a">
		<h4>Page Footer</h4>
	</div><!-- /footer -->
</div><!-- /page one -->

<!-- Start of second page: #two -->
<div data-role="page" id="two" data-theme="a">

	<div data-role="header">
		<h1>Two</h1>
	</div><!-- /header -->

	<div role="main" class="ui-content">
		<h2>Two</h2>
		<p>I have an id of "two" on my page container. I'm the second page container in this multi-page template.</p>
		<p>Notice that the theme is different for this page because we've added a few <code>data-theme</code> swatch assigments here to show off how flexible it is. You can add any content or widget to these pages, but we're keeping these simple.</p>
		<p><a href="#one" data-direction="reverse" class="">Back to page "one"</a></p>

	</div><!-- /content -->

	<div data-role="footer">
		<h4>Page Footer</h4>
	</div><!-- /footer -->
</div><!-- /page two -->

<!-- Start of third page: #popup -->
<div data-role="page" id="popup">

	<div data-role="header" data-theme="b">
		<h1>Dialog</h1>
	</div><!-- /header -->

	<div role="main" class="ui-content">
		<h2>Popup</h2>
		<p>I have an id of "popup" on my page container and only look like a dialog because the link to me had a <code>data-rel="dialog"</code> attribute which gives me this inset look and a <code>data-transition="pop"</code> attribute to change the transition to pop. Without this, I'd be styled as a normal page.</p>
		<p><a href="#one" data-rel="back" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-icon-back ui-btn-icon-left">Back to page "one"</a></p>
		<div id="html">
		<h2>You have just swiped</h2>
		<p>And it was a <span class="direction"></span> swipe for <span class="distance">px</span>!</p>
		<p>Now here's a cat</p>
		<img src="http://placekitten.com/150/150"/>
		</div>
	</div><!-- /content -->

	<div data-role="footer">
		<h4>Page Footer</h4>
	</div><!-- /footer -->
</div><!-- /page popup -->

<script type="text/javascript">
	$(function() {      
	//Enable swiping...
		$("#test").swipe( {
			//Generic swipe handler for all directions
			swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
			$(this).text("You swiped " + direction );  
			},
			//Default is 75px, set to 0 for demo so any distance triggers swipe
			threshold:0
		});
	});
</script>

</body>
</html>

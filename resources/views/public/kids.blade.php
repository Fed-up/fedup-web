@extends('tmpl.sc_public')

@section('_header')
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->
    <script src="/bower_components/jquery-swipetouch/jquery.swipetouch.min.js"></script>
    <script src="/bower_components/jquery/jquery.slideandswipe.js"></script>

    <style type="text/css">
/*      .box{
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
          /*overflow: hidden;*/ 
          font-family: helvetica;
          font-weight: 100;
        }

        h1{
            margin: 0;
            padding: 0;
        }

        .container {
          position: relative;
          height: 100%;
          width: 100%;
          left: 0;

        }

        /*.container.open-sidebar { left: 240px; }*/

/*        .top_area {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            background: #f3f3f3;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            background-color: #fff;
            @media #{$small-only} { 
            	display:none;
		    } 
        }*/

        #sidebar {
            background: #DF314D;
            /*position: absolute;*/
            /*width: 100%;*/
            /*height: 100%;*/
            /*bottom: -100%;*/
            /*margin-left: 49px;*/
            /*z-index: 2;*/
            /*overflow: auto;*/
            box-sizing: border-box;
           /* -webkit-transition: bottom 1s ease-in-out;
            -moz-transition: bottom 1s ease-in-out;
            -ms-transition: bottom 1s ease-in-out;
            -o-transition: bottom 1s ease-in-out;
            transition: bottom 1s ease-in-out;*/
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

        /*.main-content {
          width: 100%;
          height: 100%;
          padding: 10px;
          box-sizing: border-box;
          -moz-box-sizing: border-box;
          position: relative;
        }*/

        .content {
			box-sizing: border-box;
			-moz-box-sizing: border-box;
			/*padding-left: 60px;*/
			width: 100%;
			height: 100%;
			background-color:#fff; 
			overflow: hidden;
        }

        .content h1 { font-weight: 100; }

        .content p {
			width: 100%;
			line-height: 160%;
        }

        .container.open-sidebar #sidebar {
            bottom: -0px;
            /*margin-left: 49px;*/
        }

        .c-mask {
            z-index: 1;
            top: 0;
            left: 0;
            width: 0;
            height: 0;
            background-color: #000;
            opacity: 0;
            /*margin-left: 49px;*/
            -webkit-transition: opacity .3s,width 0s .3s,height 0s .3s;
            transition: opacity .3s,width 0s .3s,height 0s .3s;
            position: absolute;
        }

        .content.swipped{
            opacity: 0.1;
            -webkit-transition: opacity 1.5s;
            transition: opacity 1.5s;
        }

        /*.content 
        .is-active {
            width: 100%;
            height: 100%;
            opacity: .8;
            -webkit-transition: opacity 1.5s;
            transition: opacity 1.5s;
        }*/
        /* navigation */
/*        nav {
            height: 100%;
            width: 100%;
            background-color: #0a4a3c;
            left: 0;
            top: 0;
            z-index: 2;
            position: fixed;
            overflow-y: auto;
            overflow-x: visible;
            transform: translate(-100%,0);
        }*/
        /* overlay layer */
        .ssm-overlay {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0,0,0,0.2);
            display: none;
            z-index: 1;
        }

        /* prevent scroll when nav is open */
        .is-navOpen{
          overflow: hidden;
        }



    </style>
@stop
@section('content') 


    <div class="page container">
        
        <div class="top_area">
          	<a href="/kids-birthday-parties" class="back_page"><img class="big_left_arrow" src="/images/site/left.png"></a>
        	<a href="/kids-birthday-parties" class="next_page"><img class="big_right_arrow" src="/images/site/right.png"></a>  
          	
          
            <div class="content">
            	


	            <img id="top_image" class="" src='{{$no_post == 0 ? "/images/uploads/large/591b73d3c3313kids.jpg" : "/images/site/bw.jpg"}}' style="width: 100%">

	            

            	<!-- <a class="ssm-toggle-nav" href="#" title="Open / close">Open / close</a> -->
            </div>
            <!-- <!- <a href="#" data-toggle=".container" id="sidebar-toggle"> <span class="bar"></span> <span class="bar"></span> <span class="bar"></span> </a> -->
            <!-- <a class="ssm-toggle-nav nav-toggle "> <span class="bar"></span> <span class="bar"></span> <span class="bar"></span> </a> -->
        </div>
        <div class="small_top_image" style="background: url('/images/uploads/large/591b73d3c3313kids.jpg'); background-position: center center;
    		background-repeat: no-repeat; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
        	<a href="/kids-birthday-parties" class="back_arrow">
        		<img class="" src="/images/site/left.png">
        	</a>
    		<a href="/kids-birthday-parties" class="next_arrow">
    			<img class="" src="/images/site/right.png">
    		</a>  

    		<div class="small_header_promo" style="background-image: url('/images/uploads/large/591b73d3c3313kids.jpg');"> </div>
        	<!-- <a class="ssm-toggle-nav" href="#" title="Open / close">Open / close</a> -->
        </div> 
        <div class="row post_page">
            @if($no_message != 1)
                <div class="row">       
                    <div class="public_message_outer">
                        <a href="/admin" class="columns small-12 large-6 large-push-3 end public_message">
                            <span class="public_message_inner" > {{$message}}</span><br/>
                            <span class="public_message_inner" > {{$message2}}</span><br/>
                            @foreach($errors->all() as $error)
                            <span class="public_message_inner" > {{$error}}</span><br/>
                            @endforeach
                        </a>  
                    </div>
                </div>
            @endif
            <div class="columns small-12 large-8 blog_section">
                <h1 class="post_title">KIDS BIRTHDAY PARTY's</h1>
                <article class="post_header">
                    <div class="columns small-12 medium-6 ">
                        <p class="post_author">For all ages</p>
                    </div>
                    <!-- <div class="columns small-12 medium-6 ">
                        <a href="http://www.sonaughtybutnice.com" class="post_time promo_link">So Naughty But Nice</a>
                    </div> -->
                </article>
                <article class="post_content">
                    <p class="post_text">Come & celebrate your Special day with us at Fed Up Project.</p>
                    <p class="post_text">We are here to provide your child with memorable moments on their special day. Our 2 hour sessions include a range of activities including: Party games (Pin the tail on the Donkey & Pass the Parcel), Mini Cooking activity, Party food & we can even make the Invitations for you. </p>
                    <p class="post_text"> We believe that no Child should feel left out on their special day, so we cater to most dietary requirements including: Gluten free, Nut free, Dairy free, Vegan, Vegetarian & Refined Sugar Free, just let us know.</p>

                    <h2 class="heading_text">Booking Times:</h2>
                    <ul class="bullet">
                        <li class="list_text">Weekdays From 3pm</li>
                        <li class="list_text">Saturday From 2:00pm</li>
                        <li class="list_text">Sunday From 11am</li>
                    </ul>
                    <p class="post_text">*We require a minimum booking of 10 Children</p>

                    <h2 class="heading_text">What the party includes:</h2>
                    <ul class="bullet">
                        <li class="list_text">Balloon for each child</li>
                        <li class="list_text">Venue hire</li>
                        <li class="list_text">Party host</li>
                        <li class="list_text">Mini Cooking activity for all children</li>
                        <li class="list_text">Fun games</li>
                        <li class="list_text">2 hour Non-stop fun</li>
                    </ul>

                    <h2 class="heading_text">Food packages:</h2>
                    <ul class="bullet">
                        <li class="list_text">3x Party food, 2x Savoury, 1x Special fruit punch = $32 p/head</li>
                        <li class="list_text">4x Party food, 3x Savoury, 1x Special fruit punch = $34 p/head</li>
                    </ul>

                    <h2 class="heading_text">Party food/Snacks:</h2>
                    <ul class="bullet">
                        <li class="list_text">Fairy bread</li>
                        <li class="list_text">Bowl of corn chips</li>
                        <li class="list_text">Special fruit punch</li>
                        <li class="list_text">Fruit & yogurt frozen pops</li>
                        <li class="list_text">Fruit skewers</li>
                    </ul>

                    <h2 class="heading_text">Savoury:</h2>
                    <ul class="bullet">
                        <li class="list_text">Spinach & Ricotta Pastizzi</li>
                        <li class="list_text">Gourmet assorted pies</li>
                        <li class="list_text">Homemade sausage rolls</li>
                        <li class="list_text">Assorted sushi</li>
                        <li class="list_text">Mini pizzas (Special Hawaiian, Classic Margarita, BBQ Chicken & Veg)</li>
                    </ul>

                    <h2 class="heading_text">Mini cooking activity:</h2>
                    <p class="post_text">(Your child has the choice to cook on the day)</p>
                    <ul class="bullet">
                        <li class="list_text">Pancakes</li>
                        <li class="list_text">Chocolate crunch balls</li>
                        <li class="list_text">Honey crackles</li>
                        <li class="list_text">Mini pizzas</li>
                        <li class="list_text">Decorate cupcakes</li>
                    </ul>


                    <h2 class="heading_text">For Parents:</h2>
                    <p class="post_text">Platters for Parents who are staying:</p>
                    <ul class="bullet">
                        <li class="list_text">Dips & Crackers $40 (*Serves 6-8)</li>
                        <li class="list_text">Fruit Platter $30 (*Serves 5-6)</li>
                        <li class="list_text">Assorted Sandwiches $40 (*Serves 5-6)</li>
                        <li class="list_text">Fresh Salads $30 (*Serves 6)</li>
                        <li class="list_text">Standard Coffee & Tea Package $8p/head (Drinks x2 p/head)</li>
                    </ul>

                    <h2 class="heading_text">Extras:</h2>
                    <ul class="bullet">
                        <li class="list_text">Lolly Bags + Cooking Untensil $5</li>
                        <li class="list_text">Dessert Table (Includes: Assorted Chocolates, Lollies, Mini cakes, Slices, Cake Balls. For up to 10pax) $89</li>
                        <li class="list_text">Celebration Layered Cakes (Chocolate or Vanilla) Decorations: Boy/Girl $60 (Includes: Candles. Serves 12 pax)</li>

                    </ul>
                    <p class="post_text">*We charge BYO Cake $20 (We can provide Candles)</p>

                    

                    <!-- <a class="promo_link" href="/pdf/FedUp-Catering.pdf">Click Here To Check Out Our Lastest Products</a> -->



                    <section class="public_form">
                    <h2 class="heading_text_form">Please let us know about your party:</h2>
                        {!! Form::open(array('action' => array('Front\PublicController@postKids'))) !!} 

                            <div class="">
                                <div class="columns small-12"> <p class="public_form_title">@if ($errors->has('parent_name'))<p style="color:red;">{!!$errors->first('parent_name')!!}</p>@endif</p> </div> 
                                <div class="columns small-12 medium-5"> <p class="public_form_title">Your Full Name</p> </div>
                                
                                <div class="columns small-12 medium-7 table_mimic"> <input name="parent_name" class="form-control   " value='@if(old("parent_name")){{old("parent_name")}}@endif'/> </div>

                                <div class="columns small-12"> <p class="public_form_title">@if ($errors->has('mobile'))<p style="color:red;">{!!$errors->first('mobile')!!}</p>@endif</p> </div> 
                                <div class="columns small-12 medium-5"> <p class="public_form_title">Mobile Number</p> </div>
                                
                                <div class="columns small-12 medium-7 table_mimic"> <input name="mobile" class="form-control   " value='@if(old("mobile")){{old("mobile")}}@endif'/> </div>

                                <div class="columns small-12"> <p class="public_form_title">@if ($errors->has('email'))<p style="color:red;">{!!$errors->first('email')!!}</p>@endif</p> </div> 
                                <div class="columns small-12 medium-5"> <p class="public_form_title">Email</p> </div>
                                <div class="columns small-12 medium-7 table_mimic"> <input name="email" class="form-control   " value='@if(old("email")){{old("email")}}@endif'/> </div>
                                

                                <div class="columns small-12"> <p class="public_form_title">@if ($errors->has('date'))<p style="color:red;">{!!$errors->first('date')!!}</p>@endif</p> </div>                        
                                <div class="columns small-12 medium-5"> <p class="public_form_title">Party Date</p> </div>
                                
                                <div class="columns small-12 medium-7 table_mimic"> <input name="date" class="form-control   " value='@if(old("date")){{old("date")}}@endif'/> </div>


                                <div class="columns small-12 medium-5"> <p class="public_form_title">Birthday Child's Name</p> </div>
                                
                                <div class="columns small-12 medium-7 table_mimic"> <input name="child_name" class="form-control   " value='@if(old("child_name")){{old("child_name")}}@endif'/> </div>


                                <div class="columns small-12 medium-5"> <p class="public_form_title">Birthday Child's Age</p> </div>
                                
                                <div class="columns small-12 medium-7 table_mimic"> <input name="child_age" class="form-control   " value='@if(old("child_age")){{old("child_age")}}@endif'/> </div>


                                <div class="columns small-12 medium-5"> <p class="public_form_title">Birthday Child's Gender</p> </div>
                                
                                <div class="columns small-12 medium-7 table_mimic"> <input name="child_gender" class="form-control   " value='@if(old("child_gender")){{old("child_gender")}}@endif'/> </div>


                                <div class="columns small-12 medium-5"> <p class="public_form_title">Number of Kids? (min*8)</p> </div>
                                
                                <div class="columns small-12 medium-7 table_mimic"> <input name="attend" class="form-control   " value='@if(old("attend")){{old("attend")}}@endif'/> </div>


                                <div class="columns small-12 medium-5"> <p class="public_form_title">Get Us To Create invitations</p> </div>
                                
                                <div class="columns small-12 medium-7 table_mimic"> <input name="invitation" class="form-control   " value='@if(old("invitation")){{old("invitation")}}@endif'/> </div>

                                <div class="columns small-12 medium-5"> <p class="public_form_title">Does anyone have food intolerances</p> </div>
                                
                                <div class="columns small-12 medium-7 table_mimic"> <input name="intolerance" class="form-control   " value='@if(old("intolerance")){{old("intolerance")}}@endif'/> </div>


                                <div class="columns small-12 medium-5"> <p class="public_form_title">Which Mini Cooking Activity</p> </div>
                                
                                <div class="columns small-12 medium-7 table_mimic">
                                    <select name="activity" class="form-control">
                                            <option value="0" selected="selected">- Select Activity -</option>  
                                            <option value="1" @if(old("activity") == 1)selected="selected"@endif >Pancakes</option>  
                                            <option value="2" @if(old("activity") == 2)selected="selected"@endif >Chocolate Crunch Balls</option> 
                                            <option value="3" @if(old("activity") == 3)selected="selected"@endif >Honey crackles</option>  
                                            <option value="4" @if(old("activity") == 4)selected="selected"@endif >Mini pizzas</option> 
                                            <option value="5" @if(old("activity") == 5)selected="selected"@endif >Decorate cupcakes</option>  
                                    </select>
                                </div>


                                <div class="columns small-12 medium-5"> <p class="public_form_title">Number of Parents</p> </div>
                                
                                <div class="columns small-12 medium-7 table_mimic"> <input name="parent_attend" class="form-control   " value='@if(old("parent_attend")){{old("parent_attend")}}@endif'/> </div>


                                <div class="columns small-12 medium-5"> <p class="public_form_title">Would You Like Food For Parents</p> </div>
                                
                                <div class="columns small-12 medium-7 table_mimic"> <input name="parent_food" class="form-control   " value='@if(old("parent_food")){{old("parent_food")}}@endif'/> </div>

                                <div class="columns small-12 medium-5"> <p class="public_form_title">Which food package</p> </div>
                                
                                <!-- <div class="columns small-12 medium-7 table_mimic"> <input name="package" class="form-control   " value=''/> </div> -->

                                <div class="columns small-12 medium-7 table_mimic">
                                    <select name="package" class="form-control">
                                            <option value="0" selected="selected">- Select Package -</option>  
                                            <option value="1" @if(old("package") == 1)selected="selected"@endif >3x Sweets, 2x Savoury, fruit punch</option>  
                                            <option value="2" @if(old("package") == 2)selected="selected"@endif >4x Sweets, 3x Savoury, fruit punch</option>  
                                    </select>
                                </div>


                                <div class="columns small-12 medium-5"> <p class="public_form_title">Please Select Party food/Snacks:</p> </div>
                                
                                <!-- <div class="columns small-12 medium-7 table_mimic"> <input name="package"  class="form-control   " value=''/> </div> -->

                                <div class="columns small-12 medium-7 border_b">
                                    <!-- <ul class="bullet">
                                        <li class="list_text">Fairy bread</li>
                                        <li class="list_text">Bowl of corn chips</li>
                                        <li class="list_text">Special fruit punch</li>
                                        <li class="list_text">Fruit & yogurt frozen pops</li>
                                        <li class="list_text">Fruit skewers</li>
                                    </ul> -->
                                    <div class="">
                                        <div id="public_ck-button" class="columns small-12">
                                           <label>
                                              <input type="checkbox" name="snack_bread" @if(old("snack_bread") == 1)checked="checked"@endif value="1"><span>Fairy bread</span>
                                           </label>
                                        </div> 
                                        <div id="public_ck-button" class="columns small-12">
                                           <label>
                                              <input type="checkbox" name="snack_chip" @if(old("snack_chip") == 2)checked="checked"@endif value="2"><span>Bowl of corn chips</span>
                                           </label>
                                        </div> 
                                        <div id="public_ck-button" class="columns small-12">
                                           <label>
                                              <input type="checkbox" name="snack_fruit" @if(old("snack_fruit") == 3)checked="checked"@endif value="3"><span>Special fruit punch</span>
                                           </label>
                                        </div>    
                                    </div>
                                    
                                </div>


                                <div class="columns small-12 medium-5"> <p class="public_form_title">Please Select Savoury Food:</p> </div>
                                
                                <!-- <div class="columns small-12 medium-7 table_mimic"> <input name="package" class="form-control   " value=''/> </div> -->
                                <div class="columns small-12 medium-7 table_mimic">
                                    <select name="savoury" class="form-control">
                                            <option value="0" selected="selected">- Select Food -</option>  
                                            <option value="1" @if(old("savoury") == 1)selected="selected"@endif >Spinach & Ricotta Pastizzi</option>  
                                            <option value="2" @if(old("savoury") == 2)selected="selected"@endif >Gourmet assorted pies</option> 
                                            <option value="3" @if(old("savoury") == 3)selected="selected"@endif >Homemade sausage rolls</option>  
                                            <option value="4" @if(old("savoury") == 4)selected="selected"@endif >Assorted sushi</option> 
                                            <option value="5" @if(old("savoury") == 5)selected="selected"@endif >Mini pizzas (Special Hawaiian, Classic Margarita, BBQ Chicken & Veg)</option>  
                                    </select>
                                </div>
                                <!-- <div class="columns small-12 medium-7 ">
                                    <ul class="bullet">
                                        <li class="list_text">Spinach & Ricotta Pastizzi</li>
                                        <li class="list_text">Gourmet assorted pies</li>
                                        <li class="list_text">Homemade sausage rolls</li>
                                        <li class="list_text">Assorted sushi</li>
                                        <li class="list_text">Mini pizzas (Special Hawaiian, Classic Margarita, BBQ Chicken & Veg)</li>
                                    </ul>
                                </div> -->


                                <input class="public_from_submit" type="submit" name="submit" value="Send"/>
                            </div>
                                
                        {!! Form::close() !!}
                    </section>
                </article>
            </div>
            <div class="columns small-12 large-4 promo_section">

            </div>
            <div class="social_footer">
		        <div class="row">
		            <div class="columns small-12 medium-12 large-3">
		                <p class="blog_post_title">SAY HELLO</p>
		                <div class="button_wrapper">
		                    <a class="public_button" href="mailto:eat@fedupproject.com.au">Email Us</a>  
		                </div>
		                
		            </div>
		            <div class="columns small-12 medium-12 large-9">
		                <div class="row no_row">
		                    <div class="columns small-12 medium-6 large-3">
		                        <a href="https://www.facebook.com/fedupproject/">
		                            <img id="over" class="media__icon" src="/images/site/facebook.png" alt="Chat  to us today on Facebook"/>
		                            <p>Discuss the latest with us & Fedup Followers</p>
		                        </a>
		                    </div>
		                    <div class="columns small-12 medium-6 large-3">
		                        <a target="_blank" href="https://www.instagram.com/fedupproject"> 
		                            <img id="over" class="media__icon" src="/images/site/insta.png" alt="The prettiest things we do are here"/> 
		                            <p>Stylish photos & interactive stories</p>
		                        </a>
		                    </div> 
		                </div>
		                <div class="row no_row">
		                    <div class="columns small-12 medium-6 large-3">
		                        <a href="https://www.youtube.com/">
		                            <img id="over" class="media__icon" src="/images/site/youtube.png" alt="Still working on youtube, live cooking classes are coming soon"/>
		                            <p>Cooking classes & Collaborative Interviews</p>
		                        </a>
		                    </div>
		                    <div class="columns small-12 medium-6 large-3 end">
		                        <a target="_blank" href="https://www.snapchat.com/add/fedupproject"> 
		                            <img id="over" class="media__icon" src="/images/site/snapchat.png" alt="Where we share our personal journey"/> 
		                            <p>Day to day life of the Fed Up Project adventure</p>
		                        </a>
		                    </div> 
		                </div>
		            </div>
		        </div>
	        	<section class="columns small-12 pag_wrapper">
					<a href="/kids-birthday-parties" class="pag_next "> 
						<!-- <i class="icon right arrow"></i>  -->
						<span class="pagination__title">Discover<br>More!</span> 
					</a> 
				</section>
	    	</div>
        </div>
        
    </div>


@stop  
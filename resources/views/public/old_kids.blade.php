@extends('tmpl.public')

@section('__header') 
@stop  

@section('content') 
<section class="page"> 

 <!--    <section class="homepage_header_promo" style=" background: url(/images/uploads/large/57c3c16d7e223sf.jpg) no-repeat; background-position: center center;
            background-size: cover;">
    </section> -->
    <section class="homepage_header_promo" style=" background: url(/images/uploads/large/5854d9a2c8cc6kids.jpg) no-repeat; background-position: center center;
            background-size: cover;">
    </section>  
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
    <div class="row preview_page">
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
                            <div class="columns small-12 medium-5"> <p class="public_form_title">Your Full Name</p> </div>
                            
                            <div class="columns small-12 medium-7 table_mimic"> <input name="parent_name" class="form-control   " value=''/> </div>


                            <div class="columns small-12 medium-5"> <p class="public_form_title">Mobile Number</p> </div>
                            
                            <div class="columns small-12 medium-7 table_mimic"> <input name="mobile" class="form-control   " value=''/> </div>

                            <div class="columns small-12"> <p class="public_form_title">@if ($errors->has('date'))<p style="color:red;">{!!$errors->first('date')!!}</p>@endif</p> </div> 
                            <div class="columns small-12 medium-5"> <p class="public_form_title">Email</p> </div>
                            <div class="columns small-12 medium-7 table_mimic"> <input name="email" class="form-control   " value=''/> </div>
                            

                            <div class="columns small-12"> <p class="public_form_title">@if ($errors->has('date'))<p style="color:red;">{!!$errors->first('date')!!}</p>@endif</p> </div>                        
                            <div class="columns small-12 medium-5"> <p class="public_form_title">Party Date</p> </div>
                            
                            <div class="columns small-12 medium-7 table_mimic"> <input name="date" class="form-control   " value=''/> </div>


                            <div class="columns small-12 medium-5"> <p class="public_form_title">Birthday Child's Name</p> </div>
                            
                            <div class="columns small-12 medium-7 table_mimic"> <input name="child_name" class="form-control   " value=''/> </div>


                            <div class="columns small-12 medium-5"> <p class="public_form_title">Birthday Child's Age</p> </div>
                            
                            <div class="columns small-12 medium-7 table_mimic"> <input name="child_age" class="form-control   " value=''/> </div>


                            <div class="columns small-12 medium-5"> <p class="public_form_title">Birthday Child's Gender</p> </div>
                            
                            <div class="columns small-12 medium-7 table_mimic"> <input name="child_gender" class="form-control   " value=''/> </div>


                            <div class="columns small-12 medium-5"> <p class="public_form_title">Number of Kids? (min*8)</p> </div>
                            
                            <div class="columns small-12 medium-7 table_mimic"> <input name="attend" class="form-control   " value=''/> </div>


                            <div class="columns small-12 medium-5"> <p class="public_form_title">Get Us To Create invitations</p> </div>
                            
                            <div class="columns small-12 medium-7 table_mimic"> <input name="invitation" class="form-control   " value=''/> </div>

                            <div class="columns small-12 medium-5"> <p class="public_form_title">Does anyone have food intolerances</p> </div>
                            
                            <div class="columns small-12 medium-7 table_mimic"> <input name="intolerance" class="form-control   " value=''/> </div>


                            <div class="columns small-12 medium-5"> <p class="public_form_title">Which Mini Cooking Activity</p> </div>
                            
                            <div class="columns small-12 medium-7 table_mimic">
                                <select name="activity" class="form-control">
                                        <option value="0" selected="selected">- Select Activity -</option>  
                                        <option value="1" >Pancakes</option>  
                                        <option value="2" >Chocolate Crunch Balls</option> 
                                        <option value="3" >Honey crackles</option>  
                                        <option value="4" >Mini pizzas</option> 
                                        <option value="5" >Decorate cupcakes</option>  
                                </select>
                            </div>


                            <div class="columns small-12 medium-5"> <p class="public_form_title">Number of Parents</p> </div>
                            
                            <div class="columns small-12 medium-7 table_mimic"> <input name="parent_attend" class="form-control   " value=''/> </div>


                            <div class="columns small-12 medium-5"> <p class="public_form_title">Additional Food For Parents</p> </div>
                            
                            <div class="columns small-12 medium-7 table_mimic"> <input name="parent_food" class="form-control   " value=''/> </div>

                            <div class="columns small-12 medium-5"> <p class="public_form_title">Which food package</p> </div>
                            
                            <!-- <div class="columns small-12 medium-7 table_mimic"> <input name="package" class="form-control   " value=''/> </div> -->

                            <div class="columns small-12 medium-7 table_mimic">
                                <select name="package" class="form-control">
                                        <option value="0" selected="selected">- Select Package -</option>  
                                        <option value="1" >3x Sweets, 2x Savoury, fruit punch</option>  
                                        <option value="2" >4x Sweets, 3x Savoury, fruit punch</option>  
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
                                <div class="row">
                                    <div id="ck-button" class="columns small-12 medium-6 large-4">
                                       <label>
                                          <input type="checkbox" name="active" value="1"><span>Fairy bread</span>
                                       </label>
                                    </div> 
                                    <div id="ck-button" class="columns small-12 medium-6 large-4">
                                       <label>
                                          <input type="checkbox" name="promote" value="1"><span>Bowl of corn chips</span>
                                       </label>
                                    </div> 
                                    <div id="ck-button" class="columns small-12 medium-6 large-4">
                                       <label>
                                          <input type="checkbox" name="promote" value="1"><span>Special fruit punch</span>
                                       </label>
                                    </div>    
                                </div>
                                
                            </div>


                            <div class="columns small-12 medium-5"> <p class="public_form_title">Please Select Savoury Food:</p> </div>
                            
                            <!-- <div class="columns small-12 medium-7 table_mimic"> <input name="package" class="form-control   " value=''/> </div> -->

                            <div class="columns small-12 medium-7 ">
                                <ul class="bullet">
                                    <li class="list_text">Spinach & Ricotta Pastizzi</li>
                                    <li class="list_text">Gourmet assorted pies</li>
                                    <li class="list_text">Homemade sausage rolls</li>
                                    <li class="list_text">Assorted sushi</li>
                                    <li class="list_text">Mini pizzas (Special Hawaiian, Classic Margarita, BBQ Chicken & Veg)</li>
                                </ul>
                            </div>


                            <input class="public_from_submit" type="submit" name="submit" value="Send"/>
                        </div>
                            
                    {!! Form::close() !!}
                </section>
            </article>
            
        </div>
        <div class="columns small-12 large-4 promo_section">
            
                <div>
                    <a href="">
                        <img src="/images/uploads/small/5841e5691802fblurcake.jpg"> 
                        <h4 class="promo_post_title">Custom Orders Avaliable</h4>
                        <p class="post_text">The cake above was for a 2 year old birthday it is refine sugar free, gluten free, dairy free & nut free. As all the children at the party had these intolerances, the children told us they loved it.</p>
                    </a>   
                </div> 
                
            
        </div>
    </div>
    <!-- </div> -->
</section>


@stop  
@extends('tmpl.public')

@section('__header') 
@stop  

@section('image')
<div id="book_form" class="book_bgimg" style=" "> 
    <div class="book_form_image_cover">
        
    </div>
    <div class="header_form_wrapper">
        <div class="columns small-12 large-8 large-push-2 book_form">
            <h2 class="book_heading_text_form">Book Table:</h2>
                    @if($errors->has())
                <div class="columns small-12">
                    @foreach ($errors->all() as $error)
                        <p class="home_error">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            @if(isset($message))
            <div class="row " style="margin-top: 1rem !important; margin-bottom: 2rem !important; background: #fff !important;padding: 1rem !important;">
                <div class="columns small-12 success_message ">
                    <p class="home_success">{{ $message2 }}</p>
                    <p class="home_success">{{ $message }}</p>
                </div>
            </div>
            
            @endif
            {!! Form::open(array('action' => array('Front\PublicController@postBookTable'))) !!} 

                <div class="">
                    <div class="columns small-12"> <p class="book_form_title">@if ($errors->has('name'))<p style="color:red;">{!!$errors->first('name')!!}</p>@endif</p> </div> 
                    <div class="columns small-12 medium-5"> <p class="book_form_title">Booking Name:</p> </div>
                    <div class="columns small-12 medium-7 table_mimic"> <input name="name" class="book_form_control   " value='@if(old("name")){{old("name")}}@endif'/> </div>

                    <div class="columns small-12"> <p class="book_form_title">@if ($errors->has('people'))<p style="color:red;">{!!$errors->first('people')!!}</p>@endif</p> </div> 
                    <div class="columns small-12 medium-5"> <p class="book_form_title">How Many People:</p> </div>
                    <div class="columns small-12 medium-7 table_mimic"> <input name="people" class="book_form_control   " value='@if(old("people")){{old("people")}}@endif'/> </div>

                    <div class="columns small-12"> <p class="book_form_title">@if ($errors->has('date'))<p style="color:red;">{!!$errors->first('date')!!}</p>@endif</p> </div> 
                    <div class="columns small-12 medium-5"> <p class="book_form_title">Date:</p> </div>
                    <div class="columns small-12 medium-7 table_mimic"> <input name="date" class="book_form_control   " value='@if(old("date")){{old("date")}}@endif'/> </div>

                    <div class="columns small-12"> <p class="book_form_title">@if ($errors->has('time'))<p style="color:red;">{!!$errors->first('time')!!}</p>@endif</p> </div> 
                    <div class="columns small-12 medium-5"> <p class="book_form_title">Time:</p> </div>
                    <div class="columns small-12 medium-7 table_mimic"> <input name="time" class="book_form_control   " value='@if(old("time")){{old("time")}}@endif'/> </div>

                    <div class="columns small-12"> <p class="book_form_title">@if ($errors->has('email'))<p style="color:red;">{!!$errors->first('email')!!}</p>@endif</p> </div> 
                    <div class="columns small-12 medium-5"> <p class="book_form_title">Email:</p> </div>
                    <div class="columns small-12 medium-7 table_mimic"> <input name="email" class="book_form_control   " value='@if(old("email")){{old("email")}}@endif'/> </div>

                    <div class="book_button">
                        <div class="columns small-12">
                            <div class="book_table_wrapper">
                                <!-- <a id="book_table" class="book_table" href="/book-table">Book Table</a>  -->
                                <input id="book_table" class="book_table_input" type="submit" name="submit" value="Book Table"/> 
                            </div> 
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<!-- <div id="book_form" class="book_form">

</div> -->
@stop
@section('content') 

<section class="page home">
<!--     <div id="row" class="row">
            <div class="header_image">
            </div> 
            <div class="header_title_wrapper">
                <h1 class="header_title">Calculate Recipe Costs!</h1>
            </div>
        </div>
    </div> -->
    
    <div class="main"> 
        <div class="book_base">
            <div class="row">
                
                <div class="columns small-12 about_content">
                    <div>
                        <p class="business_hours">Mon - Fri: 6am - 5pm, Sat:&nbsp;8am&nbsp;-&nbsp;2pmish</p>
                    </div>
                    
                    
                    
                </div>
                
                <div class="columns small-12 large-4 show-large-up sc_wrapper">   
                    <!-- <img class="about_image" src="/images/site/sc_top.png" alt="SNAPCHAT US @ FEDUPPROJECT"> -->
                </div>
            </div>
        </div>
        
        <div id="row" class="row no_row">
            
                <div class="map_wrapper">
                    <div class="map_image" "></div> 
                </div>
                <a href="/location" class="map_link map_clickable">
                </a>
            
            
           <!--  <div id="map" class="map">
            </div> -->
        </div>

        

        <div class="social_section">
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
            
        </div>



        
        

    </div>
</section>

@stop 


@extends('tmpl.public')

@section('__header') 
@stop  

@section('image')
<a href="@if($no_hp == 0)/{{$hp_promote->url}}@else /menu @endif">
<div id="book_form" class="bgimg" style="background-image: url('@if($no_hp == 0)/images/uploads/large/{{$promo_bg_image->file_name}}@else {{ $promo_bg_image }} @endif '); "> 
    <div class="header_title_wrapper">
    <h1 class="header_title">@if($no_hp == 0){{$hp_promote->hook}}@endif</h1>
    </div>
    
</div>
</a>
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
    @if($errors->has())
        <div class="columns small-12">
            @foreach ($errors->all() as $error)
                <p class="home_error">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    @if(isset($message))
    <div class="columns small-12">
        <p class="home_success">{{ $message }}</p>
    </div>
    @endif
    <div class="main"> 
        <div class="about_section">
            <div class="row">
                
                <div class="columns small-12 large-8 about_content">
                    <div>
                        <p class="business_hours">Mon - Fri: 6am - 5pm, Sat:&nbsp;8am&nbsp;-&nbsp;2pmish</p>
                    </div>
                    
                    <div class="book_button">
                        <div class="columns small-12">
                            <div class="book_table_wrapper">
                                <a id="book_table" class="book_table" href="/book-table">Book Table</a>  
                            </div> 
                        </div>
                    </div>
                    
                </div>
                
                <div class="columns small-12 large-4 show-large-up sc_wrapper">   
                    <img class="about_image" src="/images/site/sc_top.png" alt="SNAPCHAT US @ FEDUPPROJECT">
                </div>
            </div>
        </div>
        
        <div id="row" class="row no_row">
            
                <div class="map_wrapper">
                    <div class="map_image" "></div> 
                </div>
                <a href="/location" class="map_link">
                </a>
            
            
           <!--  <div id="map" class="map">
            </div> -->
        </div>

        <div class="explain_section">
            <div class="row">
                <div class="columns small-12 large-7">
                    <p class="explain_heading">Local Food, <br> Price never compromises great taste <br> @fedupproject</p>
                </div>
                <div class="columns small-12 large-5 ">
                    <img class="explain_image" src="/images/site/menu.jpg" alt="Girls working at Fed Up Project">
                </div>
            </div>
            <div class="row">
                <div class="columns small-12 large-7 large-push-5">
                    <p class="explain_text">A Happy you makes a Healthy you.<br><br>
                    Our cafe focusses on providing you with Wholesome foods, sourced locally within Victoria.<br><br> 
                    We Team up with some of the best in Melbourne, including Helping Humans, Gippsland Dairy, Cortado Coffee, Burd Farm, Berties Butchers, Boisdale Best.<br><br>
                    We will also be launching Event Nights, Cooking Classes, Themed Degustation Dinners.<br><br>
                    Amazing food experiences<br></p>
                    
                </div>
                <div class="columns small-12 large-5 large-pull-7">
                    <img class="explain_image hide-for-small-only" src="/images/site/menu.jpg" alt="Girls working at Fed Up Project">
                </div>            
            </div>
        </div>
        <div class="sc_section">
            <div class="row no_row">
                <div class="columns small-4 medium-8 large-4">
                    <div class="columns small-12 medium-6 ">
                        <a href="/events">
                            <img class="sc_image_front" src="/images/site/5.png" alt="Events Image">
                            <div class="sc_text_wrap">
                                <p class="sc_text">Events</p>
                            </div>
                        </a>
                    </div>
                    <div class="columns small-12 medium-6">
                        <a href="/catering">
                            <img class="sc_image_front" src="/images/site/2.png" alt="Catering Image">
                            <div class="sc_text_wrap">
                                <p class="sc_text">Catering</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="columns small-8 medium-4 large-2">
                    <div class="columns small-12">
                        <a href="/menu">
                            <img class="sc_image_front" src="/images/site/3.png" alt="Menu Image">
                            <div class="sc_text_wrap sc_big_text_wrap">
                                <p class="sc_text_large">Menu</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row no_row">
                
                <div class="columns small-8 medium-4 large-2">
                    <div class="columns small-12">
                        <a href="/blog">
                            <img class="sc_image_front" src="/images/site/1.png" alt="Blog Image">
                            <div class="sc_text_wrap sc_big_text_wrap">
                                <p class="sc_text_large">Blog</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="columns small-4 medium-8 large-4">   
                    <div class="columns small-12 medium-6">
                        <a href="/cakes">
                            <img class="sc_image_front" src="/images/site/6.png" alt="Cakes Image">
                            <div class="sc_text_wrap">
                                <p class="sc_text">Cake</p>
                            </div>
                        </a>
                    </div>
                    <div class="columns small-12 medium-6">
                        <a href="/project">
                            <img class="sc_image_front" src="/images/site/4.png" alt="Project Image">
                            <div class="sc_text_wrap">
                                <p class="sc_text">Project</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="row"></div>
        <div class="promo_blog_section">
            <div class="row">
                <a class="anchor_link" href="/{{ $blogpost->url}}"> 
                    <p class="read_this">Read This</p>
                    <div class="columns small-12 xlarge-8 blog_content_box">                 
                        <img src='{{$no_post == 0 ? "/images/uploads/large/$bg_image->file_name" : "/images/site/bw.jpg"}}'>
                    </div> 
                </a>
                <div class="columns small-12 xlarge-4">
                    <a class="anchor_link" href="/{{ $blogpost['url']}}"> 
                        <h4 class="blog_post_title">{{$blogpost->post_name}}<span class="blog_post_date"> - {{ $blogpost->date }}</span></h4>
                    </a>
             <!--        <div class="columns small-6">

                    </div> -->
                    <div class="columns small-6 post_links">
                        <a href="/getfedup/tag/{{ $blogpost->hashtag}}" class="hashtag_link">#{{$blogpost->hashtag}}</a>
                    </div>
                    <div class="columns small-6 post_link_tag">
                        <a href="/{{ $blogpost->url}}" class="span_link">-> Read Now</a>                      
                    </div>
                    <a class="anchor_link" href="/{{ $blogpost->url}}"> 
                        <p class="blog_blurb_text">{{ $blogpost->blurb }} </p>
                    </a>
                </div>
            </div>
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

<!-- <script type="text/javascript">
    getelementbyid('book_form').onClick({

    })
</script> -->
@stop 


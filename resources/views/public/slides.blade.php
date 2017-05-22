@extends('tmpl.public')

@section('_header') 
    <!-- Place somewhere in the <head> of your document -->
    <link rel="stylesheet" href="/sass/css/flexslider.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script src="/js/flexslider.js"></script>
    <!-- <link rel="stylesheet" href="/bower_components/swiper/dist/css/swiper.min.css"> -->

    
<!-- Place in the <head>, after the three links -->
<script type="text/javascript" charset="utf-8">
  $(window).load(function() {
 
    //simple FlexSlider call
    $('.flexslider').flexslider();
 
    // more complex call
    $('.flexslider').flexslider({
         animation: "slide",
         controlsContainer: ".flex-container",
         start: function(slider) {
           $('.total-slides').text(slider.count);
         },
         after: function(slider) {
           $('.current-slide').text(slider.currentSlide);
         }
    });
  });
</script>
@stop  

@section('content') 
<section class="page"> 
    <!-- <h1 class="blog_title">#Slides</h1> -->
    <!-- <h2 class="blog_sub_titleh">FED UP BLOG</h2> -->
    <div class="row">
        <div class="columns small-5">
            <div class="wrap">
                <iframe id="frame" src="http://www.tramtracker.com/" style="">
                   Sorry your browser does not support inline frames.
                </iframe>
            </div>   
        </div>
        <div class="columns small-7">
            <!-- <img src="/images/uploads/large/57c42bc2d0c5bgirls.jpg" alt="Girls working at Fed Up Project"> -->
            <section class="slider_image" style="background-image: url('@if($no_hp == 0)/images/uploads/large/{{$promo_bg_image->file_name}}@else {{ $promo_bg_image }} @endif '); "> </section>
            <div class="header_title_wrapper">
            <h1 class="header_title">@if($no_hp == 0){{$hp_promote->hook}}@endif</h1>
            </div>

        </div>
        
    </div>
    

</section>




@stop  

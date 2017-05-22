@extends('tmpl.public')

@section('_header') 


        

















@stop  

@section('image')
    <header class="blog_header">
        <div class="row no_row">
            <div class="columns small-12 ">
                <a href="/{{ $first['url']}}">
                    <img class="sc_header_image_front hide-for-small-only" src="/images/uploads/large/{{ $first['image'] }}" alt="Snapchat">
                    <img class="sc_header_image_front show-for-small-only" src="/images/uploads/phone/large/{{ $first['vimage'] }}" alt="Snapchat">
                    <!-- <div class="sc_header_text_wrap">
                        <p class="sc_text_large">{{$first['title']}}</p>
                    </div> -->
                </a>
            </div>
            
        </div>
        
        
        
    </header>
@stop

@section('content') 
<div class="clear_both"></div>
<section class="page"> 
   <!--  <div class="sc_header_text_wrap">
        <p class="sc_text_large">{{$first['title']}}</p>
    </div> -->
    <a href="/{{ $first['url']}}">
    <div class="sc_header_text_wrap">
        <div class="row">
        
            <div class="columns small-12 large-6 blog_promo_text_section">
                <div class="blog_promo_title_wrap">
                    <H1 class="">{{$first['title']}}</H1> 
                    <p class="promo_read_more hide-large-up">Read More >></p>
                </div>
                
            </div>
            <div class="columns large-6 show-large-up blog_promo_text_section">
                <div class="blog_promo_title_wrap">
                    <p class="promo_header_blurb">{{$first['blurb']}}</p>
                    <p class="promo_read_more">Read More >></p>
                </div>
                
            </div>  
          
        </div>
           
    </div>
    </a>
    <div>
        <img class="arrow hide-large-up" src="/images/site/darrow.png">
        <h1 class="blog_title">#FEDUPPROJECTS</h1> 
    </div>
    
    <!-- <h2 class="blog_sub_title">FED UP BLOG</h2> -->
    


    <div class="row blog_page">
        <div class="blog_section">
        @foreach($post_array as $id => $post)
            @if($first['id'] != $post['id'])
                <a class="anchor_link" href="/{{ $post['url']}}"> 
                    <div class="columns small-12 xlarge-8 blog_content_box">                 
                        <img src="/images/uploads/medium/{{$post['himage']}}"> 
                    </div> 
                </a>
                <div class="columns small-12 xlarge-4">
                    <a class="anchor_link" href="/{{ $post['url']}}"> 
                        <h4 class="blog_post_title">{{$post['title']}}<span class="blog_post_date"> - {{ $post['date'] }}</span></h4>
                    </a>
             <!--        <div class="columns small-6">

                    </div> -->
                    <div class="columns small-6 post_links">
                        <a href="/getfedup/tag/{{ $post['hashtag']}}" class="hashtag_link">#{{$post['hashtag']}}</a>
                    </div>
                    <div class="columns small-6 post_link_tag">
                        <a href="/{{ $post['url']}}" class="span_link">-> Read Now</a>                      
                    </div>
                    <a class="anchor_link" href="/{{ $post['url']}}"> 
                        <p class="blog_blurb_text">{{ $post['blurb'] }} </p>
                    </a>
                </div>
            @endif
        @endforeach
        </div>

    </div>


</section>

<!-- <script type="text/javascript">
    var header = document.getElementById("container");
    header.className += " top_blog_page";
</script> -->


@stop  
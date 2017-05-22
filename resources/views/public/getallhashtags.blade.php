@extends('tmpl.public')

@section('__header') 
@stop  

@section('content') 
<section class="page"> 
    <h1 class="blog_title">#{{$hashtag}}</h1>
    <!-- <h2 class="blog_sub_titleh">FED UP BLOG</h2> -->
    <div class="row blog_page">
        <div class="blog_section">
        @foreach($post_array as $id => $post)
            <a class="anchor_link" href="/getfedup/{{ $post['url']}}"> 
                <div class="columns small-12 xlarge-8 blog_content_box">                 
                    <img src="/images/uploads/medium/{{$post['image']}}"> 
                </div> 
            </a>
            <div class="columns small-12 xlarge-4">
                <a class="anchor_link" href="/getfedup/{{ $post['url']}}"> 
                    <h4 class="blog_post_title">{{$post['title']}}<span class="blog_post_date"> - {{ $post['date'] }}</span></h4>
                </a>
         <!--        <div class="columns small-6">

                </div> -->
                <div class="columns small-6 post_links">
                    <a href="/getfedup/tag/{{ $post['hashtag']}}" class="hashtag_link">#{{$post['hashtag']}}</a>
                </div>
                <div class="columns small-6 post_link_tag">
                    <a href="/getfedup/{{ $post['url']}}" class="span_link">-> Read Now</a>                      
                </div>
                <a class="anchor_link" href="/getfedup/{{ $post['url']}}"> 
                    <p class="blog_blurb_text">{{ $post['blurb'] }} </p>
                </a>
            </div>
            <hr/>
        @endforeach
        </div>
        
    </div>

</section>


@stop  
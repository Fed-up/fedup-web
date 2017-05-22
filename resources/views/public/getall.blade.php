@extends('tmpl.public')

@section('__header') 
@stop  

@section('content') 
<section class="page"> 
    <h1 class="blog_title">#FEDUPBLOG</h1>
    <!-- <h2 class="blog_sub_title">FED UP BLOG</h2> -->
        <div class="sc_section">
            <div class="row no_row">
                <div class="columns small-4 medium-8 large-4">
                    <div class="columns small-12 medium-6 ">
                        <a href="/test6">
                            <img class="sc_image_front" src="/images/site/5.png" alt="Girls working at Fed Up Project">
                            <div class="sc_text_wrap">
                                <p class="sc_text">Events</p>
                            </div>
                        </a>
                    </div>
                    <div class="columns small-12 medium-6">
                        <a href="/test6">
                            <img class="sc_image_front" src="/images/site/2.png" alt="Girls working at Fed Up Project">
                            <div class="sc_text_wrap">
                                <p class="sc_text">Catering is for every body yummy Catering is for every body yummy</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="columns small-8 medium-4 large-2">
                    <div class="columns small-12">
                        <a href="/test6">
                            <img class="sc_image_front" src="/images/site/3.png" alt="Girls working at Fed Up Project">
                            <div class="sc_text_wrap">
                                <p class="sc_text_large">Menu</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row no_row">
                
                <div class="columns small-8 medium-4 large-2">
                    <div class="columns small-12">
                        <a href="/test6">
                            <img class="sc_image_front" src="/images/site/1.png" alt="Girls working at Fed Up Project">
                            <div class="sc_text_wrap">
                                <p class="sc_text_large">Blog</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="columns small-4 medium-8 large-4">   
                    <div class="columns small-12 medium-6">
                        <a href="/test6">
                            <img class="sc_image_front" src="/images/site/6.png" alt="Girls working at Fed Up Project">
                            <div class="sc_text_wrap">
                                <p class="sc_text">Cake</p>
                            </div>
                        </a>
                    </div>
                    <div class="columns small-12 medium-6">
                        <a href="/test6">
                            <img class="sc_image_front" src="/images/site/4.png" alt="Girls working at Fed Up Project">
                            <div class="sc_text_wrap">
                                <p class="sc_text">Project</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row no_row">
                <div class="columns small-4 medium-8 large-4">
                    <div class="columns small-12 medium-6 ">
                        <a href="/test6">
                            <img class="sc_image_front" src="/images/site/5.png" alt="Girls working at Fed Up Project">
                            <div class="sc_text_wrap">
                                <p class="sc_text">Events</p>
                            </div>
                        </a>
                    </div>
                    <div class="columns small-12 medium-6">
                        <a href="/test6">
                            <img class="sc_image_front" src="/images/site/2.png" alt="Girls working at Fed Up Project">
                            <div class="sc_text_wrap">
                                <p class="sc_text">Catering</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="columns small-8 medium-4 large-2">
                    <div class="columns small-12">
                        <a href="/test6">
                            <img class="sc_image_front" src="/images/site/3.png" alt="Girls working at Fed Up Project">
                            <div class="sc_text_wrap">
                                <p class="sc_text_large">Menu</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row no_row">
                
                <div class="columns small-8 medium-4 large-2">
                    <div class="columns small-12">
                        <a href="/test6">
                            <img class="sc_image_front" src="/images/site/1.png" alt="Girls working at Fed Up Project">
                            <div class="sc_text_wrap">
                                <p class="sc_text_large">Blog</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="columns small-4 medium-8 large-4">   
                    <div class="columns small-12 medium-6">
                        <a href="/test6">
                            <img class="sc_image_front" src="/images/site/6.png" alt="Girls working at Fed Up Project">
                            <div class="sc_text_wrap">
                                <p class="sc_text">Cake</p>
                            </div>
                        </a>
                    </div>
                    <div class="columns small-12 medium-6">
                        <a href="/test6">
                            <img class="sc_image_front" src="/images/site/4.png" alt="Girls working at Fed Up Project">
                            <div class="sc_text_wrap">
                                <p class="sc_text">Project</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
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
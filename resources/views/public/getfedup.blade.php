@extends('tmpl.public')

@section('__header') 
@stop  

@section('content') 
<section class="page"> 

 <!--    <section class="homepage_header_promo" style=" background: url(/images/uploads/large/57c3c16d7e223sf.jpg) no-repeat; background-position: center center;
            background-size: cover;">
    </section> -->
    @if($no_post == 0)

        @if($image_count != 0)
            <section class="hide-for-small-only hide-for-medium-only show-for-large-up header_promo" style=" background: url(/images/uploads/large/{{ $background_image->file_name }}) no-repeat; background-position: center center;
                    background-size: cover;">
            </section>  
            <div class="row post_page">
                <img class="small_header_promo" src="/images/uploads/medium/{{ $background_image->file_name }}">
                <div class="columns small-12 large-8 blog_section">
                    <h1 class="post_title">{{ $post->post_name }}</h1>
                    <article class="post_header">
                        <div class="columns small-12 medium-6 ">
                            <p class="post_author">{{ $post->author }}</p>
                        </div>
                        <div class="columns small-12 medium-6 ">
                            <p class="post_time">{{ $post->read_time }}min read</p>
                        </div>
                    </article>
                    <article class="post_content">
                        <p class="post_text">{{ $post->blurb }} </p>
                        @if($no_video == 0)
                            <div class="video-container">
                                <iframe width="560" height="315" src="{{ $post->video_link }}" frameborder="0" allowfullscreen></iframe>  
                            </div>
                        @endif
                        @if($post_array != 'luke')
                            <?php $x = 0; ?>
                        
                            @foreach($post_array as $id => $pt) 
                         
                                @if($pt["section"] != "LINK")
                                    @if($pt["section"] == "HEADER")
                                        <h2 class="heading_text">{{ $pt['description'] }} </h2>
                                    @elseif($pt["section"] == "PROMO")
                                        <p class="promo_text">{{ $pt['description'] }} </p>
                                    @else
                                        <p class="post_text">{{ $pt['description'] }} </p>
                                    @endif
                                @else
                                    <a class="promo_link" href="{{ $pt['link'] }}">{{ $pt['description'] }}</a>
                                @endif
                             
                            <?php $x++; ?>  
                            @endforeach
                        @endif
                    </article>
                    @if($image_count >= 2)
                    <section class="post_images">
                        <h2 class="heading_text">IMAGES</h2>
                        @foreach($images_array as $exImages)
                            <!-- <p class="post_text">{{ $exImages['file_name'] }} </p><br> -->
                            <img src="/images/uploads/small/{{$exImages['file_name']}}">
                        @endforeach
                    </section>

                    @endif
                    <hr/>
                </div>
                <div class="columns small-12 large-4 promo_section">
                    @foreach($ppost_array as $id => $pp)
                        <div class="promo_content_box">
                            <a href="/getfedup/{{ $pp['url'] }}">
                                <img src="/images/uploads/small/{{$pp['image']}}">

                                <h4 class="promo_post_title">{{$pp['title']}}</h4>
                                <div class="columns small-6 post_links">
                                    <a href="/getfedup/tag/{{ $pp['hashtag'] }}" class="hashtag_link">#{{$pp['hashtag']}}</a>
                                    
                                </div>
                                <div class="columns small-6 post_link_tag">
                                    <a href="/getfedup/{{ $pp['url'] }}" class="span_link">-> Read Now</a> 
                                </div>
                            </a>   
                        </div> 
                        <hr/>
                        
                    @endforeach
                </div>
            </div>


        @else

        @endif
    @endif
    <!-- </div> -->
</section>


@stop  
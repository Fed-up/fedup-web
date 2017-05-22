@extends('tmpl.public')

@section('__header') 
    
@stop  

@section('content') 

<section class="page">
    <div class="">
        <h1 class="center_title event_menu_title">Click Image for Today's Event Menu</h1>
    </div>
    <div class="row">       
        <div class="columns small-12 large-6 large-push-3 end event_menu_button">
            <a href='/pdf/secrets_menu.pdf' target='_blank'>
                <section id="mission" class="section__mission" style='background: transparent url({{ $no_post == 0 ? "/images/site/menu.jpg" : "/images/site/bw.jpg" }}) no-repeat; background-position: center center;
            background-size: cover; 
            margin-bottom: 6rem;'>
                    <!-- <img src="/images/paws/rleaf.png" alt="Where Real food comes to life" name="Where Real food comes to life" class="leaf3"> -->
                    
                        <article class="small-12 medium-10 medium-push-1 large-8 large-push-2 xlarge-6 xlarge-push-3">
                            <!-- <p class="mission__fedup">#GETFEDUP Blog</p> -->
                      <!--       <p class="mission__nourish">WITH NOURISHING</p>
                            <p class="mission__point">FOOD</p>
                            <p class="mission__point">EDUCATION</p>
                            <p class="mission__point">PEOPLE</p> -->

                        </article> 
                          
                </section>
            </a> 
            <div class="button_middle">
                <a href='{{ $no_post == 0 ? "/getfedup/eventmenu" : "/eventmenu" }}' class='discover_link'>See Menu..</a>
            </div>



        </div>
    </div>
</section>



<!-- <div class="band page">
<nav class=" subnav subnav--centre" data-tab data-options="deep_linking:true; scroll_to_content: false">
<h2 class="content__title--main"><a class="plain__header__link" href="/">Login</a></h2>
</nav>
<!-- <h2 class="content__title content__title--main"><a class="content__title--link" href="/profile">Login</a></h2> -->
<!-- </div>
-->
@stop 


@section('_footer') 
    

@stop
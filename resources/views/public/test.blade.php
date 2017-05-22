@extends('tmpl.public')

@section('__header') 
@stop  

@section('image')\
<div class="bgimg" style="background-image: url('/images/site/sarah.png'); position: fixed;">
        <div class="header_title_wrapper">
        <h1 class="header_title">Lifestyle Cafe</h1>
        </div>
        <img class="arrow" src="/images/site/seemore.png">
    </div>
<section class="top_section">
    

    <a class="" href="/">
        <div class="columns small-4 back_page">
            <p>Back</p>
        </div>
    </a>
    <a class="" href="/getfedup">
        <div class="columns small-8 next_page">
            <p>Next</p>
        </div>
    </a> 
</section>


@stop
@section('content') 

<section class="page home" >
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

      <div id="test" class="box" style="height: 10rem; background-color: red;">Swipe me</div>
        
        

    </div>
        


</section>

@stop 



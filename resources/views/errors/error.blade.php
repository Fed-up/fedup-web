@extends('tmpl.public')

@section('__header') 
@stop  

@section('content') 

    <section class="page dark">
        <div class="">
            <h1 class="center_title">Whoops Tom Made A Mistake</h1>
        </div>
        <div class="row">       
            <div class="message_outer">
                <p class="error_text">Or you have miss typed your URL please check & try again =)</p>
                <a href="mailto:eat@fedupproject.com.au" class="columns small-8 small-push-2 large-6 large-push-3 end message">
                    <span class="message_inner" >Let me know admin@fedupproject.com.au</span>
                </a>  
            </div>
        </div>
    </section>

@stop 
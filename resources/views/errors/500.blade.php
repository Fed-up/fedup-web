@extends('tmpl.public')

@section('__header') 
@stop  

@section('content') 

    <section class="page dark">
        <div class="">
            <h1 class="errot_title">Whoops Tom Made A Mistake</h1>
        </div>
        <div class="row">       
            <div class="message_outer">
                <a href="/">
                    <div class="columns small-10 small-push-1 large-6 large-push-3 end message">
                        <p class="message_inner" >Let me know admin@fedupproject.com.au</p>
                        <p class="message_inner_sub" >CODE - 500 </p>
                    </div> 
                </a> 
            </div>
        </div>
    </section>

@stop 
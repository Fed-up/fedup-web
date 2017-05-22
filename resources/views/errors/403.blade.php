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
                        <p class="message_inner_sub" >CODE - 403 </p>
                    </div> 
                </a> 
            </div>
        </div>
    </section>

@stop 


<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Be right back.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Be right back.</div>
            </div>
        </div>
    </body>
</html> -->

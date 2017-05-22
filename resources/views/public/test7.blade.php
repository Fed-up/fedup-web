@extends('tmpl.admin')

@section('__header') 
    <title>PHP - Image Uploading with Form JS Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>  -->
    <script src="/packages/jquery-1.11.1.min/jquery-1.11.1.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script> 
    <script> 
            $(document).ready(function() { 
                $(".upload-image").click(function(){
                    $(".form-horizontal").ajaxForm({target: '.preview'}).submit();
                });
            }); 
    </script>
@stop  

@section('content') 
    <nav class="navbar navbar-default">
        <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="#">PHP - Image Uploading with Form JS Example</a>
        </div>
        </div>
    </nav>
    <div class="container">
    <form action="/single-upload" enctype="multipart/form-data" class="form-horizontal" method="post">
        <div class="preview"></div>
        <input type="file" name="image" class="form-control" style="width:30%" />
        <button class="btn btn-primary upload-image">Save</button>
    </form>
    </div>

@stop 

@extends('tmpl.admin')

@section('__header') 
@stop  
 
@section('content') 

<section class="page">
	<section class="row">
		<div class="columns small-12">
			<div class="">
		        <h1 class="center_title">Catering Posts</h1>
		    </div>
		</div>
		<div class="admin_add">
			<a href="/admin/post/add">+ add</a> 
		</div>
	</section>
	<section class="row content_list">
			<ul>
			    @foreach($blog_posts as $post)

			    	<li class="list_row">
				    	<div class="columns small-1">
				        	<a class="list_delete" href="/admin/post/delete/{{$post->id}}">x</a>
				        </div>
				        <div class="columns small-11 medium-10 end"> 
				        	<a class="list_details" href="/admin/post/edit/{{$post->id}}">{{ $post->post_name }}</a>
				        </div>
				        <div class="columns medium-1 end medium_screen_start"> 
				        	<a class='list_details {{ ($post->active == 1 )? "active_text" : "no_active_text" }}' href="/admin/post/active/{{$post->id}}">{{ $post->read_time }}</a>
				        </div>
				    </li>
			        
			        
			    @endforeach
		    </ul>	
		
	</section> 
    
</section>
@stop 
@extends('tmpl.admin')

@section('__header') 
@stop  
 
@section('content') 

<section class="page">
	<section class="row">
		<div class="columns small-12">
			<div class="">
		        <h1 class="center_title">Recipes</h1>
		    </div>
		</div>
		<div class="admin_add">
			<a href="/admin/recipes/add">+ add</a> 
		</div>
	</section>
	<section class="row content_list">
			<ul>
			    @foreach($recipe as $r)

			    	<li class="list_row">
				    	<div class="columns small-1">
				        	<a class="list_delete" href="/admin/recipes/delete/{{$r->id}}">x</a>
				        </div>
				        <div class="columns small-11 medium-6 end"> 
				        	<a class="list_details" href="/admin/recipes/edit/{{$r->id}}">{{ $r->recipe_name }}</a>
				        </div>
				        <div class="columns medium-3 end medium_screen_start"> 
				        	<a class="list_details" href="/admin/recipes/edit/{{$r->id}}">${{ $r->recipe_price }}</a>
				        </div>
				    </li>
			        
			        
			    @endforeach
		    </ul>	
		
	</section> 
    
</section>
@stop 
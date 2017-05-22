@extends('tmpl.admin')

@section('__header') 
@stop  
 
@section('content') 

<section class="page">
	<section class="row">
		<div class="columns small-12">
			<div class="">
		        <h1 class="center_title">Ingredients</h1>
		    </div>
		</div>
		<div class="admin_add">
			<a href="/admin/ingredients/add">+ add</a> 
		</div>
	</section>
<!-- 	<section class="row">
		<div class="columns small-12 medium-6 large-4 xlarge-3 xxlarge-2 end">
			<ul>
			    @foreach($ingredients as $ingredient)
			        <div class="columns small-11">
			        	<li><a href="/admin/ingredients/edit/{{$ingredient->id}}">{{ $ingredient->id }} - {{ $ingredient->ingredient_name }}</a>
			        </div>
			        <div class="columns small-1 end">
			        	<a href="/admin/ingredients/delete/{{$ingredient->id}}">x</a></li>
			        </div>
			    @endforeach
		    </ul>	
		</div>
		
	</section> -->

	<section class="row content_list">
			<ul>
			    @foreach($ingredients as $ingredient)

			    	<li class="list_row">
				    	<div class="columns small-1">
				        	<a class="list_delete" href="/admin/ingredients/delete/{{$ingredient->id}}">x</a>
				        </div>
				        <div class="columns small-11 medium-6 end"> 
				        	<a class="list_details" href="/admin/ingredients/edit/{{$ingredient->id}}">{{ $ingredient->id }} - {{ $ingredient->ingredient_name }}</a>
				        </div>
				        <div class="columns medium-2 end medium_screen_start"> 
				        	<a class="list_details" href="/admin/ingredients/edit/{{$ingredient->id}}">${{ $ingredient->cost }}</a>
				        </div>
				        <div class="columns medium-3 end medium_screen_start"> 
				        	<a class="list_details" href="/admin/ingredients/edit/{{$ingredient->id}}">${{ $ingredient->packet_grams }}</a>
				        </div>
				    </li>
			        
			        
			    @endforeach
		    </ul>	
		 
	</section>  
    
</section>
@stop 
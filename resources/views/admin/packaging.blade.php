@extends('tmpl.admin')

@section('__header') 
@stop  
 
@section('content') 

<section class="page">
	<section class="row">
		<div class="columns small-12">
			<div class="">
		        <h1 class="center_title">Packaging</h1>
		    </div>
		</div>
		<div class="admin_add">
			<a href="/admin/packaging/add">+ add</a>  
		</div>
	</section>

	<section class="row content_list">
			<ul>
			    @foreach($packaging as $package)

			    	<li class="list_row">
				    	<div class="columns small-1">
				        	<a class="list_delete" href="/admin/packaging/delete/{{$package->id}}">x</a>
				        </div>
				        <div class="columns small-11 medium-6 end"> 
				        	<a class="list_details" href="/admin/packaging/edit/{{$package->id}}">{{ $package->id }} - {{ $package->product_name }}</a>
				        </div>
				        <div class="columns medium-2 end medium_screen_start"> 
				        	<a class="list_details" href="/admin/packaging/edit/{{$package->id}}">${{ $package->cost }}</a>
				        </div>
				        <div class="columns medium-3 end medium_screen_start"> 
				        	<a class="list_details" href="/admin/packaging/edit/{{$package->id}}">${{ $package->amount }}</a>
				        </div>
				    </li>
			        
			        
			    @endforeach
		    </ul>	
		 
	</section>  
    
</section>
@stop 
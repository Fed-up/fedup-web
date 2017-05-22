@extends('tmpl.admin')

@section('__header') 
@stop  
 
@section('content') 

<section class="page">
	<section class="sub_header">
		<div class="row">
			<div class="columns small-12 medium-6 end">
				<h1 class="admin_tile">{{$recipe->recipe_name}}</h1>
			</div>

			<div class="columns small-12 medium-6 end">
				<ul class="tabs" data-tab>
				  <li class="tab-title active"><a href="#contents">Contents</a></li>
				  <li class="tab-title"><a href="#calc">Calc</a></li>
				</ul>
			</div>		
		</div>
	</section>
	<section class="content">
		<div class="row">
			<div class="tabs-content columns small-12">
				<div class="content active" id="contents">
					<h2>Recipe</h2>
					<h2>Ingredients</h2> 
					<ol>
						@foreach($recipe->ingredients as $ingredient)
							<li>{{$ingredient->ingredient_name}} - {{$ingredient->pivot->amount}}</li>
						@endforeach


					</ol>
				</div>
				<div class="content" id="calc">
				    <p>This is the second panel of the basic tab example. This is the second panel of the basic tab example.</p>
				    

				</div>
			</div> 
		</div>
	</section>    
</section>


@stop

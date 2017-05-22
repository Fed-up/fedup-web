@extends('tmpl.admin')

@section('__header') 
@stop  
 
@section('content') 

<section class="page">

	@if($no_ingredient == 0)
        {!! Form::open(array('action' => array('Admin\IngredientController@postUpdateIngredients'))) !!} 
    @else
        {!! Form::open(array('action' => array('Admin\IngredientController@postAddIngredients'))) !!} 
    @endif

	<section class="sub_header">
		<div class="row">
			<div class="columns small-12 medium-6">
				<input name="name" class="form-control input_box" value='{{ $no_ingredient == 0 ? "$ingredient->ingredient_name" : "" }}' placeholder="Ingredient Name"/>
			</div>
			<div class="columns small-12 medium-6 end text-right">
				<a href="/admin/ingredients/add" class="admin_form_add">+ Add</a>
				<input class="admin_form_save" type="submit" name="submit" value="Save"/>
				<!-- <input type="submit" name="calc" value='Calc +'>	 -->
				<input class="admin_form_save admin_calc" type="submit" name="calc" value='Calc +'/>
				<a href="/admin/ingredients" class="admin_form_cancel">Cancel</a>
			</div> 
		</div>
	</section>
	<hr/>
	<section class="content">
			
		<div class="row">
			<div class="columns small-6 medium-6 table_mimic">
				<input name="cost" class="form-control input_box" value='{{ $no_ingredient== 0 ? "$ingredient->cost" : "" }}' placeholder="Ingredient Cost" />
			</div>
			<div class="columns small-6  medium-6 table_mimic">
				<input name="packet_grams" class="form-control input_box" value='{{ $no_ingredient == 0 ? "$ingredient->packet_grams" : "" }}' placeholder="Packet Grams"/>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="columns small-5 medium-6 table_mimic">
				<input name="" class="form-control input_box_odd readonly_text" value="Cup" readonly="readonly" />
			</div>
			<div class="columns small-7  medium-6 table_mimic">
				<input name="metric[][cup]" class="form-control input_box" value='{{ $no_ingredient == 0 ? "$ingredient->cup" : "" }}'/>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="columns small-5 medium-6 table_mimic">
				<input name="" class="form-control input_box_odd readonly_text" value="Gram" readonly="readonly" />
			</div>
			<div class="columns small-7  medium-6 table_mimic">
				<input name="metric[][gram]" class="form-control input_box " value='{{ $no_ingredient == 0 ? "$ingredient->gram" : "" }}'/>
			</div>
			<div class="columns small-5 medium-6 table_mimic">
				<input name="" class="form-control input_box_odd readonly_text" value="Handful" readonly="readonly" />
			</div>
			<div class="columns small-7  medium-6 table_mimic">
				<input name="metric[][handful]" class="form-control input_box " value='{{ $no_ingredient == 0 ? "$ingredient->handful" : "" }}'/>
			</div>
			<div class="columns small-5 medium-6 table_mimic">
				<input name="" class="form-control input_box_odd readonly_text" value="mL" readonly="readonly" />
			</div>
			<div class="columns small-7  medium-6 table_mimic">
				<input name="metric[][ml]" class="form-control input_box " value='{{ $no_ingredient == 0 ? "$ingredient->ml" : "" }}'/>
			</div>
			<div class="columns small-5 medium-6 table_mimic">
				<input name="" class="form-control input_box_odd readonly_text" value="Pinch" readonly="readonly" />
			</div>
			<div class="columns small-7  medium-6 table_mimic">
				<input name="metric[][pinch]" class="form-control input_box " value='{{ $no_ingredient == 0 ? "$ingredient->pinch" : "" }}'/>
			</div>
			<div class="columns small-5 medium-6 table_mimic">
				<input name="" class="form-control input_box_odd readonly_text" value="Sheet" readonly="readonly" />
			</div>
			<div class="columns small-7  medium-6 table_mimic">
				<input name="metric[][sheet]" class="form-control input_box " value='{{ $no_ingredient == 0 ? "$ingredient->sheet" : "" }}'/>
			</div>
			<div class="columns small-5 medium-6 table_mimic">
				<input name="" class="form-control input_box_odd readonly_text" value="Slice" readonly="readonly" />
			</div>
			<div class="columns small-7  medium-6 table_mimic">
				<input name="metric[][slice]" class="form-control input_box " value='{{ $no_ingredient == 0 ? "$ingredient->slice" : "" }}'/>
			</div>
			<div class="columns small-5 medium-6 table_mimic">
				<input name="" class="form-control input_box_odd readonly_text" value="Tablespoon" readonly="readonly" />
			</div>
			<div class="columns small-7  medium-6 table_mimic">
				<input name="metric[][tablespoon]" class="form-control input_box " value='{{ $no_ingredient == 0 ? "$ingredient->tablespoon" : "" }}'/>
			</div>
			<div class="columns small-5 medium-6 table_mimic">
				<input name="" class="form-control input_box_odd readonly_text" value="Teaspoon" readonly="readonly" />
			</div>
			<div class="columns small-7  medium-6 table_mimic">
				<input name="metric[][teaspoon]" class="form-control input_box " value='{{ $no_ingredient == 0 ? "$ingredient->teaspoon" : "" }}'/>
			</div>
			<div class="columns small-5 medium-6 table_mimic">
				<input name="" class="form-control input_box_odd readonly_text" value="Whole" readonly="readonly" />
			</div>
			<div class="columns small-7  medium-6 table_mimic">
				<input name="metric[][whole]" class="form-control input_box " value='{{ $no_ingredient == 0 ? "$ingredient->whole" : "" }}'/>
			</div>
		</div>

		
		<input type="hidden" name="id" value='{{ $no_ingredient == 0 ? "$ingredient->id" : "" }}'>	
	</section>   
	    
	{!! Form::close() !!}
	
	 
</section>


@stop

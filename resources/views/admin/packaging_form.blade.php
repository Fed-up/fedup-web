@extends('tmpl.admin')

@section('__header') 
@stop  
 
@section('content') 

<section class="page">

	@if($no_packaging == 0)
        {!! Form::open(array('action' => array('Admin\PackagingController@postUpdatePackaging'))) !!} 
    @else
        {!! Form::open(array('action' => array('Admin\PackagingController@postAddPackaging'))) !!} 
    @endif

	<section class="sub_header">
		<div class="row">
			<div class="columns small-12 medium-6">
				<input name="name" class="form-control input_box" value='{{ $no_packaging == 0 ? "$packaging->product_name" : "" }}' placeholder="Product Name"/>
			</div>
			<div class="columns small-12 medium-6 end text-right">
				<a href="/admin/packaging/add" class="admin_form_add">+ Add</a>
				<input class="admin_form_save" type="submit" name="submit" value="Save"/>
				<a href="/admin/packaging" class="admin_form_cancel">Cancel</a>
			</div> 
		</div>
	</section>
	<hr>
	<section class="content">
			
		<div class="row">
			<div class="columns small-6 medium-6 table_mimic">
				<input name="cost" class="form-control input_box" value='{{ $no_packaging== 0 ? "$packaging->cost" : "" }}' placeholder="Product Cost" />
			</div>
			<div class="columns small-6  medium-6 table_mimic">
				<input name="product_amount" class="form-control input_box" value='{{ $no_packaging == 0 ? "$packaging->amount" : "" }}' placeholder="Product Amount"/>
			</div>
		</div>
		<div class="row">
			<div class="columns small-6 medium-6 table_mimic">
				<input name="" class="form-control input_box_odd readonly_text" value="Company" readonly="readonly" />
			</div>
			<div class="columns small-6  medium-6 table_mimic">
				<input name="company" class="form-control input_box " value='{{ $no_packaging == 0 ? "$packaging->company" : "" }}'/>
			</div>
			<div class="columns small-6 medium-6 table_mimic">
				<input name="" class="form-control input_box_odd readonly_text" value="Product Code" readonly="readonly" />
			</div>
			<div class="columns small-6  medium-6 table_mimic">
				<input name="code" class="form-control input_box " value='{{ $no_packaging == 0 ? "$packaging->product_code" : "" }}'/>
			</div>
		</div>
		
		<input type="hidden" name="id" value='{{ $no_packaging == 0 ? "$packaging->id" : "" }}'>	
	</section>   
	    
	{!! Form::close() !!}
	
	 
</section>


@stop

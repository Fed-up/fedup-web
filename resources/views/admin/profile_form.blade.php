@extends('tmpl.admin')

@section('__header') 
@stop  
 
@section('content') 

<section class="page">

	@if($no_user == 0)
        {!! Form::open(array('action' => array('Admin\ProfileController@postUpdateProfile'))) !!} 

	<section class="sub_header">
		<div class="row">
			<div class="columns small-12 medium-6">
				<input name="name" class="form-control input_box" value='{{ $no_user == 0 ? "$user->name" : "" }}' placeholder="Full name"/>
			</div>
			<div class="columns small-12 medium-6 end text-right">
				<input class="admin_form_save" type="submit" name="submit" value="Save"/>
				<a href="/admin/users" class="admin_form_cancel">Cancel</a>
			</div> 
		</div>
	</section>
	<br/>
	<section class="content">
		
		<div class="row">
			<div class="columns small-5 medium-6 table_mimic">
				<input name="" class="form-control input_box_odd readonly_text" value="Company" readonly="readonly" />
			</div>
			<div class="columns small-7  medium-6 table_mimic">
				<input name="business_name" class="form-control input_box " value='{{ $no_user == 0 ? "$user->business_name" : "" }}'/>
			</div>
			<div class="columns small-4 medium-6 table_mimic">
				<input name="" class="form-control input_box_odd readonly_text" value="Email" readonly="readonly" />
			</div>
			<div class="columns small-8  medium-6 table_mimic">
				<input name="email" class="form-control input_box " value='{{ $no_user == 0 ? "$user->email" : "" }}'/>
			</div>
			<div class="columns small-5 medium-6 table_mimic">
				<input name="" class="form-control input_box_odd readonly_text" value="Pay p/H" readonly="readonly" />
			</div>
			<div class="columns small-7  medium-6 table_mimic">
				<input name="pay_per_hour" class="form-control input_box " value='{{ $no_user == 0 ? "$user->pay_per_hour" : "" }}'/>
			</div>
			<div class="columns small-5 medium-6 table_mimic">
				<input name="" class="form-control input_box_odd readonly_text" value="Rent p/Y" readonly="readonly" />
			</div>
			<div class="columns small-7  medium-6 table_mimic">
				<input name="rent" class="form-control input_box " value='{{ $no_user == 0 ? "$user->rent" : "" }}'/>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="columns small-5 medium-6 table_mimic">
				<input name="" class="form-control input_box_odd readonly_text" value="Mobile" readonly="readonly" />
			</div>
			<div class="columns small-7  medium-6 table_mimic">
				<input name="mobile" class="form-control input_box " value='{{ $no_user == 0 ? "$user->mobile" : "" }}'/>
			</div>
			<div class="columns small-5 medium-6 table_mimic">
				<input name="" class="form-control input_box_odd readonly_text" value="Address" readonly="readonly" />
			</div>
			<div class="columns small-7  medium-6 table_mimic">
				<input name="street" class="form-control input_box " value='{{ $no_user == 0 ? "$user->street" : "" }}'/>
			</div>

			<div class="columns small-8  medium-6 table_mimic">
				<input name="suburb" class="form-control input_box " value='{{ $no_user == 0 ? "$user->suburb" : "" }}'/>
			</div>
			<div class="columns small-4  medium-6 table_mimic">
				<input name="postcode" class="form-control input_box " value='{{ $no_user == 0 ? "$user->postcode" : "" }}'/>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="columns small-5 medium-6 table_mimic">
				<input name="" class="form-control input_box_odd readonly_text" value="Password" readonly="readonly" />
			</div>
			<div class="columns small-7  medium-6 table_mimic">
				<input name="pword" class="form-control input_box " value=""/>
			</div>
			<div class="columns small-5 medium-6 table_mimic">
				<input name="" class="form-control input_box_odd readonly_text" value="pConfirm" readonly="readonly" />
			</div>
			<div class="columns small-7  medium-6 table_mimic">
				<input name="pconfirm" class="form-control input_box " value=""/>
			</div>

			<!-- <div class="columns small-3 medium-6 table_mimic">
				<h4>Password</h4>
			</div>
			<div class="columns small-9  medium-6 table_mimic">
				<input name="pword" class="form-control input_box" value=""/>
			</div> -->
			<!-- <div class="columns small-3 medium-6 table_mimic">
				<h4>Password Confirm</h4>
			</div>
			<div class="columns small-9  medium-6 table_mimic">
				<input name="pconfirm" class="form-control input_box" value=""/>
			</div> -->
			
		</div>
		<input type="hidden" name="id" value='{{ $no_user == 0 ? "$user->id" : "" }}'/>
		
	</section>   
	    
	{!! Form::close() !!}
	@endif
	
	 
</section>


@stop

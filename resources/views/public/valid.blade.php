@extends('tmpl.public')

@section('__header') 
@stop  

@section('content') 

    <section class="page">
        <div class="">
            <h1 class="center_title">Lets Validate this shit!!</h1>
        </div>
        <div class="row">   
            {!! Form::open(array('action' => array('Front\ValidController@postValid'))) !!}     
            <div class="message_outer">
                <div class="columns small-8 small-push-2 large-6 large-push-3 end message">
                    <span class="message_inner" >Enter a valid user name</span>
<!--                     <input type="text" name="username"/>
                    <input type="submit" name="Validate"> -->
                    @if ($errors->has('username'))<p style="color:red;">{!!$errors->first('username')!!}</p>@endif
                    {!! Form::text('username','',array('id'=>'','class'=>'form-control span6','placeholder' => 'Please Enter your Username')) !!}
                    
                    {!! Form::submit('Validate', array('class'=>'')) !!}

                    
                </div>  
            </div>
            {!! Form::close() !!}
        </div>
    </section>

@stop 
@extends('tmpl.admin')

@section('__header') 
	  
    <script>

    if (typeof jQuery != 'undefined') {

	    console.log("jQuery library is loaded!");

	}else{ 

	    console.log("jQuery library is not found!");

	}

    if (typeof jQuery.ui != 'undefined') {

        console.log("jQuery Ui library is loaded!");

    }else{ 

        console.log("jQuery library is not found!");

    }

	

    $(function() {
      
    // $( "._mySortable" ).sortable({ 
    //   axis: "y", 
    //   opacity: 0.3,
    //   placeholder: "sortable-placeholder",
    //   // callback function
    //   update: function( event, ui ) {
    //     ui.item.css({'background':'#DBEEC9'})
    //   },
    // });
    // $( "._mySortable" ).disableSelection();
    

    
    
     
     //Start all Recipes 
      
    //Start Delete Recipe
    $('#counterRecipes').val( $('#_PackageRecipes li').length );

    $('.deleteRecipe').click(function(e) {
      e.preventDefault();
      var currentID = (this.id);
      if($("#ddi" + currentID).length == 0) {
        $('#_PackageRecipes')
            .append( $('<input>',{
              'type':'hidden',
              'name':'ddi[]',
              'id':'ddi'+currentID, /*ddi = delete data recipe*/
              'class':'form-control',
              'value':''+currentID,
            }) )
        ;
        $(this).parent('li').hide().unbind('click');       
      } else {
      //alert('this record already exists');
        $("#ddi" + currentID).closest('input').remove().unbind('click');
      }
    });
    
    //Start Recipes
    $('#counterRecipes').val( $('#_PackageRecipes li').length );
    $('#btnActionAddRecipes').click(function(e) {
      // e.preventDefault();

      console.log('adding recipe..');
      
      var currentID = $('#counterRecipes').val();
      
      var ingredientsArray = [];
      <?php
      
      $ix = 0;
      foreach ($iArray as $i=>$v) {
        echo 'ingredientsArray['.$ix.'] = ["'.$i.'","'.$v.'"]'."\n";
        $ix++;
      }; 

      ?>

      var metricsArray = [];
      <?php
      
      $mx = 0;
      foreach ($mArray as $i=>$v) {
        echo 'metricsArray['.$mx.'] = ["'.$i.'","'.$v.'"]'."\n";
        $mx++;
      }; 

      ?>
      
      var SelectList  = $('<select>',{
            'name':'recipes[][x]',
            'id':'recipes_'+currentID,
            'class':'form-control input--ingredient',
          });
      
      $.each(ingredientsArray, function(key,value) {
        SelectList
          .append($('<option></option>')
          .attr('value',value[0])
          .text(value[1])); 
      });

      var MetricList  = $('<select>',{
            'name':'recipes[][x]',
            'id':'recipes_'+currentID,
            'class':'form-control input--ingredient',
          });
      
      $.each(metricsArray, function(key,value) {
        MetricList
          .append($('<option></option>')
          .attr('value',value[0])
          .text(value[1])); 
      });
      
      
      
      var deleteButton  = $('<button>',{
                    'class':'columns small-1 medium-push-7 medium-1 del_button '
                  });
      deleteButton.bind('click', function(e){
        e.preventDefault();
        $(this).parent('li').remove().unbind('click');
      });
      
      $('#_PackageRecipes')
      	.append( $('<li>',{
            'class':'row',
          }) 
        
        .append( $('<div>',{
            'class':'columns small-11 medium-4 table_mimic',
        })
        .append( SelectList )
        ) 

        .append( deleteButton )
  
        .append( $('<div>',{
            'class':'columns small-4 medium-2 medium-pull-1 table_mimic',
        })
        .append( $('<input>',{
          'name':'amount[][x]',
          'id':'amount_'+currentID,
          'class':'form-control input--amount',
        }) ))

        .append( $('<div>',{
            'class':'columns small-4 medium-3 medium-pull-1 table_mimic',
        })
        .append( MetricList )
        ) 

        .append( $('<div>',{
            'class':'columns small-4 medium-2 medium-pull-1 table_mimic',
        })
        .append( $('<input>',{
          'name':'amount[][x]',
          'id':'amount_'+currentID,
          'class':'form-control input--amount',
        }) ))          
          
        .append( $('<span>',{
          'class':'columns small-1'
        }) )
          
        )
      ;
      
      $('#counterRecipes').val( parseInt(currentID, 10) + 1 );
      $(document).foundation('reflow');

      
    });
    
    

    
  });
    </script>
@stop  
 
@section('content') 
<section class="page">
    <h1 class="page-header">Test</h1> 


    <section>
	  <div class="taskcontainer">
	    <h1>alpha</h1>

	    <ul id="sortable1" class="connected sortable list"></ul>
	  </div>
	  <button onclick="getTasks();">Sortable</button>
	</section>

	<?php $x = 0; ?>
	@if($no_recipe == 0)
		@foreach($recipe->ingredients as $ingredient) 
			<div class="row">
				<div class="columns small-11 medium-4 table_mimic">
				
					<select name="ingredients[][{{ $ingredient->pivot->id }}]" id="ingredients_{{ $x }}" class="form-control input--ingredient"/>
                        @foreach($iArray as $i=>$v)
                        	<option value="{{ $i }}" @if ($ingredient->id == $i) selected="selected" @endif >{{ $v }}</option>
                        @endforeach
                    </select>
				</div>
				<div class="columns small-1 medium-push-7 medium-1 table_mimic"><p>x</p></div>
				<div class="columns small-4 medium-2 medium-pull-1 table_mimic"> 
					<input name="amount[][{{ $ingredient->pivot->id }}]" id="ingredients_{{ $x }}" class="form-control input--amount " value="{{ $ingredient->pivot->amount }}" />
				</div>
				<div class="columns small-4 medium-3 medium-pull-1 table_mimic">
					<select name="metric[][{{ $ingredient->pivot->id }}]" id="ingredients_{{ $x }}" class="form-control input--ingredient"/>
			            @foreach ($mArray as $value) { 
			                <option value="{{ $value }}" @if ($ingredient->pivot->metric == $value) selected="selected" @endif >{{ $value }}</option>
			            @endforeach     
                    </select>
				</div>
				<div class="columns small-4 medium-2 medium-pull-1 table_mimic">
					<input name="ri_grams_start[][{{ $ingredient->pivot->id }}]" id="ingredients_{{ $x }}" class="form-control input--amount " value="{{ $ingredient->pivot->ri_grams }}" readonly="readonly" />
				</div>
			</div>
		<?php $x++; ?>  
		@endforeach
		<input type="hidden" name="cup" value="cup">
		<input type="hidden" name="id" value="{{$recipe->id}}">
	@endif




    @if(isset($data->id))
      {{ Form::open(array('action' => 'Admin\RecipeController@postUpdateRecipes', 'class' => 'form-horizontal')) }} 
    @else
      {{ Form::open(array('action' => 'Admin\RecipeController@postUpdateRecipes', 'class' => 'form-horizontal')) }} 
    @endif
    

    

		<div class="tab-pane fade in" id="recipes">
			<div class="col-sm-1">
			      <a href="#" id="btnActionAddRecipes" class="btn btn-primary">+ Add</a>
			      {{ Form::hidden('counterRecipes',null,array('id'=>'counterRecipes')) }} 

			</div>
			<hr/>
			<div class="form-group {{ ($errors->has('recipes')) ? 'has-error' : '' }}">
			    {{ ($errors->has('recipes'))? '<p>'. $errors->first('recipes') .'</p>' : '' }}
			    <ul id="_PackageRecipes" class="_mySortable">

			    </ul>
			</div>
		</div>



        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              {{ Form::submit('Save', array('class' => 'btn btn-success')) }}
            <a href="/admin/products/catering/packages">
                {{ Form::button('Cancel' ,array('class' => 'btn btn-danger')) }}
            </a>
            </div>
        </div>        

</section>

@stop

@section('_tail')
@stop
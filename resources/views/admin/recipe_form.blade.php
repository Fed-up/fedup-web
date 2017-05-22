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
            'name':'ingredients[][x]',
            'id':'recipes_'+currentID,
            'class':'form-control input_box',
          });
      
      $.each(ingredientsArray, function(key,value) {
        SelectList
          .append($('<option></option>')
          .attr('value',value[0])
          .text(value[1])); 
      });

      var MetricList  = $('<select>',{
            'name':'metric[][x]',
            'id':'recipes_'+currentID,
            'class':'form-control input_box_odd',
          });
      
      $.each(metricsArray, function(key,value) {
        MetricList
          .append($('<option></option>')
          .attr('value',value[1])
          .text(value[1])); 
      });
      
      
      
      var deleteButton  = $('<button>',{
        'class':'columns small-2 medium-push-7 medium-1 del_button',
        'value':'x',
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
            'class':'columns small-10 medium-4 table_mimic',
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
          'class':'form-control input_box_odd',
          'placeholder':'Amount',
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
          'name':'ri_grams_start[][x]',
          'id':'amount_'+currentID,
          'class':'form-control input_box_odd readonly_text',
          'readonly':'readonly',
          'placeholder':'0.0000g',
        }) ))          
          
        .append( $('<span>',{
          'class':'columns small-1'
        }) )
          
        )
      ;
      
      $('#counterRecipes').val( parseInt(currentID, 10) + 1 );
      $(document).foundation('reflow');

      
    });




    //Start Delete Recipe
    $('#counterPackaging').val( $('#_counterPackaging li').length );

    $('.deletePackaging').click(function(e) {
        e.preventDefault();
        var currentID = (this.id);
        if($("#ddp" + currentID).length == 0) {
            $('#_PackagePackaging')
                .append( $('<input>',{
                  'type':'hidden',
                  'name':'ddp[]',
                  'id':'ddp'+currentID, /*ddi = delete data recipe*/
                  'class':'form-control',
                  'value':''+currentID,
                }) )
            ;
            $(this).parent('li').hide().unbind('click');       
        } else {
         //alert('this record already exists');
            $("#ddp" + currentID).closest('input').remove().unbind('click');
        }
    });
    
    //Start Recipes
    $('#counterPackaging').val( $('#_PackagePackaging li').length );
    $('#btnActionAddPackaging').click(function(e) {
      // e.preventDefault();

      console.log('adding Packaging..');
      
      var currentID = $('#counterPackaging').val();
      
      var packagingArray = [];
      <?php
      
      $ix = 0;
      foreach ($pArray as $i=>$v) {
        echo 'packagingArray['.$ix.'] = ["'.$i.'","'.$v.'"]'."\n";
        $ix++;
      }; 

      ?>

      // var metricsArray = [];
      // <?php
      
      // $mx = 0;
      // foreach ($mArray as $i=>$v) {
      //   echo 'metricsArray['.$mx.'] = ["'.$i.'","'.$v.'"]'."\n";
      //   $mx++;
      // }; 

      // ?>
      
      var SelectList  = $('<select>',{
            'name':'packaging[][x]',
            'id':'recipes_'+currentID,
            'class':'form-control input_box',
          });
      
      $.each(packagingArray, function(key,value) {
        SelectList
          .append($('<option></option>')
          .attr('value',value[0])
          .text(value[1])); 
      });

      // var MetricList  = $('<select>',{
      //       'name':'metric[][x]',
      //       'id':'recipes_'+currentID,
      //       'class':'form-control input--ingredient',
      //     });
      
      // $.each(metricsArray, function(key,value) {
      //   MetricList
      //     .append($('<option></option>')
      //     .attr('value',value[1])
      //     .text(value[1])); 
      // });
      
      
      
      var deleteButton  = $('<button>',{
        'class':'columns small-2 medium-1 del_button_cost ',
      });
      deleteButton.bind('click', function(e){
        e.preventDefault();
        $(this).parent('li').remove().unbind('click');
      });
      
      $('#_PackagePackaging')
        .append( $('<li>',{
            'class':'row',
          }) 
        
        .append( $('<div>',{
            'class':'columns small-10 medium-5 table_mimic',
        })
        .append( SelectList )
        ) 

        
  
        // .append( $('<div>',{
        //     'class':'columns small-2 medium-2 table_mimic',
        // })
        // .append( $('<input>',{
        //   'name':'amount[][x]',
        //   'id':'amount_'+currentID,
        //   'class':'form-control input--amount',
        // }) ))

        .append( deleteButton )

        // .append( $('<div>',{
        //     'class':'columns small-4 medium-3 medium-pull-1 table_mimic',
        // })
        // .append( MetricList )
        // ) 

        // .append( $('<div>',{
        //     'class':'columns small-4 medium-2 medium-pull-1 table_mimic',
        // })
        // .append( $('<input>',{
        //   'name':'ri_grams_start[][x]',
        //   'id':'amount_'+currentID,
        //   'class':'form-control input--amount',
        //   'readonly':'readonly',
        // }) ))          
          
        .append( $('<span>',{
          'class':'columns small-1'
        }) )
          
        )
      ;
      
      $('#counterPackaging').val( parseInt(currentID, 10) + 1 );
      $(document).foundation('reflow');

      
    });
    
    

    
});
    </script>
@stop  
 
@section('content') 









<section class="page">

    @if($no_recipe == 0)
        {!! Form::open(array('action' => array('Admin\RecipeController@postUpdateRecipes'))) !!} 
    @else
        {!! Form::open(array('action' => array('Admin\RecipeController@postAddRecipes'))) !!} 
    @endif

	

	<section class="sub_header">
		<div class="row">
			<div class="columns small-12 medium-6 end">
				<input name="name" class="form-control input_box" value='{{ $no_recipe == 0 ? "$recipe->recipe_name" : "" }}' placeholder="Recipe Name" />
			</div>

			<div class="columns small-12 medium-6 end">
				<ul class="tabs" data-tab>
				  <li class="columns small-4 tab-title active"><a id="tab_link" href="#contents">Contents</a></li>
				  <li class="columns small-4 tab-title"><a id="tab_link" href="#costs">Costs</a></li>
				  <li class="columns small-4 tab-title "><a id="tab_link" href="#calc">Calc</a></li>
				</ul>
			</div>		
		</div>
	</section>
	


	
		
	<section class="content">
		<div class="tabs-content">
			<div class="content active" id="contents">
                <div class="row list_submit_buttons"> 
                    <input class="admin_form_save" type="submit" name="submit" value="Save"/>
    				<a href="#" id="btnActionAddRecipes" class="admin_form_add">+ Add</a>
                    <a href="/admin/recipes" class="admin_form_cancel">Cancel</a>
                    <input type="hidden" name="iMetric" value="{{$iMetric}}"/>
                </div>
                <div class="row input_header">
                    <div class="columns small-6 table_mimic"> 
                        <input name="total_time" class="form-control input_box" value='{{ $no_recipe == 0 ? "$recipe->total_time" : "" }}' placeholder="Recipe Time" />
                    </div>
                    <div class="columns small-6 table_mimic"> 
                        <input name="recipe_batch" class="form-control input_box" value='{{ $no_recipe == 0 ? "$recipe->recipe_batch" : "" }}' placeholder="Recipe Batch"/>
                    </div>
                </div>
                <ul id="_PackageRecipes" class="_mySortable">
    			<?php $x = 0; ?>
    			@if($no_recipe == 0)
    				@foreach($recipe->ingredients as $ingredient) 
    					<li class="row">
    						<div class="columns small-10 medium-4 table_mimic">
    						
    							<select name="ingredients[][{{ $ingredient->pivot->id }}]" id="ingredients_{{ $x }}" class="form-control input_box">
                                    @foreach($iArray as $i=>$v)
                                    	<option value="{{ $i }}" @if ($ingredient->id == $i) selected="selected" @endif >{{ $v }}</option>
                                    @endforeach
                                </select>
    						</div>
    					
                            <button id="{{ $ingredient->pivot->id }}" class="deleteRecipe columns small-2 medium-push-7 medium-1 del_button">x</button>      
                            
    						<div class="columns small-4 medium-2 medium-pull-1 table_mimic"> 
    							<input name="amount[][{{ $ingredient->pivot->id }}]" id="ingredients_{{ $x }}" class="form-control input_box_odd" value="{{ $ingredient->pivot->amount }}" placeholder="Amount" />
    						</div>
    						<div class="columns small-4 medium-3 medium-pull-1 table_mimic">
    							<select name="metric[][{{ $ingredient->pivot->id }}]" id="ingredients_{{ $x }}" class="form-control input_box_odd">
    					            @foreach ($mArray as $value) { 
    					                <option value="{{ $value }}" @if ($ingredient->pivot->metric == $value) selected="selected" @endif >{{ $value }}</option>
    					            @endforeach     
                                </select>
    						</div>
    						<div class="columns small-4 medium-2 medium-pull-1 table_mimic end">
    							<input name="ri_grams_start[][{{ $ingredient->pivot->id }}]" id="ingredients_{{ $x }}" class="form-control input_box_odd readonly_text" value="{{ $ingredient->pivot->ri_grams }}g" readonly="readonly" />
    						</div>
    					</li>
    				<?php $x++; ?>  
    				@endforeach
                </ul>
				<input type="hidden" name="cup" value="cup"/>
				<input type="hidden" name="id" value="{{$recipe->id}}"/>
                {{ Form::hidden('counterRecipes',null,array('id'=>'counterRecipes')) }} 
				@endif

                <div>
                    
                </div>
				
			</div>


			<div class="content" id="costs">
                <div class="row list_submit_buttons"> 
                    <a href="#" class="admin_form_add" id="btnActionAddPackaging" class="btn btn-primary">+ Add</a>
                    <input type="submit" name="submit" class="admin_form_save" value="Save"/>
                    <a href="/admin/recipes" class="admin_form_cancel">Cancel</a>
                </div>
                        
    			<?php $x = 0; ?>
                <?php $p = 0; ?>
                    <ul id="_PackagePackaging" class="_mySortable">
                    <?php $x = 0; ?>
                    @if($no_recipe == 0)
                        @foreach($recipe->packaging as $packaging) 
                            <li class="row">
                                <div class="columns small-10 medium-5 table_mimic">
                                    <select name="packaging[][{{ $packaging->pivot->id }}]" id="packaging_{{ $p }}" class="form-control input_box">
                                        @foreach($pArray as $i=>$v)
                                            <option value="{{ $i }}" @if ($packaging->id == $i) selected="selected" @endif >{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button id="{{ $packaging->pivot->id }}" class="deletePackaging columns small-2 medium-1 del_button_cost ">x</button> 
                            </li>
                            <?php $p++; ?>   
                        @endforeach
                    </ul>
                    <hr/>
    				@foreach($recipe->ingredients as $ingredient) 
    					<div class="row">
    						<div class="columns small-8 medium-4 table_mimic">
                                <input name="ingredient_null[][{{ $ingredient->pivot->id }}]" id="ingredients_{{ $x }}" class="form-control input_box_odd readonly_text" value="{{ $ingredient->ingredient_name }}" readonly="readonly"/>
    						</div>
    						<div class="columns small-4 medium-push-6 medium-2 table_mimic">
    							<input name="ri_grams[][{{ $ingredient->pivot->id }}]" id="ingredients_{{ $x }}" class="form-control input_box_odd readonly_text" value="{{ $ingredient->pivot->ri_grams }}g" readonly="readonly"/>
    						</div>
    						<div class="columns small-4 medium-2 medium-pull-2 table_mimic"> 
    							<input name="ri_price[][{{ $ingredient->pivot->id }}]" id="ingredients_{{ $x }}" class="form-control input_box" value="{{ $ingredient->cost }}" placeholder="Pkg Cost"/>
    						</div>
    						<div class="columns small-4 medium-2 medium-pull-2 table_mimic"> 
    							<input name="ri_packet_grams[][{{ $ingredient->pivot->id }}]" id="ingredients_{{ $x }}" class="form-control input_box " value="{{ $ingredient->packet_grams }}g" placeholder="Pkg Grams" />
    						</div>
    						<div class="columns small-4 medium-2 medium-pull-2 table_mimic">
    							<input name="ri_cost[][{{ $ingredient->pivot->id }}]" id="ingredients_{{ $x }}" class="form-control input_box readonly_text" value="{{ $ingredient->pivot->ri_cost }}" readonly="readonly"/>
    						</div>
    					</div>
    				<?php $x++; ?>   
    				@endforeach
    			@endif
                <input type="hidden" name="ipArray" value="{{$ipArray}}"/>
    				
    		</div>
    		<div class="content text-center" id="calc">
                <div class="row list_submit_buttons"> 
                    <input type="submit" name="submit" class="admin_form_save" value="Save"/>
                    <a href="/admin/recipes" class="admin_form_cancel">Cancel</a>
                </div>
                @if($no_recipe == 0)
                    
                    <!-- <input type="submit" name="submit" value="Click Me!"/> -->
    				<div class="row">
    					<div class="columns small-4 table_mimic"> 
                            <input name="price" id="ingredients_{{ $x }}" class="form-control input_box" value='{{ $no_recipe == 0 ? "$recipe->recipe_price" : "" }}' placeholder="Price" />
                        </div>
                        <div class="columns small-4 table_mimic"> 
                            <input name="time" id="ingredients_{{ $x }}" class="form-control input_box" value='{{ $no_recipe == 0 ? "$recipe->recipe_time" : "" }}' placeholder="sTime" />
                        </div>
                        <div class="columns small-4 table_mimic"> 
                            <input name="sales_batch" id="ingredients_{{ $x }}" class="form-control input_box" value='{{ $no_recipe == 0 ? "$recipe->sales_batch" : "" }}' placeholder="sBatch" />
                        </div>
    			    </div>
                    <div class="row">
                        <div class="columns small-7 table_mimic">
                            <!-- <p class="input_box readonly_text"></p> -->
                            <input name="" id="" class="form-control input_box readonly_text" value="est Price: ${!! $recipe->desired_markup_price !!}" readonly="readonly"/>
                        </div>
                        <div class="columns small-5 table_mimic table_break">
                            <input name="desired_markup" id="ingredients_{{ $x }}" class="form-control input_box" value='{{ $no_recipe == 0 ? "$recipe->desired_markup" : "" }}' placeholder="Markup" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="columns small-7 table_mimic">
                            <p>Total Profit:</p>
                        </div>
                        <div class="columns small-5 table_mimic">
                            <p>{!! $recipe->total_profit !!}</p>
                        </div>
                        <div class="columns small-7 table_mimic">
                            <p>Profit Per Piece:</p>
                        </div>
                        <div class="columns small-5 table_mimic">
                            <p>{!! $recipe->total_profit !!}</p>
                        </div>
                        <div class="columns small-7 table_mimic">
                            <p>Total Revenue:</p>
                        </div>
                        <div class="columns small-5 table_mimic table_break">
                            <p>{!! $recipe->recipe_revenue !!}</p>
                        </div>
                        <div class="columns small-7 table_mimic">
                            <p>Recipe Cost:</p>
                        </div>
                        <div class="columns small-5 table_mimic">
                            <p>{!! $recipe->total_recipe_cost !!}</p>
                        </div>
                        <div class="columns small-7 table_mimic">
                            <p>Cost Per Piece:</p>
                        </div>
                        <div class="columns small-5 table_mimic table_break">
                            <p>{!! $recipe->plate_cost !!}</p>
                        </div>

                        <div class="columns small-7 table_mimic">
                            <p>Ingredient Cost:</p>
                        </div>
                        <div class="columns small-5 table_mimic">
                            <p>{!! $recipe->ti_cost !!}</p>
                        </div>

                        <div class="columns small-7 table_mimic">
                            <p>Staff Cost:</p>
                        </div>
                        <div class="columns small-5 table_mimic">
                            <p>{!! $recipe->staff_cost !!}</p>
                        </div>
                        <div class="columns small-7 table_mimic">
                            <p>Rent Cost:</p>
                        </div>
                        <div class="columns small-5 table_mimic">
                            <p>{!! $recipe->rent_cost !!}</p>
                        </div>

                        <div class="columns small-7 table_mimic">
                            <p>Packaging Cost:</p>
                        </div>
                        <div class="columns small-5 table_mimic">
                            <p>{!! $recipe->packaging_cost !!}</p>
                        </div>
                     <!--    <div class="columns small-12 table_mimic">
                            <p>Ingredient Cost: {!! $recipe->ti_cost !!}</p>
                            <p>Staff Cost: {!! $recipe->staff_cost !!}</p>
                            <p>Rent Cost: {!! $recipe->rent_cost !!}</p>
                            <p>Packaging Cost: {!! $recipe->packaging_cost !!}</p>
                        </div> -->
                    </div>
                @endif
			</div>
		</div> 
		
	</section>   
	    
	{!! Form::close() !!}

	

    <!-- <script src="/bower_components/foundation/js/foundation.min.js"></script>
    <script src="/bower_components/foundation/js/foundation/foundation.tab.js"></script>
    <script src="/bower_components/modernizr/modernizr.js"></script>
    <script>
        $(document).foundation();
    </script> -->
	
	 
</section>


@stop

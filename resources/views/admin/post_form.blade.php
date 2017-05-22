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

    };

    $(function() {

        Dropzone.options.addImages = {
            maxFilesize: 3,
            acceptedFiles: 'image/*',
            success: function(file, response){
                if(file.status == 'success') {
                    handleDropzoneFileUpload.handleSuccess(response);
                }else{
                    handleDropzoneFileUpload.handleError(response);
                }
            }
        };

        Dropzone.options.addVImages = {
            maxFilesize: 3,
            acceptedFiles: 'image/*', //,.mp4,.mkv,.avi,.mov 
            success: function(file, response){
                console.log("Tommy!");
                if(file.status == 'success') {
                    handleDropzoneVerticalFileUpload.handleSuccess(response);
                }else{
                    handleDropzoneVerticalFileUpload.handleError(response);
                }
            }
        };

        var handleDropzoneFileUpload = {
            handleError: function(response){
                console.log(response);
            },
            handleSuccess: function(response){
                console.log(response);

                    var imageList = $('#post_images ul');
                    var imagePreview = document.getElementById("preview_wrap");
                    // document.getElementById(tabName).style.backgroundImage = 'url(buttons/' + imagePrefix + '.png)';
                    var imageSrc = 'images/uploads/small/' + response.file_name;
                    var imageId = response.id;
                    
                                

                    $(imageList).append('<li class="columns small-12 medium-2 end  "><div class="image_wrapper" style="background: url('+'/'+imageSrc+') no-repeat ; background-position: center center; background-size: cover;"><a href="' + imageSrc + '" class="image_r"></a><a href="/admin/image-delete/'+ imageId + '" class="image_delete">x</a></div></li>');

             
                    imagePreview.style.background = "url('+'/'+imageSrc+') no-repeat center center";
                    imagePreview.style.backgroundSize="cover";
      


            }
        }


        var handleDropzoneVerticalFileUpload = {
            handleError: function(response){
                console.log(response);
            },
            handleSuccess: function(response){
                console.log(response);

                    var imageList = $('#postv_images ul');
                    var imagePreview = document.getElementById("preview_wrap");
                    // document.getElementById(tabName).style.backgroundImage = 'url(buttons/' + imagePrefix + '.png)';
                    var imageSrc = 'images/uploads/phone/small/' + response.file_name;
                    var imageId = response.id;
                    
                                

                    $(imageList).append('<li class="columns small-12 medium-2 end  "><div class="image_wrapper" style="background: url('+'/'+imageSrc+') no-repeat ; background-position: center center; background-size: cover;"><a href="' + imageSrc + '" class="image_r"></a><a href="/admin/image-delete/'+ imageId + '" class="image_delete">x</a></div></li>');

             
                    imagePreview.style.background = "url('+'/'+imageSrc+') no-repeat center center";
                    imagePreview.style.backgroundSize="cover";
      


            }
        }     

    });

    

    $(function() {


        //Start Delete Text
    // $('#counterImage').val( $('#_Text li').length );

    // $('.deleteImage').click(function(e) {
    //     e.preventDefault();
    //     console.log('Delete Text..');
    //     var currentID = (this.id);
    //     if($("#ddIm" + currentID).length == 0) {
    //         $('#_Text')
    //             .append( $('<input>',{
    //               'type':'hidden',
    //               'name':'ddIm[]',
    //               'id':'ddIm'+currentID, /*ddi = delete data recipe*/
    //               'class':'form-control',
    //               'value':''+currentID,
    //             }) )
    //         ;
    //         $(this).parent('li').hide().unbind('click');       
    //     } else {
    //      //alert('this record already exists');
    //         $("#ddIm" + currentID).closest('input').remove().unbind('click');
    //     }
    // });
    
    // //Start Text
    // $('#counterImage').val( $('#_Text li').length );
    // $('#btnActionAddImage').click(function(e) {
    //   // e.preventDefault();

    //   console.log('adding Image..');
      
    //   var currentID = $('#counterImage').val();    
      
    //   var deleteButton  = $('<button>',{
    //     'class':'columns small-2 medium-1 del_button',
    //     'value':'x',
    //   });
    //   deleteButton.bind('click', function(e){
    //     e.preventDefault();
    //     $(this).parent('li').remove().unbind('click');
    //   });
      
    //   $('#_Text')
    //     .append( $('<li>',{
    //         'class':'row',
    //       }) 
        
    //         .append( $('<div>',{
    //             'class':'columns small-12 medium-8 medium-push-2',
    //         })
    //             .append( $('<form>',{
    //                 'class':'dropzone',
    //                 'action':'/admin/image-upload-desktop',
    //                 'id':'addImages',
    //             })
    //                 .append( $('<input>',{
    //                     'type':'hidden',
    //                     'name':'post_id[][ix]',
    //                     'id':'image_'+currentID,
    //                     'value':'{{ $no_post == 0 ? "$post->id" : "" }}'
    //                 }) )

    //                 .append( $('<div class="dz-default dz-message"><span>Drop files here to upload images</span></div>',{
    //                     // 'class':'dz-default dz-message',
    //                 }))

    //                 .append( $('{{ csrf_field() }} ',{
    //                 }) )

    //             )
    //         )

    //         // <div class="dz-default dz-message"><span></span></div>

    //         // .append( $('<div>',{
    //         //     'class':'columns small-10 medium-6 table_mimic',
    //         // })
    //         // .append( $('<input>',{
    //         //   'name':'text[][lxx]',
    //         //   'id':'text_'+currentID,
    //         //   'class':'form-control input_box_odd text_link',
    //         //   'placeholder':'Section Link',
    //         // }) )) 

    //         .append( deleteButton )
      
            
          
    //     );
      

    //     // <div class="columns small-12 medium-8 medium-push-2">
    //     //     <h2 class="center_title">Add Desktop Header</h2>
    //     //     <p>1200 * 628px</p>
    //     //     <form action="/admin/image-upload-desktop" class="dropzone" id="addImages">
    //     //         <input type="hidden" name="post_id" value='{{ $no_post == 0 ? "$post->id" : "" }}'/>
    //     //         <!-- <button type="submit">Upload Image =)</button>  -->
    //     //         {{ csrf_field() }} 
    //     //     </form> 
    //     // </div>











    //     $('#counterImage').val( parseInt(currentID, 10) + 1 );
    //     $(document).foundation('reflow');

        
    //     $('html, body').animate({
    //         scrollTop: $("#image_"+currentID).offset().top
    //     }, 600);
        

      
    // });











    
      
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
    

    //Start Delete Text
    $('#counterText').val( $('#_Text li').length );

    $('.deleteText').click(function(e) {
        e.preventDefault();
        console.log('Delete Text..');
        var currentID = (this.id);
        if($("#ddt" + currentID).length == 0) {
            $('#_Text')
                .append( $('<input>',{
                  'type':'hidden',
                  'name':'ddt[]',
                  'id':'ddt'+currentID, /*ddi = delete data recipe*/
                  'class':'form-control',
                  'value':''+currentID,
                }) )
            ;
            $(this).parent('li').hide().unbind('click');       
        } else {
         //alert('this record already exists');
            $("#ddt" + currentID).closest('input').remove().unbind('click');
        }
    });
    
    //Start Text
    $('#counterText').val( $('#_Text li').length );
    $('#btnActionAddText').click(function(e) {
      // e.preventDefault();

      console.log('adding Text..');
      
      var currentID = $('#counterText').val();    
      
      var deleteButton  = $('<button>',{
        'class':'columns small-2 medium-1 del_button',
        'value':'x',
      });
      deleteButton.bind('click', function(e){
        e.preventDefault();
        $(this).parent('li').remove().unbind('click');
      });
      
      $('#_Text')
        .append( $('<li>',{
            'class':'row',
          }) 
        
            .append( $('<div>',{
                'class':'columns small-10 medium-11 table_mimic',
            })
            .append( $('<textarea>',{
                'data-autoresize':'',
                'name':'text[][tx]',
                'id':'text_'+currentID,
                'class':'form-control input_box_odd text_text',
                'placeholder':'Section Text',
            }) )) 

            .append( deleteButton )
      
            
          
        )
      ;
      
        $('#counterText').val( parseInt(currentID, 10) + 1 );
        $(document).foundation('reflow');

        
        $('html, body').animate({
            scrollTop: $("#text_"+currentID).offset().top
        }, 600);
        

      
    });










    //Start Delete Heading
    $('#counterHeading').val( $('#_Text li').length );

    $('.deleteHeading').click(function(e) {
        e.preventDefault();
        console.log('Delete Heading..');
        var currentID = (this.id);
        if($("#ddh" + currentID).length == 0) {
            $('#_Heading')
                .append( $('<input>',{
                  'type':'hidden',
                  'name':'ddh[]',
                  'id':'ddh'+currentID, /*ddi = delete data recipe*/
                  'class':'form-control',
                  'value':''+currentID,
                }) )
            ;
            $(this).parent('li').hide().unbind('click');       
        } else {
         //alert('this record already exists');
            $("#ddh" + currentID).closest('input').remove().unbind('click');
        }
    });
    
    //Start Text
    $('#counterHeading').val( $('#_Text li').length );
    $('#btnActionAddHeading').click(function(e) {
      // e.preventDefault();

      console.log('adding Heading..');
      
      var currentID = $('#counterHeading').val();    
      
      var deleteButton  = $('<button>',{
        'class':'columns small-2 medium-1 del_button',
        'value':'x',
      });
      deleteButton.bind('click', function(e){
        e.preventDefault();
        $(this).parent('li').remove().unbind('click');
      });
      
      $('#_Text')
        .append( $('<li>',{
            'class':'row',
          }) 
        
            .append( $('<div>',{
                'class':'columns small-10 medium-11 table_mimic',
            })
            .append( $('<textarea>',{
              'name':'text[][hx]',
              'id':'heading_'+currentID,
              'class':'form-control input_box_odd text_header',
              'placeholder':'Section Heading',
            }) )) 

            .append( deleteButton )
      
            
          
        )
      ;
      
        $('#counterHeading').val( parseInt(currentID, 10) + 1 );
        $(document).foundation('reflow');

        $('html, body').animate({
            scrollTop: $("#heading_"+currentID).offset().top
        }, 600);

      
    });



    //Start Delete Promo
    $('#counterPromo').val( $('#_Text li').length );

    $('.deletePromo').click(function(e) {
        e.preventDefault();
        console.log('Delete Promo..');
        var currentID = (this.id);
        if($("#ddp" + currentID).length == 0) {
            $('#_Text')
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
    
    //Start Text
    $('#counterPromo').val( $('#_Text li').length );
    $('#btnActionAddPromo').click(function(e) {
      // e.preventDefault();

      console.log('adding Promo..');
      
      var currentID = $('#counterPromo').val();    
      
      var deleteButton  = $('<button>',{
        'class':'columns small-2 medium-1 del_button',
        'value':'x',
      });
      deleteButton.bind('click', function(e){
        e.preventDefault();
        $(this).parent('li').remove().unbind('click');
      });
      
      $('#_Text')
        .append( $('<li>',{
            'class':'row',
          }) 
        
            .append( $('<div>',{
                'class':'columns small-10 medium-11 table_mimic',
            })
            .append( $('<textarea>',{
              'name':'text[][px]',
              'id':'promo_'+currentID,
              'class':'form-control input_box_odd text_promo',
              'placeholder':'Section Promo',
            }) )) 

            .append( deleteButton )
      
            
          
        )
      ;
      
        $('#counterPromo').val( parseInt(currentID, 10) + 1 );
        $(document).foundation('reflow');
        $('html, body').animate({
            scrollTop: $("#promo_"+currentID).offset().top
        }, 600);    

      
    });


    //Start Delete Link
    $('#counterLink').val( $('#_Text li').length );

    $('.deleteLink').click(function(e) {
        e.preventDefault();
        console.log('Delete Link..');
        var currentID = (this.id);
        if($("#ddl" + currentID).length == 0) {
            $('#_Text')
                .append( $('<input>',{
                  'type':'hidden',
                  'name':'ddl[]',
                  'id':'ddl'+currentID, /*ddi = delete data recipe*/
                  'class':'form-control',
                  'value':''+currentID,
                }) )
            ;
            $(this).parent('li').hide().unbind('click');       
        } else {
         //alert('this record already exists');
            $("#ddl" + currentID).closest('input').remove().unbind('click');
        }
    });
    
    //Start Text
    $('#counterLink').val( $('#_Text li').length );
    $('#btnActionAddLink').click(function(e) {
      // e.preventDefault();

      console.log('adding Link..');
      
      var currentID = $('#counterLink').val();    
      
      var deleteButton  = $('<button>',{
        'class':'columns small-2 medium-1 del_button',
        'value':'x',
      });
      deleteButton.bind('click', function(e){
        e.preventDefault();
        $(this).parent('li').remove().unbind('click');
      });
      
      $('#_Text')
        .append( $('<li>',{
            'class':'row',
          }) 
        
            .append( $('<div>',{
                'class':'columns small-10 medium-5 table_mimic',
            })
            .append( $('<input>',{
              'name':'text[][lx]',
              'id':'Link_'+currentID,
              'class':'form-control input_box_odd text_link',
              'placeholder':'Section Link',
            }) ))

            .append( $('<div>',{
                'class':'columns small-10 medium-6 table_mimic',
            })
            .append( $('<input>',{
              'name':'text[][lxx]',
              'id':'link_'+currentID,
              'class':'form-control input_box_odd text_link',
              'placeholder':'Section Link',
            }) )) 

            .append( deleteButton )
      
            
          
        );
      
        $('#counterLink').val( parseInt(currentID, 10) + 1 );
        $(document).foundation('reflow');
        $('html, body').animate({
            scrollTop: $("#link_"+currentID).offset().top
        }, 600);

      
        });


        jQuery.each(jQuery('textarea[data-autoresize]'), function() {
        var offset = this.offsetHeight - this.clientHeight;
     
        var resizeTextarea = function(el) {
            jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
        };
        jQuery(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');

        // window.setTimeout( function() {
        //     $("textarea").height( $("textarea")[0].scrollHeight );
        // }, 1);
    });







    

    });

    $('.admin_form_promote').click(function() {
       $('.admin_form_promote').removeClass('active');
       $(this).addClass('active');
    });





    </script>

@stop  
 
@section('content') 








 
<section class="page">

    @if($no_post == 0)
        {!! Form::open(array('action' => array('Admin\BlogController@postUpdatePosts'))) !!} 
    @else
        {!! Form::open(array('action' => array('Admin\BlogController@postAddPosts'))) !!} 
    @endif

	

	<section class="sub_header">
		<div class="row">
         
			<div class="columns small-12 large-6 end">
				<input name="name" class="form-control input_box" value='{{ $no_post == 0 ? "$post->post_name" : "" }}' placeholder="Post Title" />
			</div>
          
			<div class="columns small-12 large-6 end"> 
				<ul class="tabs" data-tab>
                    <li class='columns small-3 tab-title {{ $preview == 0 ? "active" : "" }}'><a id="tab_link" href="#contents">Info</a></li>
                    <li class='columns small-3 tab-title {{ $preview == 3 ? "active" : "" }}'><a id="tab_link" href="#text">Text</a></li>
                    <li class='columns small-3 tab-title {{ $preview == 2 ? "active" : "" }}'><a id="tab_link" href="#images">Media</a></li>
                    <li class='columns small-3 tab-title {{ $preview == 1 ? "active" : "" }}'><a id="tab_link" href="#preview">View</a></li>
				</ul>
			</div>	
            @if($errors->has())
                <div class="columns small-12">
                    @foreach ($errors->all() as $error)
                        <p class="error_message">{{ $error }}</p> 
                    @endforeach
                </div>
            @endif      
            @if(isset($message))
                <div class="columns small-12">
                    <p class="success_message">{{ $message }}</p>
                </div>
            @endif
            @if(session()->has('success'))
                <div class="columns small-12">
                    <p class="success_message">{!! session()->get('success') !!}</p>
                </div>
            @endif 	
		</div>
	</section>
	
    
		
	<section class="content">
		<div class="tabs-content">
			<div class='content {{ $preview == 0 ? "active" : "" }}' id="contents">

                
                <div class="row list_submit_buttons"> 
                    <input class="admin_form_save" type="submit" name="submit" value="Save"/>
                    <!-- <input class="admin_form_promote" type="button" name="promote" value="+ Promote"/> -->
                    <div id="ck-button">
                       <label>
                          <input type="checkbox" name="active" @if($no_post == 0){{ $post->active == 1 ? "checked" : "" }}@endif  value="1"><span>Active</span>
                       </label>
                    </div> 
                    <div id="ck-button">
                       <label>
                          <input type="checkbox" name="promote" @if($no_post == 0){{ $post->promote == 1 ? "checked" : "" }}@endif  value="1"><span>+ Promote</span>
                       </label>
                    </div>  
    				        <!-- <a h class="admin_form_add">+ Promote</a> -->
                    <a href="/admin/blog" class="admin_form_cancel">Cancel</a>
                </div>
                <div class="row input_header">
                    <div class="columns small-5 medium-3 large-2 alabel"> 
                        Read Time
                    </div>
                    <div class="columns small-7 medium-9 large-10 table_mimic"> 
                        <input name="read_time" class="form-control input_box" value='{{ $no_post == 0 ? "$post->read_time" : "" }}' placeholder="Read Time" />
                    </div>
                    <div class="columns small-5 medium-3 large-2 alabel"> 
                        YouTube
                    </div>
                    <div class="columns small-7 medium-9 large-10 table_mimic"> 
                        <input name="video_link" class="form-control input_box" value='{{ $no_post == 0 ? "$post->video_link" : "" }}' placeholder="Video Link"/>
                    </div> 
                    <div class="columns small-5 medium-3 large-2 alabel"> 
                        URL://
                    </div>
                    <div class="columns small-7 medium-9 large-10 table_mimic"> 
                        <input name="url" class="form-control input_box" value='{{ $no_post == 0 ? "$post->url" : "" }}' placeholder="Optional URL" />
                    </div>
                    <div class="columns small-5 medium-3 large-2 alabel"> 
                        #Hashtag
                    </div>
                    <div class="columns small-7 medium-9 large-10 table_mimic"> 
                        <input name="hashtag" class="form-control input_box" value='{{ $no_post == 0 ? "$post->hashtag" : "" }}' placeholder="#hashtag"/>
                    </div> 
                    <div class="columns small-5 medium-3 large-2 alabel"> 
                        Topic
                    </div>
                    <div class="columns small-7 medium-9 large-10 table_mimic"> 
                        <select name="topic" class="form-control input_box_select">
                            <option value="blog" @if($no_post == 0){{ $post->topic == 'blog' ? "selected" : "" }}@endif>Blog</option>
                            <option value="cake" @if($no_post == 0){{ $post->topic == 'cake' ? "selected" : "" }}@endif>Cakes</option>
                            <option value="catering" @if($no_post == 0){{ $post->topic == 'catering' ? "selected" : "" }}@endif>Catering</option>
                            <option value="event" @if($no_post == 0){{ $post->topic == 'event' ? "selected" : "" }}@endif>Events</option>
                            <option value="menu" @if($no_post == 0){{ $post->topic == 'menu' ? "selected" : "" }}@endif >Menu</option>
                            <option value="project"  @if($no_post == 0){{ $post->topic == 'project' ? "selected" : "" }}@endif >Project</option>
                            
                        </select>
                    </div> 
                    <div class="columns small-5 medium-3 large-2 alabel"> 
                        <div id="ck-button">
                            <label>
                                <input type="checkbox" name="hp_promote" @if($no_post == 0){{ $post->hp_promote == 1 ? "checked" : "" }}@endif  value="1"><span class="hp_promote">H/p Promo</span>
                            </label>
                        </div>
                    </div>
                    <div class="columns small-7 medium-9 large-10 "> 
                        <div class="table_mimic">
                            <input name="hook" class="form-control input_box" value='{{ $no_post == 0 ? "$post->hook" : "" }}' placeholder="What's the hook?"/>  
                        </div>
                        
                        
                    </div> 
                </div>
                
                
               
				
			</div>
            <div class='content {{ $preview == 3 ? "active" : "" }}' id="text">
                <div class="row list_submit_buttons"> 
                    <!-- <a href="#" class="admin_form_add" id="btnActionAddPackaging" class="btn btn-primary">+ Add</a> -->
                    <input type="submit" name="submit" class="admin_form_save" value="Save"/>
                    <a href="/admin/blog" class="admin_form_cancel">Cancel</a>
                </div>
                <div class="row">
                    <div class="columns small-12 large-8 large-push-2 table_mimic blurb_push"> 
                        <textarea data-autoresize row="2" name="promo_blurb" class='form-control input_box_odd' placeholder="Section Blurb">{{ $no_post == 0 ? "$post->blurb" : "" }}</textarea>
                    </div>
                </div>
                <div class="fixedElement">
                <div class="row list_submit_buttons ">
                    <div class="columns small-12 medium-10 medium-push-1 large-6 large-push-3">
                        
                            <a href="#" id="btnActionAddHeading" class="columns small-3 blog_form_add">+Heading</a>  
                            <a href="#" id="btnActionAddText" class="columns small-3 blog_form_add">+Text</a>    
                            <a href="#" id="btnActionAddPromo" class="columns small-3 blog_form_add">+Promo</a> 
                            <!-- <a href="#" id="btnActionAddImage" class="columns small-3 blog_form_add">+Image</a> -->
                            <a href="#" id="btnActionAddLink" class="columns small-3 blog_form_add">+Link</a>  
                              
                        
                    </div> 
                </div>
                </div>
                <ul id="_Text" class="_mySortable">
                <?php $x = 0; ?>
                @if($no_post == 0)
                    @if($post_array != 'luke')
                        @foreach($post_array as $id => $pt) 
                            <li class="row">
                                @if($pt["section"] != "LINK")
                                    <div class="columns small-10 medium-11 table_mimic"> 
                                        <textarea data-autoresize name="text[][{{ $id }}]" id="text_{{ $x }}" class='form-control input_box_odd {{ ($pt["section"] == "HEADER" )? "text_header" : "" }} {{ ($pt["section"] == "PROMO" )? "text_promo" : "text_text" }} {{ ($pt["section"] == "LINK" )? "text_link" : "text_text" }}'  placeholder='{{ ($pt["section"] == "HEADER" )? "Section Heading" : "" }}{{ ($pt["section"] == "PROMO" )? "Section Promo" : "" }}{{ ($pt["section"] == "TEXT" )? "Section Text" : "" }}'>{{ $pt['description'] }}</textarea>
                                    </div>
                                @else
                                    <div class="columns small-10 medium-5 table_mimic"> 
                                        <input name="text[][{{ $id }}]" id="text_{{ $x }}" class='form-control input_box_odd text_link'  placeholder="Section Text" value=" {{ $pt['description'] }}" />
                                    </div>  
                                    <div class="columns small-10 medium-6 table_mimic"> 
                                        <input name="text[][{{ $id }}]" id="text_{{ $x }}" class='form-control input_box_odd text_link'  placeholder="Section Text" value=" {{ $pt['link'] }}" />
                                    </div>    
                                @endif

                            
                                <button id="{{ $id }}" class="deleteText columns small-2 medium-1 del_button">x</button>      
                                
                            </li>
                        <?php $x++; ?>  
                        @endforeach
                    @endif
                </ul>
                <input type="hidden" name="id" value='{{ $no_post == 0 ? "$post->id" : "" }}'/>
                
                @endif

                
            </div>
            {!! Form::close() !!}

			<div class='content {{ $preview == 2 ? "active" : "" }}' id="images">
                <div class="row list_submit_buttons"> 
                    <!-- <a href="#" class="admin_form_add" id="btnActionAddPackaging" class="btn btn-primary">+ Add</a> -->
                    <input type="submit" name="submit" class="admin_form_save" value="Save"/>
                    <a href="/admin/blog" class="admin_form_cancel">Cancel</a>
                </div>
                @if($no_post == 0)

                    <div class="row">
                        <div class="columns small-12 medium-8 medium-push-2">
                            <h2 class="center_title">Add Desktop Header</h2>
                            <p>1200 * 628px</p>
                            <form action="/admin/image-upload-desktop" class="dropzone" id="addImages">
                                <input type="hidden" name="post_id" value='{{ $no_post == 0 ? "$post->id" : "" }}'/>
                                <!-- <button type="submit">Upload Image =)</button>  -->
                                {{ csrf_field() }} 
                            </form> 
                        </div>
                    </div>

                    <div id="post_images" class="row">
                        <ul class="columns small-12">     
                            @foreach($post->images as $image)
                                @if($image->type == 1)
                                    <li class="columns small-12 medium-2 end  ">
                                        <div class="image_wrapper" style="background: url(/images/uploads/small/{{$image->file_name}}) no-repeat ; background-position: center center; background-size: cover;">
                                            <a href="/images/uploads/small/{{ $image->file_path }}" class="image_r">
                                                <!-- <img src="{{ $image->file_path }}"> -->
                                            </a> 
                                            <a href="/admin/image-delete/{{ $image->id }}" class="image_delete">x</a> 
                                            
                                        </div>
                                    </li>  
                                @endif  
                            @endforeach
                        </ul>
                    </div>

                    <div class="row">
                        <div class="columns small-12 medium-8 medium-push-2">
                            <h2 class="center_title">Add Vertical Header</h2>
                            <p>1080 * 1920px</p>
                            <form action="/admin/image-upload-vertical" class="dropzone" id="addVImages">
                                <input type="hidden" name="post_id" value='{{ $no_post == 0 ? "$post->id" : "" }}'/>
                                <!-- <button type="submit">Upload Image =)</button>  -->
                                {{ csrf_field() }} 
                            </form> 
                        </div>
                    </div>

                    <div id="postv_images" class="row">
                        <ul class="columns small-12">     
                            @foreach($post->images as $image)
                                @if($image->type == 0)
                                    <li class="columns small-12 medium-2 end  ">
                                        <div class="image_wrapper" style="background: url(/images/uploads/phone/small/{{$image->file_name}}) no-repeat ; background-position: center center; background-size: cover;">
                                            <a href="/images/uploads/phone/small/{{ $image->file_path }}" class="image_r">
                                                <!-- <img src="{{ $image->file_path }}"> -->
                                            </a> 
                                            <a href="/admin/image-delete/{{ $image->id }}" class="image_delete">x</a> 
                                            
                                        </div>
                                    </li>  
                                @endif   
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class='content {{ $preview == 1 ? "active" : "" }}' id="preview">
                <div class="row list_submit_buttons"> 
                    <!-- <a href="#" class="admin_form_add" class="btn btn-primary"></a> -->
                    <input type="submit" name="submit" name="preview" class="admin_form_preview" value="Refresh"/>
                    <input type="submit" name="submit" class="admin_form_save" value="Save"/>
                    <a href="/admin/blog" class="admin_form_cancel">Cancel</a>
                </div>

                @if($no_post == 0)

                    @if($image_count != 0)

                        @if($background_image != 'no_background_image')
                            <div id="preview_wrap" class="preview_wrapper" style=" background: url(/images/uploads/large/{{ $background_image->file_name }}) no-repeat; background-position: center center;
                            background-size: cover;">
                        @else
                            <div id="preview_wrap" class="preview_wrapper" style=" background: url(/images/uploads/phone/large/{{ $vertical_image->file_name }}) no-repeat; background-position: center center;
                            background-size: cover;">
                        @endif

                            
                        </div>
                        <div class="row preview_page">
                            
                            <div class="columns small-12 large-8 blog_section">
                                <h1 class="post_title">{{ $post->post_name }}</h1>
                                <article class="post_header">
                                    <div class="columns small-12 medium-6 ">
                                        <p class="post_author">Author: {{ $post->author }}</p>
                                    </div>
                                    <div class="columns small-12 medium-6 ">
                                        <p class="post_time">{{ $post->read_time }} min read</p>
                                    </div>
                                </article>
                                <article class="post_content">
                                    <p class="post_text">{{ $post->blurb }} </p>
                                    @if($no_video == 0)
                                        <div class="video-container">
                                            <iframe width="560" height="315" src="{{ $post->video_link }}" frameborder="0" allowfullscreen></iframe>  
                                        </div>
                                    @endif

                                    @if($post_array != 'luke')
                                        <?php $x = 0; ?>
                                    
                                        @foreach($post_array as $pt) 
                                     
                                            @if($pt["section"] != "LINK")
                                                @if($pt["section"] == "HEADER")
                                                    <h2 class="heading_text">{{ $pt['description'] }} </h2>
                                                @elseif($pt["section"] == "PROMO")
                                                    <p class="promo_text">{{ $pt['description'] }} </p>
                                                @else
                                                    <p class="post_text">{{ $pt['description'] }} </p>
                                                @endif
                                            @else
                                                <a class="promo_link" href="{{ $pt['link'] }}">{{ $pt['description'] }}</a>
                                            @endif
                                         
                                        <?php $x++; ?>  
                                        @endforeach
                                    @endif
                                </article>
                            </div>
                            <div class="columns small-12 large-4 promo_section">
                               
                            </div>
                            <!-- </div> -->
                        </div>
                    @endif
                @endif
            </div>

		</div> 
		
	</section>   
	    

    <script>
        $(window).scroll(function(e){ 
          var $el = $('.fixedElement'); 
          var isPositionFixed = ($el.css('position') == 'fixed');
          if ($(this).scrollTop() > 145 && !isPositionFixed){ 
            $('.fixedElement').css({'position': 'fixed', 'top': '50px'}); 
             $('.blurb_push').css({'margin-bottom': '70px'}); 
          }
          if ($(this).scrollTop() < 145 && isPositionFixed)         {
            $('.fixedElement').css({'position': 'static', 'top': '50px'}); 
             $('.blurb_push').css({'margin-bottom': '20px'}); 

          } 
        });
    </script>
	
	 
</section>


@stop

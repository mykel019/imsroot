(function(){
	$.ajaxSetup({
	    headers: {
	        // 'X-XSRF-TOKEN': $('input[name="_token"]').val(),
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	/*------------------------
		iCheck
	-------------------------*/
	$('input').iCheck({
		      checkboxClass: 'icheckbox_square-blue',
		      radioClass: 'iradio_square-blue',
		      increaseArea: '20%' // optional
		    });


	/*number only input on selected number*/
    $('input.numberinput').on('keypress', function (e) {            
        return !(e.which != 8 && e.which != 0 &&
            (e.which < 48 || e.which > 57) && e.which != 46);
    });

})();

/*serialize All form ON SUBMIT*/
$(document).off('click',".submit").on('click',".submit",function(){
		var btn = $(this);

		$("#form").ajaxForm({
			// dataType: 'JSON',
			beforeSend:function(){
				btn.button('loading')
			},
			success:function(data){

				par  =  JSON.parse(data);

				if(par.status){
					$('.alert-notification-success').show();
					$('.notif-msg').html(par.response);
					$('.alert-notification-failed').hide();
					$('.alert').delay(2000).fadeOut(500)
					// alert(par.response);		
					$(".error-msg").remove();
					$('input[type="text"], select').popover('destroy');

					$('body').animate({
					        scrollTop: $('.alert').offset().top - 130
					    }, 500);
					// path = base_url+module;
					// window.location.href = path;
				}else{
					$('.alert-notification-success').hide();
					$('.alert-notification-failed').show();
					$('.notif-msg').html(par.response);
					$(".error-msg").remove();
					$('input[type="text"], select').popover('destroy');

				}

				btn.button('reset');
			},
			error:function(data){
				
				$error = data.responseJSON;
				/*reset popover*/	
				$('input[type="text"], select').popover('destroy');

				/*add popover*/
				block = 0;
				$(".error-msg").remove();
				$.each($error,function(k,v){
					var messages = v.join(', ');
					msg = '<div class="error-msg err-'+k+'" ><i class="fa fa-exclamation-circle" style="color:rgb(255, 184, 0)"></i> '+messages+'</div>';
					$('input[name="'+k+'"], textarea[name="'+k+'"], select[name="'+k+'"]').before(msg).attr('data-content',messages);
					if(block == 0){
						try{
							$('html, body').animate({
						        scrollTop: $('.err-'+k).offset().top - 130
						    }, 500);
						}catch(e){
							console.log('error')
						}
					    block++;
					}
				})
				btn.button('reset');
			},
			always:function(){
				btn.button('reset');

			}
		}).submit();

	});


/*edit*/
$(document).on('click','.edit',function(){
	action = $(this).data('action');
	path = base_url+action;
	window.location.href = path;
});



/*keycode delete*/
$(document).on('keydown',function(e){
	if(e.keyCode == 46){
		$('.delete').trigger('click');
	}
})


/*single delete*/
$(document).on('click','.single-delete',function(){
	url = base_url+module+'/destroy';
	self =$(this)
	idArr = [];
	idArr.push($(this).data('id'));	

	if(confirm('You are about to delete a record!')){	
		$.post(url,{data:idArr},function(data){
			console.log(data)
			if($.trim(data) == 'deleted'){
				self.parent().closest('tr').remove();
				// self.parent().removeClass('action-buttons')
				// self.parent().addClass('undo-button').html('<a class="btn btn-warning btn-xs undo"> <i class="fa fa-undo"></i> Undo</a>')
			}
		})
	}

})

/*delete*/
$(document).on('click','.delete',function(){
	url = base_url+module+'/destroy';	
	idArr = [];
	$('.chk-list').each(function(){
		if($(this).is(':checked')){
			
			//for items inside table
			if($(this).closest('tr').length > 0){				
				id = $(this).closest('tr').attr('id');	
				idArr.push(id);
			}

			//for items other than table, ex: div,span, or any container wrapper
			if($(this).closest('.entity-wrapper').length > 0){				
				id = $(this).closest('.entity-wrapper').attr('id');	
				idArr.push(id);
			}

		}
	})

	if(idArr.length > 0){
		if(confirm('You are about to delete the selected items')){			
			$.post(url,{data:idArr},function(data){
				if($.trim(data) == 'deleted'){
					$.each(idArr,function(k,v){
						$("#"+v).remove();
					})
				}
			})
		}			
	}

});


/*--------------------
| 	Paginate
----------------------*/

$(document).on('click','.pagination a',function(){
		$('.pagination li').removeClass('active');
		// $(this).parent().addClass('active');

		linkArr = $(this).attr("href").split('/');
		page = linkArr[linkArr.length - 1];
		console.log( )

		// alert(base_url)
		$.ajax({
		   type: "GET",
		   url: base_url+module+'/datatable/'+page,
		   data: {"q":$('.search').val() },
		   success: function(res){
		      $(".sub-panel").html(res);
		   }
		});
	return false;
});


/*--------------------
| 	SERARCH
----------------------*/
var timer;
$(document).on('keyup','.search',function(){
	$('input.search').addClass('searchSpinner');
	 _filters = $("#form-filters").serialize();
	 // status = $("#users").val();
	clearTimeout(timer);
	timer = setTimeout(
				function(){
					$.ajax({
					   type: "GET",
					   url: base_url+module+'/datatable',
					   data: {"q":$('.search').val(), 'filters': _filters},
					   success: function(res){
					      $(".sub-panel").html(res);
					      $('input.search').removeClass('searchSpinner');
					   }
					});
				},500);
})
/*--------------------
| 	LIMIT
----------------------*/
$(document).on('change','.limit',function(){
	clearTimeout(timer);
	timer = setTimeout(
				function(){
					$.ajax({
					   type: "GET",
					   url: base_url+module+'/datatable/1',
					   data: {"q":$('.search').val(),'limit':$(".limit").val() },
					   success: function(res){
					      $(".sub-panel").html(res);
					   }
					});
				},500);
})

$.commaSeparated  = function (x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}



/*unviel images LAZY IMAGE LOADING*/
// $(document).ready(function(){
// 	$("img").unveil(200);
// })

/* file uploads
	@params
	gate  			-  Ex: #file-preview (photo thumbnail)
	targetCallback  -  Ex: #input
*/
$.uploadHandler = function(gate,targetCallback){	

	$(gate).click(function(){
		$('.file-input').trigger('click');
	});

	$('.file-input').change(function(){
		$('#upload-form').ajaxForm(function(data){
			par = JSON.parse(data);
			if(par.status){
				$('#filename').val(par.response); // this will hold current filename			
				$(targetCallback).val(par.response);
				$(gate).attr('src',base_url+'assets/uploads/photos_thumb/'+par.response);
			}else{ alert(par.response) }
		}).submit();
	})
}

$.uploadHandler('#file-preview','#photo');


/*CHECk ALL*/

$.highlightsCheckedItems = function(){
	$('.thumbnail-list, tbody>tr').css('background-color','rgb(255, 255, 208)');
	$('.frame-pin').css('background-color','rgb(255, 255, 175)');
}

$.highlightsRemoved = function(){
	$('.thumbnail-list, tbody>tr').css('background-color','rgb(255, 255, 255)');
	$('.frame-pin').removeAttr('style');
}

$(document).on('ifChecked',".chk-all",function(){
	//highlight items table, div,span, or any container wrapper in list view
	$(".chk-list").iCheck('check');
	$.highlightsCheckedItems();
});

$(document).on('ifUnchecked',".chk-all",function(){
	//revert highlight items table, div,span, or any container wrapper in list view
	$(".chk-list").iCheck('uncheck');
	$.highlightsRemoved();
});



/*CHECk INDIVIDUAL*/
$(document).on('ifChecked',".chk-list",function(){
	self = $(this);
	self.closest('tbody>tr').css('background-color','rgb(255, 255, 208)');		
	self.parent().parent().siblings('.thumbnail-list').css('background-color','rgb(255, 255, 208)');		
	self.closest('.frame-pin').css('background-color','rgb(255, 255, 175)');

})


$(document).on('ifUnchecked',".chk-list",function(){
	self = $(this);
	self.closest('tbody>tr').css('background-color','rgb(255, 255, 255)');
	self.parent().parent().siblings('.thumbnail-list').css('background-color','rgb(255, 255, 255)');		
	self.closest('.frame-pin').removeAttr('style');
	
})


$(document).on('click',".chk-list",function(event){
	event.stopPropagation();		
})


$(document).on('click','.clear-form',function(){
	$(".error-msg").remove();
	$('input, select, textarea').val('');
	$('input').iCheck('uncheck');
	$.each($("select").selectize(),function(k,v){
		$(v)[0].selectize.clear();
	});
})

//       $(document).on('click','.activate',function(){
// 		id = $(this).data('id');
// 		tr = $(this).closest('tr');
// 		// alert(base_url)
// 		$.ajax({
// 		   type: "GET",
// 		   url: base_url+module+'/activate',
// 		   data: {id:id},
// 		   success: function(data){
// 		    par  =  JSON.parse(data);
//             tr.remove();
//            // $(".alert_activated").slideDown();
//            // $('.alert_activated').delay(1000).slideUp()
//           $('.alert-notification-success').show();
//           $('.notif-msg').html(par.response);
//           $('.alert-notification-failed').hide();
//           $('.alert').delay(2000).fadeOut(500)
//           // alert(par.response);   
//           $(".error-msg").remove();
//           $('input[type="text"], select').popover('destroy');

//           $('body').animate({
//                   scrollTop: $('.alert').offset().top - 130
//               }, 500);
// 		   }
// 		});
// 	// return false;
// });

         $(document).on('click','.activate',function(){
        id = $(this).data('id');
        //console.log(id);
        tr = $(this).closest('tr');
        $.get(
		  base_url+module+'/activate',
          {id:id},
          function(data){
            par  =  JSON.parse(data);
            tr.remove();
            // $(".alert_activated").slideDown();
            // $('.alert_activated').delay(1000).slideUp()
          $('.alert-notification-success').show();
          $('.notif-msg').html(par.response);
          $('.alert-notification-failed').hide();
          $('.alert').delay(2000).fadeOut(500)
          // alert(par.response);   
          $(".error-msg").remove();
          $('input[type="text"], select').popover('destroy');

          $('body').animate({
                  scrollTop: $('.alert').offset().top - 130
              }, 500);

        })
      })



//# sourceMappingURL=init.js.map

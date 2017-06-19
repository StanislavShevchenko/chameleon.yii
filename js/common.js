$(function(){
	$('.date_pic').daterangepicker({
		singleDatePicker: true,
		dateLimit: true,
		autoUpdateInput : false,
		input : this,
		locale: {
			format: 'DD.MM.YYYY'
		}
	}, function(start){
		$(this.element[0]).val(start.format('DD.MM.YYYY'));
	});
});

$(document).ready(function(){
	
	$( ".a_sort" ).click(function() {		
		var sort  = $(this).data('sort');
		var order = $(this).data('order');
		$('#sort').val(sort);
		$('#order').val(order);
		$('#searchForm').submit();
	});
	
	
	$( ".delete_book" ).click(function() {		
		if (!confirm("Вы подтверждаете удаление?")) return false;		 
		var id = $(this).closest('tr').data('id_book');
		$.ajax({
			type: 'POST',
			url: '/book/ajax/delete',
			dataType:'JSON',
			data: {
				id: id
			},
			success: function(json){
				if(json.ERROR != null){
					alert('sdf');
				}else{
					$('[data-id_book='+id+']').remove();
				}
			}
		});
		return false;
	});
	
	$( ".info_book" ).click(function() {
		var id = $(this).closest('tr').data('id_book');		
		$.ajax({
			type: 'POST',
			url: '/book/ajax/view',
			data: {
				id: id
			},
			success: function(html){
				if(html.length > 0 ){
					$('#body_info_book').html(html);
					$('#infobook_modal').modal('show');
				}
			}
		});
		return false;
	});
	
	$(".img_l").click(function() {
		var height = $(this).height();
		$(".img_l").css({
			position: 'unset',
			height: '100px',
		});
		if( height === 300) return;
			
		
		$(this).css({
			position: 'absolute',
		});
		$(this).animate({
		   height   : "300",
		}, 100);        
    });	
	
	$(document).click( function(event){
		if( $(event.target).closest(".img_l").length ) 
		  return;
		$(".img_l").css({
			position: 'unset',
			height: '100px',
		});
		event.stopPropagation();
    });
});

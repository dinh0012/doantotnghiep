$(document).ready(function() {
	$(document).on('click', '#submit-banner', function(){
		var title1=$('#Name_Banner').val();
		var title2=$('#Name_Banner2').val();
		var id_group=$('#id_group').val();
		var check = false;
		if(title1==''){
			$('#Name_banner_em_').show();
			check = true;
		}
		if(title2==''){
			$('#Name_banner2_em_').show();
			check = true;
		}
		if(!check){
			$.ajax({
				url: '/admin/banners/updatetitle',
				type: 'post',
				data: {
					name1: title1,
					id: id_group,
					name2: title2
				},
				dataType: 'json',
				success: function(data) {
					if (data.status) {
						$('.message-success').show();
						$('#Name_Banner').val(data.title1);
						$('#Name_Banner2').val(data.title2);
					}
				}
			});
		}else{
			return false;
		}
	});
	$(document).on('click', '.remove-tmp-file', function(){
			var clicked = $(this);
			var val = clicked.attr('rel');
			$.ajax({
				url: '/resource/removeTmpFile',
				type: 'post',
				data: {
					file: val
				},
				dataType: 'json',
				success: function(data) {
					if (data.error == 0) {
						clicked.parent().remove();
					}
				}
			});
		});

	$(document).on('change', '#country_id', function(){
		var val = $(this).val();
		
		$.ajax({
			url: '/admin/city/dynamicstates',
			type: 'post',
			data: {
				country_id: val
			},
			dataType: 'json',
			success: function(data) {
				if (data.status == 'SUCCESS') {
					$('#City_state_id').html(data.html);				
				}
			}
		});
	});
	
	$(document).on('click', '#set-default-banner', function(e){
		e.preventDefault();
		
		var retVal = confirm("Are you sure to recover default banner for this page ?");
	   	if (retVal == true) {
	   		var val = $(this).attr('rel');
			
			$.ajax({
				url: '/admin/page/setdefaultbanner',
				type: 'post',
				data: {
					url: val
				},
				dataType: 'json',
				success: function(data) {
					if (data.status == 'SUCCESS') {
						$('.banner-photo').hide();			
					}
				}
			});
		   	return true;	  	
	   } else {
			return false;
	   }		
	});
	
	$(document).on('click', '#gen-promo-code', function(e){
		e.preventDefault();
		$.ajax({
			url: '/admin/promocode/generatecode',
			type: 'post',
			data: {				
			},
			dataType: 'json',
			success: function(data) {
				$('#PromoCode_code').val(data.code);
			}
		});
		
		
	});
	
	//set primary image for property image list
	$(document).on("click", '.property-image-primary', function(e) {
		e.preventDefault();

		var el = $(this);
		var id = $(this).attr("rel");
		var val = parseInt(id);
		var prop_id = $(this).attr("prop_id");
		var val_pro = parseInt(prop_id);
		$.ajax({
	   		url: '/resource/setprimary',
	   		type: 'post',
	   		data: {
	   			image_id: val,
	   			prop_id: val_pro
	   		},
	   		dataType: 'json',
	   		success: function(data) {
	   			if (data.status == 'SUCCESS') {
	   				alert('Set primary image success.');
	   				el.parents('ul').find('.image-primary')
		   				.removeClass('image-primary')
		   				.addClass('property-image-primary');
	   				el.removeClass('property-image-primary').addClass('image-primary');
	   			}
	   		}
		});
	});

	//delete image
	$('.property-image-remove').on('click', function(e) {
		e.preventDefault();

		var id = $(this).attr("rel");
		var val = parseInt(id);
		$.ajax({
	   		url: '/resource/deleteimagegallery',
	   		type: 'post',
	   		data: {
	   			gallery: val
	   		},
	   		dataType: 'json',
	   		success: function(data) {
	   			if (data.status == 'SUCCESS') {
	   				$(data.image_del).remove();
	   			}
	   		}
		});
	});

	//delete preview image
	$(document).on('click', '.remove-tmp-file', function(e){
		e.preventDefault();

		var clicked = $(this);
		var val = clicked.attr('rel');
		$.ajax({
			url: '/resource/removeTmpFile',
			type: 'post',
			data: {
				file: val
			},
			dataType: 'json',
			success: function(data) {
				if (data.error == 0) {
					clicked.parent().remove();
					$("#image_files .filename").text("No file selected");
				}
			}
		});
	});


});
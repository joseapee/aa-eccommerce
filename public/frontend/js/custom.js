
function displayCartError(data){

	Swal.fire({
	  icon: 'error',
	  title: 'Notice',
	  text: 'Please select a '+data.field,
	  // footer: '<a href="">Why do I have this issue?</a>'
	});
}





$('.add_to_cart').click(function(e) {
	e.preventDefault();

	var product_id = $('#product_id').val();
	var image = $('#image-1').attr('data-id');
	var product_name = $('#product_name').text();
	var product_price = $('#product_price').text();


	$.ajax({
		url: '/add-to-cart',
		type: 'POST',
		dataType: 'JSON',
		data: $('#add_to_cart').serialize()+'&name='+product_name+'&image='+image+'&price='+product_price,
	    success:function(data)
	    {
	    	if (data.status == false) {
	    		displayCartError(data);

	    	}else{

	    		var cart_item = 
					'<li id="item-'+product_id+'" class="mini_cart_item">'+
						'<a class="remove_cart_item" data-id="'+product_id+'" title="Remove this item" href="#">&#215;</></a>'+
						'<a href="#" class="shop-thumbnail shop-item">'+
							'<img alt="'+product_name+'" class="attachment-shop_thumbnail" src="/uploads/products/thumbs/thumb_'+image+'">'+product_name+
						'</a>'+
						'<span class="quantity">'+data.quantity+' &#215;'+ 
							'<span class="amount">'+product_price+'</span>'+
						'</span>'+
					'</li>';

				if (data.new == 1) {
	    			$('#cart-list').append(cart_item);
					$('#increamentCart').html(parseInt($('#increamentCart').html(), 10)+1);
				}else{

					$('#item-'+product_id).remove();
					$('#cart-list').append(cart_item);
				}

				Swal.fire({
				  imageUrl: '/uploads/products/thumbs/thumb_'+image,
				  imageHeight: 60,
				  imageAlt: product_name,
				  position: 'top-end',
				  icon: 'success',
				  title: 'Item added to cart',
				  showConfirmButton: false,
				  timer: 1500
				});

	    	}

	        
	    } // success
	});
	

});


// remove item from small cart
$('#cart-list').on('click','.remove_cart_item', function(e){

	var product_cart_id = $(this).attr('data-id');


	$.ajax({
		url: '/remove-from-cart/'+product_cart_id,
		type: 'GET',
		dataType: 'JSON',
		// data: {product_id: product_cart_id},
		success: function(data){
			
			$('#item-' + product_cart_id).remove();
			$('#increamentCart').html(parseInt($('#increamentCart').html(), 10)-1);

			Swal.fire({
			  position: 'top-end',
			  icon: 'success',
			  title: 'Item removed from cart',
			  showConfirmButton: false,
			  timer: 1500
			})

		}

	})	//	ajax
	
});	//	remove item from cart list end



// checkout page functions

	// get state detail on country select
    $('#country').on('change', function(e){
       var country_id = this.value;
       
       	$.ajax({
		url: '/fetch-state/'+country_id,
		type: 'GET',
		dataType: 'JSON',
		success: function(data){
			
			var len = data.length;

            $("#states").empty();
            for( var i = 0; i<len; i++){
                var id = data[i]['id'];
                var name = data[i]['name'];
                $("#states").append("<option value='"+id+"'>"+name+"</option>");
            }
            $('#states').removeAttr("disabled")

		}

		})	//	ajax

	});  // fetch state id


	$('.selected-address').click(function(e) {

		
		
		var shipping_id = $(this).attr('data-id');
		
		$.ajax({
		url: '/save-shipping-address/'+shipping_id,
		type: 'GET',
		dataType: 'JSON',
		success: function(data){

			if (data.status==true) {
				$('.shipping-list').addClass('hidden');
				$('#add_new_address_block').addClass('hidden');
				location.reload(true);
			}

		}

		})	//	ajax
		

	});	//	end of shipping address selected


	// 
	$('.shipping-method').click(function(e) {
		
		var shipping_method = $(this).val();
		
		$.ajax({
		url: '/save-shipping-method/'+shipping_method,
		type: 'GET',
		dataType: 'JSON',
		success: function(data){

			if (data.status==true) {
				if (shipping_method == 'delivery') {
					$('#default-shipping').removeClass('hidden');
				}else{
					$('#default-shipping').addClass('hidden');
				}
			}

		}

		})	//	ajax
		

	});	//	end of shipping method selected


	$('#add-new-address').click(function(e) {
		
		$('#shipping-fields').addClass('hidden');
		$('#new-shipping-form').removeClass('hidden');
	});


	$('#cancel-new-shipping').click(function(e) {
		
		$('#new-shipping-form').addClass('hidden');
		$('#shipping-fields').removeClass('hidden');
	});

	$('#change-address').click(function(e) {

		$('#default-shipping').addClass('hidden');
		$('.shipping-list').removeClass('hidden');
		$('#add_new_address_block').removeClass('hidden');
	});


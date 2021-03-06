// all jquery operations goes here...

function popup(message) {
		
	// get the screen height and width  
	var maskHeight = $(document).height();  
	var maskWidth = $(window).width();
	
	// calculate the values for center alignment
	var dialogTop =  (maskHeight/2) - ($('#dialog-box').height());  
	var dialogLeft = (maskWidth/2) - ($('#dialog-box').width()/2); 
	
	// assign values to the overlay and dialog box
	$('#dialog-overlay').css({height:maskHeight, width:maskWidth}).show();
	$('#dialog-box').css({top:dialogTop, left:dialogLeft}).show();
	
	// display the message
	$('#dialog-message').html(message);
			
}

$(document).ready(
	
			
		function() {
			
			// if user clicked on button, the overlay layer or the dialogbox, close the dialog	
			$('a.btn-ok, #dialog-overlay, #dialog-box').click(function () {		
				$('#dialog-overlay, #dialog-box').hide();		
				return false;
			});
	
			// if user resize the window, call the same function again
			// to make sure the overlay fills the screen and dialogbox aligned to center	
			$(window).resize(function () {
				//only do it if the dialog box is not hidden
				if (!$('#dialog-box').is(':hidden')) popup();		
			});	
			
			// function to generate static counter
			function staticCounter() {
				if( typeof staticCounter.counter == 'undefined' ) {
        			staticCounter.counter = 0;
    			}
    			staticCounter.counter++;
    			return staticCounter.counter;
			}
			
						
			// add row dynamically to #add-order table
			$("#add-order").click(
			
				function () 
				{
					
					// set i to foo return value
					var i = staticCounter();
					
					//set variable to apply to name attributes
					var nam_code = "product-code-" + i;
					var nam_name = "product-name-" + i;
					var nam_count = "product-count-" + i;
					var nam_unit_type = "product-unit-" + i;
					var nam_product_type = "product-type-" + i;
					var nam_price = "product-price-" + i;
					var nam_total = "product-total-" + i;
					
					// clone the #table-order last row
					var cont = $('#table-order tr:last').clone(true);
					
					// find element that has product-total, product-price and product-count class
					// if they exist, change their name attribute to be same as variables (name, nam2, nam3) above
					$(cont).find('.product-code').attr("name", nam_code).end();
					$(cont).find('.product-name').attr("name", nam_name).end();
					$(cont).find('.product-count').attr("name", nam_count).end();
					$(cont).find('.product-unit').attr("name", nam_unit_type).end();
					$(cont).find('.product-type').attr("name", nam_product_type).end();
					$(cont).find('.product-total').attr("name", nam_total).end();
					$(cont).find('.product-price').attr("name", nam_price).end();
									
					// insert the cloned element to the #table-order last position
					$(cont).insertAfter('#table-order tr:last');
					
					// reset the values of the cloned element
					$('#table-order tr:last .product-code').val('');
					$('#table-order tr:last .product-code').css("outline","none");
					$('#table-order tr:last .product-name').val('');
					$('#table-order tr:last .product-count').val('');
					$('#table-order tr:last .product-price').val('');
					$('#table-order tr:last .product-total').val('');
					
					return false;
        		}
			);
			
			
			// show calendar using glDatePicker plugin
			$("#po-date").glDatePicker(
			{
				cssName: "android",
				position: "inherit"
			});
			
			// show calendar using glDatePicker plugin
			// order_details
			$(".prod-exp-time").glDatePicker(
			{
				cssName: "android",
				position: "absolute"
			});
			
			// calculate order automatically
			$("#calculate-order").click(function(){
					
				// create an array variable to hold the values of product-count input element							
				var arr = [];						
				// extract the array
				$("input[name^=product-count]").each(function () {
    				var items = $(this).val();
					arr.push(items);
				
				});
				
				var test = $("input[name^=add-count]").val(arr);
							
				var z = 0;
				
				var total_order = [];
				
				while(z < arr.length)
				{
					var nam = "product-total-" + z;
					var nam_qty = "product-count-" + z;
					var nam_price = "product-price-" + z;
					var qty = $("input[name^=" + nam_qty + "]").val();
					var price = $("input[name^=" + nam_price + "]").val();
					//calculate per product total price
					var total = qty * price;
					// collect the total price, and send them to total_order array
					total_order.push(total);
					$("input[name^=" + nam + "]").val(total);
					// calculate the element of the total_order array, and assign them to total order input text
					$("input[name^=total-order]").val(eval(total_order.join('+')));
					//var total_order = $("input[name^=total-order]").val(eval(total_order.join('+')));
					z++;
				}
						
				return false;
				
	        });
			
			// save the order datas
			$('#save-order').click(function() {
				
				// sets values of order meta data
				var counter = staticCounter();
				var po_number = $('#po-number').val();
				var po_date = $('#po-date').val();
				var supplier = $('#supplier').val();
				var key_person = $('#key-person').val();
				var address = $('#address').val();
				var instruction = $('#instruction').val();
				var total_order = $('#total-order').val();

				// prepare data for ajax call
				var postdata = {
								'counter':counter,
								'po_number':po_number, 
								'po_date':po_date, 
								'supplier':supplier,
								'key_person':key_person,
								'address':address,
								'instruction':instruction,
								'total_order':total_order
								};
				
				// make ajax call
				$.ajax({
     					type: "POST",
						dataType: "json",
						url: "http://localhost/alkes/index.php/order/order_save_meta_data",
     					data: postdata,
     					success: function (data)
						// start success function #1
						{
							/*
							$.each(data, function(name, val){
    							//alert(name);
								
								alert(val.length);
								
								/*
								switch(name){
        							case 'po_number':
            							popup(data.po_number_error);
           	 							break;
        							case 'po_date':
            							popup(data.po_date_error);
            							break;
        							default:
            							$el.val(val);
    							}
							
							});
							*/
							
							
							if(data.po_number_error)
							{
								//$('.form-error.po-number-error').html(data.po_number_error);
								$('.form-error.po-number-error').html(data.po_number_error);
							}
							
							if(data.po_date_error)
							{
								$('.test2').show();
								//$('.form-error.po-date-error').html(data.po_date_error).css("display","block");
							}
							/*
							if(data.supplier_error)
							{
								alert(data.supplier_error);
								//$('.form-error.supplier-error').html(data.supplier_error).css("display","block");
							}
						
							if(data.key_person_error)
							{
								alert(data.key_person_error);
								//$('.form-error.key-person-error').html(data.key_person_error).css("display","block");
							}
							
							if(data.total_order_error)
							{
								alert(data.total_order_error);
								//return data.product_total_error;
							}
							*/
								
							if(data.po_number_exist)
							{
								alert(data.po_number_exist);	
							}
							else
							{
							
								arr = [];
							
								$("input[name^=product-code]").each
								(
				
									function () 
									{
    									var items = $(this).val();
										arr.push(items);
									}
					
								);
				
								var cont = arr.length;
				
								var i = 0;
							
								//start while
								while(i < cont)
								{
									// sets order data values
									var product_code = $("input[name^=product-code-" + i + "]").val();
									var product_name = $("input[name^=product-name-" + i + "]").val();
									var product_qty = $("input[name^=product-count-" + i + "]").val();
									var product_unit = $("select[name^=product-unit-" + i + "]").val();
									var product_type = $("select[name^=product-type-" + i + "]").val();
									var product_price = $("input[name^=product-price-" + i + "]").val();
									var product_total = $("input[name^=product-total-" + i + "]").val();
								
									var postdata = {
													'po_number':data.po_number,
													'po_date':data.po_date,
													'product_code':product_code,
													'product_name':product_name,
													'product_qty':product_qty,
													'product_unit':product_unit,
													'product_type':product_type,
													'product_price':product_price,
													'product_total':product_total
													};
												
									$.ajax({
										type: "POST",
										dataType: "json",
										url: "http://localhost/alkes/index.php/order/order_save_data/",
     									data: postdata,
     									success: function (data) 
											//start success function #2
											{
												/*
												if(data.data_saved)
												{
													alert(data.data_saved);
												}
											
												if(data.po_number_error)
												{
													alert(data.po_number_error);
													$("input[name^=product-code-" + i + "]").css("outline","1px solid red");
												}
											
												if(data.po_date_error)
												{
													alert(data.po_date_error);
													$("input[name^=product-code-" + i + "]").css("outline","1px solid red");
												}
						
												if(data.product_name_error)
												{
													alert(data.product_name_error);
												}
								
												if(data.product_qty_error)
												{
													alert(data.product_qty_error);
												}
								
												if(data.product_price_error)
												{
													alert(data.product_price_error);
												}
								
												if(data.product_total_error)
												{
													alert(data.product_total_error);
												}
									
												/*
												if(data.location)
												{
													window.location = data.location;
												}
												*/
											} // end success function #2
							
									}); // end ajax call #2
												
									i++
								} // end while
							
							} // end else
							
						} // end success function #1
						
				}); // end ajax call #1
			
			}); // end save-order click
		
		} // end main function
		
); // end document ready
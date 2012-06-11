$(document).ready(
	
	
		function() {
			
			// function to generate static counter
			function staticCounter() {
				if( typeof staticCounter.counter == 'undefined' ) {
        			staticCounter.counter = 0;
    			}
    			staticCounter.counter++;
    			return staticCounter.counter;
			}
			
			function staticCounterSave() {
				if( typeof staticCounterSave.counter == 'undefined' ) {
        			staticCounterSave.counter = -1;
    			}
    			staticCounterSave.counter++;
    			return staticCounterSave.counter;
			}
			
			
			
			// add row dynamically to #add-order table
			$("#add-order").live("click",
			
				function test() 
				{
					
					// set i to foo return value
					var i = staticCounter();
					//set variable to apply to name attributes
					var nam_code = "product-code-" + i;
					var nam_item = "product-name-" + i;
					var nam_total = "product-total-" + i;
					var nam_price = "product-price-" + i;
					var nam_count = "product-count-" + i;
					// clone the #table-order last row
					var cont = $('#table-order tr:last').clone(true,true);
					// find element that has product-total, product-price and product-count class
					// if they exist, change their name attribute to be same as variables (name, nam2, nam3) above
					$(cont).find('.product-total').attr("name", nam_total).end();
					$(cont).find('.product-price').attr("name", nam_price).end();
					$(cont).find('.product-count').attr("name", nam_count).end();
					$(cont).find('.product-code').attr("name", nam_code).end();
					$(cont).find('.product-name').attr("name", nam_item).end();
					// insert the cloned element to the #table-order last position
					$(cont).insertAfter('#table-order tr:last');
					// reset the values of the cloned element
					$('#table-order tr:last .product-code').val('');
					$('#table-order tr:last .product-name').val('');
					$('#table-order tr:last .product-count').val('');
					$('#table-order tr:last .product-price').val('');
					$('#table-order tr:last .product-total').val('');
					
					return i;
        		}
			);
			
			
			// show calendar using glDatePicker plugin
			$("#po-date").glDatePicker(
			{
				cssName: "android",
				position: "inherit"
			});
			
			//if the calculate-order button is clicked
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
					var total_order = $("input[name^=total-order]").val(eval(total_order.join('+')));
					var postdata = {'qty':qty};
					z++;
				}
						
				return false;
				
	        });
			
			//if the save-order button is clicked
			$('#save-order').click(function() {
				
				var product_count_first = $("input[name=product-count-0]").val();
				var po_numbers = $('#po-number').val();
				var po_date = $('#po-date').val();
				var save_status = "TRUE";
				
				var arr = [];	
				
				$("input[name^=product-code]").each(function () {
    				var items = $(this).val();
					arr.push(items);
				
				});
				
				var cont = arr.length;
				
								
				var i = 0;
				
				
				
				while(i < cont)
				{
					var product_code = $("input[name^=product-code-" + i + "]").val();
					var product_name = $("input[name^=product-name-" + i + "]").val();
					
					var postdata = {'po_number':po_numbers, 
									'po_date':po_date, 
									'product_count_first':product_count_first, 
									'save_status':save_status, 
									'product_code':product_code,
									'product_name':product_name
									};
								
					$.ajax({
     					type: "POST",
						dataType: "json",
						url: "http://localhost/alkes/index.php/order/order_form_validation",
     					data: postdata ,
     					success: function(data){
        				
						/*
						if(data.error_po_number)
						{
							$('.form-error.po-number-error').html(data.error_po_number).css("display","block");
						}
						*/
						
						
						if(data.product_code_error)
						{
							alert(data.product_code_error);
						}
						
						if(data.product_name_error)
						{
							alert(data.product_name_error);
						}
						
					}
				});	
				
					i++
				}
				
				return false;
				
			});
			
		}

);
$(document).ready(
	
	
		function() {
			
			// function to generate static counter
			function foo() {
				if( typeof foo.counter == 'undefined' ) {
        			foo.counter = 0;
    			}
    			foo.counter++;
    			return foo.counter;
			}
			
		
			// add row dynamically to #add-order table
			/*
			$("#add-order").live("click",
			
				function() 
				{
					
					// set i to foo return value
					var i = foo();
					//set variable to apply to name attributes
					var nam = "product-total-" + i;
					var nam2 = "product-price-" + i;
					var nam3 = "product-count-" + i;
					// clone the #table-order last row
					var cont = $('#table-order tr:last').clone(true,true);
					// find element that has product-total, product-price and product-count class
					// if they exist, change their name attribute to be same as variables (name, nam2, nam3) above
					$(cont).find('.product-total').attr("name", nam).end();
					$(cont).find('.product-price').attr("name", nam2).end();
					$(cont).find('.product-count').attr("name", nam3).end();
					// insert the cloned element to the #table-order last position
					$(cont).insertAfter('#table-order tr:last');
					// reset the values of the cloned element
					$('#table-order tr:last .product-code').val('');
					$('#table-order tr:last .product-name').val('');
					$('#table-order tr:last .product-count').val('');
					$('#table-order tr:last .product-price').val('');
					$('#table-order tr:last .product-total').val('');
					
					

					return false;
        		}
			);
			*/
			
			// show calendar using glDatePicker plugin
			$("#po-date").glDatePicker(
			{
				cssName: "android",
				position: "inherit"
			});
			
			//if the save-irder button is clicked
			$("#calculate-order").click(function(){
					
				// create an array variable to hold the values of product-count input element							
				var arr = [];						
				// extract the array
				$("input[name^=product-count]").each(function () {
    				var items = $(this).val();
					arr.push(items);
				
				});
				
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
					z++;
				}
						
				return false;
				
	        });
			
		}

);
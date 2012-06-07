<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order Form</title>
<?php echo css_asset('style.css'); ?>
<?php echo css_asset('android.css'); ?>
<?php echo css_asset('default.css'); ?>
<script type="text/javascript" src="<?php echo js_asset_url('jquery-1.7.2.min.js', ''); ?>"></script>
<script type="text/javascript">

	$(document).ready(
	
		function() 
		{
			$('#add-order').click(
			
				function()
				{ 
					var more_row = $("#add-more-order").serialize();
					
					alert(more_row);
										
					$.get('http://localhost/alkes/index.php/test/index', {'more_row': more_row},function(data){ alert(data) });

				}
	
			);
		}
		
	);

</script>
</head>

<body>

<div id="wrapper"><!--wrapper-->

	<div id="header"><!--header-->
    
    	<div id="menu"><!--menu-->
        
        	<ul id="menu-list"><!--menu-list-->
            
            	<li><a href="" class="master">Master</a></li>
                <li><a href="" class="transaction">Transaction</a></li>
                <li><a href="" class="report">Report</a></li>
                <li><a href="" class="graphics">Graphics</a></li>
                <li><a href="" class="utility">Utility</a></li>
            
            </ul><!--/menu-list-->
        
        </div><!--/menu-->
        
        <div id="logo"><!--logo-->
   	    	<?php echo image_asset('logo.png', '', array('width'=>236, 'height'=>55, 'alt'=>'logo')); ?>
        </div><!--/logo-->
        
        <div id="search">
        
        </div>
        
        <div class="clear"></div>
    
    </div><!--/header-->
    
    <div class="clear"></div>
    
    <div id="content"><!--content-->
    
    	<div id="content-inner"><!--content-inner-->
        
        	<div class="content-header-wrapper"><!--content-header-wrapper-->
        		<h1 class="content-header">Order Form</h1>
            </div><!--/content-header-wrapper-->
            
            <div id="main-content"><!--main-content-->
            
            	<div id="main-content-inner"><!--main-content-inner-->
                
                	<?php echo form_open('test/index') ?><!--form-->
                    	
                        <div class="form-item">
                        	<label for="po-number">PO Number :</label>
                            <input type="text" name="po-number" id="po-number" />                  
                        </div>
                        
                        <div class="form-item">
                        	<label for="po-date">PO Date :</label>
                            <input type="text" name="po-date" id="po-date" />                  
                        </div>
                        
                        <div class="form-item">
                        	<label for="supplier">Supplier :</label>
                            <input type="text" name="supplier" id="supplier" />                  
                        </div>
                        
                        <div class="form-item">
                        	<label for="key-person">Key Person :</label>
                            <input type="text" name="key-person" id="key-person" />                  
                        </div>
                        
                        <div class="form-item">
                        	<label for="address" id="label-float">Supplier Address :</label>
                            <textarea rows="5" cols="30" name="address" id="address" /></textarea>                
                            <div class="clear"></div>  
                        </div>
                        
                        <div class="form-item">
                        	<label for="instruction" id="label-float">Special Instructions :</label>
                            <textarea rows="5" cols="30" name="instruction" id="instruction" /></textarea>                
                            <div class="clear"></div>  
                        </div>
                        
                        <p>Items to order : </p>
                        
                        <table id="table-order"><!--table-order-->
                        
                        	<tr>
                            	<th>Code</th>
                                <th>Item Name</th>
                                <th>Qty</th>
                                <th>Unit</th>
                                <th>Buy Price</th>
                                <th>Total</th>
                            </tr>
                            
                            <tr>
                            	<td class="td-product-code"><input type="text" name="product-code[]" class="product-code" /></td>
                                <td class="td-product-name"><input type="text" name="product-name[]" class="product-name" /></td>
                                <td class="td-product-count"><input type="text" name="product-count[]" class="product-count" /></td>
                                <td class="td-product-unit">
                                	<select type="text" name="product-unit[]" id="product-unit" />
                                    	<option>Pack</option>
                                        <option>Pieces</option>
									</select>                                
                                </td>
                                <td class="td-product-price"><input type="text" name="product-price[]" class="product-price" /></td>
                                <td class="td-product-total"><input type="text" name="product-total[]" class="product-total" /></td>
                            </tr>
                            
                        </table><!--/table-order-->
                        
                        <div id="total"><!--total-->
                        	<label for="total-order" id="total-order-label">Total :</label>
                        	<input type="text" name="total-order" id="total-order" />
                        </div><!--/total-->
                        
                        <div class="clear"></div>
                        
                        <div class="button-wrapper"><!--button-wrapper-->
                        	<input type="submit" name="save-order" value="Save Order" id="save-order" /> 
                        	<span>or</span> 
                        	<input type="submit" name="add-order" value="Add More" id="add-order" />
                        	<input type="text" name="add-more-order" id="add-more-order" />
                        </div><!--/button-wrapper-->
                        
                    <?php echo form_close() ?><!--/form-->
                
                </div><!--/main-content-inner-->
            
            </div><!--/main-content-->
        
        </div><!--/content-inner-->
    
    </div><!--/content-->

</div><!--/wrapper-->

</body>
</html>

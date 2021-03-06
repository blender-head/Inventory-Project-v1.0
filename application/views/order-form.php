    <?php $this->load->view('header') ?>
    
    <div id="content"><!--content-->
    
    	<div id="content-inner"><!--content-inner-->
        
        	<div class="content-header-wrapper"><!--content-header-wrapper-->
        		<h1 class="content-header-order-form">Order Form</h1>
            </div><!--/content-header-wrapper-->
            
            <div id="main-content"><!--main-content-->
            
            	<div id="main-content-inner"><!--main-content-inner-->
                
                	<form>
                    	
                        <div class="form-item">
                        	<label for="po-number">PO Number :</label>
                            <input type="text" name="po-number" id="po-number" />  
                            <div class="form-error po-number-error"></div>                
                        </div>
                        
                        <div class="form-item">
                        	<label for="po-date">PO Date :</label>
                            <input type="text" name="po-date" id="po-date" /> 
                            <div class="clear"></div>              
                            <div class="form-error po-date-error"></div>
                        </div>
                        
                        <div class="form-item">
                        	<label for="supplier">Supplier :</label>
                            <input type="text" name="supplier" id="supplier" />     
                            <div class="form-error supplier-error"></div>              
                        </div>
                        
                        <div class="form-item">
                        	<label for="key-person">Key Person :</label>
                            <input type="text" name="key-person" id="key-person" />    
                            <div class="form-error key-person-error"></div>          
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
                        
                        <p class="para-common">Items to order : </p>
                        
                        <table id="table-order"><!--table-order-->
                        
                        	<tr>
                            	<th>Code</th>
                                <th>Item Name</th>
                                <th>Qty</th>
                                <th>Unit</th>
                                <th>Type</th>
                                <th>Buy Price</th>
                                <th>Total</th>
                            </tr>
                            
                            <?php for($i=0;$i<1;$i++) { ?>
                            <tr>
                            	<td class="td-product-code"><input type="text" name="product-code-<?php echo $i ?>" class="product-code" /></td>
                                <td class="td-product-name"><input type="text" name="product-name-<?php echo $i ?>" class="product-name" /></td>
                                <td class="td-product-count"><input type="text" name="product-count-<?php echo $i ?>" class="product-count"/></td>
                                <td class="td-product-unit">
                                	<select type="text" name="product-unit-<?php echo $i ?>" class="product-unit" />
                                    	<?php foreach($unit_type as $data_unit_type) : ?>
                                    	<option value="<?php echo $data_unit_type->unit_id ?>"><?php echo $data_unit_type->unit_name ?></option>
                                        <?php endforeach ?>
									</select>                                
                                </td>
                                <td class="td-product-type">
                                	<select type="text" name="product-type-<?php echo $i ?>" class="product-type" />
                                    	<?php foreach($product_type as $data_prod_type) : ?>
                                    	<option value="<?php echo $data_prod_type->product_type_id ?>"><?php echo $data_prod_type->product_type_name ?></option>
                                        <?php endforeach ?>
									</select>                                
                                </td>
                                <td class="td-product-price"><input type="text" name="product-price-<?php echo $i ?>" class="product-price" /></td>
								<td class="td-product-total"><input type="text" name="product-total-<?php echo $i ?>" class="product-total" /></td>
                                

                            </tr>
                            
                             
                            
                            <?php } ?>
                 
                            
                        </table><!--/table-order-->
                        
                        <div id="total"><!--total-->
                        	<label for="total-order" id="total-order-label">Total :</label>
                        	<input type="text" name="total-order" id="total-order" />
                        </div><!--/total-->
                        
                        <div class="clear"></div>
                        
                        <div class="button-wrapper"><!--button-wrapper-->
                        	<input type="button" name="calculate-order" value="Calculate Order" id="calculate-order" />
                        	<input type="button" name="save-order" value="Save Order" id="save-order" /> 
                        	<span class="or">or</span> 
                        	<input type="button" name="add-order" value="Add More" id="add-order" />
                            <input type="hidden" name="add-count" />
                        </div><!--/button-wrapper-->
                        
                        
                        
                    </form><!--/form-->
                    
					<div class="test">Test</div>
                    <div class="test2">Test</div>
                
                </div><!--/main-content-inner-->
            
            </div><!--/main-content-->
        
        </div><!--/content-inner-->
    
    </div><!--/content-->
    
    <?php $this->load->view('footer') ?>
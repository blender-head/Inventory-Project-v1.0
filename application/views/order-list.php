    <?php $this->load->view('header') ?>
    
    <div id="content"><!--content-->
    
    	<div id="content-inner"><!--content-inner-->
        
        	<div class="content-header-wrapper"><!--content-header-wrapper-->
        		<h1 class="content-header-order-list">Order Lists</h1>
            </div><!--/content-header-wrapper-->
            
            <div id="main-content"><!--main-content-->
            
            	<div id="main-content-inner"><!--main-content-inner-->
                
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
                                       
                </div><!--/main-content-inner-->
            
            </div><!--/main-content-->
        
        </div><!--/content-inner-->
    
    </div><!--/content-->
    
    <?php $this->load->view('footer') ?>
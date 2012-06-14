    <?php $this->load->view('header-order-details') ?>
    
    <div id="content-order-details"><!--content-order-details-->
                
                	<?php echo form_open('order/order_edit') ?>
                	
                    <?php if($records > 0) : ?>
                	
						<?php foreach ($records as $data): ?>
                        
                        	<h1>Cahaya Med Dental</h1>
                
                        	<p>PO Number : <?php echo $data->po_number ?></p>

                        	<p>PO Date : <?php echo $data->po_date ?></p>
                        	
                        	<p>Supplier : <?php echo $data->supplier ?></p>
                        	                          
                            <p>Address : <?php echo $data->supplier_address ?></p>
                        	                         
                            <p>Special Instructions : <?php echo $data->instructions ?></p>
                        	                       
                        	<p>Status : 
                                	<select name="order-status-select" id="order-status-select">
                                    	<option><?php echo $data->status ?></option>
                                    	<option>Invoice Received</option>
                                    </select>
                            </p>
                            
                            <table id="table-order-details"><!--table-order-details-->
                        
                    			<tr>
                        			<th>Code</th>
                                    <th>Item Name</th>
                                    <th>Qty</th>
                            		<th>Unit</th>
                            		<th>Type</th>
                                    <th>Expiry Date</th>
                            		<th>Buy Price</th>
                            		<th>Total</th>
                                    <th>Payment</th>
                        		</tr>
                            
                             	<?php  $query_data = $this->order_data_model->get_data($data->po_number) ?>
                                <?php  $query_payment = $this->payment_method_model->get_all_payment() ?>
                                <?php  $query_unit_type = $this->unit_type_model->get_all_data(); ?>
                                <?php  $query_prod_type = $this->product_type_model->get_all_data(); ?>
                            
                             	<?php foreach($query_data as $order_data) :?>
                            	                               	
                        			<tr>
                        				<td class="td-product-code">
											<input type="text" name="product-code" class="product-code-edit" value="<?php echo $order_data->product_number ?>" />
										</td>
                                        <td class="td-product-name">
                                        	<input type="text" name="product-code" class="product-name-edit" value="<?php echo $order_data->product_name ?>" />
                                        </td>
                                        <td class="td-product-count">
                                        	<input type="text" name="product-code" class="product-qty-edit" value="<?php echo $order_data->product_count ?>" />
                                        </td>
                            			<td class="td-product-unit">
                                        	<select>
                                            	<?php foreach ($query_unit_type as $unit_type) : ?>
                                            		<option <?php  if($order_data->unit_name == $unit_type->unit_name) { echo 'selected="selected"';} ?>>
														<?php echo $unit_type->unit_name ?>
                                                     </option>
                                                <?php endforeach ?>
                                            </select>
                                        </td>
                            			<td class="td-product-type">
										<select>
                                            	<?php foreach ($query_prod_type as $prod_type) : ?>
                                            		<option <?php  if($order_data->product_type_name == $prod_type->product_type_name) { echo 'selected="selected"';} ?>>
														<?php echo $prod_type->product_type_name ?>
                                                     </option>
                                                <?php endforeach ?>
                                            </select>
                                        </td>
                                        <td class="td-product-expiry-date">
                                        
                                        	<?php
											
												if($order_data->product_type_name == "Expired Time")
												{
													echo '<input type="text" name="prod-exp-time" class="prod-exp-time" />';
												}
												else
												{
													echo 'n/a';	
												}
											
											?>
                                        
                                        </td>
                            			<td class="td-product-price">
                                        	<input type="text" name="buy-price-edit" value="<?php echo $order_data->buy_price ?>" class="buy-price-edit" />
                                        </td>
										<td class="td-product-total">
                                        	<input type="text" name="total-price-edit" value="<?php echo $order_data->product_total ?>" class="total-price-edit" />
                                        </td>
                                        <td class="td-payment-method">
                                        	<select name="payment-method">
                                        		<?php foreach($query_payment as $payment_method) : ?>
                                        			<option value="<?php echo $payment_method->id ?>"><?php echo $payment_method->payment_method ?></option>
                                               	<?php endforeach ?>
                                           	 </select>
                                        </td>
                        			</tr>
                            	
                              	<?php endforeach ?> 		
                            	
                        	</table><!--/table-order-details-->
                        
                        	<div class="order-op"><!--order-op-->
								<input type="button" value="save"  id="save-data" />
                                <input type="button" value="cancel"  id="cancel-edit" />
                                <input type="button" value="print"  id="print-order" />
                        	</div><!--/order-op-->
                        
                        	<div class="order-total"><!--order-total-->
                        		<span>Total :
                            	<?php $query_data = $this->order_meta_data_model->get_total_order($data->po_number)?>
                            		<?php foreach($query_data as $data_total) :?>
                                		<?php echo $data_total->total_order ?>
                               		<?php endforeach ?>
                            	</span>
                        	</div><!--/order-total-->
                            
                            </form>
                        
                        
                        
                        <div class="clear"></div>
                        
                        <?php endforeach ?>
                        
                   <?php else : ?>
                    
                    	<div class="order-list-header"><p>You have no orders yet</p></div>
                    
                    <?php endif ?>
    
    </div><!--/content-order-details-->
    

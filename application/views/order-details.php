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
                            
                            	<span class="status-order"><?php echo $data->status ?></span>
                                <span>
                                	<select name="order-status-select" id="order-status-select">
                                    	<option>Invoice Received</option>
                                    </select>
                                </span>
                            
                            </p>
                            
                            <table id="table-order-details"><!--table-order-details-->
                        
                    			<tr>
                        			<th>Code</th>
                                    <th>Item Name</th>
                                    <th>Qty</th>
                            		<th>Unit</th>
                            		<th>Type</th>
                                    <th>Buy Price</th>
                            		<th>Total</th>
                                </tr>
                            
                             	<?php  $query_data = $this->order_data_model->get_data($data->po_number) ?>
                                <?php  $query_payment = $this->payment_method_model->get_all_payment() ?>
                            
                             	<?php foreach($query_data as $order_data) :?>
                            	                               	
                        			<tr>
                        				<td class="td-product-code"><?php echo $order_data->product_number ?></td>
                                        <td class="td-product-name"><?php echo $order_data->product_name ?></td>
                                        <td class="td-product-count"><?php echo $order_data->product_count ?></td>
                            			<td class="td-product-unit"><?php echo $order_data->unit_name ?></td>
                            			<td class="td-product-type"><?php echo $order_data->product_type_name ?></td>
                            			<td class="td-product-price"><?php echo $order_data->buy_price ?></td>
										<td class="td-product-total"><?php echo $order_data->product_total ?></td>
                        			</tr>
                            	
                              	<?php endforeach ?> 		
                            	
                        	</table><!--/table-order-details-->
                        
                        	<div class="order-op"><!--order-op-->
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
    

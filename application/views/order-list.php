    <?php $this->load->view('header') ?>
    
    <div id="content"><!--content-->
    
    	<div id="content-inner"><!--content-inner-->
        
        	<div class="content-header-wrapper"><!--content-header-wrapper-->
        		<h1 class="content-header-order-list">Order Lists</h1>
            </div><!--/content-header-wrapper-->
            
            <div id="main-content"><!--main-content-->
            
            	<div id="main-content-inner"><!--main-content-inner-->
                	
                    <?php if($records > 0) : ?>
                	
						<?php foreach ($records as $data): ?>
                
                		<div class="order-list-header"><!--order-list-header-->
                    
                    		<div class="po-number-list"><!--po-number-list-->
                        		<span>PO Number : <?php echo $data->po_number ?></span>
                        	</div><!--/po-number-list-->
                        
                        	<div class="po-date-list"><!--po-date-list-->
                        		<span>PO Date : <?php echo $data->po_date ?></span>
                        	</div><!--/po-date-list-->
                        
                        	<div class="po-status-list"><!--po-status-list-->
                        		<label for="order-status" id="order-status-label">Status :</label>
                        		<select name="order-status" id="order-status">
                            		<option><?php echo $data->status ?></option>
                                </select>
                        	</div><!--/po-status-list-->
                        
                        	<div class="po-details"><!--po-details-->
                        		<span><a href="">See Details</a></span>
                        	</div><!--/po-details-->
                        
                       		<div class="clear"></div>
                                           
                    	</div><!--/order-list-header-->
                        
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
                            
                             <?php  $query_data = $this->order_data_model->get_data($data->po_number) ?>
                            
                             <?php foreach($query_data as $order_data) :?>
                            	
                                	
                        		<tr>
                        			<td class="td-product-code"><?php echo $order_data->product_number ?></td>
                            		<td class="td-product-name"><?php echo $order_data->product_name ?></td>
                            		<td class="td-product-count"><?php echo $order_data->product_count ?></td>
                            		<td class="td-product-unit"><?php echo $order_data->unit_type ?></td>
                            		<td class="td-product-type"><?php echo $order_data->product_type ?></td>
                            		<td class="td-product-price"><?php echo $order_data->buy_price ?></td>
									<td class="td-product-total"><?php echo $order_data->product_total ?></td>
                        		</tr>
                            	
                              <?php endforeach ?> 		
                            	
                            
                            
                    	</table><!--/table-order-->
                        
                        <div id="total"><!--total-->
                        	<label for="total-order" id="total-order-label">Total :</label>
                            <?php $query_data = $this->order_meta_data_model->get_total_order($data->po_number)?>
                            	<?php foreach($query_data as $data_total) :?>
                                	<span><?php echo $data_total->total_order ?></span>
                               	<?php endforeach ?>
                        </div><!--/total-->
                        
                        <div class="clear"></div>
                        
                        <?php endforeach ?>
                        
                   <?php else : ?>
                    
                    	<div class="order-list-header"><p>You have no orders yet</p></div>
                    
                    <?php endif ?>
                        
                </div><!--/main-content-inner-->
            
            </div><!--/main-content-->
        
        </div><!--/content-inner-->
    
    </div><!--/content-->
    
    <?php $this->load->view('footer') ?>
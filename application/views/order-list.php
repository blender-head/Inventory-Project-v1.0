    <?php $this->load->view('header') ?>
    
    <div id="content"><!--content-->
    
    	<div id="content-inner"><!--content-inner-->
        
        	<div class="content-header-wrapper"><!--content-header-wrapper-->
        		<h1 class="content-header-order-list">Order Lists</h1>
            </div><!--/content-header-wrapper-->
            
            <div id="main-content"><!--main-content-->
            
            	<div id="main-content-inner"><!--main-content-inner-->
                
                	<?php $i = 1 ?>
                	
                    <?php if($records > 0) : ?>
                		
						<table id="table-order"><!--table-order-->
                        
                    			<tr>
                        			<th>PO Number</th>
                            		<th>PO Date</th>
                            		<th>Order Status</th>
                            		<th>Operations</th>
                        		</tr>
                                
                        		<?php foreach ($records as $data): ?>
                            	                               	
                        			<tr>
                        				<td class="td-po-number"><?php echo $data->po_number ?></td>
                            			<td class="td-po-date"><?php echo $data->po_date ?></td>
                            			<td class="td-order-status"><?php echo $data->status ?></td>
                                        <td class="td-order-op">
                                        	<div class="see-order-details"><!--see-order-details-->
												<?php 
													echo anchor("order/order_details/$data->po_number", 'See Details', 
															     array('title'=>'See Details', 'class'=>'order-details-link')) 
												?>
                                            </div><!--/see-order-details-->
                                            
                                            <div class="order-print"><!--order-print-->
												<?php 
													echo anchor("order/order_print/$data->po_number", 'Print', array('title'=>'Print','class'=>'order-details-print')) 
												?>
                                            </div><!--/order-print-->
                                            
                                            <div class="order-edit"><!--order-delete-->
												<?php 
													echo anchor("order/order_edit/$data->po_number", 'Edit', array('title'=>'Edit','class'=>'order-details-edit')) 
												?>
                                            </div><!--/order-delete-->
                                            
                                            <div class="order-delete"><!--order-delete-->
												<?php 
													echo anchor("order/order_delete/$data->po_number", 'Print', array('title'=>'Delete','class'=>'order-details-delete')) 
												?>
                                            </div><!--/order-delete-->
                                            
                                         </td>
                        			</tr>
								
                                <?php endforeach ?>
                        
                        </table><!--/table-order-->
                        
                   <?php else : ?>
                    
                    	<div class="order-list-header"><p>You have no orders yet</p></div>
                    
                    <?php endif ?>
                        
                </div><!--/main-content-inner-->
            
            </div><!--/main-content-->
        
        </div><!--/content-inner-->
    
    </div><!--/content-->
    
    <?php $this->load->view('footer') ?>
<!DOCTYPE html>
<html>
<head>
<title>INDEX</title>
<?php $this->load->helper('asset'); ?>
<?php $this->load->helper('url'); ?>
<?php echo css_asset('style.css'); ?>
</head>

<body>

<div id="wrapper">

	<div id="header">
    
    	<div id="logo">
   	    	<?php echo image_asset('logo.png', '', array('width'=>258, 'height'=>53, 'alt'=>'logo')); ?>
        </div>
        
    
    	<div id="menu">
        
        	<ul>
            	<li><a href="" class="product active">Products</a></li>
                <li><a href="" class="categories">Categories</a></li>
                <li><a href="" class="vendors">Vendors</a></li>
                <li><a href="" class="tools">Tools</a></li>
                <li><a href="" class="administer">Administer</a></li>
            </ul>
        	
            
            
        </div>
        
        <div id="search">
        
        </div>
    
    </div>
    
    <div class="clear"></div>
    
    <div id="content-wrapper">
    
    	<div id="content">
        
        	<div id="info">
            	
                <?php 
					foreach($count as $data_count)
					{
						$item = $data_count->count;	
					}
					
                                        $string = "item";
                                        $strings = "items";
					echo "<p>Currently, there are " . $item . ($item > 1 ? " items":" item"). " in the database</p>";
					
				?>
                
            
            </div>
            
            <div id="add-button">
            	<?php echo anchor("products/add", 'add product'); ?>
            	<p>Add Product</p>
            </div>
            
         
            <div id="list">
            
				<h1>Products</h1>
                
                <div id="pre-table"></div>
                
                	<div id="table-wrapper">
                
                		<div id="table-content">
                
                			<?php 
                			if(sizeof($records) > 0) 
								{
									echo '<table id="table-data">';
    								echo '<tr>';
    								echo '<th scope="col">Product Number</th>';
    								echo '<th scope="col">Product Name</th>';
									echo '<th scope="col">Vendor</th>';
									echo '<th scope="col">Category</th>';
									echo '<th scope="col">Quantity</th>';
                            		echo '<th scope="col">Operations</th>';
    								echo '</tr>';
							
									foreach($records as $row) 
									{
										echo '<tr>';
    									echo '<td class="prod_num">' . $row->product_number . '</td>';
    									echo '<td class="prod">' . $row->product_name . '</td>';
                                                                        echo '<td class="vendor">' . $row->product_vendor . '</td>';
									echo '<td class="category">' . $row->product_category . '</td>';
									echo '<td class="qty">' . $row->product_count . '</td>';
    									echo '<td class="op"><div class="edit">' . anchor("products/edit/$row->product_id", 'edit') . '</div><div class="delete">' . anchor("products/delete/$row->product_id", 'delete'). '</div></td>';
                            			echo '</tr>';
									}
									
									echo '</table>';
								}
								else
								{
									echo '<h2 class="empty">There are no records yet</h2>';	
								}
					
					 		?>
    	                          
                  		</div>

                
                	</div>
                
                <div id="post-table"></div>
   
            
            </div>
            
            
        
        </div>
    
    
    </div>




</div>


</body>
</html>

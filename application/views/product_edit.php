<!DOCTYPE html>
<html>
<head>
<title>EDIT PRODUCT</title>
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
        
        	   <div id="content-left">
               
               		<h1>Edit Product</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id ultricies tortor. Fusce iaculis purus at augue tincidunt et tempor orci tincidunt. Curabitur viverra congue dui, eget lobortis quam luctus eget. Nullam ultricies gravida nulla, in mollis elit rutrum id. Maecenas varius ullamcorper nibh a volutpat. Praesent fermentum, nunc vel porta eleifend, risus elit porta ligula, in eleifend turpis lorem eu arcu. Quisque nec nibh rhoncus mauris vulputate lobortis. Donec metus turpis, scelerisque ac viverra tristique, consectetur feugiat turpis. Fusce aliquam ultrices pretium. Praesent eleifend libero eu lacus eleifend fermentum ac a quam. </p>
               
               </div>
               
               <div id="content-right">
               
               		<div id="pre-form"></div>
                    
                    <div id="form-bg">
                    
						<div id="form-data">
                                
                        	<?php $this->load->helper('form') ?>
                                 
                            <?php echo form_open('products/update') ?>
                            
                            	                               
                            	<div class="frm-item-name">
                                	<span>Product Name : </span>
                                    
                                        <input <?php if (form_error('product-name')) { echo 'class="input-error"'; } ?> type="text" name="product-name" id="input-product-name" value="<?php echo $product_name ?>"/>
                                        <div class="form-error"><span><?php echo form_error('product-name') ?></span></div>
                                    
                                </div>
                                
                                
                                
                                <div class="frm-item-number">
                            		<span>Product Number : </span>
                                        
                                            <input <?php if (form_error('product-number')) { echo 'class="input-error"'; } ?> type="text" name="product-number" id="input-product-number" value="<?php echo $product_number ?>"/>
                                            <div class="form-error"><span><?php echo form_error('product-number') ?></span></div>
                                        
                                </div>
                                                    
                                <div class="frm-item-count">
                                    <span>Quantity : </span>
                                    
                                        <input <?php if (form_error('product-count')) { echo 'class="input-error"'; } ?> type="text" name="product-count" id="input-product-count" value="<?php echo $product_count ?>" />
                                        <div class="form-error"><span><?php echo form_error('product-count') ?></span></div>
                          
                                </div>
                                
                                <div class="frm-item-cat">
                                	<span>Product Category : </span>
                                    <select name="product-category" id="select-cat" >
                                    	<option value="Category 1" <?php echo($product_category == "Category 1"?' selected="selected"':null) ?>>Category 1</option>
                                        <option value="Category 2" <?php echo($product_category == "Category 2"?' selected="selected"':null) ?>>Category 2</option>
                                        <option value="Category 3" <?php echo($product_category == "Category 3"?' selected="selected"':null) ?>>Category 3</option>
                                        <option value="Category 4" <?php echo($product_category == "Category 4"?' selected="selected"':null) ?>>Category 4</option>
                                        <option value="Category 5" <?php echo($product_category == "Category 5"?' selected="selected"':null) ?>>Category 5</option>
                                    </select>
                                </div>
                                
                                <div class="frm-item-vendor">
                                	<span>Product Vendor : </span>
                                	<select name="product-vendor" id="select-vendor">
                                    	<option value="Vendor 1" <?php echo($product_vendor == "Vendor 1"?' selected="selected"':null) ?>>Vendor 1</option>
                                        <option value="Vendor 2" <?php echo($product_vendor == "Vendor 2"?' selected="selected"':null) ?>>Vendor 2</option>
                                        <option value="Vendor 3" <?php echo($product_vendor == "Vendor 3"?' selected="selected"':null) ?>>Vendor 3</option>
                                        <option value="Vendor 4" <?php echo($product_vendor == "Vendor 4"?' selected="selected"':null) ?>>Vendor 4</option>
                                        <option value="Vendor 5" <?php echo($product_vendor == "Vendor 5"?' selected="selected"':null) ?>>Vendor 5</option>
                                    </select>
                                </div>
                                
                                <div class="frm-item-desc">
                                	<p>Description : </p>
                                	<textarea name="product-description" id="product-desc" rows="10" cols="38"><?php echo $product_description ?></textarea>
                                </div>
                                                    
                                <input type="hidden" name="product-id" value="<?php echo $product_id ?>">
                                
                                <div class="frm-item-btn">
                                	<input type="submit" id="btn" name="btn" value="Send" />
                                </div>
                                
                                
                            
                           	<?php echo form_close() ?>
                        
                        </div>
                        
                       
                    
                    </div>
                    
                    <div id="post-form"></div>
                    
                    
               
               </div>
         
        </div>
            
   
    </div>




</div>


</body>
</html>

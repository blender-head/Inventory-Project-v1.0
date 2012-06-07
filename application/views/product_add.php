<!DOCTYPE html>
<html>
<head>
<title>ADD PRODUCT</title>
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
               
               		<h1>Add Product</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id ultricies tortor. Fusce iaculis purus at augue tincidunt et tempor orci tincidunt. Curabitur viverra congue dui, eget lobortis quam luctus eget. Nullam ultricies gravida nulla, in mollis elit rutrum id. Maecenas varius ullamcorper nibh a volutpat. Praesent fermentum, nunc vel porta eleifend, risus elit porta ligula, in eleifend turpis lorem eu arcu. Quisque nec nibh rhoncus mauris vulputate lobortis. Donec metus turpis, scelerisque ac viverra tristique, consectetur feugiat turpis. Fusce aliquam ultrices pretium. Praesent eleifend libero eu lacus eleifend fermentum ac a quam. </p>
               
               </div>
               
               <div id="content-right">
               
               		<div id="pre-form"></div>
                    
                    <div id="form-bg">
                    
						<div id="form-data">
                                
                        	<?php $this->load->helper('form') ?>
                                 
                            <?php echo form_open('products/add') ?>
                            
                                <div class="frm-item-number">
                                    <span>Product Number : </span>
                                    <input <?php if (form_error('product-number')) { echo 'class="input-error"'; } ?> type="text" name="product-number" id="input-product-number" value="<?php echo set_value('product-number'); ?>"/>
                                    <div class="form-error"><span><?php echo form_error('product-number') ?></span></div>
                                </div>
                            	                               
                            	<div class="frm-item-name">
                                    <span>Product Name : </span>
                                    <input <?php if (form_error('product-name')) { echo 'class="input-error"'; } ?> type="text" name="product-name" id="input-product-name" value="<?php echo set_value('product-name'); ?>"/>
                                    <div class="form-error"><span><?php echo form_error('product-name') ?></span></div>
                                </div>
                                                    
                                 <div class="frm-item-cat">
                                    <span>Product Category : </span>
                                    <select name="product-category" id="select-cat">
                                    	<?php if (sizeof($cat <= 0)): ?>
                                            <option><?php echo 'Empty' ?></option>
                                        <?php else: ?>
                                            <?php foreach ($cat as $options) : ?>
                                                <option><?php echo sizeof($vendors) ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                                                    
                                <div class="frm-item-unit">
                                    <span>Product Unit : </span>
                                    <select name="product-unit" id="select-unit">
                                    	<option>Unit 1</category>
                                        <option>Unit 2</category>
                                        <option>Unit 3</category>
                                        <option>Unit 4</category>
                                        <option>Unit 5</category>
                                    </select>
                                </div>
                                                    
                                <div class="frm-item-vendor">
                                    <span>Product Vendor : </span>
                                    <select name="product-vendor" id="select-vendor">
                                        <?php if (sizeof($vendors <= 0)): ?>
                                            <option><?php echo 'Empty' ?></option>
                                        <?php else: ?>
                                            <?php foreach ($vendors as $options) : ?>
                                                <option><?php echo sizeof($vendors) ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                                
                                <div class="frm-item-count">
                                    <span>Quantity : </span>
                                    <input <?php if (form_error('product-count')) { echo 'class="input-error"'; } ?> type="text" name="product-count" id="input-product-count" value="<?php echo set_value('product-count'); ?>" />
                                    <div class="form-error"><span><?php echo form_error('product-count') ?></span></div>
                                </div>
                                
                                <div class="frm-item-desc">
                                    <p>Description : </p>
                                    <textarea name="product-description" id="product-desc" rows="10" cols="38"></textarea>
                                </div>
                                
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

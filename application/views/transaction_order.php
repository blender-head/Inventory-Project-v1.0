<!DOCTYPE html>
<html>
<head>
<title>TRANSACTION | ORDER</title>
<?php $this->load->helper('asset'); ?>
<?php $this->load->helper('url'); ?>
<?php echo css_asset('style.css'); ?>
<?php echo css_asset('android.css'); ?>
<?php echo css_asset('default.css'); ?>
<script type="text/javascript" src="<?php echo js_asset_url('jquery-1.7.2.min.js', ''); ?>"></script>
<script type="text/javascript" src="<?php echo js_asset_url('glDatePicker.min.js', ''); ?>"></script>
<script type="text/javascript">

	$(document).ready(function() 
	
		{
		
			$("#input-transaction-order-po-date").glDatePicker(
				{
					cssName: "android",
					position: "inherit"
				}
			);	
			
		}
	
	);

</script>


</head>

<body>

<div id="wrapper"><!--wrapper-->

	<div id="header"><!--header-->
    
    	<div id="logo"><!--logo-->
   	    	<?php echo image_asset('logo.png', '', array('width'=>258, 'height'=>53, 'alt'=>'logo')); ?>
        </div><!--/logo-->
        
    
    	<div id="menu"><!--menu-->
        
        	<ul>
            	<li><a href="" class="product active">Products</a></li>
                <li><a href="" class="categories">Categories</a></li>
                <li><a href="" class="vendors">Vendors</a></li>
                <li><a href="" class="tools">Tools</a></li>
                <li><a href="" class="administer">Administer</a></li>
            </ul>
        	
        </div><!--/menu-->
        
        <div id="search">
        
        </div>
    
    </div><!--/header-->
    
    <div class="clear"></div>
    
    <div id="content-wrapper"><!--content-wrapper-->
    
    	<div id="content"><!--content-->
        
        	<div id="pre-content-bg"></div><!--pre-form-->
            
        	<div id="content-bg"><!--content-bg-->
        
        	   <div id="content-right"><!--content-right-->
               
               		<h1>Order Product</h1>
                    <p>Please fill the order information on the right side. You can use the form below to fill the information about the product you're about to buy... </p>
               
               </div><!--/content-right-->
               
                             
               <div id="content-left"><!--content-right-->
               
               		<div id="form-data"><!--form-data-->
                                
                     	<?php $this->load->helper('form') ?>
                                 
                        <?php echo form_open('transaction/order') ?>
                            
                            	<div class="frm-item-transaction-order-po-number">
                                    <span>PO Number : </span>
                                    <input type="text" name="transaction-order-po-number" id="input-transaction-order-po-number" />
                                    <div class="form-error"><span></span></div>
                                </div>
                                
                                <div class="frm-item-transaction-order-po-date">
                                    <span>PO Date : </span>
                                    <input type="text" name="transaction-order-po-number" id="input-transaction-order-po-date"  class="gldp" />
                                	<div class="form-error"><span></span></div>
                                </div>
                                
                                <div class="frm-item-transaction-order-supplier">
                                    <span>Supplier : </span>
                                    <input type="text" name="transaction-order-supplier" id="input-transaction-order-supplier" />
                                </div>
                                
                                <div class="frm-item-transaction-order-key-person">
                                    <span>Key Person : </span>
                                    <input type="text" name="transaction-order-key-person" id="input-transaction-order-key-person" />
                               	</div>
                               
                                <div class="frm-item-transaction-order-supplier-address">
                                    <span>Address : </span>
                                    <textarea name="transaction-order-supplier-address" rows="2" cols="20" id="input-transaction-order-supplier-address"></textarea>
                                 	<div class="clear"></div>
                               	</div>     
                               
                               	<div class="frm-item-transaction-order-instruction">
                                    <span>Instruction : </span>
                                    <textarea name="transaction-order-transaction" rows="2" cols="20" id="input-transaction-order-transaction"></textarea>
                                    <div class="clear"></div>
                               	</div>    
                                
                                <div class="clear"></div>
                            	                               
								<!--
                               	<div class="frm-item-btn">
                                    <input type="submit" id="btn" name="btn" value="Send" />
                               	</div>
                               	-->
                                
                                <?php echo form_close() ?>
                        
                        </div><!--/form-data-->
                        
               </div><!--/content-right-->
               
               <div class="clear"></div>
               
            <div><!--/content-bg-->
            
            <div id="post-content-bg"></div><!--post-form-->
         
        </div><!--/content-->
            
    </div><!--/content-wrapper-->

</div><!--/wrapper-->

</body>
</html>

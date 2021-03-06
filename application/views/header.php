<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title ?></title>
<?php echo css_asset('style.css'); ?>
<?php echo css_asset('android.css'); ?>
<?php echo css_asset('default.css'); ?>
<?php echo css_asset('dialog.css'); ?>
<script type="text/javascript" src="<?php echo js_asset_url('jquery.js', ''); ?>"></script>
<script type="text/javascript" src="<?php echo js_asset_url('function.js', ''); ?>"></script>
<script type="text/javascript" src="<?php echo js_asset_url('glDatePicker.js', ''); ?>"></script>
</head>

<body>

<div id="wrapper"><!--wrapper-->

	<div id="header"><!--header-->
    
    	<div id="menu"><!--menu-->
        
        	<ul id="menu-list"><!--menu-list-->
            
            	<li><a href="" class="master">Master</a></li>
                <li><a href="" class="transaction">Transaction</a></li>
                <li><a href="" class="report">Report</a></li>
                <li><a href="" class="graphics">Graphics</a></li>
                <li><a href="" class="utility">Utility</a></li>
            
            </ul><!--/menu-list-->
        
        </div><!--/menu-->
        
        <div id="logo"><!--logo-->
   	    	<?php echo image_asset('logo.png', '', array('width'=>236, 'height'=>55, 'alt'=>'logo')); ?>
        </div><!--/logo-->
        
        <div id="search">
        
        </div>
        
        <div class="clear"></div>
    
    </div><!--/header-->
    
    <div class="clear"></div>

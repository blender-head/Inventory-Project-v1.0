<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="<?php echo js_asset_url('jquery-1.7.2.min.js', ''); ?>"></script>
<script>

	$(document).ready(
	
		function() 
		{
			$.get('http://localhost/alkes/index.php/order/index', function(data) {
  				alert(data);
  				
			});
		}
	
	
	);

</script>
</head>

<body>
<p class="result"></p>
</body>
</html>
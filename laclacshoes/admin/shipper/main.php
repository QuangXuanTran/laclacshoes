<?php 	
	if(isset($_GET['view'])){
		$view=$_GET['view'];
		switch ($view) {
			case 'giaohang':
					include_once('shipper/donhang.php');
				break;
			case 'ctgh':
		
					include_once('shipper/chitietdathang.php');
				break;	
			default:			
				break;
		}
	}
	else{
		include_once('shipper/donhang.php');
	}
	

?>
<?php 
	include_once('../model/database.php');
	if(isset($_GET['view'])){
		$view=$_GET['view'];
		switch ($view) {
			case 'themdm':
					 include_once('them.php');	
				break;
			case 'suadm':
					include_once('sua.php');
				break;
		
			case 'xoadm':
					$madm=$_GET['madm'];
					header('location:xuly.php?xoa=1&madm='.$madm);
				break;
			default:
					include_once('them.php');
				break;
		}
	}
	

?>
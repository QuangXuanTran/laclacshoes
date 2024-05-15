<?php 
include_once('../model/database.php');
	if(isset($_GET['view'])){
		$view=$_GET['view'];
		switch ($view) {
			case 'themmau':
					 include_once('them.php');	
				break;
			case 'suamau':
					include_once('sua.php');
				break;
		
			case 'xoamau':
					$mamau=$_GET['mamau'];
					header('location:xuly.php?xoa=1&mamau='.$mamau);
				break;
			default:
					include_once('them.php');
				break;
		}
	}
	else{
		include_once('them.php');
	}

?>
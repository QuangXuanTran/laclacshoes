<?php 
	if(isset($_POST['xem'])){
		$nam=$_POST['nam'];
		$date=getdate();
		$thang=$date['year'];
		if($nam==$thang){
			header('location:../index.php?action=danhthu&nam='.$nam);
		}elseif($nam==$thang-2){
			header('location:../index.php?action=danhthu&nam='.$nam);
		}elseif($nam==$thang-1){
			header('location:../index.php?action=danhthu&nam='.$nam);
		}
	}

?>
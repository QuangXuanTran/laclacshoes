<?php 
include_once('../../model/database.php');
	if(isset($_GET['them'])){
		$tkm=$_GET['tkm'];
		$nbd=$_GET['nbd'];
		$nkt=$_GET['nkt'];
		if ($_GET['t']) { $tg=$_GET['t']; } else { $tg=0; }
		if ($_GET['pt']){ $pt=$_GET['pt']; } else { $pt=0; }
		$mt=$_GET['mt'];
		$sql="INSERT INTO `khuyenmai`( `TenKM`, `MoTa`, `KM_PT`, `TienKM`, `NgayBD`, `NgayKT`)
							 VALUES ('$tkm','$mt',$pt,$tg,'$nbd','$nkt')";
		$rs=mysqli_query($conn,$sql);
		if(isset($rs)){
			header('location:../index.php?action=khuyenmai&thongbao=them');
		}
	}
	if(isset($_GET['xoa'])){
		$id=$_GET['makm'];
		$sql="DELETE from `sanphamkhuyenmai` where MaKM='$id'";
		$rs=mysqli_query($conn,$sql);
		if(isset($rs)){
			$sql="DELETE from `khuyenmai` where MaKM='$id'";
			$rs=mysqli_query($conn,$sql);
			if(isset($rs)){
				header('location:../index.php?action=khuyenmai&thongbao=xoa');
			}
		}
	}
	if(isset($_GET['sua'])){
		$makm=$_GET['makm'];
		$tkm=$_GET['tkm'];
		$nbd=$_GET['nbd'];
		$nkt=$_GET['nkt'];
		if ($_GET['t']) { $tg=$_GET['t']; } else { $tg=0; }
		if ($_GET['pt']){ $pt=$_GET['pt']; } else { $pt=0; }
		$mt=$_GET['mt'];
		$sql="UPDATE `khuyenmai` SET `TenKM`='$tkm',`TienKM`=$tg,`KM_PT`=$pt ,`MoTa`='$mt',`NgayBD`='$nbd',`NgayKT`='$nkt' WHERE MaKM =$makm";
		$rs=mysqli_query($conn,$sql);
		if(isset($rs)){
			header('location:../index.php?action=khuyenmai&thongbao=sua');
		}
	}
	if(isset($_GET['apply'])){
		$makm=$_GET['makm'];
		$chon=$_GET['chon'];
		foreach ($chon as $key => $value) {
			$sql="INSERT INTO `sanphamkhuyenmai`(`MaSP`, `MaKM`) VALUES ('$value','$makm')";
			$rs=mysqli_query($conn,$sql);
			
		}
		header('location:../index.php?action=khuyenmai&thongbao=them');
		
	}
	if(isset($_GET['apply2'])){
		$makm=$_GET['makm'];
		$masp=$_GET['masp'];
		
			$sql="INSERT INTO `sanphamkhuyenmai`(`MaSP`, `MaKM`) VALUES ('$masp','$makm')";
			$rs=mysqli_query($conn,$sql);
			if(isset($rs)){
				header('location:../index.php?action=khuyenmai&thongbao=them');
			}
		
		
	}

?>
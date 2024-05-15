
<?php
include_once('../../model/database.php');
	// Thêm màu
	if(isset($_GET['themmau'])){
		$mamau=$_GET['mamau'];
		$sql="insert into mau(MaMau) values(N'$mamau')";
		$rs=mysqli_query($conn,$sql);
		if(isset($rs)){
			header('location:../index.php?action=mau&view=themmau&thongbao=them');
		}else{
			header('location:../index.php?action=mau&view=themmau&thongbao=loi');
		}
	}
	//----------------------------------------
	//Cập nhập
	if(isset($_GET['suamau'])){
		$id=$_GET['id'];
		$mamau=$_GET['mamau'];
		$sql="UPDATE `mau` SET `MaMau`=N'$mamau' where MaMau='$id'";
		$rs=mysqli_query($conn,$sql);
		if(isset($rs)){
			header('location:../index.php?action=mau&view=themmau&thongbao=sua');
		}else{
			header('location:../index.php?action=mau&view=themmau&thongbao=loi');
		}
	}

	//----------------------------------------
// xóa màu
if(isset($_GET['xoa'])){
		$mamau=$_GET['mamau'];
		$sql="delete  from mau where MaMau='$mamau'";
		$rs=mysqli_query($conn,$sql);
		if(isset($rs)){
			header('location:../index.php?action=mau&view=themmau&thongbao=xoa');
		}else{
			header('location:../index.php?action=mau&view=themmau&thongbao=loi');
		}
	}
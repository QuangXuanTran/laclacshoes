
<?php
include_once('../../model/database.php');
	// Thêm Sản Phẩm
		if(isset($_POST['xlthem'])){
			$tensp=$_POST['tensp'];
			$madm=$_POST['madm'];
			$mancc=$_POST['mancc'];
			$dongia=$_POST['dongia'];
			$anhnen=$_FILES['anhnen']['name'];
			$AnhSP_tmp=$_FILES['anhnen']['tmp_name'];
			move_uploaded_file($AnhSP_tmp,'../../webroot/image/sanpham/'.$anhnen);
			$size=$_POST['size'];
			$mau=$_POST['mau'];
			if(isset($_POST['mota'])){$mota=$_POST['mota'];}else{$mota=NULL;}
     		$sql_them=" INSERT INTO `sanpham`(`MaSP`, `TenSP`, `MaDM`, `MaNCC`, `MoTa`, `DonGia`, `AnhNen`) VALUES (NULL,'$tensp',$madm,$mancc,'$mota',$dongia,'$anhnen')";
			$rs_them=mysqli_query($conn,$sql_them);
				if(isset($rs_them)){
					$sql_masp="select MaSP from sanpham where TenSP='$tensp' ORDER BY MaSP DESC";
					$sr=mysqli_query($conn,$sql_masp);$qk=mysqli_fetch_array($sr);	
					if(isset($qk)){
						(int) $so =$qk['MaSP'];
						 foreach ($size as $key1 => $values1){
						 	foreach ($mau as $key => $values) {
								$sql_ctsp="insert into chitietsanpham(MaSP,MaSize,MaMau) values('$so','$values1','$values')";
								$rs_ctsp=mysqli_query($conn, $sql_ctsp);
						 	}
						}$dem=1;
						$sql_addanhsp="INSERT INTO `anhsp`(`MaSP`) VALUES ('$so') ";
						mysqli_query($conn,$sql_addanhsp);
						foreach($_FILES['anhsp']['name'] as $key=>$value) {
							$anhsp=$_FILES['anhsp']['name'][$key];
							$anh_tmp=$_FILES['anhsp']['tmp_name'][$key];
							$rs_anhsp = move_uploaded_file($anh_tmp,'../../webroot/image/sanpham/'.$anhsp);
							$sql_upanhsp="UPDATE `anhsp` SET `Anh$dem` = '$anhsp' where `MaSP` = '$so' ";
							mysqli_query($conn,$sql_upanhsp);
							$dem++; 
						}
						 header('location:../index.php?action=sanpham&view=themsp&thongbao=them');
					}else{
					header('location:../index.php?action=sanpham&view=themsp&thongbao=loi');
				}	
			}

		}
	//-----------------------------------------------------------------------------------------	
			// cập nhập Sản Phẩm
if(isset($_POST['xlsua'])){
	$masp=$_POST['masp'];
	$tensp=$_POST['tensp'];
	$madm=$_POST['madm'];
	$mancc=$_POST['mancc'];
	$dongia=$_POST['dongia'];
	if(isset($_FILES['anhnen'])){
		$anhnen=$_FILES['anhnen']['name'];
		$AnhSP_tmp=$_FILES['anhnen']['tmp_name'];
		move_uploaded_file($AnhSP_tmp,'../../webroot/image/sanpham/'.$anhnen);}else{$anhnen=false;}
	$size=$_POST['size'];
	$mau=$_POST['mau'];
	if(isset($_POST['mota'])){$mota=$_POST['mota'];}else{$mota=NULL;}
	if($anhnen){
		$sql_them=" UPDATE `sanpham` SET `TenSP`='$tensp',`MaDM`='$madm',`MaNCC`='$mancc',`MoTa`='$mota',`DonGia`='$dongia',`AnhNen`='$anhnen' WHERE `MaSP`='$masp'";
	}else{
		$sql_them=" UPDATE `sanpham` SET `TenSP`='$tensp',`MaDM`='$madm',`MaNCC`='$mancc',`MoTa`='$mota',`DonGia`='$dongia' WHERE `MaSP`='$masp'";
	}
	$rs_them=mysqli_query($conn,$sql_them);
	if(isset($rs_them)){
		$sql_xoa="DELETE FROM `chitietsanpham` WHERE MaSP='$masp'";	$sr2=mysqli_query($conn,$sql_xoa);
		if(isset($sr2)){
			$sql_masp="select MaSP from sanpham where TenSP='$tensp' ORDER BY MaSP DESC";
			$sr=mysqli_query($conn,$sql_masp);$qk=mysqli_fetch_array($sr);	
			if(isset($qk)){
				(int) $so =$qk['MaSP'];
						foreach ($size as $key1 => $values1){
							foreach ($mau as $key => $values) {
								$sql_ctsp="insert into chitietsanpham(MaSP,MaSize,MaMau) values('$so','$values1','$values')";
								$rs_ctsp=mysqli_query($conn, $sql_ctsp);
							}
						}
						$dem=1;
						if (isset($_FILES['anhsp'])) {
							if(empty($_FILES['anhsp']['name'][0])){echo 'ok1'; 
								header('location:../index.php?action=sanpham&view=themsp&thongbao=sua'); 
							}else{ 
								foreach($_FILES['anhsp']['name'] as $key=>$value) {
									$sql_anhcu="SELECT * FROM `anhsp` WHERE MaSP = $so";
									$rs_anhcu=mysqli_query($conn, $sql_anhcu);
									$row_anhcu=mysqli_fetch_array($rs_anhcu);
									$file='../../webroot/image/sanpham/'.$row_anhcu['Anh'.$dem];
									if(unlink($file)){
										$anhsp=$_FILES['anhsp']['name'][$key];
										$anh_tmp=$_FILES['anhsp']['tmp_name'][$key];
										$rs_anhsp = move_uploaded_file($anh_tmp,'../../webroot/image/sanpham/'.$anhsp);
										$sql_upanhsp="UPDATE `anhsp` SET `Anh$dem` = '$anhsp' where `MaSP` = '$so' ";
										mysqli_query($conn,$sql_upanhsp);
										$dem++;
									};	
						 			
									
								}
								header('location:../index.php?action=sanpham&view=themsp&thongbao=sua');
							}
				}else{
					header('location:../index.php?action=sanpham&view=themsp&thongbao=loi');
				}
			
			}
			
		}
		
	}
}
			

		
	//-----------------------------------------------------------------------------------------	
	// Xóa Sản Phẩm
if(isset($_GET['xoa'])){
	$masp=$_GET['masp'];
	$delete="DELETE FROM `chitietsanpham` WHERE MaSP = $masp";
	$rs_d=mysqli_query($conn,$delete);
	if(isset($rs_d)){
		$delete2="DELETE FROM `sanpham` WHERE MaSP = $masp";
		$rs_d2=mysqli_query($conn,$delete2);
		if(isset($rs_d2)){
			$delete3="DELETE FROM `anhsp` WHERE MaSP = $masp";
			$rs_d3=mysqli_query($conn,$delete3);
			if(isset($rs_d3)){
				header('location:../index.php?action=sanpham&thongbao=xoa');
			}else{
				header('location:../index.php?action=sanpham&view=themsp&thongbao=loi');
			}
			
		}
		
	}
}    	

		//-----------------------------------------------------------------------------------------	
		// Thêm màu 
		
		 ?>		

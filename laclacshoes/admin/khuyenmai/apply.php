<?php 
    $id=$_GET['makm'];
    $sql_sua="SELECT * FROM `khuyenmai` WHERE MaKM=$id";
    $rs_sua=mysqli_query($conn,$sql_sua);
    $kq=mysqli_fetch_array($rs_sua)
?>
<div class="container-fluid">
    <div class=" alert alert-primary">
      <h4 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
        </span> ADMIN - ONI SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Khuyến mãi&#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Apply &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; <?php echo $kq['TenKM'] ?></h4>
    </div>
</div>

			<div class="form-row m-auto">
				 <div class="form-group col-sm-4"></div>
                 <div class="form-group col-sm-4">
                   <form action="index.php?action=khuyenmai&view=apply&makm=<?php echo $id ?>" method="POST">
	                  <div class="input-group ">
	                       <input class="form-control   border search " type="search" placeholder="Nhập sản phẩm cần tìm" id="example-search-input" name="tk" />
	                    <span class="input-group-append">
	                        <button class="btn btn-outline-success btn-sm   search " name="btsearch" type="submit">Tìm kiếm</button>
	                    </span>
	                  </div>
             		</form>
           		 </div>
           	</div>
           <form action="index.php?action=khuyenmai&view=apply&makm=<?php echo $id ?>" method="POST" class="container-fluid ">
           	<div class="card">
           		 <div class=" card-body row m-auto">
	            	<?php $sql="select *from nhacc";$rs=mysqli_query($conn,$sql);while ($row=mysqli_fetch_array($rs)) {?>
		            	<button class="btn" value="<?php echo $row['MaNCC'] ?>" type="submit" name="th"><?php echo $row['TenNCC'] ?></button><?php }?>
	            </div>
           	</div>
	           
	        </form><br>
<?php 
// code tìm kiếm
if(isset($_POST['btsearch'])){
	$tk=$_POST['tk'];
	$sql="select * from sanpham where TenSP like N'%$tk%' order by MaNCC DESC";
	$rs=mysqli_query($conn,$sql); ?>
	<form action="khuyenmai/xuly.php" method="get" accept-charset="utf-8" class="container-fluid">
	<div class="card card-body">
		<table class="table-hover table text-center">
			<thead>
				<tr class="badge-info">
						<th>Hình Nền</th><th>Mã Sản Phẩm</th><th>Tên Sản Phẩm</th><th>Thương hiệu</th><th>Đơn Giá</th><th  class="badge-danger" >chọn 1</th>
						<th  class="badge-light" >	
							<input class="btn btn-outline-primary" type="button" id="btn1" value="tất cả"/>
       						<input class="btn btn-outline-dark" type="button" id="btn2" value="Hủy"/>
       					</th>
				</tr>
			</thead>
			
			
<?php $i=0; while ($row=mysqli_fetch_array($rs)) {$i=$i+1;$mth=$row['MaNCC'];$sql1="select *from nhacc where MaNCC='$mth'";
					$rs1=mysqli_query($conn,$sql1);$row1=mysqli_fetch_array($rs1);?>
		<tbody>
				<tr>
					<td><img  src="../webroot/img/sanpham/<?php echo $row['AnhNen'];?>" width="60" height="50"></td>
					<td><?php echo $row['MaSP'] ;?></td><td><?php echo $row['TenSP'] ;?></td><td><?php echo $row1['TenNCC'] ;?></td>
					<td><?php echo number_format($row['DonGia']).' đ' ;?></td>
					<td><a href="khuyenmai/xuly.php?masp=<?php echo $row['MaSP'] ?>&apply2&makm=<?php echo $id ?>" >Áp Dụng</a></td>
					<td class="custom-checkbox custom-control"><input type="checkbox" class="custom-control-input" id="<?php echo $row['MaSP']; ?>" name="chon[]" value="<?php echo $row['MaSP']; ?>" >
						 <label class="custom-control-label" for="<?php echo $row['MaSP']; ?>" ></label>
					</td>
				</tr>
			</tbody>
	
<?php } ?>

		</table>
		<input hidden name="makm" value="<?php echo $id ?>">
		<br><hr class="badge-info">
		<center><input class="btn btn-outline-primary  " type="submit" name="apply" value="apply"></center>
	</div>
</form>
      <hr>
		<?php 
}
//
//code phẩn loại sản phẩm + phẩn trang.
if(isset($_POST['th'])){//nếu như bấm vài nút thương hiệu
	$mth=$_POST['th'];?><?php 

	
    $sql="select * from sanpham where  MaNCC ='$mth'"; 
	$rs=mysqli_query($conn,$sql);?>
<form action="khuyenmai/xuly.php" method="get" accept-charset="utf-8" class="container-fluid">
	<div class="card card-body">
		<table class="table-hover table text-center">
			<thead>
				<tr class="badge-info">
						<th>Hình Nền</th><th>Mã Sản Phẩm</th><th>Tên Sản Phẩm</th><th>Thương hiệu</th><th>Đơn Giá</th>
						<th   >chọn 1</th>
						<th  class="badge-light" >	
							<input class="btn btn-outline-primary" type="button" id="btn1" value="tất cả"/>
       						<input class="btn btn-outline-dark" type="button" id="btn2" value="Hủy"/>
       					</th>
				</tr>
			</thead>
			
			
<?php $i=0; while ($row=mysqli_fetch_array($rs)) {$i=$i+1;$mth=$row['MaNCC'];$sql1="select *from nhacc where MaNCC='$mth'";
					$rs1=mysqli_query($conn,$sql1);$row1=mysqli_fetch_array($rs1);?>
		<tbody>
				<tr>
					<td><img  src="../webroot/img/sanpham/<?php echo $row['AnhNen'];?>" width="60" height="50"></td>
					<td><?php echo $row['MaSP'] ;?></td><td><?php echo $row['TenSP'] ;?></td><td><?php echo $row1['TenNCC'] ;?></td>
					<td><?php echo number_format($row['DonGia']).' đ' ;?></td>
					<td><a href="khuyenmai/xuly.php?masp=<?php echo $row['MaSP'] ?>&apply2&makm=<?php echo $id ?>" >Áp Dụng</a></td>
					<td class="custom-checkbox custom-control"><input type="checkbox" class="custom-control-input" id="<?php echo $row['MaSP']; ?>" name="chon[]" value="<?php echo $row['MaSP']; ?>" >
						 <label class="custom-control-label" for="<?php echo $row['MaSP']; ?>"></label>
					</td>
				</tr>
			</tbody>
	
<?php } ?>

		</table>
		<input hidden name="makm" value="<?php echo $id ?>">
		<br><hr class="badge-info">
		<center><input class="btn btn-outline-primary  " type="submit" name="apply" value="apply"></center>

		</div>
		<br>
</form>
      <hr class="badge-info"><?php 	
}

?>
      
        
<script language="javascript">

    // Chức năng chọn hết
    document.getElementById("btn1").onclick = function () 
    {
        // Lấy danh sách checkbox
        var checkboxes = document.getElementsByName('chon[]');

        // Lặp và thiết lập checked
        for (var i = 0; i < checkboxes.length; i++){
            checkboxes[i].checked = true;
        }
    };

    // Chức năng bỏ chọn hết
    document.getElementById("btn2").onclick = function () 
    {
        // Lấy danh sách checkbox
        var checkboxes = document.getElementsByName('chon[]');

        // Lặp và thiết lập Uncheck
        for (var i = 0; i < checkboxes.length; i++){
            checkboxes[i].checked = false;
        }
    };

</script>
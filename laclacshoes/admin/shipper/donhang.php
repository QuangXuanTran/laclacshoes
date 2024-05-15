<?php
	$am=$_SESSION['admin'];$nv=$am['MaNV'];
	$sql="SELECT * FROM `hoadon` WHERE NgayGiao is not null and TinhTrang='Đã duyệt' ORDER BY NgayGiao ASc";
	$rs=mysqli_query($conn,$sql);	
	$dem=mysqli_num_rows($rs);
	$sql3="SELECT * FROM `hoadon` WHERE MaNVGH='$nv' and TinhTrang='hoàn thành'  ORDER BY NgayGiao ASc";
	$rs13=mysqli_query($conn,$sql3);
	$order2=mysqli_num_rows($rs13);
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$date=getdate();
	$thang=$date['year'].'-'.$date['mon'];
	$nam=$date['year'];
	$sql32="SELECT * FROM `hoadon` WHERE MaNVGH='$nv' and TinhTrang='hoàn thành' and (NgayGiao BETWEEN '".$thang."-00' AND'".$thang."-31') ORDER BY NgayGiao ASc";
	$rs132=mysqli_query($conn,$sql32);
	$order=mysqli_num_rows($rs132);
	if (isset($_POST['dk'])) {
		$dk=$_POST['dk'];
	}else  {  $dk='Chưa Giao';  } 
?>
<div class="container-fluid">
	<div class=" alert alert-primary">
	  <h4 class="page-title">
	    <span class="page-title-icon bg-gradient-primary text-white mr-2">
	    </span> ADMIN - ONI SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Giao Hàng &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; <?php echo $dk ?></h4>
	</div>
	<br>
	<div class="row">
        <form action="?action=giaohang" method="POST" class="col-md-4 grid-margin stretch-card">
			<div class="card">
				<div class="card-body ">
					<button type="sub" name="dk" value="Chưa Giao" class="btn btn-primary btn-sm" style="font-family: Comfortaa;">Chờ xử lý</button>
					<span class="counter counter-sm "><?php echo $dem ?></span>
		         	<button type="sub" name="dk" value="Đã Giao"class="btn btn-primary btn-sm" style="font-family: Comfortaa;">Đã Giao</button>
		    	</div>
			</div>
		</form>

		 <div class="col-xl-4 col-md-4 mb-4">
          <div class="card border-left-warning shadow h-100 py-0">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đơn Hàng (Tháng)</font></font></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $order ?></font></font></div>
                </div>
                <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-4 mb-4">
          <div class="card border-left-warning shadow h-100 py-0">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đơn Hàng (ALL)</font></font></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $order2 ?></font></font></div>
                </div>
                <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
		
	</div><br>
	<?php 

	switch ($dk) {
		case 'Chưa Giao': ?>
		<div class="card">
			<div class="card-body">
				<table class="table table-hover m-auto text-center">
					<thead class="badge-info">
						<tr>
							<th>Mã Hóa Đơn</th><th>Ngày Đặt</th><th>Ngày Giao</th><th>Tổng Tiền</th><th>Tình trạng</th><th></th><th colspan ="2" class="badge-danger"></th>
						</tr>
					</thead>
					<tbody>
				 <?php $so=0;
					 while ($row=mysqli_fetch_array($rs)) { 
					 	$sql1="select * from chitiethoadon where MaHD=".$row['MaHD'];
					 	$rs1=mysqli_query($conn,$sql1);
						$sql2="select * from nguoinhan where MaHD=".$row['MaHD'];
						$rs2=mysqli_query($conn,$sql2);
						$row2=mysqli_fetch_array($rs2);?>
						<tr>
							<td><?php echo $row['MaHD']; ?></td>
							<td><?php echo $row['NgayDat']; ?></td>
							<td><?php echo $row['NgayGiao']; ?></td>
							<td><?php echo number_format($row['TongTien']).'.đ'; ?></td>
							<td><?php echo $row['TinhTrang']; ?></td>
							<td><a class="text-info" href="index.php?action=giaohang&view=ctgh&mahd=<?php echo $row['MaHD']; ?>" >Detail </a></td>
							<td ><?php if($row['TinhTrang']==="Đã duyệt"){echo '<a class="text-info" href="shipper/xuly.php?action=duyet&mahd='.$row['MaHD'].'" >Đã Giao Hàng <i class="fas fa-check"></i> </a>';}?></td>
							</tr>
				 <?php	} ?>
						
					</tbody>
				</table>
			</div>
		</div>
			<?php
			break;
		case 'Đã Giao' : ?>		
				<?php 
					
					$sql12="SELECT * FROM `hoadon` WHERE MaNVGH='$nv' and TinhTrang='hoàn thành' ORDER BY NgayGiao ASc";
					$rs12=mysqli_query($conn,$sql12);
				?>
			<div class="card">
				<div class="card-body">
					<table class="table table-hover m-auto text-center" style="font-size: 13px;">
						<thead class="badge-info">
							<tr>
								<th>Mã Hóa Đơn</th><th>Ngày Đặt</th><th>Ngày Giao</th><th>Tổng Tiền</th><th>Tình trạng</th><th>Chi Tiết</th>
							</tr>
						</thead>
						<tbody>
					 <?php $so=0;
						 while ($row12=mysqli_fetch_array($rs12)) { 
						 	$sql1="select * from chitiethoadon where MaHD=".$row12['MaHD'];
						 	$rs1=mysqli_query($conn,$sql1);

							$sql2="select * from nguoinhan where MaHD=".$row12['MaHD'];
							$rs2=mysqli_query($conn,$sql2);
							$row2=mysqli_fetch_array($rs2);?>
							<tr>
								<td><?php echo $row12['MaHD']; ?></td>
								<td><?php echo $row12['NgayDat']; ?></td>
								<td><?php echo $row12['NgayGiao']; ?></td>
								<td><?php echo number_format($row12['TongTien']).'.đ'; ?></td>
								<td><?php echo $row12['TinhTrang']; ?></td>
								<td><a href="index.php?action=giaohang&view=ctgh&mahd=<?php echo $row12['MaHD']; ?>" >Detail </a></td>
								</tr>
					 <?php	} ?>
						</tbody>
					</table>
				</div>
			</div>
				
<?php		break;
		default:
			# code...
			break;
	}
	?>
	


</div>
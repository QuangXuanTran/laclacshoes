<?php 
include_once('../model/database.php');
	$sql="SELECT *from khachhang ";
	$rs=mysqli_query($conn,$sql);
	
?>
<div class="container-fluid">
	<div class=" alert alert-primary">
	  <h4 class="page-title">
	    <span class="page-title-icon bg-gradient-primary text-white mr-2">
	    </span> ADMIN - ONI SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Khách Hàng</h4>
	</div><br>
	<div class="card">
		<div class="card-body">
			<table class="table table-hover m-auto text-center" style="font-size: 13px;">
				<thead class="badge-info">
					<tr>
						<th>Mã Khách Hàng</th>
						<th>Họ Tên</th>
						<th>Email</th>
						<th>Số Điện Thoại</th>
						<th>Địa Chỉ</th>
						
						
					</tr>
				</thead>
				<tbody>
			 <?php $so=0;
				 while ($row=mysqli_fetch_array($rs)) { ?>
					<tr>
						<td><?php echo $row['MaKH']; ?></td>
						<td><?php echo $row['TenKH']; ?></td>
						<td><?php echo $row['Email']; ?></td>
						<td><?php echo $row['SDT']; ?></td>
						<td><?php echo $row['DiaChi']; ?></td>

					</tr>
			 <?php	} ?>		
				</tbody>
			</table><hr>
		</div>

	</div>
</div>
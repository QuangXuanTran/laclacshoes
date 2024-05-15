
<?php 
	$sql="SELECT *FROM sanpham ";
	$rs=mysqli_query($conn,$sql);
	?>
<div class="container-fluid">

		<div class=" alert alert-primary">
		  <h4 class="page-title">
		    <span class="page-title-icon bg-gradient-primary text-white mr-2">
		    </span> ADMIN - ONI SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Kho Hàng &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Xuất / Nhập Kho</h4>
		</div><br>

	<div class="row">
		 <div class="col-md-12 grid-margin stretch-card">
        <div class="card"><br>
		<table class="table table-hover m-auto text-center" >
			<thead class="badge-info">
				<tr>
					<th>#</th><th>Mã Sản Phẩm</th><th>Tên Sản Phẩm</th><th>Tổng Số Lượng</th><th rowspan="2"></th>
				</tr>
			</thead>
			<tbody>
	<?php while ( $row=mysqli_fetch_array($rs)) { ?>
				<tr>
					<td><img  src="../webroot/image/sanpham/<?php echo $row['AnhNen'];?>" width="60" height="50"></td>
					<td><?php echo $row['MaSP'] ?></td>
					<td><?php echo $row['TenSP'] ?></td>
					<td><?php echo $row['SoLuong'] ?></td>
					<td><a class="text-info" href="?action=kho&view=themsl&masp=<?php echo $row['MaSP'] ?>&t=<?php echo $row['TenSP'] ?>&h=<?php echo $row['AnhNen'] ?>">
							Xuất / Nhập Hàng
						</a>
					</td>
				</tr>
	<?php } ?>	
			</tbody>	
		</table>
	</div></div>
	</div>
	
</div>


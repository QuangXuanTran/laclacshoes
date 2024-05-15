<?php
	$sql="select * from hoadon  where (TinhTrang ='đã duyệt' or TinhTrang ='hoàn thành')  Order by NgayDat DESC ";
	$rs=mysqli_query($conn,$sql);
	
?>
<div class="container-fluid">
	<div class="page-header">
	  <h4 class="page-title">
	    <span class="page-title-icon bg-gradient-primary text-white mr-2">
	      
	    </span> ADMIN - ONI SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Kho Hàng &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Xem Đơn Hàng</h4>
	</div><hr><br>
	<div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
		<br>
             <table class="table table-hover  text-center " >
				<thead class="badge-info">
					<tr>
						<th>Mã Hóa Đơn</th> <th>Mã Khách Hàng</th><th>Mã Nhân Viên</th><th>Ngày Đặt</th><th>Tổng Tiền</th><th>Tình trạng</th><th>Chi Tiết</th>
					</tr>
				</thead>
				<tbody>
			 		<?php 
					
				 	while ($row=mysqli_fetch_array($rs)) { ?>
						<tr>
							<td><?php echo $row['MaHD']; ?></td>
							<td><?php echo $row['MaKH']; ?></td>
							<td><?php echo $row['MaNV']; ?></td>
							<td><?php echo $row['NgayDat']; ?></td>
							<td><?php echo number_format($row['TongTien']).' đ'; ?></td>
							<td><?php if ($row['TinhTrang']==='Đã duyệt') {?>
								<label class="badge badge-warning"><font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Đã duyệt</font></font>
								</label>
							<?php }elseif ($row['TinhTrang']==='hoàn thành') { ?>
								<label class="badge badge-secondary"><font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Hoàn thành</font></font>
								</label>
							<?php } ?>	
							</td>
							<td><a class="nav-link text-info" href="index.php?action=kho&view=chitietdh&mahd=<?php echo $row['MaHD']; ?>" >Detail </a></td>						
						</tr>
		 			<?php	} ?>
				</tbody>
			</table>
            </div>
          </div>
      </div>

</div>
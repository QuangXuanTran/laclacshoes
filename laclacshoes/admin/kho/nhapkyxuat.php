<?php
// lấy danh sách sản phẩm  theo phân trang.
    if(isset($_GET['trang'])){
        $trang=$_GET['trang'];
    }
    else{ $trang=1;}
    $from =($trang-1)*30;
	$sql="select * from phieuxuat Order by NgayXuat DESC limit $from,20";
	$rs=mysqli_query($conn,$sql);
	
?>
<div class="container-fluid">
	<div class="page-header">
	  <h4 class="page-title">
	    <span class="page-title-icon bg-gradient-primary text-white mr-2">
	      
	    </span> ADMIN - ONI SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Kho Hàng &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Nhật ký xuất kho</h4>
	</div><hr><br>
	<div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
		<br>
             <table class="table table-hover  text-center " >
				<thead class="badge-info">
					<tr>
						<th>Mã Phiếu</th> <th>Mã Nhân Viên</th><th>Mã Sản Phẩm</th><th>Size</th><th>Màu</th><th>Số Lượng</th><th>Đơn Giá</th><th>Tổng Tiền</th>
						<th>Ngày Nhập</th> <th>Ghi Chú</th>
					</tr>
				</thead>
				<tbody>
			 		<?php 
					
				 	while ($row=mysqli_fetch_array($rs)) { ?>
						<tr>
							<td><?php echo $row['MaPX']; ?></td>
							<td><?php echo $row['MaNV']; ?></td>
							<td><?php echo $row['MaSP']; ?></td>
							<td><?php echo $row['Size']; ?></td>
							<td><?php echo $row['Mau']; ?></td>
							<td><?php echo $row['SoLuong']; ?></td>
							<td><?php echo number_format($row['DonGia']).' đ'; ?></td>
							<td><?php echo number_format($row['TongTien']).' đ'; ?></td>
							<td><?php echo $row['NgayXuat']; ?></td>
							<td><?php echo $row['Note']; ?></td>
											
						</tr>
		 			<?php	} ?>
				</tbody>
			</table>
            </div>
          </div>
      </div>
      <div class="row m-auto">
				<?php 
					
					$ds_spn1b="select * from phieuxuat Order by NgayXuat DESC";
					 		
		            $query_dssp2=mysqli_query($conn,$ds_spn1b);
		            $sosp=mysqli_num_rows($query_dssp2);
		            $sotrang = ceil($sosp/30); ?> 
		      		<hr>
			     	<ul class="pagination justify-content-center">
				         <?php for($x=1;$x<=$sotrang;$x++){ ?>						         
							          <li class="page-item">
							          	  <a class="page-link " href="index.php?action=kho&view=nhatkyx&trang=<?php echo $x ?>"><?php echo $x ;?></a>
							          </li>
							         
						  <?php     
						      } ?>


			      	</ul>

			</div>

</div>
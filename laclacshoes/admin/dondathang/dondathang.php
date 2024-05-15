
	<div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
		<br>
             <table class="table table-hover  text-center " >
				<thead class="badge-info">
					<tr>
						<th>Mã Hóa Đơn</th> <th>Mã Khách Hàng</th><th>Mã Nhân Viên</th><th>Ngày Đặt</th><th>Tổng Tiền</th><th>Tình trạng</th><th>Chi Tiết</th><th colspan ="2" class="badge-danger"></th>
					</tr>
				</thead>
				<tbody>
			 		<?php 
			 		// lấy danh sách sản phẩm  theo phân trang.
		            if(isset($_GET['trang'])){
		                $trang=$_GET['trang'];
		            }
		            else{ $trang=1;}
		            $from =($trang-1)*30;

			 		if(isset($_GET['dk'])){
			 			$dk=$_GET['dk'];
			 			$sql="SELECT * from hoadon  where TinhTrang='".$dk."' Order  by NgayDat DESC LIMIT $from,30";
			 		}else{
			 			$sql="select * from hoadon Order  by NgayDat DESC LIMIT $from,30";
			 		}
			 		
					$rs=mysqli_query($conn,$sql); $so=0;
				 	while ($row=mysqli_fetch_array($rs)) { ?>
						<tr>
							<td><?php echo $row['MaHD']; ?></td>
							<td><?php echo $row['MaKH']; ?></td>
							<td><?php echo $row['MaNV']; ?></td>
							<td><?php echo $row['NgayDat']; ?></td>
							<td><?php echo number_format($row['TongTien']).' đ'; ?></td>
							<td><?php if( $row['TinhTrang']==='chưa duyệt') {?>
								<label class="badge badge-danger"><font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Đang chờ xử lý</font></font>
								</label>
							<?php }elseif ($row['TinhTrang']==='Đã duyệt') {?>
								<label class="badge badge-warning"><font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Đã duyệt</font></font>
								</label>
							<?php }elseif ($row['TinhTrang']==='hoàn thành') { ?>
								<label class="badge badge-secondary"><font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Hoàn thành</font></font>
								</label>
							<?php }elseif ($row['TinhTrang']==='Hủy Bỏ') { ?>
								<label class="badge badge-dark"><font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Hủy Bỏ</font></font>
								</label>
							<?php } ?>
								
							</td>
							<td><a class="nav-link text-info" href="index.php?action=xldathang&view=ctdh&mahd=<?php echo $row['MaHD']; ?>" >Detail </a></td>
							<td><?php if($row['TinhTrang']==="chưa duyệt"){echo '<a class="text-info" href="dondathang/xuly.php?action=duyet&mahd='.$row['MaHD'].'" >Duyệt <i class="fas fa-check"></i> </a>';}?></td>
							<td><?php if($row['TinhTrang']==="chưa duyệt"){ ?>
								<a class="text-info" href="dondathang/xuly.php?action=huy&mahd=<?php echo $row['MaHD']; ?>" ><i class="fas fa-backspace"></i></a></td>
							<?php } ?>								
						</tr>
		 			<?php	} ?>
				</tbody>
			</table>
            </div><br>
          </div>
          <div class="row m-auto">
				<?php $dk2='';
					if(isset($_GET['dk'])){
					 			$dk2=$_GET['dk'];
					 			$ds_spn1b="SELECT * from hoadon  where TinhTrang='".$dk2."'";
					 		}else{
					 			$ds_spn1b="select * from hoadon";
					 		} 
		            $query_dssp2=mysqli_query($conn,$ds_spn1b);
		            $sosp=mysqli_num_rows($query_dssp2);
		            $sotrang = ceil($sosp/30); ?> 
		      		<hr>
			     	<ul class="pagination justify-content-center">
				         <?php for($x=1;$x<=$sotrang;$x++){ 
						         	if($dk2===''){?>
							          <li class="page-item">
							          	  <a class="page-link " href="index.php?action=xldathang&trang=<?php echo $x ?>"><?php echo $x ;?></a></li>
							          <?php }else{?>
							          	<li class="page-item">
							          	  <a class="page-link " href="index.php?action=xldathang&trang=<?php echo $x ?>&dk=<?php echo $dk2 ?>"><?php echo $x ;?></a></li>
						  <?php      }
						      } ?>


			      	</ul>

			</div>
      </div>

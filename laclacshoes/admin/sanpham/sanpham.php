<?php
include_once('../model/database.php');
	
	// lấy danh sách sản phẩm  theo phân trang.
            if(isset($_GET['trang'])){
                $trang=$_GET['trang'];
            }
            else{ $trang=1;}
            $from =($trang-1)*20;
            $sql="SELECT * FROM `sanpham`   LIMIT $from,20 ";
            $rs=mysqli_query($conn,$sql);
            $so=mysqli_num_rows($rs);
?>

<div class="container-fluid">
	<div class=" alert alert-primary">
	  <h4 class="page-title">
	    <span class="page-title-icon bg-gradient-primary text-white mr-2">
	      
	    </span> ADMIN - ONI SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Sản Phẩm</h4>
	</div>
	<div class="card card-body ">
			<?php include_once('sanpham/main.php');?>
		<div class="row">
		
	<table class="table table-hover m-auto text-center" style="font-size: 13px;">
		<thead class="badge-info">
			<tr>
				<th>Ảnh Nền</th><th>Mã Sản Phẩm</th> <th>Tên Sản Phẩm</th><th>Mã Danh Mục</th><th>Mã nhà cung cấp</th><th>Số lượng</th><th>Mô tả</th><th>Đơn Giá</th><th colspan ="2" class="badge-danger"></th>
			</tr>
		</thead>
		<tbody>
	 <?php $so=0;
		 while ($row=mysqli_fetch_array($rs)) { ?>
			<tr>
				<td><img  src="../webroot/image/sanpham/<?php echo $row['AnhNen'];?>" width="60" height="50"></td>
				<td><?php echo $row['MaSP']; ?></td>
				<td><?php echo $row['TenSP']; ?></td>
				<td><?php echo $row['MaDM']; ?></td>
				<td><?php echo $row['MaNCC']; ?></td>
				<td><?php echo $row['SoLuong']; ?></td>
				<td><a href="#" title="<?php echo $row['MoTa']; ?>"><?php echo '---' ?></a></td>
				<td><?php echo number_format($row['DonGia']).'đ'; ?></td>
				<td><a href="index.php?action=sanpham&view=suasp&masp=<?php echo $row['MaSP']; ?>" ><i class="far fa-edit"></i></a></td>
				<td><a href="sanpham/main.php?view=xoasp&masp=<?php echo $row['MaSP']; ?>" ><i class="fas fa-backspace"></i></a></td>
			</tr>
	 <?php	} ?>
			
		</tbody>
	</table>
		</div>
		
		
	</div><br>
	<div class="row ">
		<?php  
            $ds_spn1b="SELECT MaSP FROM `sanpham`";
            $query_dssp2=mysqli_query($conn,$ds_spn1b);
            $sosp=mysqli_num_rows($query_dssp2);
            $sotrang = ceil($sosp/20); ?> 
      		<hr>
	     	<ul class="pagination justify-content-center">
		         <?php for($x=1;$x<=$sotrang;$x++){ ?>
		          <li class="page-item">
		          	  <a class="page-link " href="index.php?action=sanpham&trang=<?php echo $x ?>"><?php echo $x ;?></a></li>
		          <?php } ?>


	      	</ul>

	</div>

</div>
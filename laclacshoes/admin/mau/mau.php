<?php
	$sql="select * from Mau ";
	$rs=mysqli_query($conn,$sql);
	
?>
<div class="container-fluid">
	<div class=" alert alert-primary">
	  <h4 class="page-title">
	    <span class="page-title-icon bg-gradient-primary text-white mr-2">
	    </span> ADMIN - ONI SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Sản Phẩm&#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160;Màu </h4>
	</div><br>
<div class="card">
		<div class="card-body">
<?php include_once('main.php')?>
<table class="table table-hover m-auto text-center" style="font-size: 13px;">
	<thead class="badge-info">
		<tr>
			<th>Tên Màu</th><th colspan="2"></th>
		</tr>
	</thead>
	<tbody>
 <?php $so=0;
	 while ($row=mysqli_fetch_array($rs)) { ?>
		<tr>
			<td><?php echo $row['MaMau']; ?></td>
			<td><a href="index.php?action=mau&view=suamau&mamau=<?php echo $row['MaMau']; ?>" ><i class="far fa-edit"></i></a></td> <!-- sửa-->		
			<td><a href="mau/main.php?view=xoamau&mamau=<?php echo $row['MaMau']; ?>" ><i class="fas fa-backspace"></i></a></td><!-- xóa-->	
		</tr>
 <?php	} ?>
		
	</tbody>
</table>

</div></div></div>
<?php 


?>
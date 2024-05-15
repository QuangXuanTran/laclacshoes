<h5 class="text-center">Phiếu Nhập</h5> <hr>
		<table class="m-auto  ">
			<thead class="table">
				<tr>
					<th>Mã Phiếu Nhập : </th><td><?php echo ($row1['MaPN']+1) ?></td>
					<th>Mã Sản Phẩm : </th><td><?php echo $t ?></td>
				</tr>
				<tr>
					<th> Tên Sản Phẩm: </th><td><?php echo $masp ?></td>
					<th>Ngày Nhập : </th><td ><?php echo   date("d/m/Y"); ?> <span id="clock"></span></td>
				</tr>
				<tr>
					<th>Số Lượng : </th><td><input type="text" class="form-control"  name="sl" required></td>
					<th>Đơn Giá : </th><td><input type="text" class="form-control"  name="dg" ></td>
				</tr>
				<tr>
					<th>Tổng Tiền : </th><td><input type="text" class="form-control"  name="tt" required></td>
					<th>Note : </th><td ><textarea  class="form-control"  name="tt" required></textarea></td>
				</tr>
				<tr>
					<td colspan="4" ><center><button class=" btn btn-success" type="submit" value="action"> Lưu </button></center></td>
				</tr>
			</thead>
		</table>

<script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
 
        /* Đặt phần tử của bạn tại đây */
        document.getElementById('clock').innerHTML =
        h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }
    document.querySelector('body').addEventListener("load", startTime());
    
</script>		
<?php 
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  $date=getdate();
  $thang=$date['year'].'-'.$date['mon'];
  $nam=$date['year'];
  $sql_dtt="SELECT * FROM hoadon WHERE TinhTrang='hoàn thành' and (NgayGiao BETWEEN '".$thang."-00' AND'".$thang."-31')";
  $rs=mysqli_query($conn,$sql_dtt);
  $danhthuthang=0;
  while ( $row=mysqli_fetch_array($rs)) {
        $danhthuthang=$danhthuthang+$row['TongTien'];
  }
  $order=mysqli_num_rows($rs);
  $sql_dtn="SELECT * FROM hoadon WHERE TinhTrang='hoàn thành' and NgayGiao LIKE '".$nam."-%-%'";
  $rsn=mysqli_query($conn,$sql_dtn);
  $danhthunam=0;
  while ( $rown=mysqli_fetch_array($rsn)) {
        $danhthunam=$danhthunam+$rown['TongTien'];
  }
?> 		
    <div class="container-fluid">
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Doanh Thu (Tháng)</font></font></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo number_format($danhthuthang).' đ' ?></font></font></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đơn Hàng (Tháng)</font></font></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $order ?></font></font></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
             <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Doanh Thu (Năm)</font></font></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo number_format($danhthunam).' đ' ?></font></font></div>
                    </div>
                    <div class="col-auto">
                     <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lợi Nhuận</font></font></div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Loading...</font></font></div>
                        </div>
                        <!-- <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div> -->
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

           
          </div>
           <div class="row">
            <div class="col-xl-12 col-lg-7">
              <!-- Area Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Quản Lý Hệ Thống</font></font></h6>
                </div>
                <div class="card-body">
                  <a href="?action=nhanvien"><button type="button" class="btn btn-primary">Quản Lý Nhân Viên</button></a>
                  <a href="?action=kh"><button type="button" class="btn btn-secondary">Quản Lý Khách Hàng</button></a>
                  <a href="?action=danhmuc"><button type="button" class="btn btn-success">Quản Lý Danh Mục</button></a>
                  <a href="?action=khuyenmai"><button type="button" class="btn btn-danger">Quản Lý Khuyến Mãi</button></a>
                  <a href="?action=danhthu"><button type="button" class="btn btn-warning">Doanh Thu</button></a>
                  <!-- <button type="button" class="btn btn-info">Info</button>
                  <button type="button" class="btn btn-light">Light</button>
                  <button type="button" class="btn btn-dark">Dark</button>
                  <button type="button" class="btn btn-link">Link</button> -->
                <hr>
                </div>
              </div>
            </div>
          </div>
 		</div>
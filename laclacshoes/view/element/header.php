<!DOCTYPE html>
<html>
<head>
  <title>GIÀY CHÍNH HÃNG - ĐẸP - CHẤT LƯỢNG - PHONG CÁCH</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css"  rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <!-- Animate.css -->
	<link rel="stylesheet" href="webroot/css/template/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="webroot/css/template/icomoon.css">
	<!-- Ion Icon Fonts-->
	<link rel="stylesheet" href="webroot/css/template/ionicons.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="webroot/css/templats/bootstrap.min.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="webroot/css/template/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="webroot/css/template/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="webroot/css/template/owl.carousel.min.css">
	<link rel="stylesheet" href="webroot/css/template/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="webroot/css/template/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="webroot/css/template/fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="webroot/css/template/style.css">
	<!--  style of you -->
	<link rel="stylesheet" href="webroot/css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
	<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
</head>
<body>
	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-4">
							<div id="colorlib-logo">
                <a href="?view">
                  <img class="logo-header" src="webroot/image/logo/logo1.PNG" alt="">
                </a>
              </div>
						</div>
						<div class="col-sm-5 col-md-5">
              <form action="?view=products-search" class="search-wrap" method="post">
                  <div class="form-group">
                    <input type="search" class="form-control search" name="key" placeholder=" Tìm kiếm">
                    <button class="btn btn-primary submit-search text-center" type="submit"><i class="fas fa-magnifying-glass"></i></button>
                  </div>
              </form>
			      </div>
            <div class="col-sm-5 col-md-3">
              <a  href="?view=user"><i class=" fas fa-user i-use"></i></a>
			      </div>
		      </div>
					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
								<li class="active"><a href="?view">Trang Chủ</a></li>
								<li class="has-dropdown">
									<a href="#">Danh Mục</a>
									<ul class="dropdown"><?php ;$category=categorys();
										 while ($row=(mysqli_fetch_array($category)))  {
											echo '	<li><a href="?view=products-category&id='.$row['MaNCC'].'">'.$row['TenNCC'].'</a></li>';
										} ?>
										
									</ul>
								</li>
								<li><a href="?view=products">Sản Phẩm</a></li>
								<li><a href="?view=about">Về Chúng Tôi</a></li>
								<li><a href="?view=contact">Liên Hệ</a></li>
								<?php $dem=0; if(isset($_SESSION['cart_product'])){ foreach ($_SESSION['cart_product'] as $item_cart){$dem=$dem+$item_cart['SoLuong'];}}?> 
                    	
								<li class="cart"><a href="?view=cart"><i class="fas fa-basket-shopping"></i> Giỏ Hàng [<?php echo $dem; ?>]</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="sale">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 offset-sm-2 text-center">
							<div class="row">
								<div class="owl-carousel2">
									<div class="item">
										<div class="col">
											<h3><a href="#">Giảm giá 25% (Hầu hết) Mọi thứ! Sử dụng mã: Giảm giá mùa hè</a></h3>
										</div>
									</div>
									<div class="item">
										<div class="col">
											<h3><a href="#">Giảm giá lớn nhất của chúng tôi. giảm 50% cho tất cả giày mùa hè</a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
    
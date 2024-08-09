<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Best Bootstrap Admin Dashboards">
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="canonical" href="https://www.bootstrap.gallery/">
		<meta property="og:url" content="https://www.bootstrap.gallery">
		<meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
		<meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
		<meta property="og:type" content="Website">
		<meta property="og:site_name" content="Bootstrap Gallery">
		<link rel="shortcut icon" href="public/assets/images/favicon.svg">

		<!-- Title -->
		<title>Bootstrap Admin Dashboards</title>


		<!-- *************
			************ Common Css Files *************
		************ -->

		<!-- Animated css -->
		<link rel="stylesheet" href="public/assets/css/animate.css">

		<!-- Bootstrap font icons css -->
		<link rel="stylesheet" href="public/assets/fonts/bootstrap/bootstrap-icons.css">

		<!-- Main css -->
		<link rel="stylesheet" href="public/assets/css/main.min.css">


		<!-- *************
			************ Vendor Css Files *************
		************ -->

		<!-- Scrollbar CSS -->
		<link rel="stylesheet" href="public/assets/vendor/overlay-scroll/OverlayScrollbars.min.css">
		<div class="page-wrapper">
		<?php
			include_once("app/views/admin/menu.view.php");
		?>
<div class="main-container">

		<?php
			include_once("app/views/admin/header.view.php");
		?>
<div class="content-wrapper-scroll">

					<!-- Content wrapper start -->
					<div class="content-wrapper">

						<!-- Row start -->
						<div class="row">
							<div class="col-sm-12 col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Sửa thông tin quán</div>
									</div>
									<div class="card-body">

										<!-- Row start -->
										<div class="row">
                                        <form class="row g-3 p-5" id="regisForm" action="" method="POST">
    <div class="d-flex justify-content-center"><h1 class="title"><?php echo $getStoreById['nameCategory'] ?></h1></div>
    <div class="d-flex justify-content-center"><img class="w-50" src="<?php echo $getStoreById['imageCategory'] ?>" alt=""></div>
  <div class="col-md-6">
    <label for="" class="form-label">Tên quán:</label>
    <input type="text" class="form-control" value="<?php echo $getStoreById['nameCategory'] ?>" id="" name="nameCategory" required>
  </div>
  <div class="col-md-6">
    <label for="" class="form-label">Link ảnh quán:</label>
    <input type="text" class="form-control" value="<?php echo $getStoreById['imageCategory'] ?>" id="" name="imageCategory" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="fix-shop-btn">Lưu</button>
  </div>
</form>
										</div>
										<!-- Row end -->

									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->

					</div>
					<!-- Content wrapper end -->

					<!-- App Footer start -->
					<div class="app-footer">
						<span>© Arise admin 2023</span>
					</div>
					<!-- App footer end -->

				</div>
				</div>
				</div>
				<script src="public/assets/js/jquery.min.js"></script>
		<script src="public/assets/js/bootstrap.bundle.min.js"></script>
		<script src="public/assets/js/modernizr.js"></script>
		<script src="public/assets/js/moment.js"></script>

		<!-- *************
			************ Vendor Js Files *************
		************* -->

		<!-- Overlay Scroll JS -->
		<script src="public/assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
		<script src="public/assets/vendor/overlay-scroll/custom-scrollbar.js"></script>

		<!-- Rating JS -->
		<script src="public/assets/vendor/rating/raty.js"></script>
		<script src="public/assets/vendor/rating/raty-custom.js"></script>

		<!-- Main Js Required -->
		<script src="public/assets/js/main.js"></script>

		<!-- Product Js -->
		<script src="public/assets/js/product.js"></script>
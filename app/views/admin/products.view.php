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
										<?php 
											if(isset($_GET['type'])){
												switch ($_GET['type']) {
													case 'product':
														echo'<div class="card-title">Chọn quán bạn muốn xem món ăn</div>';
														break;
														case 'order':
															echo'<div class="card-title">Chọn quán bạn muốn xem lịch sử đơn hàng</div>';
															break;
															case 'order1':
																echo'<div class="card-title">Chọn quán bạn muốn xem đơn hàng hôm nay</div>';
																break;
													default:
														# code...
														break;
												}
											}
										?>
										
									</div>
									<div class="card-body">

										<!-- Row start -->
										<div class="row">
											<?php
												foreach ($getAllStore as $key ) {
													echo'
													<div class="col-xxl-3 col-md-4 col-sm-6 col-12">
												<div class="product-card">
													<img class="product-card-img-top w-50 "  src="'.$key['imageCategory'].'" alt="Bootstrap Gallery">
													<div class="product-card-body">
														<h5 class="product-title">'.$key['nameCategory'].'</h5>
														<div class="product-actions">
															<a class="btn btn-success " href="';
											if(isset($_GET['type'])){
												switch ($_GET['type']) {
													case 'product':
														echo'index.php?type=product&type1=productlist&id='.$key['id_category'].'';
														break;
														case 'order':
															echo'index.php?type=order&type1=orderlist&id='.$key['id_category'].'';
															break;
															case 'order1':
																echo'index.php?type=order&type1=ordertoday&id='.$key['id_category'].'';
																break;
													default:
														# code...
														break;
												}
											}
															
															echo'">Xem</a>
														</div>
													</div>
												</div>
											</div>
													';
												}
											?>
											
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
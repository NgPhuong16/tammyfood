

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
			<div class="content-wrapper">

				<div class="row">
					<div class="col-xxl-3 col-sm-6 col-12">
						<div class="stats-tile">
							<div class="sale-icon shade-red">
								<i class="bi bi-pie-chart"></i>
							</div>
							<div class="sale-details">
								<h3 class="text-red"><?php echo $getNumsAllOrders['count_orders']; ?></h3>
								<p>Đơn</p>
							</div>
						</div>
					</div>
					
					<div class="col-xxl-3 col-sm-6 col-12">
						<div class="stats-tile">
							<div class="sale-icon shade-yellow">
								<i class="bi bi-box-seam"></i>
							</div>
							<div class="sale-details">
								<h3 class="text-yellow"><?php echo $getNumsAllProducts['count_products']; ?></h3>
								<p>Món</p>
							</div>
						</div>
					</div>
					<div class="col-xxl-3 col-sm-6 col-12">
						<div class="stats-tile">
							<div class="sale-icon shade-green">
								<i class="bi bi-handbag"></i>
							</div>
							<div class="sale-details">
								<h3 class="text-green"><?php echo number_format($getNumsAllOrders['total_orders'] ?? 0, 0, ',', '.') ; ?> ₫</h3>
								<p>Doanh thu</p>
							</div>
						</div>
					</div>
						<?php
						$income = 0;
						foreach ($getInCome as $product) {
							$income += ($product['quantity'] * $product['price']) - ($product['quantity'] * $product['original_price']);
						}
						?>
					
					<div class="col-xxl-3 col-sm-6 col-12">
						<div class="stats-tile">
							<div class="sale-icon shade-blue">
								<i class="bi bi-emoji-smile"></i>
							</div>
							<div class="sale-details">
								<h3 class="text-blue"><?php echo number_format($income); ?>đ</h3>
								<p>Lợi nhuận</p>
							</div>
						</div>
					</div>
				</div>
				<!-- Row end -->

				<!-- Row start -->
				<div class="row">
					<div class="col-xxl-9  col-sm-12 col-12">

						<div class="card">
							<div class="card-body">

								<!-- Row start -->
								<div class="row">
									<div class="title">Thống kê hôm nay</div>
									<div class="col-xxl-3 col-sm-4 col-12">
										<div class="reports-summary">
											<div class="reports-summary-block">
												<i class="bi bi-circle-fill text-primary me-2"></i>
												<div class="d-flex flex-column">
													<h6>Số đơn được yêu cầu</h6>
													<h5><?php echo $getNumsAllOrdersToday['count_orders']; ?></h5>
												</div>
											</div>
											<div class="reports-summary-block">
												<i class="bi bi-circle-fill text-success me-2"></i>
												<div class="d-flex flex-column">
													<h6>Số đơn đã hoàn thành</h6>
													<h5><?php echo $getNumsAllOrdersTodayConfirm['count_orders']; ?></h5>
												</div>
											</div>
											<div class="reports-summary-block">
												<i class="bi bi-circle-fill text-danger me-2"></i>
												<div class="d-flex flex-column">
													<h6>Doanh thu</h6>
													<h5><?php echo number_format($getNumsAllOrdersTodayConfirm['total_orders'] ?? 0, 0, ',', '.') ; ?> ₫</h5>
												</div>
											</div>
											<!-- <div class="reports-summary-block">
												<i class="bi bi-circle-fill text-warning me-2"></i>
												<div class="d-flex flex-column">
													<h6>New Customers</h6>
													<h5>23k</h5>
												</div>
											</div>
											<button class="btn btn-info download-reports">View Reports</button> -->
										</div>
									</div>
									
								</div>
								<!-- Row end -->

							</div>
						</div>

					</div>
				</div>
				<!-- Row end -->

				<!-- Row start -->
				
					
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
		<!-- Content wrapper scroll end -->

	</div>
	</div>
	<!-- *************
				************ Main container end *************
			************* -->

<!-- Page wrapper end -->

<!-- *************
			************ Required JavaScript Files *************
		************* -->
<!-- Required jQuery first, then Bootstrap Bundle JS -->
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

		<!-- Apex Charts -->
		<script src="public/assets/vendor/apex/apexcharts.min.js"></script>
		<script src="public/assets/vendor/apex/custom/sales/salesGraph.js"></script>
		<script src="public/assets/vendor/apex/custom/sales/revenueGraph.js"></script>
		<script src="public/assets/vendor/apex/custom/sales/taskGraph.js"></script>

		<!-- Main Js Required -->
		<script src="public/assets/js/main.js"></script>
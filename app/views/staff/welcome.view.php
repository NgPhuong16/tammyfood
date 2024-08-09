<!doctype html>
<html lang="en">

	<head>
		<!-- Required meta tags -->
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

	</head>

	<body>

		<!-- Loading wrapper start -->
		<!-- <div id="loading-wrapper">
			<div class="spinner">
                <div class="line1"></div>
				<div class="line2"></div>
				<div class="line3"></div>
				<div class="line4"></div>
				<div class="line5"></div>
				<div class="line6"></div>
            </div>
		</div> -->
		<!-- Loading wrapper end -->

		<!-- Page wrapper start -->
		<div class="page-wrapper">

        <div class="page-wrapper">
		<?php
			include_once("app/views/admin/menu.view.php");
		?>
<div class="main-container">

		<?php
			include_once("app/views/admin/header.view.php");
		?>

				<!-- Page header starts -->
				
				<!-- Page header ends -->

				<!-- Content wrapper scroll start -->
				<div class="content-wrapper-scroll">

					<!-- Content wrapper start -->
					<div class="content-wrapper">

						<!-- Row start -->
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-body">
										<div class="card-320"><h1 class="title" style="text-transform: uppercase;">ĐÂY LÀ TRANG CỦA NHÂN VIÊN GIAO HÀNG</h1></div>
										<form action="" method="post">
											<?php
											if(is_array($checkinYet)){
												echo'<button type="submit" class="btn btn-danger" name="checkout">Bỏ điểm danh</button>';
											}else{
												echo'<button type="submit" class="btn btn-success" name="checkin">Điểm danh</button>';
											}
											?>
										
										</form>
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
				<!-- Content wrapper scroll end -->

			</div>
			<!-- *************
				************ Main container end *************
			************* -->

		</div>
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


		<!-- Main Js Required -->
		<script src="public/assets/js/main.js"></script>

	</body>

</html>
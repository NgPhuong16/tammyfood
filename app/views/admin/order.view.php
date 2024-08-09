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
					<div class="card-title">Chọn ngày muốn xem đơn hàng của <?php echo $getStoreById['nameCategory'] ?></div>
				</div>
				<div class="card-body">

					<!-- Row start -->
					<div class="row">
						<div class=""><h1 class="title">Chọn nhanh</h1></div>
							<ul class="list-group">
								<li class="list-group-item d-flex w-50" style="justify-content: space-between;">
									<h6 class="text-primary">Hôm qua</h6>
									<div class="">
									<form action="index.php?type=order1&type1=seeorder&id=<?php echo $_GET['id'] ?>" method="post">
										<input type="date" name="timeOrder" value="<?php $currentDate->modify('-1 day'); echo $currentDate->format('Y-m-d'); ?>" hidden>
										<button class="btn btn-success" type="submit" name="see-order-btn">xem</button>
									</form>
									</div>
								</li>
								<li class="list-group-item d-flex w-50" style="justify-content: space-between;">
									<h6 class="text-primary">Hôm kia</h6>
									<div class="">
									<form action="index.php?type=order1&type1=seeorder&id=<?php echo $_GET['id'] ?>" method="post">
										<input type="date" name="timeOrder" value="<?php $currentDate->modify('-1 day'); echo $currentDate->format('Y-m-d'); ?>" hidden>
										<button class="btn btn-success" type="submit" name="see-order-btn">xem</button>
									</form>
									</div>
								</li>
								</ul>
								<div class=""><h1 class="title">Chọn theo ngày:</h1></div>
								<form action="index.php?type=order1&type1=seeorder&id=<?php echo $_GET['id'] ?>" method="post">
										<input type="date" class="form-control w-50" value="" name="timeOrder">
										<br>
										<button class="btn btn-success" type="submit" name="see-order-btn">xem</button>
								</form>

							</div>
							<div class="table-responsive">
										<table class="table table-danger table-striped table-bordered v-middle">
											<thead>

												<tr>
													<th class="col-2">Mã đơn hàng</th>
													<th class="col-3">Khách hàng</th>
													<th class="col-2">Số Phòng</th>
													<th class="col-2">SĐT</th>
													<th class="d-none col-1 d-md-table-cell">Thực thu</th>
													<th class=" col-2 ">Trạng thái</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach ($getAllOrderByShop as $key => $value) {
													echo '
                                                        <tr>
														<td class="">
															<div class="media-box">
																<div class="media-box-body">
																	<div class="text-truncate">' . $value['id_order'] . '</div>
																</div>
															</div>
														</td>
														<td class="">
															<div class="media-box">
																<div class="media-box-body">
																	<div class="text-truncate">' . $value['fullName_order'] . '</div>
																</div>
															</div>
														</td>
														<td class="">' . $value['address_order'] . '</td>
														<td class="">' . $value['phone_order'] . '</td>
														<td class="d-none d-md-table-cell">' . number_format($value['total_order'], 0, ',', '.') . ' ₫</td>
														<td class="">';
													if ($value['status_order'] == 1) {
														echo '
															<span class="text-red"><i class="bi bi-x-circle-fill"></i> ' . $value['nameStatus'] . '</span>
                                                           ';
													} else {
														echo '
															<span class="text-green"><i class="bi bi-check-circle-fill"></i> ' . $value['nameStatus'] . '</span>
                                                           ';
													}
													echo '</td>
													</tr>
													<tr>
													<td colspan="6">
														<table class="table table-primary table-striped table-bordered  v-middle">
											<tr>
												<th class="text-danger col-5">Món</th>
												<th class="text-danger col-4">Số lượng</th>
												<th class="text-danger col-3">Giá</th>
											</tr>
											';
													$getOrderDetailByIdOrder = getOrderDetailByIdOrder($value['id_order']);
													foreach ($getOrderDetailByIdOrder as $key1 => $value1) {
														$getAddonByIdOrderdetail = getAddonByIdOrderdetail($value1['id_orderdetail']);
														echo '
												<tr>
													<th class="">' . $value1['nameProduct'] . '';
														if (count($getAddonByIdOrderdetail) > 0) {
															echo '***(';
															foreach ($getAddonByIdOrderdetail as $key2 => $value2) {
																echo $value2['name_addon'] . ',';
															}
															echo ')';
														}
														echo '</th>
													<th class="">' . $value1['quantity'] . '</th>
													<th class="">' . number_format($value1['total_orderdetail'], 0, ',', '.') . '₫</th>
												</tr>
												';
													}
													echo '
										</table>
														
														</td>
													</tr>
                                                        ';
												?>

												<?php
												}
												?>
											</tbody>
										</table>
									</div>
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
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
	<style>
		/* Định dạng cho nút bật/tắt */
		.switch {
			position: relative;
			display: inline-block;
			width: 60px;
			height: 34px;
		}

		.switch input {
			display: none;
		}

		.slider {
			position: absolute;
			cursor: pointer;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: #ccc;
			transition: .4s;
			border-radius: 34px;
		}

		.slider:before {
			position: absolute;
			content: "";
			height: 26px;
			width: 26px;
			left: 4px;
			bottom: 4px;
			background-color: white;
			transition: .4s;
			border-radius: 50%;
		}

		input:checked+.slider {
			background-color: #2196F3;
		}

		input:checked+.slider:before {
			transform: translateX(26px);
		}

		/* Định dạng cho chế độ on và off */
		.mode {
			font-size: 12px;
			margin-top: 20px;
		}

		.mode.on {
			color: green;
		}

		.mode.off {
			color: red;
		}
	</style>
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
		<?php
		include_once("app/views/admin/menu.view.php");
		?>
		<div class="main-container">

			<?php
			include_once("app/views/admin/header.view.php");
			?>

			<!-- Content wrapper scroll start -->
			<div class="content-wrapper-scroll">

				<!-- Content wrapper start -->
				<div class="content-wrapper">

					<!-- Row start -->
					<div class="row">
						<div class="col-sm-12 col-12">
							<div class="card">
								<div class="card-header mb-5">
									<div class="card-title">
									<?php if(is_array($getShiftNow)){
									echo'
									<h6>Bây giờ hiện tại đang trong ('.$getShiftNow['nameShift'].')</h6>
									';
									} ?>
									</div>
								</div>
								<div class="card-header mb-5">
								<?php
								if(isset($_POST['idShift_order'])){
									echo'
										<div class="card-title">Đơn hàng ( '.$getShiftById['nameShift'].')-ngày hôm nay: ' . $currentDate->format('Y-m-d').'</div>
									';
								}else{
									if(is_array($getShiftNow)){
										echo'
										<div class="card-title">Đơn hàng ( '.$getShiftNow['nameShift'].')-ngày hôm nay: ' . $currentDate->format('Y-m-d').'</div>
										';
									}else{
										echo'<h1 class="title">Hiện tại đã hết ca</h1>';
									}
								}
									?>
								</div>
								<div class="card-header mb-2">
									<div class="title">Chọn ca</div>
								</div>
								<form action="" method="post">
									<select name="idShift_order" id="" class="form-control w-25 mb-2">
										<?php
										foreach ($getAllShift1 as $key => $value) {
											echo '
                                            <option value="' . $value['id_shift'] . '">' . $value['nameShift'] . '</option>
                                        ';
										}
										?>
									</select>

									<button class="btn btn-success" name="filter-order-btn">Tìm</button>
								</form>
								<form action="" method="post">
								<div class="card-body">
								<?php 
								if(isset($seeOrdersByDateAndShift)){
									foreach ($seeOrdersByDateAndShift as $key => $value) {
										echo'<input type="" name="order[]" value="'.$value['id_order'].'" hidden required>';
									}
								}
									echo'
									<div class="d-flex mb-2 " style="justify-content:right"><button type="button" class="btn btn-primary" onclick="switchAll()">Phê duyệt hết ('.count($seeOrdersByDateAndShift).' đơn)</button> <button type="submit" class="btn btn-success" name="save-status-btn">Lưu trạng thái</button></div>
									';
								?>
									<div class="table-responsive">
										<table class="table table-danger table-striped table-bordered v-middle">
											<thead>

												<tr>
													<th class="col-2">Mã đơn hàng</th>
													<th class="col-3">Khách hàng</th>
													<th class="col-1">Số Phòng</th>
													<th class="col-2">SĐT</th>
													<th class="d-none col-1 d-md-table-cell">Thực thu</th>
													<th class="d-none col-2 d-md-table-cell">Trạng thái</th>
													<th class="col-1">Phê duyệt</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($seeOrdersByDateAndShift as $key => $value) {
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
															<td class="d-none d-md-table-cell">';
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
															<td>';
															if($value['status_order']==1){
																echo'
																<label class="switch">
															<input type="checkbox" class="checkboxstatus" id="modeSwitch" value="2" name="status_order'.$key.'">
															<span class="slider"></span>
														</label>
														
														<!-- Hiển thị chế độ hiện tại -->
														<div class="mode off" id="modeStatus">Chưa phê duyệt</div>
																';
															}else{
																echo'
																<label class="switch">
															<input type="checkbox" id="modeSwitch" class="checkboxstatus" name="status_order'.$key.'" checked>
															<span class="slider"></span>
														</label>
														
														<!-- Hiển thị chế độ hiện tại -->
														<div class="mode on" id="modeStatus">Đã phê duyệt</div>
																';
															}
														echo'</td>
														</tr>
														<tr>
														<td colspan="7">
	<table class="table table-primary table-striped table-bordered  v-middle">
	<tr>
													<th class="text-danger col-5">Món</th>
													<th class="text-danger col-3">Số lượng</th>
													<th class="text-danger col-4">Giá</th>
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
												}
												
												?>
											</tbody>
										</table>
									</div>

								</div>
								</form>
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
	<script>
		// JavaScript để xử lý sự kiện chuyển đổi chế độ
		// const modeSwitch = document.getElementById('modeSwitch');
		const modeStatus = document.getElementById('modeStatus');
		const checkboxstatus = document.querySelectorAll('.checkboxstatus');

		checkboxstatus.forEach(checkbox => {
			checkbox.addEventListener('change', function() {
				const grandParentElement = this.parentElement.parentElement;
    			const modeStatus = grandParentElement.querySelector('#modeStatus');
				console.log(modeStatus);
			if (this.checked) {
				modeStatus.textContent = 'Phê duyệt';
				modeStatus.classList.remove('off');
				modeStatus.classList.add('on');
			} else {
				modeStatus.textContent = 'Chưa phê duyệt';
				modeStatus.classList.remove('on');
				modeStatus.classList.add('off');
			}
		});
		})
		function switchAll() {
			checkboxstatus.forEach(checkbox => {
				const grandParentElement = checkbox.parentElement.parentElement;
    			const modeStatus = grandParentElement.querySelector('#modeStatus');
				checkbox.checked = true;
				modeStatus.textContent = 'Phê duyệt';
				modeStatus.classList.remove('off');
				modeStatus.classList.add('on');
			});
		}
	</script>

</body>

</html>
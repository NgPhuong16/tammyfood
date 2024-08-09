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
										<div class="card-title">Lịch sử đơn hàng <?php echo $getShiftById['nameShift'];?>-ngày <?php echo $day; ?></div>
									</div>
                                    <div class="card-header mb-2">
										<div class="title">Chọn ca</div>
									</div>
                                    <form action="" method="post">
                                    <select name="idShift_order" id="" class="form-control w-25 mb-2" >
                                        <?php
                                            foreach ($getAllShift1 as $key => $value) {
                                                echo'
                                            <option value="'.$value['id_shift'].'">'.$value['nameShift'].'</option>
                                        ';
                                            }
                                        ?>
                                    </select>
									<?php if(isset($_POST['timeOrder'])){echo '<input type="date" name="timeOrder" value="'.$_POST['timeOrder'].'" hidden>';} ?>
									
                                    
                                    <button class="btn btn-success" name="filter-order-btn">Tìm</button>
                                    </form>
									<div class="card-body">

										<div class="table-responsive">
											<table class="table v-middle">
												<thead>
                                               
													<tr>
														<th class="">Mã đơn hàng</th>
														<th class="">Khách hàng</th>
														<th class="d-none d-lg-table-cell">Ngày đặt</th>
														<th class="">Số Phòng</th>
														<th class="d-none d-lg-table-cell">SĐT</th>
														<th class="d-none d-md-table-cell">Số tiền</th>
														<th class="d-none d-md-table-cell">Trạng thái</th>
														<th class="">Xem</th>
													</tr>
												</thead>
												<tbody>
                                                <?php
                                                    foreach ($seeOrdersByDateAndShift as $key => $value) {
                                                        echo'
                                                        <tr>
														<td class="">
															<div class="media-box">
																<div class="media-box-body">
																	<div class="text-truncate">'.$value['id_order'].'</div>
																</div>
															</div>
														</td>
														<td class="">
															<div class="media-box">
																<div class="media-box-body">
																	<div class="text-truncate">'.$value['fullName'].'</div>
																</div>
															</div>
														</td>
														<td class="d-none d-lg-table-cell">'.$value['timeOrder'].'</td>
														<td class="">'.$value['address_order'].'</td>
														<td class="d-none d-lg-table-cell">'.$value['phone_order'].'</td>
														<td class="d-none d-md-table-cell">'.number_format($value['total_order'], 0, ',', '.').' ₫</td>
														<td class="d-none d-md-table-cell">';
                                                        if($value['status_order']==1){
                                                            echo'
															<span class="text-red"><i class="bi bi-x-circle-fill"></i> '.$value['nameStatus'].'</span>
                                                           ';
                                                        }else{
                                                            echo'
															<span class="text-green"><i class="bi bi-check-circle-fill"></i> '.$value['nameStatus'].'</span>
                                                           ';
                                                        }
														echo'</td>
														<td class="">
															<a href="" class="badge shade-green min-90">Xem</a>
														</td>
													</tr>
                                                        ';
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
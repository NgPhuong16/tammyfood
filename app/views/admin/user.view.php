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

		<!-- Data Tables -->
		<link rel="stylesheet" href="public/assets/vendor/datatables/dataTables.bs5.css" />
		<link rel="stylesheet" href="public/assets/vendor/datatables/dataTables.bs5-custom.css" />

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

								
								<!-- Card end -->

								<!-- Card start -->
								

								<!-- Card start -->
								<div class="card">
									<div class="card-header">
										<div class="card-title">Danh sách người quản trị</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="highlightRowColumn" class="table custom-table">
												<thead>
													<tr>
														<th>Mã người dùng</th>
														<th>Tên</th>
														<th>Email</th>
														<th>SĐT</th>
														<th>Vai trò</th>
														<th>Quán</th>
														<th>Vô hiệu hóa</th>
													</tr>
												</thead>
												<tbody>
                                                <?php
                                                        foreach ($getAllAdmin as $key => $value) {
                                                            echo'
                                                            <tr>
														<td>'.$value['id_user'].'</td>
														<td>'.$value['fullName'].'</td>
														<td>'.$value['email'].'</td>
														<td>'.$value['phone'].'</td>
														<td>'.$value['nameRole'].'</td>
														<td>'.$value['nameCategory'].'</td>';
														if($value['del_user']==0){
                                                            echo'
														<td><a href="index.php?type=user&delad='.$value['id_user'].'" class="btn btn-danger">Vô hiệu hóa</a></td>
                                                        ';
                                                        }else if($value['del_user']==1){
                                                            echo'
                                                            <td><a href="index.php?type=user&atad='.$value['id_user'].'" class="btn btn-success">Kích hoạt lại</a></td>
                                                            ';
                                                        }
													echo'</tr>';
                                                        }
                                                    ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>


                                <div class="card">
									<div class="card-header">
										<div class="card-title">Danh sách khách hàng</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="apiCallbacks" class="table custom-table">
												<thead>
													<tr>
														<th>Mã khách hàng</th>
														<th>Tên</th>
														<th>Email</th>
														<th>SĐT</th>
														<th>Link FB</th>
														<th>Số Phòng</th>
														<th>Vô hiệu hóa</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php
                                                        foreach ($getAllCustomers as $key => $value) {
                                                            echo'
                                                            <tr>
														<td>'.$value['id_user'].'</td>
														<td>'.$value['fullName'].'</td>
														<td>'.$value['email'].'</td>
														<td>'.$value['phone'].'</td>
														<td>'.$value['linkFaceBook'].'</td>
														<td>'.$value['address'].'</td>';
                                                        if($value['del_user']==0){
                                                            echo'
														<td><a href="index.php?type=user&delcs='.$value['id_user'].'" class="btn btn-danger">Vô hiệu hóa</a></td>
                                                        ';
                                                        }else if($value['del_user']==1){
                                                            echo'
                                                            <td><a href="index.php?type=user&atcs='.$value['id_user'].'" class="btn btn-success">Kích hoạt lại</a></td>
                                                            ';
                                                        }
													echo'
                                                        </tr>';
                                                        }
                                                    ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
                                
								<!-- Card end -->

								<!-- Card start -->
								
								<!-- Card end -->

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

		<!-- Data Tables -->
		<script src="public/assets/vendor/datatables/dataTables.min.js"></script>
		<script src="public/assets/vendor/datatables/dataTables.bootstrap.min.js"></script>

		<!-- Custom Data tables -->
		<script src="public/assets/vendor/datatables/custom/custom-datatables.js"></script>

		<!-- Main Js Required -->
		<script src="public/assets/js/main.js"></script>

	</body>

</html>
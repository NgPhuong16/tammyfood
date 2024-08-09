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
<title>Tammy Food</title>


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
								<div class="card-title">Danh sách món ăn <?php echo $getStoreById['nameCategory'] ?></div>
							</div>
							<div class="card-body">

								<!-- Row start -->
								<div class="row">
									<?php
									foreach ($getListProductByStoreAll as $key) {
										if ($key['imageCover'] == '') {
											$imageCover = 'https://cdn.tgdd.vn/2021/07/CookRecipe/GalleryStep/thanh-pham-1489.jpg';
										} else {
											$imageCover = $key['imageCover'];
										}
										if ($key['emptyProduct'] == 0) {
											$status = 'Đang hiện';
											$style = 'text-success';
											$url='hide';
											$text='Ẩn';

										} else {
											$status = 'Đang ẩn';
											$style = 'text-danger';
											$url='display';
											$text='Hiện';
										}
										echo '
													<div class="col-xxl-3 col-md-4 col-sm-6 col-12">
												<div class="product-card">
													<img class="product-card-img-top w-50"  src="' . $imageCover . '" alt="Bootstrap Gallery">
													<div class="product-card-body">
														<h5 class="product-title">' . $key['nameProduct'] . '</h5>
														<div class="product-price">
															<span class="disount-price"><h6>' . number_format($key['price'], 0, ',', '.') . ' ₫</h6></span>
														</div>
														<div class="product-status">
															<span class="' . $style . '"><h6>Trạng thái: ' . $status . '</h6></span>
														</div>
														<div class="product-actions">
															<a href="index.php?type=product&type1=fixproduct&id=' . $key['id_product'] . '" class="btn btn-success ">Sửa</a>
															<a href="index.php?type=product&type1=productlist&id='.$_GET['id'].'&'.$url.'=' . $key['id_product'] . '" class="btn btn-primary ">'.$text.'</a>
															<a href="index.php?type=product&type1=productlist&id='.$_GET['id'].'&del=' . $key['id_product'] . '" class="btn btn-danger ">Xóa</a>
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
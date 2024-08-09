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
										<div class="card-title">Sửa món ăn</div>
									</div>
									<div class="card-body">

										<!-- Row start -->
										<div class="row">
                                        <form class="row g-3 p-5" id="regisForm" action="" method="POST">
    <div class="d-flex justify-content-center"><h1 class="title"><?php echo $getProductByIdAll['nameProduct'] ?></h1></div>
    <div class="d-flex justify-content-center"><img class="w-50" src="<?php echo $getProductByIdAll['imageCover'] ?>" alt=""></div>
  <div class="col-md-6">
    <label for="" class="form-label">Tên món:</label>
    <input type="text" class="form-control" value="<?php echo $getProductByIdAll['nameProduct'] ?>" id="" name="nameProduct" required>
  </div>
  <div class="col-md-6">
    <label for="" class="form-label">Mô tả:</label>
    <input type="text" class="form-control" value="<?php echo $getProductByIdAll['description'] ?>" id="" name="description" required>
  </div>
  <div class="col-md-6">
    <label for="" class="form-label">Giá gốc:</label>
    <input type="number" class="form-control" value="<?php echo $getProductByIdAll['original_price'] ?>" min="0" name="original_price" required>
  </div>
  <div class="col-md-6">
    <label for="" class="form-label">Giá bán:</label>
    <input type="number" class="form-control" value="<?php echo $getProductByIdAll['price'] ?>" min="0" name="price" required>
  </div>
  <div class="col-md-6">
    <label for="" class="form-label">Link ảnh:</label>
    <input type="text" class="form-control" value="<?php echo $getProductByIdAll['imageCover'] ?>" id="" name="imageCover" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="fix-product-btn">Lưu</button>
  </div>
</form>

<?php
              foreach ($addonArray as $key) {
                  $i=1;
                  foreach ($key as $key1 ) {
                    if($i<2){
                      echo'<label for="" class="form-check-label"><h6>'.$key1['name_addon_categories'].'</h6></label>';
						echo'<form action="" method="POST">';
                      echo'<div class="col-md-12 d-flex">
                      <input class="form-control" value="'.$key1['name_addon'].'" type="text" name="name_addon">
                      <input class="form-control" value="'.$key1['price_addon'].'" type="number" name="price_addon">
                      <input class="form-control" value="'.$key1['id_addon'].'" type="number" name="id_addon" hidden>
					  <a href="index.php?type=product&type1=fix&id='.$_GET['id'].'&del='.$key1['id_addon'].'" class="btn btn-danger">Xóa</a>
					  <button type="submit" class="btn btn-success" name="save-addon-btn">Lưu</button>
                    </div>
					';
					echo'</form>';
                    }else{
						echo'<form action="" method="POST">';
                      echo'
					  <div class="col-md-12 d-flex">
                      <input class="form-control" value="'.$key1['name_addon'].'" type="text" name="name_addon" >
                      <input class="form-control" value="'.$key1['price_addon'].'" type="number" name="price_addon" >
                      <input class="form-control" value="'.$key1['id_addon'].'" type="number" name="id_addon" hidden>
					  <a href="index.php?type=product&type1=fix&id='.$_GET['id'].'&del='.$key1['id_addon'].'" class="btn btn-danger">Xóa</a>
					  <button type="submit" class="btn btn-success" name="save-addon-btn">Lưu</button>
                    </div>';
					echo'</form>';
				}
                  $i++;
                  }
              }
            ?>

<form class="row g-3 p-5"  action="" method="POST">
<div class="d-flex "><h6 class="title">Thêm lựa chọn</h6></div>
<div class="col-md-4">
    <label for="" class="form-label">Tên lựa chọn:</label>
    <input type="text" class="form-control" value="" id="" name="name_addon" required>
  </div>
  <div class="col-md-4">
    <label for="" class="form-label">Giá:</label>
    <input type="number" class="form-control" value="" id="" name="price_addon" required>
  </div>
  <div class="col-md-4">
    <label for="" class="form-label">Loại:</label>
	<select name="idCategory_addon" class="form-control" id="">
		<?php
		
		foreach ($getAllAddonCategories as $key => $value ) {
			if($key==0){
				echo'<option value="'.$value['id_addon_category'].'" selected>'.$value['name_addon_categories'].'</option>';
			}else{
				echo'<option value="'.$value['id_addon_category'].'">'.$value['name_addon_categories'].'</option>';
			}
		}
		?>
	</select>
  </div>
  <div class="col-md-2" >
  	<button type="submit" class="btn btn-success" name="add-addon-btn">Thêm</button>
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
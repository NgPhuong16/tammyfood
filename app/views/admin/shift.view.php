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
    include_once ("app/views/admin/menu.view.php");
    ?>
    <div class="main-container">

        <?php
        include_once ("app/views/admin/header.view.php");
        ?>
        <div class="content-wrapper-scroll">

            <!-- Content wrapper start -->
            <div class="content-wrapper">

                <!-- Row start -->
                <div class="row">
                    <div class="col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Sửa ca giao</div>
                            </div>
                            <div class="card-body">

                                <!-- Row start -->
                                <div class="row">
                                <table class="table table-danger table-striped table-bordered v-middle">
  <thead>
    <tr>
      <th class="col-md-5">TÊN CA</th>
      <th class="col-md-5">GIỜ KHÓA CA</th>
      <th class="col-md-1">ẨN CA</th>
      <th class="col-md-1">LƯU</th>
    </tr>
  </thead>
  <tbody>
                                    <?php
                                    foreach ($getAllShift2 as $key => $value) {
                                        $hours = floor($value['timeLock'] / 60);
                                        $remainingMinutes = $value['timeLock'] % 60;
                                    
                                        $time = sprintf('%02d:%02d', $hours, $remainingMinutes);
                                        echo '
                <form action="" method="POST">                                    
    <tr>
      <td class="col-md-5"><input type="text" class="form-control" value="'.$value['nameShift'].'" name="nameShift" required></td>
      <td class="col-md-5"><input  class="form-control"  type="time" id="timeInput" name="timeInput" min="00:00" max="23:59" value="'.$time.'" required></td>
      <input type="number" class="form-control" value="'.$value['id_shift'].'" name="id_shift" required hidden>';
      if($value['hide_shift']==0){
        echo'<td class="col-md-1"><a href="index.php?type=shift&del='.$value['id_shift'].'" class="btn btn-danger">Khóa</a></td>';
      }else if($value['hide_shift']==1){
        echo'<td class="col-md-1"><a href="index.php?type=shift&display='.$value['id_shift'].'" class="btn btn-success">Mở</a></td>';
      }
      echo'
      <td class="col-md-1"><button type="submit" class="btn btn-success" name="save-shift-btn">Lưu</button></td>
    </tr>
    </form> 
  
                                                    ';
                                    }
                                    ?>
                                    </tbody>
</table>
                                    <form class="row g-3 p-5" id="regisForm" action="" method="POST">
    <div class="d-flex"><h6 class="title">Thêm ca giao</h6></div>
  <div class="col-md-6">
    <label for="" class="form-label">Tên ca giao:</label>
    <input type="text" class="form-control" value="" id="" name="nameShift" required>
  </div>
  <div class="col-md-6">
    <label for="" class="form-label">Giờ khóa ca:</label>
    <input  class="form-control"  type="time" id="timeInput" name="timeInput" min="00:00" max="23:59" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-success" name="add-shift-btn">Thêm</button>
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
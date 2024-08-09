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
                    <div class="card-header mb-5">
									<div class="card-title">
									<?php if(is_array($getShiftNow)){
									echo'
									<h6>Bây giờ hiện tại đang trong ('.$getShiftNow['nameShift'].')</h6>
									';
									}?>
									</div>
								</div>
                                <div class="card-header mb-5">
                                <?php if(is_array($getShiftNow)){
									echo'
									<div class="card-title">Đơn hàng ( '.$getShiftNow['nameShift'].')-ngày hôm nay: ' . $currentDate->format('Y-m-d').'</div>
									';
								}else{
									echo'<h1 class="title">Hiện tại đã hết ca</h1>';
								}
									?>
                                </div>
                                
                        <div class="card-header mb-2">
                            <div class="title">Chọn ca</div>
                        </div>
                        <form action="" method="post">
                            <select name="idShift_order" id="" class="form-control w-25 mb-2">
                                <?php
                                foreach ($getShiftPass as $key => $value) {
                                    echo '
                                            <option value="' . $value['id_shift'] . '">' . $value['nameShift'] . '</option>
                                        ';
                                }
                                ?>
                            </select>

                            <button class="btn btn-success" name="filter-order-btn">Tìm</button>
                        </form>
                        <div class="col-sm-12 col-12">


                            <!-- Card end -->

                            <!-- Card start -->


                            <!-- Card start -->
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Đơn hàng đã phê duyệt chưa được giao cho ship</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <form action="" method="post">
                                            <table id="highlightRowColumn" class="table custom-table">
                                                <thead>
                                                    <tr>
                                                        <th>Mã đơn hàng</th>
                                                        <th>Tên</th>
                                                        <th>SĐT</th>
                                                        <th>Số Phòng</th>
                                                        <th>Chọn</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                     if(is_array($getShiftNow)){
                                                    foreach ($seeOrdersByDateAndShift as $key => $value) {
                                                        echo '
                                                            <tr>
                                                            <td>' . $value['id_order'] . '</td>
                                                            <td>' . $value['fullName'] . '</td>
                                                            <td>' . $value['phone'] . '</td>
                                                            <td>' . $value['address'] . '</td>
                                                            <td><input class="form-check-input" name="idOrders[]" type="checkbox" value="' . $value['id_order'] . '" /></td>
                                                            ';
                                                        echo '</tr>';
                                                    }
                                                }
                                                    ?>
                                                </tbody>

                                            </table>
                                            <div class="mb-3 form-check">
                                                <label class="form-check-label" for="exampleCheck1">Lựa chọn shipper</label>
                                                <select class="form-control w-25" name="idShip_order" id="">
                                                    <?php
                                                    foreach ($getAllStaffByShop as $key1 => $value1) {
                                                        if ($key1==0) {
                                                            echo'<option value="'.$value1['id_user'].'" selected>'.$value1['fullName'].'</option>';
                                                        }else{
                                                            echo'<option value="'.$value1['id_user'].'">'.$value1['fullName'].'</option>';
                                                        }
                                                    }
                                                    ?>
                                            </select>
                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary" name="send-shipper-btn">Gửi đơn cho shipper</button>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Đơn hàng đã phê duyệt được giao cho ship</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="apiCallbacks" class="table custom-table">
                                            <thead>
                                                <tr>
                                                    <th>Mã đơn hàng</th>
                                                    <th>Tên</th>
                                                    <th>SĐT</th>
                                                    <th>Số Phòng</th>
                                                    <th>Người giao</th>
                                                    <th>Trạng thái</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                     if(is_array($getShiftNow)){
                                                foreach ($seeOrdersByDateAndShift1 as $key => $value) {
                                                    echo '
                                                            <tr>
														<td>' . $value['id_order'] . '</td>
														<td>' . $value['userName'] . '</td>
														<td>' . $value['phone'] . '</td>
														<td>' . $value['address'] . '</td>
														<td>' . $value['shipName'] . '</td>
														<td>' . $value['nameDelivery'] . '</td>
                                                        ';
                                                    echo '
                                                        </tr>';
                                                }
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
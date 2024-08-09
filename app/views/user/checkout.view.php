<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <img src="public/image/tick_icon.png" width="30%" alt="">
                    </div>
                    <h1 class="h3 mb-3 font-weight-normal">Đặt đơn hoàn thành!</h1>
                    <p class="lead">Cảm ơn bạn đã mua hàng. Đơn hàng của bạn đang được xử lý.</p>
                    <p><strong>Những món đặt thành công</strong></p>
                    <p>
                    <?php
                    if(count($_SESSION['success'])>0){
                        $i = 0;
                        $tong = 0;
                        foreach ($_SESSION['success'] as $key) {
                            $tong = $tong + $key['total'];
                            $addon_name = addon_name($key['addonArray1']);
                            echo '
                                        <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                                    <div class="mr-1 col-2"><img class="rounded" src="' . $key['imageCover'] . '" width="70"></div>
                                    <div class="d-flex flex-column align-items-center product-details col-4"><span class="font-weight-bold">' . $key['nameProduct'] . '</span>
                                        <div class="d-flex flex-row product-desc">';
                            if ($addon_name == 1) {
                            } else {
                                foreach ($addon_name as $key1) {
                                    echo '<div class="' . $key1['id_addon'] . '"><span class="text-grey">' . $key1['name_addon_categories'] . ':</span><span class="font-weight-bold">' . $key1['name_addon'] . '</span></div>';
                                }
                            }
                            echo '
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center qty col-1"><i class="fa fa-minus text-danger"></i>
                                        <h5 class="text-grey mt-1 mr-1 ml-1">' . $key['quantity'] . '</h5><i class="fa fa-plus text-success"></i></div>
                                    <div class="col-2">
                                        <h5 class="text-grey">' . number_format($key['total'], 0, ',', '.') . ' ₫</h5>
                                    </div>
                                </div>
                                        ';
                            $i++;
                        }
                    }
                    // else{
                    //     echo'<p class="text-danger">Không có món nào!</p>';
                    // }
           
            ?>
                    <!-- </p>
                    <p><strong>Những món đặt không thành công ( hết món trong quá trình đặt)</strong></p>
                    <p> -->
                        <?php
                    if(count($_SESSION['notAvailable'])>0){
            $i = 0;
            $tong = 0;
            foreach ($_SESSION['notAvailable'] as $key) {
                $tong = $tong + $key['total'];
                $addon_name = addon_name($key['addonArray1']);
                echo '
                            <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                        <div class="mr-1 col-2"><img class="rounded" src="' . $key['imageCover'] . '" width="70"></div>
                        <div class="d-flex flex-column align-items-center product-details col-4"><span class="font-weight-bold">' . $key['nameProduct'] . '</span>
                            <div class="d-flex flex-row product-desc">';
                if ($addon_name == 1) {
                } else {
                    foreach ($addon_name as $key1) {
                        echo '<div class="' . $key1['id_addon'] . '"><span class="text-grey">' . $key1['name_addon_categories'] . ':</span><span class="font-weight-bold">' . $key1['name_addon'] . '</span></div>';
                    }
                }
                echo '
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center qty col-1"><i class="fa fa-minus text-danger"></i>
                            <h5 class="text-grey mt-1 mr-1 ml-1">' . $key['quantity'] . '</h5><i class="fa fa-plus text-success"></i></div>
                        <div class="col-2">
                            <h5 class="text-grey">' . number_format($key['total'], 0, ',', '.') . ' ₫</h5>
                        </div>
                    </div>
                            ';
                $i++;
            }
        }else{
            // echo'<p class="text-danger">Không có món nào!</p>';
        }
            ?></p>
                    <a href="index.php?type=home" class="btn btn-primary mt-3">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>
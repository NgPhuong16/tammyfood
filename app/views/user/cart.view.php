<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="p-2">
                <h4>Giỏ hàng</h4>
                <div class="d-flex flex-row align-items-center pull-right"></div>
            </div>
            <?php
            $i = 0;
            $tong = 0;
            foreach ($_SESSION['cart'] as $key) {
                $tong = $tong + $key['total'];
                $addon_name = addon_name($key['addonArray1']);
                echo '
                            <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-4 rounded">
                        <div class="mr-1 col-3"><img class="rounded" src="' . $key['imageCover'] . '" width="70"></div>
                        <div class="d-flex flex-column align-items-center product-details col-3"><span class="font-weight-bold">' . $key['nameProduct'] . '</span>
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
                        <div class="col-3">
                            <h5 class="text-grey">' . number_format($key['total'], 0, ',', '.') . ' ₫</h5>
                        </div>
                        <div class="col-1">
                            <a class="btn btn-danger" href="index.php?type=cart&del=' . $key['id_product'] . '&id=' . $i . '">Xóa</a>
                        </div>
                    </div>
                            ';
                $i++;
            }
            ?>
                <form action="" id="order" method="post">
            <?php
                echo'
                <div class="d-flex   mt-3 p-2 bg-white rounded" style="justify-content: center; flex-direction:column">
                <div class="row mb-2">
                    <div class="col-md-12 d-flex justify-content-center">
                        <h4>Thông tin nhận hàng</h4>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="" class="form-label">Số điện thoại</label>
                        <input type="text" name="phone" id="phone" value="" class="form-control" maxlength="200" required>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Tên</label>
                        <input type="text" name="fullName" id="fullName" value="" class="form-control" maxlength="200" required>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="" class="form-label">Ca bạn muốn giao</label>
                        <select class="form-control" name="shift" id="">';
                        if(count($getAllShift)>0){
                            foreach ($getAllShift as $key ) {
                               echo'
                            <option value="'.$key['id_shift'].'">'.$key['nameShift'].'</option>
                            ';
                            }

                        }
                            echo'
                        </select>
                    </div>
                    <div class="col-md-6">
                    <label for="" class="form-label">Phòng</label>
                    <input type="text" name="address" id="address" value="" class="form-control" maxlength="200" required>
                </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12">
                        <label for="" class="form-label">Ghi chú</label>
                        <textarea type="text" name="note" id="note"  class="form-control" maxlength="200"></textarea>
                    </div>
                </div>
                  <p id="errorMessage" class="text-danger"></p>
            </div>
                ';
            ?>
            <input type="number" name="giamgia" value="<?php echo $giamgia; ?>" hidden required>
            <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded" style="justify-content: space-between;">
                    <?php
                    if ($tong > 0) {
                        echo '<button class="btn btn-primary btn-block btn-lg ml-2 pay-button button-web" type="submit" name="checkout">Đặt đơn</button>';
                    }
                    ?>
                <h5 class="">Tổng cộng: <?php
                if($giamgia>0 && $tong > 0){
                    echo '<del class="text-danger">'.number_format(($tong), 0, ',', '.').'</del> ';
                    echo number_format(($tong-$giamgia), 0, ',', '.');
                }else{
                    echo number_format(($tong), 0, ',', '.') ;
                }
                 ?> ₫</h5>
            </div>
            
            <?php
            if($giamgia>0 && $tong > 0){
                echo '<div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded" style="justify-content: space-between;"><h6 class="text-danger">Ưu đãi: '.$giamGiaText.'</h6></div>';
            }
             ?>
            
            </form>

        </div>
    </div>
</div>
<script>


document.getElementById('order').addEventListener('submit', function(event) {
    var fullName = document.getElementById('fullName').value;
    var phone = document.getElementById('phone').value;
    var address = document.getElementById('address').value;
    var note = document.getElementById('note').value;
    var array=[fullName,note,phone,address];
    var check=true;
    for (let i = 0; i < array.length; i++) {
        let value  = array[i];
        const hasHTML = /<\/?[^>]+(>|$)/.test(value );
        const hasSQL = /(\b(SELECT|INSERT|UPDATE|DELETE|DROP|TRUNCATE|ALTER|CREATE|GRANT|REVOKE|UNION|EXEC)\b)/i.test(value );
        const hasPHP = /<\?php|<\?|<%|<\%/i.test(value );
        if (hasHTML ) {
            errorMessage.textContent = 'Vui lòng không nhập mã HTML vào ô input.';
            check=false
            break;
        }else if(hasSQL ){
        errorMessage.textContent = 'Vui lòng không nhập mã SQL vào ô input.';
        check=false
        break;
        } else if(hasPHP ){
        errorMessage.textContent = 'Vui lòng không nhập mã PHP vào ô input.';
        check=false
        break;
    } else {
            errorMessage.textContent = '';  
        }
    }
    if(!check){
        console.log('bc');
        event.preventDefault();
    }
});


   function reloadOnMinuteChange() {
    const currentDate = new Date();
    const currentMinute = currentDate.getMinutes();
    
    localStorage.setItem('currentMinute', currentMinute);

    setTimeout(checkMinuteChange, 1000);
}

function checkMinuteChange() {
    const currentDate = new Date();
    const currentMinute1 = currentDate.getMinutes();
    const storedMinute = localStorage.getItem('currentMinute');
    if (currentMinute1 != storedMinute) {
        location.reload(); 
    } else {
        setTimeout(checkMinuteChange, 1000);
    }
}
reloadOnMinuteChange();
  </script>
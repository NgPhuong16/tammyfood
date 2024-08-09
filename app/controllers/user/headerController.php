<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
// date_default_timezone_set('America/New_York');
$currentDate = new DateTime();
$hours = (int)$currentDate->format('H');
$minutes = (int)$currentDate->format('i');
$totalMinutes = $hours * 60 + $minutes;
if(isset($_SESSION['user'])){
    $checkAccLive=checkAccLive($_SESSION['user']['id_user']);
    if(!$checkAccLive){
        session_unset();
        header("Location: index.php?type=home&ban=1");
    }
}
if (isset($_GET['ban'])) {
    echo "<script>alert('Tài khoản của bạn đã bị vô hiệu hóa')</script>";
}
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (isset($_POST['add-to-cart-btn'])) {
    $addonArray1 = [];
    if(isset($_GET['id'])){
        $getNumberAddonProductById = getNumberAddonProductById($_GET['id']);
        if (count($getNumberAddonProductById) > 0) {
            foreach ($getNumberAddonProductById as $key) {
                $id = $key['listaddon'];
                if ($_POST['' . $id . ''] > 0) {
                    array_push($addonArray1, $_POST['' . $id . '']);
                }
            }
        }
    }
    $id_product = $_POST['id_product'];
    $nameProduct = $_POST['nameProduct'];
    $price = $_POST['price'];
    if (count($addonArray1) > 0) {
        $priceAddon = priceAddon($addonArray1);
        $price = $price + $priceAddon['price_addon'];
    }
    $imageCover = $_POST['imageCover'];
    $quantity = $_POST['quantity'];
    $idCategory = $_POST['idCategory'];
    if (count($_SESSION['cart']) == 0) {
        $cartmini = ['id_product' => $id_product, 'nameProduct' => $nameProduct, 'price' => $price, 'imageCover' => $imageCover, 'quantity' => $quantity, 'idCategory' => $idCategory, 'total' => ($price * $quantity), 'addonArray1' => $addonArray1];
        $_SESSION['cart'][] = $cartmini;
    } else {
        $check = 0;
        for ($i = 0; $i < count($_SESSION['cart']); $i++) {
            $item = $_SESSION['cart'][$i];
            if ($id_product == $item['id_product'] && serialize($addonArray1) === serialize($item['addonArray1'])) {
                $_SESSION['cart'][$i]['quantity'] = $quantity + $item['quantity'];
                $_SESSION['cart'][$i]['total'] = $_SESSION['cart'][$i]['quantity'] * $item['price'];
                $check = 1;
                break;
            }
        }
        if ($check == 0) {
            $cartmini = ['id_product' => $id_product, 'nameProduct' => $nameProduct, 'price' => $price, 'imageCover' => $imageCover, 'quantity' => $quantity, 'idCategory' => $idCategory, 'total' => ($price * $quantity), 'addonArray1' => $addonArray1];
            $_SESSION['cart'][] = $cartmini;
        }
    }
    header("Location: index.php?type=cart");
}
if(isset($_POST['regis-btn'])){
    $check=checkMailExist($_POST['email']);
    if($check){
        $_SESSION['standBy']=['fullName'=>$_POST['fullName'], 'email'=>$_POST['email'], 'password'=>$_POST['password'], 'phone'=>$_POST['phone'], 'linkFaceBook'=>$_POST['linkFaceBook'], 'address'=>$_POST['address']];
        header('Location: app/models/user/regiscode.php?email='.$_POST['email'].'');
    }else{
        echo "<script>alert('Email này đã được đăng ký!')</script>";
    }
}
if(isset($_POST['reset-pass-btn'])){
    $check=checkMailExist($_POST['email']);
    if($check){
        echo "<script>alert('Email này không tồn tại!')</script>";
    }else{
            header('Location: app/models/user/resetpass.php?email='.$_POST['email'].'');
    }
}
if(isset($_POST['new-pass-btn'])){
    $check=checkMailExist($_POST['email']);
    if($check){
        echo "<script>alert('Email này không tồn tại!')</script>";
    }else{
        deleteTokens($_POST['email']);
        changePass($_POST['email'],$_POST['password']);
        header("Location: index.php?type=login");
    }
}
if(isset($_POST['login-btn'])){
    $check=dangNhap($_POST['email'], $_POST['password']);
    if($check){
        header('Location: index.php?type=home');
    }else{
        echo "<script>alert('Sai thông tin đăng nhập!')</script>";
    }
}
if(isset($_POST['login-btn-admin'])){
    $check=dangNhapAdmin($_POST['email'], $_POST['password']);
    if($check){
        header('Location: index.php?type=home');
    }else{
        echo "<script>alert('Sai thông tin đăng nhập!')</script>";
    }
}
if(isset($_GET['logout'])){
    switch ($_GET['logout']) {
        case 'request':
            echo'<script>
    if (confirm("Bạn có chắc chắn muốn đăng xuất không?")) {
        window.location.href = "index.php?type=home&logout=confirm"; 
    } 
    </script>';
            break;
            case 'confirm':
                session_unset();
                header("Location: index.php?type=home");
                break;
        default:
        echo'<script>
    if (confirm("Bạn có chắc chắn muốn đăng xuất không?")) {
        window.location.href = "index.php?type=home&logout=confirm"; 
    } 
    </script>';
            break;
    }
}
if(isset($_POST['checkout'])){
    $checkShiftAvai=checkShiftAvai($_POST['shift'],$totalMinutes);
    if(!is_array($checkShiftAvai)){
        header('Location: index.php?type=cart');
    }else{
    $_SESSION['notAvailable']=[];
    $_SESSION['success']=[];
    $groupedItems = [];
    foreach ($_SESSION['cart'] as $item) {
        $idCategory = $item['idCategory'];
        if (!isset($groupedItems[$idCategory])) {
            $groupedItems[$idCategory] = [];
        }
        $groupedItems[$idCategory][] = $item;
    }
    $i=0;
    foreach ($groupedItems as $key1 => $value1) {
        $tong=0;
        foreach ($groupedItems[$key1] as $key) {
            $tong=$tong+$key['total'];
        }
        if($i==0){
            $tong=$tong-$_POST['giamgia'];
        }
        $upOrders=upOrders(8, $_POST['phone'], $_POST['fullName'], $_POST['note'], $_POST['shift'], $_POST['address'],$tong,$key1);
        if(is_array($upOrders)){
            foreach ($groupedItems[$key1] as $key) {
                $upOrderDetails=upOrderDetails($key['id_product'], $upOrders['id_order'], $key['quantity'], $key['total']);
                if(is_array($upOrderDetails)){
                    array_push($_SESSION['success'],$key);
                    foreach ($key['addonArray1'] as $key2) {
                        upOrderDetailsDetails($upOrderDetails['id_orderdetail'], $key2);
                    }
                }else if(!$upOrderDetails){
                    array_push($_SESSION['notAvailable'],$key);
                }
            }
        }
        $i++;
    }
    $_SESSION['success'] = array_values($_SESSION['success']);
    unset($_SESSION['cart']);
    header('Location: index.php?type=checkout');
}
}

include_once("app/views/user/header.view.php");

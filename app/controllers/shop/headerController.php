<?php
if(isset($_SESSION['user'])){
    if($_SESSION['user']['idRole_user']!=3){
        die("File not found!");
    }
    $checkAccLive=checkAccLive1($_SESSION['user']['id_user']);
    if(!$checkAccLive){
        session_unset();
        header("Location: index.php?type=home&ban=1");
    }
    $getStoreById=getStoreById($_SESSION['user']['belongTo']);
}else{
    die("File not found!");
}
if (isset($_GET['ban'])) {
    echo "<script>alert('Tài khoản của bạn đã bị vô hiệu hóa')</script>";
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
date_default_timezone_set('Asia/Ho_Chi_Minh');
// date_default_timezone_set('America/New_York');
$currentDate = new DateTime();
$hours = (int)$currentDate->format('H');
$minutes = (int)$currentDate->format('i');
$totalMinutes = $hours * 60 + $minutes;
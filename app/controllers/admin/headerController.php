<?php
if(isset($_SESSION['user'])){
    if($_SESSION['user']['idRole_user']!=4){
        die("File not found!");
    }
}else{
    die("File not found!");
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
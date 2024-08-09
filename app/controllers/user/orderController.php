<?php
if(isset($_GET['type'])){
    switch ($_GET['type']) {
        case 'checkorder':
            $seeOrdersByDateAndShift2=seeOrdersByDateAndShift2($currentDate->format('Y-m-d'),$_SESSION['user']['id_user']);
            include_once("app/views/user/checkorder.view.php");
            break;
        default:
            # code...
            break;
    }
}
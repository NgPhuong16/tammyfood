<?php
$getShiftNow=getShiftNow($totalMinutes);
if(isset($_GET['type1'])){
    switch ($_GET['type1']) {
        case 'ordertoday':
            $getShiftNow=getShiftNow($totalMinutes);
            if(!is_array($getShiftNow)){
                $getShiftNow=getShiftById(1);
            }
            if(isset($_POST['filter-order-btn'])){
                $getShiftById=getShiftById($_POST['idShift_order']);
                $seeOrdersByDateAndShift = seeOrdersByDateAndShift1($currentDate->format('Y-m-d'),$_POST['idShift_order']);
            }else{
                $getShiftById=getShiftById($getShiftNow['id_shift']);
                $seeOrdersByDateAndShift = seeOrdersByDateAndShift1($currentDate->format('Y-m-d'),$getShiftNow['id_shift']);
            }
            $getAllShift1=getAllShift1();
            $day='hôm nay: ' . $currentDate->format('Y-m-d');
            include_once("app/views/staff/ordershop.view.php");
            break;
        case 'his':
            if(!is_array($getShiftNow)){
                $getShiftNow=getShiftById(1);
            }
            if(isset($_POST['filter-order-btn'])){
                $getShiftById=getShiftById($_POST['idShift_order']);
                $seeOrdersByDateAndShift = seeOrdersByDateAndShift1ForShip($currentDate->format('Y-m-d'),$_POST['idShift_order'],$_SESSION['user']['id_user']);
            }else{
                $getShiftById=getShiftById($getShiftNow['id_shift']);
                $seeOrdersByDateAndShift = seeOrdersByDateAndShift1ForShip($currentDate->format('Y-m-d'),$getShiftNow['id_shift'],$_SESSION['user']['id_user']);
            }
            $getAllShift1=getAllShift1();
            $day='hôm nay: ' . $currentDate->format('Y-m-d');
            include_once("app/views/admin/ordertoday.view.php");
            break;
        default:
            break;
    }
}else{
    if(isset($_POST['filter-order-btn'])){
        $getShiftById=getShiftById($_POST['idShift_order']);
            $seeOrdersByDateAndShift = seeOrdersByDateAndShift1ForShip($currentDate->format('Y-m-d'),$_POST['idShift_order'],$_SESSION['user']['id_user']);
    }else{
        if(is_array($getShiftNow)){
            $getShiftById=getShiftById($getShiftNow['id_shift']);
            $seeOrdersByDateAndShift = seeOrdersByDateAndShift1ForShip($currentDate->format('Y-m-d'),$getShiftNow['id_shift'],$_SESSION['user']['id_user']);
        }else{
            $getShiftById=getShiftById(1);
            $seeOrdersByDateAndShift = seeOrdersByDateAndShift1ForShip($currentDate->format('Y-m-d'),1,$_SESSION['user']['id_user']);
        }
    }
    if(isset($_POST['save-status-delivery-btn'])){
            foreach ($_POST['order'] as $key => $value) {
                if(isset($_POST['delivery_status'.$key.''])){                                                                                                                                                                                                                                      
                    updateStatusDelivery(2,$value);
                }else{
                    updateStatusDelivery(1,$value);
                }
            }
            if(is_array($getShiftNow)){
            $seeOrdersByDateAndShift = seeOrdersByDateAndShift1ForShip($currentDate->format('Y-m-d'),$getShiftNow['id_shift'],$_SESSION['user']['id_user']);
            }else{
            $seeOrdersByDateAndShift = seeOrdersByDateAndShift1ForShip($currentDate->format('Y-m-d'),1,$_SESSION['user']['id_user']);
            }
        }
    $getShiftPass=getShiftPass($totalMinutes);
    include_once("app/views/staff/ordertoday.view.php");
}

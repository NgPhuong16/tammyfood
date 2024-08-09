<?php
if(!is_array($checkinYet)){
    header("Location: index.php?type=home");
}
$getShiftNow=getShiftNow($totalMinutes);
if(is_array($getShiftNow)){
    if(isset($_POST['take-order-btn'])){
        if(isset($_POST['idOrders'])){
            foreach ($_POST['idOrders'] as $key => $value) {
                updateShipOrder($value,$_SESSION['user']['id_user']);
               }
        }
    }
    if(isset($_POST['filter-order-btn'])){
        $getShiftById=getShiftById($_POST['idShift_order']);
        $seeOrdersByDateAndShift = seeOrdersByDateAndShift1Ship($currentDate->format('Y-m-d'),$_POST['idShift_order']);
        $seeOrdersByDateAndShift1 = seeOrdersByDateAndShift1Ship12($currentDate->format('Y-m-d'),$_POST['idShift_order'],$_SESSION['user']['id_user']);
    }else{
        $getShiftById=getShiftById($getShiftNow['id_shift']);
        $seeOrdersByDateAndShift1 = seeOrdersByDateAndShift1Ship12($currentDate->format('Y-m-d'),$getShiftNow['id_shift'],$_SESSION['user']['id_user']);
        $seeOrdersByDateAndShift = seeOrdersByDateAndShift1Ship($currentDate->format('Y-m-d'),$getShiftNow['id_shift']);
    }
}


$getAllStaffByShop=getAllStaffByShop();
$getShiftPass=getShiftPass($totalMinutes);
$day='hôm nay: ' . $currentDate->format('Y-m-d');
include_once("app/views/staff/takeorder.view.php");
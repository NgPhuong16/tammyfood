<?php
$getAllStore=getAllStore();
if(isset($_GET['type1'])){
    switch ($_GET['type1']) {
        case 'orderlist':
            $getStoreById=getStoreById($_GET['id']);
            $getAllOrderByShop = getAllOrderByShop($_GET['id']);
            include_once("app/views/admin/order.view.php");
            break;
        case 'seeorder':
            if(isset($_POST['timeOrder'])){$day=$_POST['timeOrder'];}
            $getShiftById=getShiftById(1);
            if(isset($_POST['see-order-btn'])){
                $seeOrdersByDateAndShift=seeOrdersByDateAndShift($_POST['timeOrder'],1,$_GET['id']);
            }
            if(isset($_POST['filter-order-btn'])){
                $getShiftById=getShiftById($_POST['idShift_order']);
                $seeOrdersByDateAndShift = seeOrdersByDateAndShift($_POST['timeOrder'],$_POST['idShift_order'],$_GET['id']);
            }
            $getAllShift1=getAllShift1();
            
            include_once("app/views/admin/ordertoday.view.php");
            break;
            case 'ordertoday':
                $getShiftNow=getShiftNow($totalMinutes);
                if(!is_array($getShiftNow)){
                    $getShiftNow=getShiftById(1);
                }
                if(isset($_POST['filter-order-btn'])){
                    $getShiftById=getShiftById($_POST['idShift_order']);
                    $seeOrdersByDateAndShift = seeOrdersByDateAndShift($currentDate->format('Y-m-d'),$_POST['idShift_order'],$_GET['id']);
                }else{
                    $getShiftById=getShiftById($getShiftNow['id_shift']);
                    $seeOrdersByDateAndShift = seeOrdersByDateAndShift($currentDate->format('Y-m-d'),$getShiftNow['id_shift'],$_GET['id']);
                }
                $getAllShift1=getAllShift1();
                $day='hôm nay: ' . $currentDate->format('Y-m-d');
                include_once("app/views/admin/ordertoday.view.php");
                break;
                case 'confirm':
                    $getShiftNow=getShiftNow($totalMinutes);
                    if(is_array($getShiftNow)){
                        if(isset($_POST['send-shipper-btn'])){
                            if(isset($_POST['idOrders'])){
                                foreach ($_POST['idOrders'] as $key => $value) {
                                    updateShipOrder($value,$_POST['idShip_order']);
                                   }
                            }
                        }
                        if(isset($_POST['filter-order-btn'])){
                            $getShiftById=getShiftById($_POST['idShift_order']);
                            $seeOrdersByDateAndShift = seeOrdersByDateAndShift1Ship($currentDate->format('Y-m-d'),$_POST['idShift_order']);
                            $seeOrdersByDateAndShift1 = seeOrdersByDateAndShift1Ship1($currentDate->format('Y-m-d'),$_POST['idShift_order']);
                        }else{
                            $getShiftById=getShiftById($getShiftNow['id_shift']);
                            $seeOrdersByDateAndShift1 = seeOrdersByDateAndShift1Ship1($currentDate->format('Y-m-d'),$getShiftNow['id_shift']);
                            $seeOrdersByDateAndShift = seeOrdersByDateAndShift1Ship($currentDate->format('Y-m-d'),$getShiftNow['id_shift']);
                        }
                    }
                   
                   
                    $getAllStaffByShop=getAllStaffByShop();
                    $getShiftPass=getShiftPass($totalMinutes);
                    $day='hôm nay: ' . $currentDate->format('Y-m-d');
                    include_once("app/views/admin/orderforship.view.php");
                    break;
        default:
            break;
    }
}else{
    include_once("app/views/admin/products.view.php");
}
<?php
// if(isset($_GET['type1'])){
//     switch ($_GET['type1']) {
//             case 'seeorder':
//                 $getShiftById=getShiftById(1);
//                 if(isset($_POST['see-order-btn'])){
//                     $seeOrdersByDateAndShift=seeOrdersByDateAndShift($_POST['timeOrder'],1,$_GET['id']);
//                 }
//                 if(isset($_POST['filter-order-btn'])){
//                     $getShiftById=getShiftById($_POST['idShift_order']);
//                     $seeOrdersByDateAndShift = seeOrdersByDateAndShift($_POST['timeOrder'],$_POST['idShift_order'],$_GET['id']);
//                 }
//                 $getAllShift1=getAllShift1();
//                 include_once("app/views/admin/seeorder.view.php");
//                 break;
//             case 'ordertoday':
//                 break;
//         default:
//             break;
//     }
// }else{
// }
$getShiftNow=getShiftNow($totalMinutes);
    if(isset($_GET['type1'])){
        switch ($_GET['type1']) {
            case 'order':
                if(isset($_POST['save-status-btn'])){
                    foreach ($_POST['order'] as $key => $value) {
                        if(isset($_POST['status_order'.$key.''])){                                                                                                                                                                                                                                      
                            updateStatusOrder(2,$value);
                        }else{
                            updateStatusOrder(1,$value);
                        }
                    }
                    $seeOrdersByDateAndShift = seeOrdersByDateAndShift($currentDate->format('Y-m-d'),$getShiftNow['id_shift'],$_SESSION['user']['belongTo']);
                }
                    if(isset($_POST['filter-order-btn'])){
                        $getShiftById=getShiftById($_POST['idShift_order']);
                        $seeOrdersByDateAndShift = seeOrdersByDateAndShift($currentDate->format('Y-m-d'),$_POST['idShift_order'],$_SESSION['user']['belongTo']);
                    }else{
                if(is_array($getShiftNow)){

                        $getShiftById=getShiftById($getShiftNow['id_shift']);
                        $seeOrdersByDateAndShift = seeOrdersByDateAndShift($currentDate->format('Y-m-d'),$getShiftNow['id_shift'],$_SESSION['user']['belongTo']);
                    }else{
                        $getShiftById=getShiftById(1);
                        $seeOrdersByDateAndShift = seeOrdersByDateAndShift($currentDate->format('Y-m-d'),$getShiftNow['id_shift'],$_SESSION['user']['belongTo']);
                    }
                }

                    
                $getAllShift1=getAllShift2();
                include_once("app/views/shop/ordertoday.view.php");
                break;
            case 'order1':
                    if(!is_array($getShiftNow)){
                        $getShiftNow=getShiftById(1);
                    }
                    if(isset($_POST['filter-order-btn'])){
                        $getShiftById=getShiftById($_POST['idShift_order']);
                        $seeOrdersByDateAndShift = seeOrdersByDateAndShift($currentDate->format('Y-m-d'),$_POST['idShift_order'],$_SESSION['user']['belongTo']);
                    }else{
                        $getShiftById=getShiftById($getShiftNow['id_shift']);
                        $seeOrdersByDateAndShift = seeOrdersByDateAndShift($currentDate->format('Y-m-d'),$getShiftNow['id_shift'],$_SESSION['user']['belongTo']);
                    }
                    $getAllShift1=getAllShift1();
                    $day='hôm nay: ' . $currentDate->format('Y-m-d');
                    include_once("app/views/admin/ordertoday.view.php");
                    break;
           
                    
            default:
            include_once("app/views/shop/ordertoday.view.php");
                break;
        }
    }
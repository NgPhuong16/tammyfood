<?php
if(isset($_GET['type1'])){
    switch ($_GET['type1']) {
        case 'addshop':
            if(isset($_POST['add-shop-btn'])){
                addStore($_POST['nameCategory'], $_POST['imageCategory']);
            }
            $getAllStore1=getAllStore1();
            include_once("app/views/admin/addshop.view.php");
            break;
            case 'fixshop':
                if(isset($_POST['fix-shop-btn'])){
                    echo $_POST['nameCategory'];
                    updateStore($_POST['nameCategory'],$_POST['imageCategory'],$_GET['id']);
                }
                $getStoreById=getStoreById($_GET['id']);
                include_once("app/views/admin/fixshop.view.php");
                break;
        default:
            # code...
            break;
    }
}else{
    if(isset($_GET['del'])){
        delStore($_GET['del']);
    }
    $getAllStore1=getAllStore1();
include_once("app/views/admin/shop.view.php");
}
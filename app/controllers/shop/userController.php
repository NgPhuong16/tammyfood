<?php
if(isset($_GET['delad'])){
    updateStaff(1,$_GET['delad'],$getStoreById['id_category']);
}else if(isset($_GET['atad'])){
    updateStaff(0,$_GET['atad'],$getStoreById['id_category']);
}
$getAllStaffByShop=getAllStaffByShop($getStoreById['id_category']);
    include_once("app/views/shop/user.view.php");

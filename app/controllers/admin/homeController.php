<?php
if (isset($_SESSION['user'])){
    if ($_SESSION['user']['idRole_user']==4){
        $getInCome = getInCome();
        $getNumsAllCustomers=getNumsAllCustomers();
        $getNumsAllProducts=getNumsAllProducts();
        $getNumsAllOrders=getNumsAllOrders();
        $getNumsAllOrdersToday=getNumsAllOrdersToday($currentDate->format('Y-m-d'));
        $getNumsAllOrdersTodayConfirm=getNumsAllOrdersTodayConfirm($currentDate->format('Y-m-d'));
    }elseif($_SESSION['user']['idRole_user']==3){
        $getInCome = getInCome($_SESSION['user']['belongTo']);
        $getNumsAllCustomers=getNumsAllCustomers();
        $getNumsAllProducts=getNumsAllProducts($_SESSION['user']['belongTo']);
        $getNumsAllOrders=getNumsAllOrders($_SESSION['user']['belongTo']);
        $getNumsAllOrdersToday=getNumsAllOrdersToday($currentDate->format('Y-m-d'),$_SESSION['user']['belongTo']);
        $getNumsAllOrdersTodayConfirm=getNumsAllOrdersTodayConfirm($currentDate->format('Y-m-d'),$_SESSION['user']['belongTo']);
    }
}

include_once("app/views/admin/home.view.php");
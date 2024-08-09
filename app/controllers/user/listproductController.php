<?php
$getStoreById=getStoreById($_GET['id']);
$getListProductByStore=getListProductByStore($_GET['id']);
include_once("app/views/user/listproduct.view.php");
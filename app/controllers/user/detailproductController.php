<?php

$getProductById = getProductById($_GET['id']);
if (is_array($getProductById)) {
    $addonArray = [];
    $getNumberAddonProductById = getNumberAddonProductById($_GET['id']);
    foreach ($getNumberAddonProductById as $key) {
        $getAddonProductById = getAddonProductById($_GET['id'], $key['listaddon']);
        array_push($addonArray, $getAddonProductById);
    }
}
include_once("app/views/user/detailproduct.view.php");

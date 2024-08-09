<?php
$getAllStore=getAllStore();
if(isset($_GET['type1'])){
    switch ($_GET['type1']) {
        case 'productlist':
            if(isset($_GET['detail'])){

            }else if(isset($_GET['hide'])){
                switchHide($_GET['hide']);
            }else if(isset($_GET['display'])){
                switchDisplay($_GET['display']);
            }else if(isset($_GET['del'])){
                delProduct($_GET['del']);
            }
            $getStoreById=getStoreById($_GET['id']);
            $getListProductByStoreAll=getListProductByStoreAll($_GET['id']);
            include_once("app/views/admin/productlist.view.php");
            break;
        case 'fixproduct':
            if(isset($_GET['del'])){
                delAddon($_GET['del']);
            }
            if(isset($_POST['add-addon-btn'])){
                addAddon($_POST['name_addon'], $_POST['idCategory_addon'], $_GET['id'], $_POST['price_addon']);
            }
            if(isset($_POST['save-addon-btn'])){
                updateAddon($_POST['name_addon'], $_POST['price_addon'], $_POST['id_addon']);
            }
            if(isset($_POST['fix-product-btn'])){
                updateProduct($_GET['id'],$_POST['nameProduct'],$_POST['description'],$_POST['original_price'] , $_POST['price'],$_POST['imageCover']);
            }
            $getProductByIdAll=getProductByIdAll($_GET['id']);
            if (is_array($getProductByIdAll)) {
                $addonArray = [];
                $getNumberAddonProductById = getNumberAddonProductById($_GET['id']);
                foreach ($getNumberAddonProductById as $key) {
                    $getAddonProductById = getAddonProductById($_GET['id'], $key['listaddon']);
                    array_push($addonArray, $getAddonProductById);
                }
            }
            $getAllAddonCategories=getAllAddonCategories();
            include_once("app/views/admin/productfix.view.php");
            break;
            case 'addproduct':
                if(isset($_POST['add-product-btn'])){
                    addProduct($_POST['nameProduct'], $_POST['description'], $_POST['idCategory'], $_POST['original_price'],$_POST['price'], $_POST['imageCover']);
                }
                
                $getAllStore1=getAllStore1();
            include_once("app/views/admin/addproduct.view.php");
            break;
        default:
            break;
    }
}else{
    include_once("app/views/admin/products.view.php");
}
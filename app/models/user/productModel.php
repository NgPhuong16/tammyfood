<?php
function getAllStore()
{
    $sql = "WITH RankedProducts AS (
        SELECT 
            c.id_category, 
            c.nameCategory, 
            c.imageCategory, 
            c.del_category, 
            p.id_product, 
            p.nameProduct, 
            p.description, 
            p.idCategory, 
            p.price,
            ROW_NUMBER() OVER (PARTITION BY p.idCategory ORDER BY p.price ASC, p.id_product ASC) AS rnk
        FROM categories c
        INNER JOIN products p ON c.id_category = p.idCategory
        WHERE c.del_category = 0 AND p.emptyProduct=0
    )
    SELECT 
        id_category, 
        nameCategory,
        imageCategory, 
        del_category, 
        id_product, 
        nameProduct, 
        description, 
        idCategory, 
        price
    FROM RankedProducts
    WHERE rnk = 1;";
    return pdo_query($sql);
}
function getAllStore1()
{
    $sql="SELECT * FROM categories WHERE del_category=0";
    return pdo_query($sql);
}
function getStoreById($id)
{
    $sql = "SELECT * FROM categories WHERE id_category=$id AND del_category=0";
    return pdo_query_one($sql);
}
function delStore($id){
    $sql="UPDATE categories SET del_category=1 WHERE id_category=$id";
    return pdo_execute($sql);
}
function addStore($nameCategory, $imageCategory){
    $sql="INSERT INTO categories( nameCategory, imageCategory) VALUES ( '$nameCategory', '$imageCategory')";
    return pdo_execute($sql);
}
function updateStore($nameCategory,$imageCategory,$id){
    $sql="UPDATE categories SET nameCategory='$nameCategory',imageCategory='$imageCategory' WHERE id_category=$id";
    return pdo_execute($sql);
}
function getListProductByStore($id)
{
    $sql = "SELECT * FROM products INNER JOIN categories ON products.idCategory=categories.id_category  WHERE idCategory=$id AND del_product=0 AND emptyProduct=0 AND del_category=0";
    return pdo_query($sql);
}
function getListProductByStoreAll($id)
{
    $sql = "SELECT * FROM products INNER JOIN categories ON products.idCategory=categories.id_category  WHERE idCategory=$id AND del_product=0  AND del_category=0 ORDER BY emptyProduct";
    return pdo_query($sql);
}
function getProductById($id)
{
    $sql = "SELECT * FROM products INNER JOIN categories ON products.idCategory=categories.id_category  WHERE id_product=$id AND del_product=0 AND emptyProduct=0 AND del_category=0";
    return pdo_query_one($sql);
}
function getProductByIdAll($id)
{
    $sql = "SELECT * FROM products INNER JOIN categories ON products.idCategory=categories.id_category  WHERE id_product=$id AND del_product=0  AND del_category=0";
    return pdo_query_one($sql);
}
function addProduct($nameProduct, $description, $idCategory, $original_price, $price, $imageCover){
    $sql="INSERT INTO products( nameProduct, description, idCategory, original_price, price, imageCover) VALUES ('$nameProduct', '$description', $idCategory, $original_price, $price, '$imageCover')";
    return pdo_execute($sql);
}
function switchHide($id)
{
    $sql = "UPDATE products SET emptyProduct=1 WHERE id_product=$id";
    return pdo_execute($sql);
}
function switchDisplay($id)
{
    $sql = "UPDATE products SET emptyProduct=0 WHERE id_product=$id";
    return pdo_execute($sql);
}
function delProduct($id)
{
    $sql = "UPDATE products SET del_product=1 WHERE id_product=$id";
    return pdo_execute($sql);
}
function updateProduct($id, $nameProduct, $description,$original_price, $price, $imageCover)
{
    $sql = "UPDATE products SET nameProduct='$nameProduct',description='$description', original_price=$original_price,price=$price,imageCover='$imageCover' WHERE id_product=$id";
    return pdo_execute($sql);
}
function getAddonProductById($id, $idCategory_addon)
{
    $sql = "SELECT * FROM addon INNER JOIN addon_categories ON addon.idCategory_addon=addon_categories.id_addon_category WHERE idProduct_addon=$id AND idCategory_addon=$idCategory_addon AND del_addon=0 AND del_addon_categories=0";
    return pdo_query($sql);
}
function addAddon($name_addon, $idCategory_addon, $idProduct_addon, $price_addon)
{
    $sql = "INSERT INTO addon( name_addon, idCategory_addon, idProduct_addon, price_addon) VALUES ('$name_addon', $idCategory_addon, $idProduct_addon, $price_addon)";
    return pdo_execute($sql);
}
function updateAddon($name_addon, $price_addon, $id_addon)
{
    $sql = "UPDATE addon SET name_addon='$name_addon',price_addon=$price_addon WHERE id_addon=$id_addon";
    return pdo_execute($sql);
}
function delAddon($id)
{
    $sql = "UPDATE addon SET del_addon=1 WHERE id_addon=$id";
    return pdo_execute($sql);
}
function getAllAddonCategories($idShop=0)
{
    if($idShop == 0){
        $sql = "SELECT * FROM addon_categories WHERE del_addon_categories=0";
    }else{
        $sql = "SELECT * FROM addon_categories WHERE id_shop=$idShop AND del_addon_categories = 0";
    }
    return pdo_query($sql);
}
function updateAddonCategories($name_addon_categories, $id_addon_category)
{
    $sql = "UPDATE addon_categories SET name_addon_categories='$name_addon_categories' WHERE id_addon_category=$id_addon_category";
    return pdo_execute($sql);
}
function addAddonCategories($name_addon_categories)
{
    $sql = "INSERT INTO addon_categories(name_addon_categories) VALUES ('$name_addon_categories')";
    return pdo_execute($sql);
}
function delAddonCategories($id_addon_category)
{
    $sql = "UPDATE addon_categories SET del_addon_categories=1 WHERE id_addon_category=$id_addon_category";
    return pdo_execute($sql);
}
function getNumberAddonProductById($id)
{
    $sql = "SELECT DISTINCT idCategory_addon as 'listaddon' FROM addon INNER JOIN addon_categories ON addon.idCategory_addon=addon_categories.id_addon_category WHERE idProduct_addon=$id";
    return pdo_query($sql);
}
function priceAddon($array)
{
    $sql = "SELECT SUM(price_addon) as 'price_addon' FROM addon WHERE id_addon IN (";
    $i = 1;
    foreach ($array as $key) {
        if ($i == 1) {
            $sql .= "$key";
        } else {
            $sql .= ",$key";
        }
        if ($i == count($array)) {
            $sql .= ")";
        }
        $i++;
    }
    return pdo_query_one($sql);
}
function addon_name($array)
{
    if (count($array) > 0) {
        $sql = "SELECT * FROM addon INNER JOIN addon_categories  ON addon.idCategory_addon=addon_categories.id_addon_category  WHERE id_addon IN (";
        $i = 1;
        foreach ($array as $key) {
            if ($i == 1) {
                $sql .= "$key";
            } else {
                $sql .= ",$key";
            }
            if ($i == count($array)) {
                $sql .= ")";
            }
            $i++;
        }
        return pdo_query($sql);
    } else {
        return true;
    }
}

function getAddonByIdOrderdetail($idOrderdetails_detail){
    $sql="SELECT * FROM orderdetails_details INNER JOIN addon ON addon.id_addon=orderdetails_details.idAddon_detail  WHERE 	idOrderdetails_detail=$idOrderdetails_detail";
    return pdo_query($sql);
}

function getVoucherById($id){
    $sql="SELECT * FROM vouchers WHERE id_voucher=$id AND del_voucher=0";
    return pdo_query_one($sql);
}

// function getAllAddonCategoriesByProduct(){
//     $sql="SELECT * FROM addon_categories WHERE del_addon_categories=0";
//     return pdo_query($sql);
// }
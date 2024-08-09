<?php
function seeOrdersByDateAndShift($date1,$shift,$idCategory_order){
    $date = new DateTime($date1);
    $day = $date->format('d');
    $month = $date->format('m');
    $year = $date->format('Y');
        $sql="SELECT * FROM orders INNER JOIN users ON users.id_user=orders.idUser_order INNER JOIN status ON status.id_status=orders.status_order INNER JOIN delivery ON delivery.id_delivery=orders.delivery_status WHERE YEAR(timeOrder)=$year AND MONTH(timeOrder)=$month AND DAY(timeOrder)=$day AND idShift_order=$shift AND idCategory_order=$idCategory_order ";
    return pdo_query($sql);
}
function seeOrdersByDateAndShift1($date1,$shift){
    $date = new DateTime($date1);
    $day = $date->format('d');
    $month = $date->format('m');
    $year = $date->format('Y');
        $sql="SELECT * FROM orders INNER JOIN users ON users.id_user=orders.idUser_order INNER JOIN categories ON categories.id_category=orders.idCategory_order  INNER JOIN status ON status.id_status=orders.status_order INNER JOIN delivery ON delivery.id_delivery=orders.delivery_status WHERE YEAR(timeOrder)=$year AND MONTH(timeOrder)=$month AND DAY(timeOrder)=$day AND idShift_order=$shift  ORDER BY id_category DESC";
    return pdo_query($sql);
}
function seeOrdersByDateAndShift2($date1,$idUser_order){
    $date = new DateTime($date1);
    $day = $date->format('d');
    $month = $date->format('m');
    $year = $date->format('Y');
        $sql="SELECT * FROM orders  INNER JOIN shift ON orders.idShift_order=shift.id_shift  INNER JOIN users ON users.id_user=orders.idUser_order INNER JOIN status ON status.id_status=orders.status_order INNER JOIN delivery ON delivery.id_delivery=orders.delivery_status WHERE YEAR(timeOrder)=$year AND MONTH(timeOrder)=$month AND DAY(timeOrder)=$day  AND idUser_order=$idUser_order ";
    return pdo_query($sql);
}
function seeOrdersByDateAndShift1Ship($date1,$shift){
    $date = new DateTime($date1);
    $day = $date->format('d');
    $month = $date->format('m');
    $year = $date->format('Y');
        $sql="SELECT * FROM orders INNER JOIN users ON users.id_user=orders.idUser_order INNER JOIN status ON status.id_status=orders.status_order INNER JOIN delivery ON delivery.id_delivery=orders.delivery_status WHERE YEAR(timeOrder)=$year AND MONTH(timeOrder)=$month AND DAY(timeOrder)=$day AND idShift_order=$shift AND idShip_order=3 AND status_order=2  ";
    return pdo_query($sql);
}
function seeOrdersByDateAndShift1Ship1($date1,$shift){
    $date = new DateTime($date1);
    $day = $date->format('d');
    $month = $date->format('m');
    $year = $date->format('Y');
        $sql="SELECT *,users_1.fullName as 'shipName',users.fullName as 'userName' FROM orders INNER JOIN users ON users.id_user=orders.idUser_order INNER JOIN users_1 ON users_1.id_user=orders.idShip_order INNER JOIN status ON status.id_status=orders.status_order INNER JOIN delivery ON delivery.id_delivery=orders.delivery_status WHERE YEAR(timeOrder)=$year AND MONTH(timeOrder)=$month AND DAY(timeOrder)=$day AND idShift_order=$shift  AND idShip_order!=3 AND status_order=2";
    return pdo_query($sql);
}
function seeOrdersByDateAndShift1Ship12($date1,$shift,$id){
    $date = new DateTime($date1);
    $day = $date->format('d');
    $month = $date->format('m');
    $year = $date->format('Y');
        $sql="SELECT *,users_1.fullName as 'shipName',users.fullName as 'userName' FROM orders INNER JOIN users ON users.id_user=orders.idUser_order INNER JOIN users_1 ON users_1.id_user=orders.idShip_order INNER JOIN status ON status.id_status=orders.status_order INNER JOIN delivery ON delivery.id_delivery=orders.delivery_status WHERE YEAR(timeOrder)=$year AND MONTH(timeOrder)=$month AND DAY(timeOrder)=$day AND idShift_order=$shift  AND idShip_order!=3 AND status_order=2 AND users_1.id_user=$id";
    return pdo_query($sql);
}
function seeOrdersByDateAndShift1ForShip($date1,$shift,$idShip_order){
    $date = new DateTime($date1);
    $day = $date->format('d');
    $month = $date->format('m');
    $year = $date->format('Y');
        $sql="SELECT * FROM orders INNER JOIN users ON users.id_user=orders.idUser_order  INNER JOIN status ON status.id_status=orders.status_order INNER JOIN delivery ON delivery.id_delivery=orders.delivery_status WHERE YEAR(timeOrder)=$year AND MONTH(timeOrder)=$month AND DAY(timeOrder)=$day AND idShift_order=$shift  AND idShip_order=$idShip_order AND status_order=2 ORDER BY address_order DESC";
    return pdo_query($sql);
}


function getOrderDetailByIdOrder($idOrder_orderdetail){
    $sql="SELECT * FROM orderdetails INNER JOIN products ON products.id_product=orderdetails.idProduct_orderdetail  WHERE idOrder_orderdetail = $idOrder_orderdetail  ";
    return pdo_query($sql);
}
function updateStatusOrder($status_order,$id_order){
    $sql="UPDATE orders SET status_order=$status_order WHERE id_order=$id_order";
    return pdo_execute($sql);

}
function updateStatusDelivery($delivery_status,$id_order){
    $sql="UPDATE orders SET delivery_status=$delivery_status WHERE id_order=$id_order";
    return pdo_execute($sql);

}
function updateShipOrder($id,$idShip){
    $sql="UPDATE orders SET idShip_order=$idShip WHERE id_order=$id";
    return pdo_execute($sql);
}
<?php
function dangKyAdmin($fullName, $email, $password, $phone, $idRole_user,$belongTo){
    echo $belongTo;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    if($idRole_user == 4){
        $sql="INSERT INTO users_1(fullName, email, password, phone, idRole_user, belongTo) VALUES ('$fullName', '$email', '$hashedPassword', '$phone', $idRole_user,6)";
    }else{
    $sql="INSERT INTO users_1(fullName, email, password, phone, idRole_user, belongTo) VALUES ('$fullName', '$email', '$hashedPassword', '$phone', $idRole_user,$belongTo)";
    }
    return pdo_execute($sql);
}
function checkMailExistAdmin($email){
$sql="SELECT * FROM users_1 WHERE email='$email'";
$check=pdo_query_one($sql);
if(is_array($check)){
    return false;
}else{
    return true;
}
}
function dangNhapAdmin($email, $password){
$sql="SELECT * FROM users_1 WHERE email='$email'";
$user=pdo_query_one($sql);
if (is_array($user) && password_verify($password, $user['password'])) {
    $_SESSION['user']=$user;
    return true;
}else{
    return false;
}
}
function getInCome($idShop = 0){
    if($idShop == 0){
        $sql = "SELECT orderdetails.quantity, products.price, products.original_price, orders.idCategory_order FROM orders 
        INNER JOIN orderdetails on orders.id_order=orderdetails.idOrder_orderdetail 
        INNER JOIN products on orderdetails.idProduct_orderdetail=products.id_product
        WHERE orders.status_order = 2";
    }else{
        $sql = "SELECT orderdetails.quantity, products.price, products.original_price, orders.idCategory_order FROM orders 
        INNER JOIN orderdetails on orders.id_order=orderdetails.idOrder_orderdetail 
        INNER JOIN products on orderdetails.idProduct_orderdetail=products.id_product
        WHERE orders.status_order = 2 AND orders.idCategory_order= $idShop";
    }
    return pdo_query($sql);

}
function getAllOrderByShop($id){
    $sql="SELECT orders.*, shift.nameShift, status.* FROM orders 
    INNER JOIN shift on orders.idShift_order=shift.id_shift 
    INNER JOIN status on orders.status_order= status.id_status
    WHERE idCategory_order = $id
    ORDER BY timeOrder DESC"
    ;
    return pdo_query($sql);
}

function getAllCustomers(){
        $sql="SELECT * FROM users ";
    return pdo_query($sql);
}
function getNumsAllProducts($idShop = 0){
    if ($idShop == 0){   
        $sql="SELECT count(*) as 'count_products' FROM products WHERE del_product=0";
    }else{
        $sql="SELECT count(*) as 'count_products' FROM products WHERE del_product=0 AND idCategory =".$idShop;
    }
    return pdo_query_one($sql);
}
function getNumsAllCustomers(){
    $sql="SELECT count(*) as 'count_users' FROM users WHERE del_user=0";
    return pdo_query_one($sql);
}
function getNumsAllOrders($idShop = 0){
    if($idShop == 0){
        $sql=" SELECT count(*) as 'count_orders',sum(total_order) as 'total_orders' FROM orders WHERE del_order=0 AND status_order=2";
    }else{
        $sql=" SELECT count(*) as 'count_orders',sum(total_order) as 'total_orders' FROM orders WHERE del_order=0 AND status_order=2 AND idCategory_order =".$idShop;
    }
    return pdo_query_one($sql);
}
function getNumsAllOrdersToday($date1, $idShop = 0){
    $date = new DateTime($date1);
    $day = $date->format('d');
    $month = $date->format('m');
    $year = $date->format('Y');
    if($idShop == 0){
        $sql=" SELECT count(*) as 'count_orders',sum(total_order) as 'total_orders' FROM orders  WHERE YEAR(timeOrder)=$year AND MONTH(timeOrder)=$month AND DAY(timeOrder)=$day AND del_order=0 ";
    }else{
        $sql=" SELECT count(*) as 'count_orders',sum(total_order) as 'total_orders' FROM orders  WHERE YEAR(timeOrder)=$year AND MONTH(timeOrder)=$month AND DAY(timeOrder)=$day AND del_order=0 AND idCategory_order =".$idShop;
    }
    return pdo_query_one($sql);
}
function getNumsAllOrdersTodayConfirm($date1, $idShop = 0){
    $date = new DateTime($date1);
    $day = $date->format('d');
    $month = $date->format('m');
    $year = $date->format('Y');
    if($idShop == 0){
        $sql=" SELECT count(*) as 'count_orders',sum(total_order) as 'total_orders' FROM orders  WHERE YEAR(timeOrder)=$year AND MONTH(timeOrder)=$month AND DAY(timeOrder)=$day AND del_order=0 AND status_order=2";
    }else{
        $sql=" SELECT count(*) as 'count_orders',sum(total_order) as 'total_orders' FROM orders  WHERE YEAR(timeOrder)=$year AND MONTH(timeOrder)=$month AND DAY(timeOrder)=$day AND del_order=0 AND status_order=2 AND idCategory_order =".$idShop;

    }
    return pdo_query_one($sql);
}
function updateCustomer($arg,$id){
    $sql="UPDATE users SET del_user=$arg WHERE id_user=$id";
    return pdo_execute($sql);
}
function updateAdmin($arg,$id){
    $sql="UPDATE users_1 SET del_user=$arg WHERE id_user=$id";
    return pdo_execute($sql);
}

function getAllAdmin(){
    $sql="SELECT * FROM users_1 INNER JOIN categories ON categories.id_category=users_1.belongTo INNER JOIN roles ON  roles.id_role=users_1.idRole_user WHERE  idRole_user!=4 AND email !='none@gmail.com'";
    return pdo_query($sql);
}
function getAllStaffByShop(){
    $sql="SELECT * FROM users_1 INNER JOIN categories ON categories.id_category=users_1.belongTo INNER JOIN roles ON  roles.id_role=users_1.idRole_user WHERE  idRole_user=2  AND email !='none@gmail.com' AND del_user =0 AND id_user IN (SELECT idUser_checkin FROM checkin)";
    return pdo_query($sql);
}
function updateStaff($arg,$id,$id1){
    $sql="UPDATE users_1 SET del_user=$arg WHERE id_user=$id AND idRole_user=2 AND belongTo=$id1 ";
    return pdo_execute($sql);
}
function checkin($id){
    $sql="INSERT INTO checkin( idUser_checkin) VALUES ($id)";
    return pdo_execute($sql);
}
function checkout($id){
    $sql="DELETE checkin FROM checkin WHERE idUser_checkin =$id";
    return pdo_execute($sql);
}
function checkinYet($id){
    $sql="SELECT * FROM checkin INNER JOIN users_1 ON users_1.id_user=checkin.idUser_checkin   WHERE  idUser_checkin=$id  AND users_1.idRole_user=2 AND users_1.del_user=0";
    return pdo_query_one($sql);
}
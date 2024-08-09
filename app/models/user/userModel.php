<?php
function dangKy($fullName, $email, $password, $phone, $linkFaceBook,$address){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql="INSERT INTO users(fullName, email, password, phone, linkFaceBook,address) VALUES ('$fullName', '$email', '$hashedPassword', '$phone', '$linkFaceBook','$address')";
        return pdo_execute($sql);
}
function checkUserFirstInAdd($id,$room){
    $sql="SELECT * FROM users WHERE address like '$room' order by id_user asc LIMIT 1";
    $result = pdo_query_one($sql);
    if($id==$result['id_user']){
        return true;
    }else{
        return false;
    }
}
function checkUserNumberOrder($id){
    $sql="SELECT count(*) as 'numorder' FROM orders WHERE idUser_order = $id  GROUP BY timeOrder";
    $result = pdo_query($sql);
    if(count($result)>=2){
        return false;
    }else{
        return true;
    }
}
function changePass($email,$password){
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql="UPDATE users SET password ='$hashedPassword' WHERE email = '$email'";
    return pdo_execute($sql);
}
function addTokens($email,$token){
    $sql="INSERT INTO resetpass(email, token) VALUES ('$email','$token')";
    return pdo_execute($sql);
}
function checkTokens($email,$token){
    $sql="SELECT * FROM resetpass WHERE email like '$email' AND  token like '$token'";
    return pdo_query_one($sql);
}
function deleteTokens($email){
    $sql="DELETE resetpass FROM resetpass  WHERE email like '$email' ";
    return pdo_query_one($sql);
}
function checkAccLive($id){
    $sql="SELECT * FROM users WHERE id_user=$id";
    $check=pdo_query_one($sql);
    if($check['del_user']==1){
        return false;
    }else{
        return true;
    }
}

function checkAccLive1($id){
    $sql="SELECT * FROM users_1 WHERE id_user=$id";
    $check=pdo_query_one($sql);
    if($check['del_user']==1){
        return false;
    }else{
        return true;
    }
}
function checkMailExist($email){
    $sql="SELECT * FROM users WHERE email='$email'";
    $check=pdo_query_one($sql);
    if(is_array($check)){
        return false;
    }else{
        return true;
    }
}
function dangNhap($email, $password){
    $sql="SELECT * FROM users WHERE email='$email'";
    $user=pdo_query_one($sql);
    if (is_array($user) && password_verify($password, $user['password'])) {
        $_SESSION['user']=$user;
        return true;
    }else{
        return false;
    }
}
function getAllRoles(){
    $sql="SELECT * FROM roles WHERE del_role=0 AND id_role != 1";
    return pdo_query($sql);
}
function upOrders($idUser_order, $phone_order, $fullName_order, $note,$shift,$address_order,$total_order,$idCategory_order){
    $sql="INSERT INTO orders( idUser_order, phone_order, fullName_order, note,idShift_order,address_order,total_order,idCategory_order) VALUES ($idUser_order, '$phone_order', '$fullName_order',' $note',$shift,'$address_order',$total_order,$idCategory_order)";
    $check=pdo_execute($sql);
    if($check){
        $sql="SELECT * FROM orders order by id_order DESC LIMIT 1";
        return pdo_query_one($sql);
    }
    
}
function upOrderDetails($idProduct_orderdetail, $idOrder_orderdetail, $quantity, $total_orderdetail){
    $sql="SELECT * FROM products INNER JOIN categories ON products.idCategory=categories.id_category WHERE id_product=$idProduct_orderdetail AND emptyProduct=0 AND del_product=0 AND del_category=0";
    $result=pdo_query_one($sql);
    if(is_array($result)){
        $sql="INSERT INTO orderdetails( idProduct_orderdetail, idOrder_orderdetail, quantity, total_orderdetail) VALUES ($idProduct_orderdetail, $idOrder_orderdetail, $quantity, $total_orderdetail)";
        $check=pdo_execute($sql);
        if($check){
            $sql="SELECT * FROM orderdetails order by id_orderdetail DESC LIMIT 1";
        return pdo_query_one($sql);
        }
    }else{
        return false;
    }
}

function upOrderDetailsDetails($idOrderdetails_detail, $idAddon_detail){
        $sql="INSERT INTO orderdetails_details( idOrderdetails_detail, idAddon_detail) VALUES ($idOrderdetails_detail, $idAddon_detail)";
        return pdo_execute($sql);
}
function changeInfor($fullName,$phone,$address,$linkFaceBook,$id_user){
    $sql="UPDATE users SET fullName='$fullName',phone='$phone',address='$address',linkFaceBook='$linkFaceBook' WHERE id_user=$id_user";
    pdo_execute($sql);
    $sql="SELECT * FROM users WHERE id_user=$id_user";
    return pdo_query_one($sql);
}

function updateShift($nameShift,$timeLock,$id){
    $sql="UPDATE shift SET nameShift='$nameShift',timeLock=$timeLock WHERE id_shift=$id";
    return pdo_execute($sql);
}
function delShift($id){
    $sql="UPDATE shift SET hide_shift = 1 WHERE id_shift=$id";
    return pdo_execute($sql);
}
function addShift($nameShift, $timeLock){
    $sql="INSERT INTO shift( nameShift, timeLock, hide_shift) VALUES ('$nameShift', $timeLock,1)";
    return pdo_execute($sql);
}
function displayShift($id){
    $sql="UPDATE shift SET hide_shift = 0 WHERE id_shift=$id";
    return pdo_execute($sql);
}
function getAllShift($timeLock){
    $sql="SELECT * FROM shift WHERE del_shift=0 AND timeLock>$timeLock order by timeLock asc";
    return pdo_query($sql);
}
function getAllShift3($timeLock){
    $sql="SELECT * FROM shift WHERE del_shift=0 AND hide_shift = 0 AND timeLock>$timeLock order by timeLock asc";
    return pdo_query($sql);
}
function getAllShift2(){
    $sql="SELECT * FROM shift order by timeLock asc ";
    return pdo_query($sql);
}
function getAllShift1(){
    $sql="SELECT * FROM shift WHERE del_shift=0 order by timeLock asc";
    return pdo_query($sql);
}
function getShiftById($id){
    $sql="SELECT * FROM shift WHERE id_shift=$id AND del_shift=0 ";
    return pdo_query_one($sql);
}
function getShiftPass($timeLock){
    $sql="SELECT * FROM shift WHERE  del_shift=0 AND timeLock<$timeLock order by timeLock asc  ";
    return pdo_query($sql);
}
function getShiftNow($timeLock){
    $sql="SELECT * FROM shift WHERE timeLock-$timeLock>0 LIMIT 1";
    return pdo_query_one($sql);

}
function checkShiftAvai($id,$timeLock){
    $sql="SELECT * FROM shift  WHERE timeLock>$timeLock AND del_shift=0 AND id_shift=$id";
    return pdo_query_one($sql);
}
<?php
if(isset($_GET['type1'])){
    switch ($_GET['type1']) {
        case 'adduser':
            if(isset($_POST['add-user-btn'])){
                $checkMailExistAdmin=checkMailExistAdmin($_POST['email']);
                if($checkMailExistAdmin){
                    dangKyAdmin($_POST['fullName'], $_POST['email'], $_POST['password'], $_POST['phone'], $_POST['idRole_user'],$_POST['belongTo']);
                }else{
                    echo'<script>alert("Email này đã tồn tại!")</script>';
                }
            }
            $getAllRoles=getAllRoles();
            $getAllStore1=getAllStore1();
            include_once("app/views/admin/adduser.view.php");
            break;
        
        default:
            # code...
            break;
    }
}else{
    if(isset($_GET['delad'])){
        updateAdmin(1,$_GET['delad']);
    }else if(isset($_GET['delcs'])){
        updateCustomer(1,$_GET['delcs']);
    }else if(isset($_GET['atcs'])){
        updateCustomer(0,$_GET['atcs']);
    }else if(isset($_GET['atad'])){
        updateAdmin(0,$_GET['atad']);
    }
    $getAllCustomers=getAllCustomers();
    $getAllAdmin=getAllAdmin();
    include_once("app/views/admin/user.view.php");
}
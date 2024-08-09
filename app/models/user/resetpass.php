<?php
require(__DIR__ . '/PHPMailer-master/src/Exception.php');
require(__DIR__ . '/PHPMailer-master/src/PHPMailer.php');
require(__DIR__ . '/PHPMailer-master/src/SMTP.php');
include_once("../pdo.php");
include_once("userModel.php");
session_start();



$mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); 
    $mail->SMTPOptions = array(
      'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
      )
  );
    $mail->CharSet="UTF-8";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPDebug = 1; 
    $mail->Port = 587 ; 

     $mail->SMTPSecure = 'tls';  
    $mail->SMTPAuth = true; 
    $mail->IsHTML(true);
   
        $randomBytes = openssl_random_pseudo_bytes(64);
        $token = bin2hex($randomBytes);
        $check=addTokens($_GET['email'],$token);
  

    $mail->Username = "nguyenvudaianm113@gmail.com";
    $mail->Password = "amnu emom lhfe igec";
    $mail->SetFrom('nguyenvudaianm113@gmail.com', 'Nam');
    $mail->AddAddress(''.$_GET['email'].'');
    $mail->Subject = 'Link đổi mật khẩu:';
    $mail->Body = '<a href="http://localhost/appdoan/index.php?type=newpass&email='.$_GET['email'].'&token='.$token.'">Link đổi mật khẩu</a>';


     if(!$mail->Send()) {
      header("Location: ../../../index.php?type=home");
     } else {
      header("Location: ../../../index.php?type=home");
     }
?>

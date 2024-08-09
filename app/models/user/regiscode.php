<?php
require(__DIR__ . '/PHPMailer-master/src/Exception.php');
require(__DIR__ . '/PHPMailer-master/src/PHPMailer.php');
require(__DIR__ . '/PHPMailer-master/src/SMTP.php');
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
    function random_six_digit_number() {
      $min = 100000;
      $max = 999999;
      return mt_rand($min, $max);
  }
  
  // Gọi hàm để lấy số ngẫu nhiên có 6 chữ số
  $six_digit_number = random_six_digit_number();
  $_SESSION['sendcode']=$six_digit_number;
  $_SESSION['sendemail']=$_GET['email'];
    //Authentication
    $mail->Username = "nguyenvudaianm113@gmail.com";
    $mail->Password = "amnu emom lhfe igec";
    //Set Params
    $mail->SetFrom('nguyenvudaianm113@gmail.com', 'Nam');
    $mail->AddAddress(''.$_GET['email'].'');
    $mail->Subject = 'Có phải đã đăng ký tài khoản ở trang Food Express bằng email này';
    $mail->Body = '<h1>Mã đăng ký của bạn : '.$six_digit_number.'</h1>';


     if(!$mail->Send()) {
      header("Location: ../../../index.php?type=home");
     } else {
      header("Location: ../../../index.php?type=regis&type1=confirm");
     }
?>

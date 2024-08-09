<form class="row g-3 p-5" action="" method="POST">
    <div class="d-flex justify-content-center"><h1 class="title">NHẬP MÃ 6 CHỮ SỐ CHÚNG TÔI ĐÃ GỬI QUA EMAIL <?php echo $_SESSION['standBy']['email'];?></h1></div>
  <div class="col-md-12">
    <label for="" class="form-label">Mã:</label>
    <input type="text" class="form-control" id="" name="confirm-regis-code" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="confirm-regis-btn">Xác nhận</button>
  </div>
</form>
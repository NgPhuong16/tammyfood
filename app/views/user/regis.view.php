<form class="row g-3 p-5" id="regisForm" action="" method="POST">
    <div class="d-flex justify-content-center"><h1 class="title">ĐĂNG KÝ THÀNH VIÊN</h1></div>
  <div class="col-md-6">
    <label for="" class="form-label">Họ và tên <span class="text-danger">(required)</span>:</label>
    <input type="text" class="form-control" id="fullName" name="fullName" maxlength="200" required>
  </div>
  <div class="col-md-6">
    <label for="" class="form-label">Email <span class="text-danger">(required)</span>:</label>
    <input type="email" class="form-control" id="email" name="email" maxlength="200" required>
  </div>
  <div class="col-md-6">
    <label for="" class="form-label">Mật khẩu <span class="text-danger">(required)</span>:</label>
    <input type="password" class="form-control" id="password" name="password" maxlength="200" required>
    <div id="errorLength"></div>
  </div>
  <div class="col-md-6">
    <label for="" class="form-label">Nhập lại mật khẩu <span class="text-danger">(required)</span>:</label>
    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" maxlength="200" required>
    <div id="errorConfirmPassword"></div>
  </div>
  <div class="col-12">
    <label for="" class="form-label">Số điện thoại <span class="text-danger">(required)</span>:</label>
    <input type="text" class="form-control" id="phone" name="phone" required maxlength="200" placeholder="03....">
  </div>
  <div class="col-12">
    <label for="" class="form-label">Số phòng <span class="text-danger">(required)</span>:</label>
    <input type="text" class="form-control" id="address" name="address" required maxlength="200" placeholder="vd: 307,201,...">
  </div>
  <div class="col-12">
    <label for="" class="form-label">Link Facebook (Optional)</label>
    <input type="text" class="form-control" id="linkFaceBook" name="linkFaceBook" maxlength="200" placeholder="Nhập link fb của bạn..">
  </div>
  <p id="errorMessage" class="text-danger"></p>
  <div class="col-12">
    <a href="index.php?type=login">Bạn đã có tài khoản?</a>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="regis-btn">Đăng ký</button>
  </div>
</form>
<script src="public/js/checkForm.js"></script>
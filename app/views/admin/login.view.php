<div class="container">

<form class="row g-3 p-5" id="loginForm" action="" method="POST">
    <div class="d-flex justify-content-center"><h1 class="title">ĐĂNG NHẬP CHO NHÂN VIÊN VÀ ADMIN</h1></div>
  <div class="col-md-12">
    <label for="" class="form-label">Email:</label>
    <input type="email" class="form-control" name="email" id="email" maxlength="200" required>
  </div>
  <div class="col-md-12">
    <label for="" class="form-label">Mật khẩu:</label>
    <input type="password" class="form-control" name="password" id="password" maxlength="200" required>
  </div>
  <p id="errorMessage" class="text-danger"></p>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="login-btn-admin">Đăng nhập</button>
  </div>
</form>
</div>

<script>
  document.getElementById('loginForm').addEventListener('submit', function(event) {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    const errorMessage = document.getElementById('errorMessage');

    const hasHTML = /<\/?[^>]+(>|$)/.test(email);
    const hasSQL = /(\b(SELECT|INSERT|UPDATE|DELETE|DROP|TRUNCATE|ALTER|CREATE|GRANT|REVOKE|UNION|EXEC)\b)/i.test(email);
    const hasPHP = /<\?php|<\?|<%|<\%/i.test(email);

    const hasHTML1 = /<\/?[^>]+(>|$)/.test(password);
    const hasSQL1 = /(\b(SELECT|INSERT|UPDATE|DELETE|DROP|TRUNCATE|ALTER|CREATE|GRANT|REVOKE|UNION|EXEC)\b)/i.test(password);
    const hasPHP1 = /<\?php|<\?|<%|<\%/i.test(password);


    if (hasHTML || hasHTML1) {
        event.preventDefault();  
        errorMessage.textContent = 'Vui lòng không nhập mã HTML vào ô input.';
    }else if(hasSQL || hasSQL1){
      event.preventDefault();  
      errorMessage.textContent = 'Vui lòng không nhập mã SQL vào ô input.';
    } else if(hasPHP || hasPHP1){
      event.preventDefault();  
      errorMessage.textContent = 'Vui lòng không nhập mã PHP vào ô input.';
} else {
        errorMessage.textContent = '';  
    }
});
</script>
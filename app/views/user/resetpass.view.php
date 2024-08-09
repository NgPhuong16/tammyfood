<form class="row g-3 p-5" id="regisForm" action="" method="POST">
    <div class="d-flex justify-content-center"><h1 class="title">ĐỔI MẬT KHẨU</h1></div>
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
  <p id="errorMessage" class="text-danger"></p>
  <input type="email" value="<?php echo $_GET['email'];?>" name="email" required hidden>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="new-pass-btn">Thay đổi</button>
  </div>
</form>
<script>
document.getElementById('regisForm').addEventListener('submit', function(event) {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
    var array=[password,confirmPassword];
    var check=true;
    for (let i = 0; i < array.length; i++) {
        let value  = array[i];
        const hasHTML = /<\/?[^>]+(>|$)/.test(value );
        const hasSQL = /(\b(SELECT|INSERT|UPDATE|DELETE|DROP|TRUNCATE|ALTER|CREATE|GRANT|REVOKE|UNION|EXEC)\b)/i.test(value );
        const hasPHP = /<\?php|<\?|<%|<\%/i.test(value );
        if (hasHTML ) {
            errorMessage.textContent = 'Vui lòng không nhập mã HTML vào ô input.';
            check=false
            break;
        }else if(hasSQL ){
        errorMessage.textContent = 'Vui lòng không nhập mã SQL vào ô input.';
        check=false
        break;
        } else if(hasPHP ){
        errorMessage.textContent = 'Vui lòng không nhập mã PHP vào ô input.';
        check=false
        break;
    } else {
            errorMessage.textContent = '';  
        }
    }
    if(!check){
        event.preventDefault();
    }

    var errorConfirmPassword = document.getElementById('errorConfirmPassword');
    var errorLength = document.getElementById('errorLength');
     if(password.length<8){
        errorLength.textContent = 'Mật khẩu phải dài hơn hoặc bằng 8 ký tự';
        errorLength.style.color="red";
        event.preventDefault(); // Ngăn chặn việc submit form
    }else{
        errorLength.textContent = '';
    }
    if (password !== confirmPassword) {
        errorConfirmPassword.textContent = 'Mật khẩu và nhập lại mật khẩu không trùng khớp!';
        errorConfirmPassword.style.color="red";
        event.preventDefault(); // Ngăn chặn việc submit form
    } else {
        errorConfirmPassword.textContent = '';
    }
});
</script>
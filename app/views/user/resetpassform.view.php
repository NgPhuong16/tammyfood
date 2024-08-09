<form class="row g-3 p-5" id="regisForm" action="" method="POST">
    <div class="d-flex justify-content-center"><h1 class="title">LẤY LẠI MẬT KHẨU</h1></div>
  <div class="col-md-12">
    <label for="" class="form-label">Email đã đăng ký tại trang web <span class="text-danger">(required)</span>:</label>
    <input type="text" class="form-control" id="email" name="email" maxlength="200" required>
  </div>
  <p id="errorMessage" class="text-danger"></p>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="reset-pass-btn">Xác nhận</button>
  </div>
</form>
<script>
document.getElementById('regisForm').addEventListener('submit', function(event) {
    var email = document.getElementById('email').value;
    var array=[email];
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
});
</script>
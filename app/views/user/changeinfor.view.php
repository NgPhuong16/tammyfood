<form class="row g-3 p-5" id="regisForm" action="" method="POST">
    <div class="d-flex justify-content-center"><h1 class="title">THAY ĐỔI THÔNG TIN</h1></div>
  <div class="col-12">
    <label for="" class="form-label">Họ và tên <span class="text-danger">(required)</span>:</label>
    <input type="text" class="form-control"  value="<?php echo $_SESSION['user']['fullName']?>" name="fullName" id="fullName" maxlength="200" required>
  </div>
  <div class="col-12">
    <label for="" class="form-label">Số điện thoại <span class="text-danger">(required)</span>:</label>
    <input type="text" class="form-control"  value="<?php echo $_SESSION['user']['phone']?>" name="phone" id="phone" maxlength="200"  required placeholder="03....">
  </div>
  <div class="col-12">
    <label for="" class="form-label">Số phòng <span class="text-danger">(required)</span>:</label>
    <input type="text" class="form-control"  value="<?php echo $_SESSION['user']['address']?>" name="address" id="address" maxlength="200" required >
  </div>
  <div class="col-12">
    <label for="" class="form-label">Link Facebook (Optional)</label>
    <input type="text" class="form-control"  value="<?php echo $_SESSION['user']['linkFaceBook']?>" name="linkFaceBook" maxlength="200" id="linkFaceBook" placeholder="Nhập link fb của bạn..">
  </div>
  <p id="errorMessage" class="text-danger"></p>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="change-infor-btn">Lưu</button>
  </div>
</form>
<script>
  

document.getElementById('regisForm').addEventListener('submit', function(event) {
    var fullName = document.getElementById('fullName').value;
    var phone = document.getElementById('phone').value;
    var address = document.getElementById('address').value;
    var linkFaceBook = document.getElementById('linkFaceBook').value;
    var array=[fullName,phone,address,linkFaceBook];
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
        console.log('bc');
        event.preventDefault();
    }
});

</script>
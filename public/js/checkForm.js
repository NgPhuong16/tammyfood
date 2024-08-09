

document.getElementById('regisForm').addEventListener('submit', function(event) {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
    var fullName = document.getElementById('fullName').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var address = document.getElementById('address').value;
    var linkFaceBook = document.getElementById('linkFaceBook').value;
    var array=[password,confirmPassword,fullName,email,phone,address,linkFaceBook];
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






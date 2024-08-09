<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<nav class="navbar navbar-expand-lg fixed-top mb-5" style="background-color: skyblue;">
  <div class="container-fluid">
  <a class="text-dark" id="home-btn" style="display: none;" href="index.php?type=home"><svg class="" xmlns="http://www.w3.org/2000/svg" width="28.5" height="28.5" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
  <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z"/>
</svg></a>
    <a class="text-dark text-decoration-none d-flex" style="justify-content: center; " href="index.php?type=home"><h1 class="">Tammy Food</h1></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?type=home"><h5>Home</h5></a>
        </li>
        <?php
          if(isset($_SESSION['user'])){
            echo'
            <li class="nav-item">
          <a class="nav-link" href=""><h5><strong>Member: '.$_SESSION['user']['fullName'].'</strong></h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?type=home&logout=request"><h5>Đăng xuất</h5></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <h5>Tính năng</h5>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?type=changeinfor">Đổi thông tin</a></li>
            <li><a class="dropdown-item" href="index.php?type=changeinfor">Lịch sử đơn hàng</a></li>
          </ul>
        </li>
            <li class="nav-item"><a class="nav-link" href="index.php?type=checkorder"><h5>Theo dõi đơn hàng</h5></a></li>
        
        
            ';
          }else{
            echo'
        <li class="nav-item">
          <a class="nav-link" href="index.php?type=loginadmin"><h5>Dành cho nhân viên và admin</h5></a>
        </li>
            ';
          }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?type=cart"><h5>Giỏ hàng</h5></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>
<br>
<?php 
  if(isset($_GET['type'])){?>
  <script>
        function checkScreenWidth1() {
          var home = document.querySelector('#home-btn');
            if (window.innerWidth < 1000) {
              home.style.display='block';
            }else{
              home.style.display='none';
            }
        }
        checkScreenWidth1();
        window.addEventListener('resize', checkScreenWidth1);
    </script>
  <?php
    if($_GET['type']=='home' || $_GET['type']=='listproduct' || $_GET['type']=='detailproduct' || $_GET['type']=='checkorder'){?>
      <div id="cart-float" class="d-flex justify-content-center fixed-bottom"></div>
      <script>
        function checkScreenWidth() {
            var img = document.querySelectorAll('.image-product');
            var cart = document.querySelector('#cart-float');
            var home = document.querySelector('#home-btn');
            if (window.innerWidth < 500) {
                img.forEach(element => {
                    element.classList.remove('w-50');
                element.classList.add('w-100');
                });
            } else {
                img.forEach(element => {
                    element.classList.remove('w-100');
                element.classList.add('w-50');
                });
                cart.innerHTML='';
            }

            if (window.innerWidth < 1000) {
              home.style.display='block';
                cart.innerHTML='<a type="button"  href="index.php?type=cart" style="" class="btn btn-primary mb-2 w-75">Giỏ hàng ( <?php if(isset($_SESSION['cart'])){echo count($_SESSION['cart']);}?> sản phẩm )</a>';
            }else{
                cart.innerHTML='';
                home.style.display='none';
            }
        }

        checkScreenWidth();
        window.addEventListener('resize', checkScreenWidth);
    </script>
    <?php }
  }else{
   ?>
   <div id="cart-float" class="d-flex justify-content-center fixed-bottom"></div>
      <script>
        function checkScreenWidth1() {
          var home = document.querySelector('#home-btn');
            if (window.innerWidth < 1000) {
              home.style.display='block';
            }else{
              home.style.display='none';
            }
        }
        checkScreenWidth1();
        window.addEventListener('resize', checkScreenWidth1);
        function checkScreenWidth() {
            var img = document.querySelectorAll('.image-product');
            var cart = document.querySelector('#cart-float');
            if (window.innerWidth < 500) {
                img.forEach(element => {
                    element.classList.remove('w-50');
                element.classList.add('w-100');
                });
            } else {
                img.forEach(element => {
                    element.classList.remove('w-100');
                element.classList.add('w-50');
                });
                cart.innerHTML='';
            }

            if (window.innerWidth < 1000) {
                cart.innerHTML='<a type="button"  href="index.php?type=cart" style="" class="btn btn-primary mb-2 w-75">Giỏ hàng ( <?php if(isset($_SESSION['cart'])){echo count($_SESSION['cart']);}?> sản phẩm )</a>';
            }else{
                cart.innerHTML='';
            }
        }

        checkScreenWidth();
        window.addEventListener('resize', checkScreenWidth);
    </script>
   <?php
  }
?>


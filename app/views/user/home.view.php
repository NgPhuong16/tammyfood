<!-- <div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center mb-5"><h1 class="title">CÁC BẾP CỦA CHÚNG TÔI <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-chat-heart-fill" viewBox="0 0 16 16">
  <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9 9 0 0 0 8 15m0-9.007c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
</svg></h1></div>
<?php
// foreach ($getAllStore as $key ) {
//     echo'
//     <div class="d-flex justify-content-center row mb-5">
//     <div class="col-12">
//         <div class="row p-2 bg-white border rounded ">
//             <div class="col-4 mt-1 "><a class="d-flex justify-content-center"  href="index.php?type=listproduct&id='.$key['id_category'].'"><img  class="image-product img-fluid img-responsive rounded product-image" src="'.$key['imageCategory'].'"></a></div>
//             <div class="col-8 mt-1  ">
//                 <h5 class="name-food">'.$key['nameCategory'].'</h5>
//                 <h6 class="text-danger">Chỉ Từ '.number_format($key['price'], 0, ',', '.') . ' ₫</h6>
//                 <h6 class="text-success">Miễn phí vận chuyển</h6>
//                 <a class="btn btn-primary btn-sm text-light w-50" href="index.php?type=listproduct&id='.$key['id_category'].'">Xem thêm</a>
//             </div>
//         </div>
//     </div>
// </div>
//     ';
// }
?>


</div>    
<script>
        function checkScreenWidth() {
            var img = document.querySelectorAll('.image-product');
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
            }
        }

        checkScreenWidth();
        window.addEventListener('resize', checkScreenWidth);
    </script> -->

<style>
    .ratings{
    margin-right:10px;
}

.ratings i{
    
    color:#cecece;
    font-size:32px;
}

.rating-color{
    color:#fbc634 !important;
}
</style>
    <div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center mb-5"><h1 class="title">CÁC BẾP CỦA CHÚNG TÔI<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-chat-heart-fill" viewBox="0 0 16 16">
  <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9 9 0 0 0 8 15m0-9.007c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
</svg></h1></div>
<?php
foreach ($getAllStore as $key ) {
    echo'
    <div class="d-flex justify-content-center row mb-5">
        <div class="col-md-10">
            <div class="row p-2 bg-white border rounded">
                <div class="col-5 mt-1"><a href="index.php?type=type=listproduct&id='.$key['id_category'].'" class="d-flex justify-content-center"><img class="image-product img-fluid img-responsive rounded product-image w-100 " src="'.$key['imageCategory'].'"></a></div>
                <div class="col-7 mt-1 d-grid " >
                    <h4 class="name-food" >'.$key['nameCategory'].'</h4>
                    <div class="ratings">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg>
            </div>
                    <h4 class="text-justify text-success text-truncate para mb-0">Miễn phí vận chuyển <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
</svg></h4>
                    <h4 class="text-justify text-success text-truncate para mb-0">Bảo đảm vệ sinh <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
</svg></h4>
                    <h4 class="text-danger">Chỉ Từ '.number_format($key['price'], 0, ',', '.') . ' ₫</h4>
                <a class="btn btn-primary btn-sm text-light w-50" href="index.php?type=listproduct&id='.$key['id_category'].'">Xem thêm</a>
                    </div>
            </div>
        </div>
    </div>
    ';
}
?>
</div> 
<script>
        function checkScreenWidth() {
            var img = document.querySelectorAll('.image-product');
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
            }
        }

        checkScreenWidth();
        window.addEventListener('resize', checkScreenWidth);
    </script>
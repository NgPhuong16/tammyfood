<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center mb-5"><h1 class="title"><?php echo $getStoreById['nameCategory']?> <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-chat-heart-fill" viewBox="0 0 16 16">
  <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9 9 0 0 0 8 15m0-9.007c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
</svg></h1></div>
<?php
foreach ($getListProductByStore as $key ) {
    echo'
    <div class="d-flex justify-content-center row mb-5">
        <div class="col-md-10">
            <div class="row p-2 bg-white border rounded">
                <div class="col-5 mt-1"><a href="index.php?type=detailproduct&id='.$key['id_product'].'" class="d-flex justify-content-center"><img class="image-product img-fluid img-responsive rounded product-image w-100" src="'.$key['imageCover'].'"></a></div>
                <div class="col-7 mt-1 d-grid ">
                    <h4 class="name-food" >'.$key['nameProduct'].'</h4>
                    <p class="text-justify text-truncate para mb-0">'.$key['description'].'</p>
                    <h4 class="">'.number_format($key['price'], 0, ',', '.') . ' ₫</h4><span class="strike-text">'.number_format($key['price']*1.1, 0, ',', '.') . ' ₫</span>
                <form action="" method="post">
                    <div class="d-flex flex-column "><a href="index.php?type=detailproduct&id='.$key['id_product'].'" class="btn btn-primary btn-sm w-75">Chi tiết món ăn</a>';
                    if(isset($_SESSION['user'])){
                        echo'
                        <input type="number" class="form-control" name="quantity" value="1" min="1" step="1" max="100" hidden>
                        <input type="number" name="id_product" value="'.$key['id_product'].'" hidden>
                        <input type="text" name="nameProduct" value="'.$key['nameProduct'].'" hidden>
                        <input type="number" name="price" value="'.$key['price'].'" hidden>
                        <input type="text" name="imageCover" value="'.$key['imageCover'].'" hidden>
                        <input type="number" name="idCategory" value="'.$key['idCategory'].'" hidden>
                        <button class="btn btn-outline-primary btn-sm w-75" type="submit" name="add-to-cart-btn">Thêm giỏ hàng nhanh</button>
                        ';
                    }
                    echo'
                    </div>
                    </form>
                    </div>
            </div>
        </div>
    </div>
    ';
}
?>
    <!-- <div class="text-center">
        <div class="row row-cols-lg-4 row-cols-sm-1 row-cols-md-2 ">
            <?php foreach($getListProductByStore as $key):?>
            <div class="col my-2">
                <div class="card" style="width: 18rem;">
                    <img src="<?=$key['imageCover']?>" class="card-img-top" height="200px" alt="<?=$key['nameProduct']?>">
                    <div class="card-body">
                        <h5 class="card-title text-danger fw-bold"><?=$key['nameProduct']?></h5>
                        <h5 class="card-title"><?=number_format($key['price'], 0, ',', '.') ?>đ</h5>
                        <h6 class="strike-text"><?=number_format($key['price']*1.1, 0, ',', '.')?> ₫</h6>
                        <p class="card-text"><?=$key['description']?></p>
                        <a href="index.php?type=detailproduct&id=<?=$key['id_product']?>" class="btn btn-primary">Chi tiết món ăn</a>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div> -->
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
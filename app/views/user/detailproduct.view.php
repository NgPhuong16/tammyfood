<section class="py-5">
  <div class="container">
    <div class="row gx-5">
      <aside class="col-lg-6">
        <div class=" rounded-4 mb-3 d-flex justify-content-center">
          <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit w-50" src="<?php echo $getProductById['imageCover'] ?>" />
        </div>
        <!-- <div class="d-flex justify-content-center mb-3">
          <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big1.webp" class="item-thumb">
            <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big1.webp" />
          </a>
          <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big2.webp" class="item-thumb">
            <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big2.webp" />
          </a>
          <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big3.webp" class="item-thumb">
            <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big3.webp" />
          </a>
          <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big4.webp" class="item-thumb">
            <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big4.webp" />
          </a>
          <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp" class="item-thumb">
            <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp" />
          </a>
        </div> -->
        <!-- thumbs-wrap.// -->
        <!-- gallery-wrap .end// -->
      </aside>
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <h4 class="title text-dark">
            <?php echo $getProductById['nameProduct'] ?> <br />
          </h4>
          <div class="mb-3">
            <span class="h5"><?php echo number_format($getProductById['price'], 0, ',', '.') ?> ₫</span>
            <span class="text-muted">/ phần</span>
          </div>

          <p>
            <?php echo $getProductById['description'] ?>
          </p>
          <form action="" method="post">
          <div class="row">
            <?php
              foreach ($addonArray as $key) {
                  $i=1;
                  foreach ($key as $key1 ) {
                    if($i<2){
                      echo'<label for="" class="form-check-label"><h6>'.$key1['name_addon_categories'].'</h6></label>';
                      echo'<div class="form-check">
                      <input class="form-check-input" value="0" type="radio" name="'.$key1['idCategory_addon'].'" id="'.$key1['idCategory_addon'].''.$i.'" checked>
                      <label class="form-check-label" for="'.$key1['idCategory_addon'].''.$i.'">
                        Mặc định
                      </label>
                    </div>';
                      echo'<div class="form-check">
                      <input class="form-check-input" value="'.$key1['id_addon'].'" type="radio" name="'.$key1['idCategory_addon'].'" id="'.$key1['idCategory_addon'].''.$i.'">
                      <label class="form-check-label" for="'.$key1['idCategory_addon'].''.$i.'">
                        '.$key1['name_addon'].' + '.number_format($key1['price_addon'], 0, ',', '.').' ₫
                      </label>
                    </div>';
                    }else{
                      echo'<div class="form-check">
                      <input class="form-check-input" value="'.$key1['id_addon'].'" type="radio" name="'.$key1['idCategory_addon'].'" id="'.$key1['idCategory_addon'].''.$i.'">
                      <label class="form-check-label" for="'.$key1['idCategory_addon'].''.$i.'">
                        '.$key1['name_addon'].' + '.number_format($key1['price_addon'], 0, ',', '.').' ₫
                      </label>
                    </div>';
                    }
                  $i++;
                  }
              }
            ?>
          </div>

          <hr />
          <div class="row mb-4">
            <!-- col.// -->
            <div class="col-md-4 col-6 mb-3">
            <label class="mb-2 d-block">Số lượng</label>
              <div class="input-group mb-3" style="width: 170px;">
                <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon1" data-mdb-ripple-color="dark" onclick="decreaseValue()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
  <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
</svg>
                </button>
                <input type="number" class="form-control text-center border border-secondary" id="quantity" name="quantity" value="1" min="1" step="1" max="10">
                <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon2" data-mdb-ripple-color="dark" onclick="increaseValue()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
</svg>
                </button>
              </div>
              
              <input type="number" name="id_product" value="<?php echo $getProductById['id_product'] ?>" hidden>
              <input type="text" name="nameProduct" value="<?php echo $getProductById['nameProduct'] ?>" hidden>
              <input type="number" name="price" value="<?php echo $getProductById['price'] ?>" hidden>
              <input type="text" name="imageCover" value="<?php echo $getProductById['imageCover'] ?>" hidden>
              <input type="number" name="idCategory" value="<?php echo $getProductById['idCategory'] ?>" hidden>
            </div>
          </div>
          <?php
            echo '
              <button  class="btn btn-primary shadow-0" type="submit" name="add-to-cart-btn"> <i class="me-1 fa fa-shopping-basket"></i> Thêm vào giỏ hàng </button>';
          ?>
          </form>
        </div>
      </main>
    </div>
  </div>
</section>
<script>
  function decreaseValue() {
    var quantity = document.getElementById('quantity');
    var currentValue = parseInt(quantity.value);
    if(currentValue > 1) {
      quantity.value = currentValue - 1;
    }
  }

  function increaseValue() {
    var quantity = document.getElementById('quantity');
    var currentValue = parseInt(quantity.value);
    if(currentValue < 100) {
      quantity.value = currentValue + 1;
    }
  }
</script>
<?php
/**
 * @var \app\controllers\BasketController $basketUser
 * @var \app\controllers\BasketController $models
 */

?>


<div class="d-flex ">
    <?php foreach ($basketUser as $product): ?>

       <!-- --><?php /*= dd($product); */?>
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"> <?php echo $models::getProduct($product->product_id)->name; ?></h5>
                <p class="card-text">
                    <?php /*= $models::getPropertyProduct($product['product_id'])['price']; */?><!--
                    <?php /*= $product['count'] */?> шт.-->
                </p>
                <p class="card-text">Итого: <?php /*= $models::getPropertyProduct($product['product_id'])['price'] * $product['count']; */?></p>

            </div>
        </div>
    <?php endforeach; ?>
</div>
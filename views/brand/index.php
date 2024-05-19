<?php
/**
 * @var \app\controllers\BrandController $model
 */
use yii\helpers\Html;
use yii\helpers\Url;
?>

<h1><?= $model->name?></h1>


продукты
<div class="d-flex flex-wrap justify-content-between">
    <?php foreach ($model->products as $products): ?>
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"> <?= $products->name ?> <?= $products->mark ?></h5>
                <a href="<?= Url::to(['shop/product','id' => $products->id])?>" class="btn btn-primary">Войти</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
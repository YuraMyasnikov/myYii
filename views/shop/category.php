<?php

/**
 * @var \app\controllers\ShopController $model
 */
use yii\helpers\Url;
use app\models\shop\viewModels\Models;
$models = Models::make();
$brandsInCategory = $models::getBrandsFromCategory($model->id);

//dd($brands);
?>

<h1><?= $model->name?></h1>
<p><?= $model->text?></p>

продукты
<div class="d-flex flex-wrap justify-content-left">
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

бренды товаров которые указаны в этой категории

<div class="d-flex flex-wrap justify-content-center">
        <?php foreach ($brandsInCategory as $brand):?>
            <a href="<?= Url::to(['brand/products-to-brand','id' => $brand->id, 'category_id' => $model->id])?>" class="btn">
                <img src="/<?= $brand->image ?>" alt="<?= $brand->name?>" style="height: 50px">
            </a>

        <?php endforeach;?>
</div>

<?php echo \yii\helpers\Html::a('Назад', Url::to(['shop/index']))?>
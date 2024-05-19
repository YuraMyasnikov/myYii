<?php

/**
 * @var \app\controllers\ShopController $model
 *
 */
use yii\helpers\Url;
use app\widgets\ReviewWidget;

$categories = \app\models\shop\viewModels\Models::getArrayCategories();

/*$names = array_map(function ($category){return $category['name'];}, $categories);*/
/*$names = array_filter($categories, function ($category){
    return $category['active'] == 1;
});
$activeNames = array_map(function ($name){
    return $name['name'];
}, $names);
dd($names, $activeNames);*/
/*$cur = current($categories);
$cur= next($categories);
$cur= next($categories);
$cur = prev($categories);
dd($categories,$cur);*/

?>



категории
<div class="d-flex flex-wrap justify-content-between">
    <?php foreach ($model::getCategories() as $category): ?>
    <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $category->name ?> (<?= count($category->products)?>)</h5>
            <p class="card-text"><?= $category->description ?></p>
            <a href="<?= Url::to(['shop/category','id' => $category->id])?>" class="btn btn-primary">смотреть</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>

бренды

<div class="" >
    <div class="mySlick">
    <?php foreach ($model::getBrands() as $brand): ?>
        <div><a href="<?= Url::to(['brand/index','id' => $brand->id])?>" class="btn ">
            <img src="/<?=$brand->image ?>" alt="<?= $brand->name?>" style="height: 50px">
        </a></div>
    <?php endforeach; ?>
    </div>
</div>

отзывы
<div class="" style="display: flex; align-content: center; flex-direction: column; position: relative; width: 100%;">
    <?php foreach ($model::getReviews() as $review): ?>
       <?= ReviewWidget::widget(['review' => $review])?>
    <?php endforeach; ?>
</div>

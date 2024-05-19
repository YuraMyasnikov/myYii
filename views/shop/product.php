<?php

/**
 * @var \app\controllers\ShopController $model;
 * @var \app\controllers\ShopController $sku_id;
 * @var \app\controllers\ShopController $reviews;
 */

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$models = \app\models\shop\viewModels\Models::make();
use app\widgets\ReviewWidget;
use app\widgets\ReviewFormWidget;
use app\models\shop\Basket;
$basket = new Basket();
$user = $models::getUser();
$r = new \app\models\shop\Reviews();

?>

<div class="card w-75 mb-3">
    <div class="card-body">
        <h5 class="card-title"><?= $model->brand->name?> <?= $model->name?> <?= $model->mark?> </h5>
        <?php $sku = current($model->skues) ;?>
        в наличии <?php echo $sku->count ;?>
            <?= $model->price?> руб.


        <?php if ($models::getArrayFeatureValue($model->id)[0]['value']): ?>
            <ul>
                <?php foreach ($models::getArrayFeatureValue($model->id) as $option): ?>
                    <li>
                        <?= $option['feature_name']; ?> - <?= $option['value']; ?>
                    </li>
                <?php endforeach;?>
            </ul>
        <?php endif;?>

        <?php $form = ActiveForm::begin(['method' => 'POST', 'action'=>Url::to(['basket/add', 'id' => $model->id])])?>
           <?php echo $form->field($basket, 'sku_id')->hiddenInput(['value' => $sku->id])->label(false)?>
           <?php echo $form->field($basket, 'product_id')->hiddenInput(['value' => $model->id])->label(false)?>
           <?php echo $form->field($basket, 'user_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false)?>
           <?php echo $form->field($basket, 'price')->hiddenInput(['value' => $model->price])->label(false)?>
           <?php echo $form->field($basket, 'count')->textInput(['value' => 1])->label(false)?>

            <?php echo Html::submitButton('в корзину')?>
        <?php $form::end()?>

    </div>
</div>


<?php if (!Yii::$app->user->isGuest): ?>
    оставь отзыв
    <div class="" style="display: flex; align-content: center; flex-direction: column; position: relative; width: 100%;">
        <?= ReviewFormWidget::widget(['model' => $r, 'product' => $model->id, 'user' => Yii::$app->user->id]) ?>
    </div>
<?php endif;?>

<div class="" style="display: flex; align-content: center; flex-direction: column; position: relative; width: 100%;">
    <?php foreach ($reviews as $review): ?>
        <?= ReviewWidget::widget(['review' => $review])?>
    <?php endforeach; ?>
</div>




<?php echo \yii\helpers\Html::a('назад', Url::to(['shop/category', 'id' => $model->category_id]))?>
<style>
    ul {
        padding: 0;
        margin: 0;
        list-style-type: none;
    }
</style>


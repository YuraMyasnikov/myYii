<?php
/**
 * @var \app\controllers\admin\ShopController $model
 * @var \app\controllers\admin\ShopController $rows
 * @var \app\controllers\admin\ShopController $brands
 * @var \app\controllers\admin\ShopController $product
 * @var \app\controllers\admin\ShopController $sku
 * @var \app\controllers\admin\ShopController $cat
 */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;
?>

<?php $form = ActiveForm::begin(['method' => 'POST', 'action' => Url::to(['admin/shop/create-product', 'category_id' => $cat])])?>
<?php echo $form->field($product, 'name')->textInput()?>
<?php echo $form->field($sku, 'articul')->textInput()?>
<?php echo $form->field($product, 'mark')->textInput()?>
<?php echo $form->field($product, 'price')->textInput()?>
<?php echo $form->field($sku, 'count')->textInput()?>
<?php echo $form->field($sku, 'product_id')->hiddenInput()->label(false)?>
<?php echo $form->field($product, 'category_id')->hiddenInput(['value' => $cat])->label(false)?>
<?php echo $form->field($product, 'brand_id')->dropDownList(
    \yii\helpers\ArrayHelper::map($brands, 'id', 'name'),
    ['prompt' => 'Выберите бренд']
)->label(false)
?>
<?php foreach ($rows as $row):?>
    <?php $name = preg_replace('/\W+/', '_', $row['another_name']);?>
    <?php echo $form->field($model, "$name")->textInput(); ?>
<?php endforeach;?>

<?php echo Html::submitButton('send', ['class' => 'btn btn-success'])?>
<?php ActiveForm::end()?>
<?php

/**
 * @var \app\controllers\admin\ShopController $model
 */

use yii\bootstrap5\Html;
use yii\helpers\Url;
?>

<?php echo Html::a('создать новый '. $model->name , Url::to(['admin/shop/create-product' , 'category_id' => $model->id , 'class' => 'btn btn-primary'])) ?>

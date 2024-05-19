<?php
 /**
  * @var \app\controllers\OrderController $model
  */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$user = \app\models\shop\User::findIdentity($_SESSION['__id']);

 ?>

<?php $form = ActiveForm::begin()?>
<?php echo $form->field($model, 'name')->input('text',['value' => ($user['name']) ? $user['name'] : ''])?>
<?php echo $form->field($model, 'phone')->input('text',['value' => ($user['phone']) ? $user['phone'] : ''])?>
<?php echo Html::submitButton('купить', ['class' => 'btn btn-primary'])?>
<?php ActiveForm::end()?>

<?php echo Html::a('заказал', ['order/order-item'])?>

<?php \app\models\shop\viewModels\Oorder::getBasket(2)?>

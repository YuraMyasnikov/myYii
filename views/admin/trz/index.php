<?php

use yii\widgets\ActiveForm;
use yii\bootstrap5\Html;

?>

<?php if (Yii::$app->session->hasFlash('success')):?>
    <?php echo Yii::$app->session->getFlash('success')?>
<?php endif;?>
<?php if (Yii::$app->session->hasFlash('error')):?>
    <?php echo Yii::$app->session->getFlash('error')?>
<?php endif;?>
<?php $form = ActiveForm::begin(['method' => 'POST', 'action' => ['admin/trz/yu']]) ?>
    <?php echo Html::submitButton('отправить')?>
<?php ActiveForm::end()?>

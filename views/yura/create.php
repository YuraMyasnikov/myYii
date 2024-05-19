<?php
/**
 * @var \app\controllers\YuraController $model;
 * @var \app\controllers\YuraController $viewModel;
 */

/**
 *
 */
use yii\widgets\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

?>

<div class="container">
    <div class="row">
        <h2 class="mb-2">Создание пользователя</h2>
    </div>
    <div class="row">
        <?php if (Yii::$app->session->has('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show  mt-5" role="alert">
                <strong>Ошибка!</strong> <?= Yii::$app->session->get('error')?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
            </div>
            <?php Yii::$app->session->destroy(); ?>
        <?php endif;?>
    </div>

    <div class="row">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],])?>

        <?php echo $form->field($model, 'first_name')->input('text',['placeholder'=> 'Иван'])?>
        <?php echo $form->field($model, 'last_name')->input('text',['placeholder'=> 'Иванов'])?>
        <?php echo $form->field($model, 'email')->input('email',['placeholder'=> 'example@gmail.com'])?>
        <?php echo $form->field($model, 'password_repeat')->passwordInput()?>                                   <!-- _repeat вперед -->
        <?php echo $form->field($model, 'password')->passwordInput()?>
        <?php echo $form->field($model, 'busy')->dropDownList([null=>'Не выбрано',0 => 'Безработный', 1 => 'Есть работа'])?>
        <?php echo $form->field($model, 'description')->textarea(['rows'=>5])?>
        <?php echo $form->field($model, 'city_id')->dropDownList($viewModel->getCities())?>
        <?php echo $form->field($model, 'newAdress')->textInput(['placeholder' => 'Если в списке нет твоего города'])?>
        <?php echo $form->field($model, 'position_id')->dropDownList($viewModel->getPositions())?>
        <?php echo $form->field($model, 'newPosition')->textInput(['placeholder' => 'Добавь новую должность'])?>
        <?php echo $form->field($model, 'image')->fileInput(); ?>
        <?php echo $form->field($model, 'images[]')->fileInput(['multiple' => true]); ?>

        <div class="mt-5 mb-5">
            <?php echo Html::submitButton('Добавить',['class'=>'btn btn-outline-success'])?>
            <?php echo Html::a('Назад',Url::to('/'),['class'=>'btn btn-outline-secondary'])?>
        </div>
        <?php $form = ActiveForm::end();?>
    </div>
</div>






<?php
/**
 * @var \app\controllers\YuraController $model
 * @var \app\controllers\YuraController $viewModel
 */

use yii\widgets\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;


$cities = $viewModel->cities;
$positions = $viewModel->getPositions();
$images = $model->imagesData;
?>

<!-- Заголовок -->
<div class="row">
    <h2 id="yu" class="mb-2" style="z-index: 10">Редактирование <?= $model->first_name .' '. $model->last_name ?></h2>
</div>
<!-- Сессия -->
<div class="row">
    <!-- Сессия -->
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible fade show  mt-5" role="alert">
            <strong> <?= Yii::$app->session->get('success')?> </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
        </div>
    <?php endif;?>
    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show  mt-5" role="alert">
            <strong> <?= Yii::$app->session->get('error')?> </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
        </div>
    <?php endif;?>
    <?php /*Yii::$app->session->destroy();*/?>
    <!-- /Сессия -->
</div>

<div class="row" style="position: absolute; width: 65%; left: 50%;  transform: translate(-50%,0);">
    <div id="update" >
        <div class="update_form">
            <div class="image" style="display: flex; align-items: center; perspective: 200px;">

                <!-- Верхний аватар -->
                <?php echo Html::img(
                    "@web/$model->image",
                    ['style' => 'border-radius: 50%;width: 190px;height: 190px;object-fit: cover; margin:10px', 'class' => 'update_image']
                )?>
                <!--^ Верхний аватар ^-->

                <!-- Форма удаления аватара -->
                <div>
                    <?php if ($model->image !== 'uploads/default.jpg'):?>
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>
                        <?php echo $form->field($model, 'delete_avtr')->hiddenInput(['value'=>'delete'])->label(false)?>
                        <?php echo Html::submitButton('<i class="bi bi-x-circle"></i>',['style' => 'border:none;background:none; width:25px;height:25px; display:flex;justify-content:center;align-items:center'])?>
                    <?php $form = ActiveForm::end()?>
                    <?php endif;?>
                </div>
                <!-- ^Форма удаления аватара^ -->
            </div>
            <!-- Основная форма -->
            <?php $form = ActiveForm::begin(['options' => ['id' => 'contact-form','enableAjaxValidation' => true,'enctype' => 'multipart/form-data']])?>


            <?php echo $form->field($model, 'first_name')->input('text')?>
            <?php echo $form->field($model, 'last_name')->input('text')?>
            <?php echo $form->field($model, 'email')->input('text')?>

            <?php echo $form->field($model, 'newpass_repeat')->passwordInput(['placeholder' => 'Можешь изменить пароль' ])?>
            <?php echo $form->field($model, 'newPass',)->passwordInput()?>

            <?php echo $form->field($model, 'busy')->dropDownList([null=>'Не выбрано',0 => 'Безработный', 1 => 'Есть работа'])?>
            <?php echo $form->field($model, 'description')->textarea(['rows'=>5])?>

            <?php echo $form->field($model, 'city_id')->dropDownList($cities)?>
            <?php echo $form->field($model, 'newAdress')->textInput(['placeholder' => 'Заменить на город не из списка'])?>

            <?php echo $form->field($model, 'position_id')->dropDownList($positions)?>
            <?php echo $form->field($model, 'newPosition')->textInput(['placeholder' => 'Добавь новую должность'])?>
            <!-- Кнопка и изображение аватара -->
            <div class="" style="display: flex; flex-direction: row; align-items: center; margin-top: 10px">
                <?php echo Html::img(
                    "@web/$model->image",
                    ['style' => 'border-radius: 50%;width: 50px;height: 50px;margin-right: 10px;object-fit: cover;']
                )?>
                <?php echo $form->field($model, 'image')->fileInput(); ?>
            </div>
            <!--^ Кнопка и изображение аватара ^-->

            <!-- Кнопка добавления галлереи -->
            <div class="" style="display: flex; flex-direction: row; align-items: center; margin-top: 10px">
                <?php echo $form->field($model, 'images[]')->fileInput(['multiple' => true]); ?>
            </div>
            <!--^ Кнопка добавления галлереи ^-->

            <!-- Изображение галлереи -->
            <div>
            <?php foreach ($images as $image):?>
                <?php if($image->user_id === $model->id):?>
                    <?php echo Html::img(
                        "@web/$image->images",
                        ['style' => 'width: 150px;height: 150px; object-fit: cover;',
                            'class' => 'rounded m-1'
                        ]
                    )?>
                <?php endif;?>
            <?php endforeach;?>

            </div>
            <!--^ Изображение галлереи ^-->

            <!-- Кнопки формы -->
            <div class="mt-5 mb-3">
                <?php echo Html::submitButton('Изменить',['class'=>'btn btn-outline-primary'])?>
                <?php echo Html::a('Назад',Url::to('/'),['class'=>'btn btn-outline-secondary'])?>
            </div>
            <!--^ Кнопки формы ^-->
            <?php $form = ActiveForm::end();?>
            <div>
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>
                <?php echo $form->field($model,'deleteAllGallery')->hiddenInput(['value' => true])->label(false)?>
                <?php echo Html::submitButton('удалить галлерею',['class'=>'btn btn-outline-primary'])?>
                <?php ActiveForm::end()?>
            </div>
            <!-- ^Основная форма^ -->
        </div>
    </div>
</div>



<style>
   #update{
       position:relative;
       background: rgba(0, 0, 0, 0.1);
       border-radius: 25px;
       display: flex;
       justify-content: center;
   }
   #update .update_form{
       position: relative;
       width: 80%;
       bottom:50px;
       display: flex;
       flex-direction: column;
       justify-content: center;
       align-items: center;
   }
   #update .update_form .image{
       display: flex;
       justify-content: center;
       flex-direction: column;
       z-index: 9;
       width: 220px;
       height: 220px;
   }
   #update .update_form .image div{
       position: absolute;
       right:50%;
       transform: translate(500%,0);
       border-radius: 50%;
       border:none;
       background: none;


   }

   #update {

   }
</style>


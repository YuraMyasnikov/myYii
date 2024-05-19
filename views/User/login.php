<?php

/**
 * @var \app\controllers\UserController $user
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;
?>

    <section class="vh-100 bg-image"
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <?php if (Yii::$app->session->has('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo Yii::$app->session->get('success')?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
            </div>
            <?php Yii::$app->session->remove('session');?>
        <?php elseif (Yii::$app->session->has('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo Yii::$app->session->get('error')?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
            </div>
            <?php Yii::$app->session->remove('error');?>
        <?php endif; ?>
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Авторизация</h2>

                            <?php $form = ActiveForm::begin(['method' => 'POST', 'action'=>Url::to(['user/login'])]) ?>

                            <?php echo $form->field($user, 'name')->textInput(['class' => 'form-control form-control-lg']) ?>
                            <?php echo $form->field($user, 'password')->passwordInput(['class' => 'form-control form-control-lg']) ?>


                            <div class="form-check d-flex justify-content-center mb-5">
                                <!--<input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                                <label class="form-check-label" for="form2Example3g">
                                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                </label>-->
                            </div>

                            <div class="d-flex justify-content-center">
                                <?= Html::submitButton('Вход', ['class' => 'btn btn-success btn-block btn-lg gradient-custom-4 text-body']) ?>
                            </div>

                            <p class="text-center text-muted mt-5 mb-0">Небыло регистрации?
                                <a href="<?= Url::to(['user/register'])?>" class="fw-bold text-body">
                                    <u>Необходимо</u>
                                </a>
                            </p>

                            <?php ActiveForm::end(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>











<!--<h3>--><?php //= (Yii::$app->user->isGuest)?'гость' : 'авторизированый' ?><!--</h3>-->
<!---->
<?php //$form = ActiveForm::begin(['method' => 'POST', 'action' => Url::to(['user/login'])])?>
<!--    --><?php //echo $form->field($user, 'name')->input('text') ?>
<?php //if (Yii::$app->user->isGuest): ?>
<!--    --><?php //echo Html::submitButton('войти', ['class' => 'btn btn-success'])?>
<?php //else: ?>
<!--    --><?php //echo Html::a('выйти', Url::to(['user/logout']), ['class'=>'btn btn-dark'])?>
<?php //endif; ?>
<?php //ActiveForm::end()?>
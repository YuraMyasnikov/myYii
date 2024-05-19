<?php
    /**
     * @var \app\controllers\YuraController $dataProvider;
     * @var \app\models\Yura $searchModel
     * @var \app\models\Yura $viewModel
     */

use yii\bootstrap5\ActiveForm;
use yii\grid\GridView;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

?>
<div class="container">

    <div class="row">
        <!-- Временой фильтр -->
        <div class="search">
            <?php $form = ActiveForm::begin(['options' => ['data' => ['pjax' => true]],'action' => ['index'],'method' => 'get',]); ?>
            <div class="d-flex flex-row align-items-center">
                <h4 class="m-3">Дни</h4>
                <?= $form->field($searchModel, 'startDay')->input('date') ?>
                <?= $form->field($searchModel, 'finishDay')->input('date') ?>
            </div>
            <div class="d-flex flex-row align-items-center">
                <h4 class="m-3">Часы</h4>
                <?= $form->field($searchModel, 'startClock')->input('time') ?>
                <?= $form->field($searchModel, 'finishClock')->input('time') ?>
            </div>

            <?= Html::submitButton('Искать', ['class' => 'btn btn-outline-primary']) ?>
            <?= Html::a('Сбросить', Url::to('/'),['class' => 'btn btn-outline-secondary']) ?>
            <?php ActiveForm::end(); ?>
        </div>
        <!-- /Временой фильтр -->
    </div>
    <div class="row">
        <!-- Сессия -->
        <?php if (Yii::$app->session->has('success-img')): ?>
            <div class="alert alert-success alert-dismissible fade show  mt-5" role="alert">
                <strong>Отлично!</strong> <?= Yii::$app->session->get('success-img')?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
            </div>
            <?php Yii::$app->session->destroy(); ?>
        <?php endif;?>
        <?php if (Yii::$app->session->has('success')): ?>
            <div class="alert alert-success alert-dismissible fade show  mt-5" role="alert">
                <strong>Отлично!</strong> <?= Yii::$app->session->get('success')?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
            </div>
            <?php Yii::$app->session->destroy(); ?>
        <?php endif;?>
        <!-- /Сессия -->
    </div>
    <div class="row">
        <!-- Виджет -->
        <?php Pjax::begin() ?>
        <div class="form mt-5">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'layout' =>  "{summary}\n{items}{errors}", //{summary}\n{items}\n{pager}\n{errors}\n{sorter}
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'first_name',
                        'value' => function ($data) {
                            return $data->last_name .' '. $data->first_name;
                        },
                    ],
                    [
                        'attribute' => 'image',
                        'format' => 'html',
                        'value' => function ($data) {
                            return Html::img($data->getImageUrl(), ['style' => 'width:60px;']);
                        }
                    ],
                    'email',
                    [
                        /*'header' => 'Город',*/
                        'attribute' => 'city_id',
                        'filter'=>$viewModel->getCities(),
                        'format' => 'html',
                        'value' => function ($data) {
                            return $data->getCityName($data->id);
                        },
                        'headerOptions' => [
                            /*'style' => 'background: red;'*/
                        ],
                        'footerOptions' => [
                            /*'style' => 'background: green;'*/
                        ],
                        'contentOptions' => [
                            /*'style' => 'background: blue;'*/
                        ],
                        'contentOptions' => function($data) {
                            return [
                                /*'style' => $data->id == 5 ? 'background: green;' : 'background: blue;'*/
                            ];
                        },
                        'filterOptions' => [
                            /*'style' => 'background: orange;'*/
                        ],

                    ],
                    'created_at',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {update} {delete}',
                        'buttons' => [
                            'view' => function ($url, $model, $key) {
                                return Html::a
                                (   '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
</svg>',
                                    $url
                                );
                            },
                            'update' => function ($url, $model, $key) {
                                return Html::a
                                (   '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
  <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
</svg>',
                                    $url
                                );
                            },
                            'delete' => function ($url, $model, $key) {
                                return Html::a
                                (   '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-x" viewBox="0 0 16 16">
  <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z"/>
</svg>',
                                    $url
                                );
                            }
                        ],
                    ],
                ]
            ]);?>
            <div class="d-flex justify-content-center">
                <?= GridView::widget([
                    'pager' => [
                        'maxButtonCount' => 5,
                        'firstPageLabel' => 'Начало',
                        'lastPageLabel' => 'Конец',
                        //'options' => ['class' => 'pagination pagination-sm float-right'],
                        'linkOptions' => ['class' => 'page-link'],
                        //'linkContainerOptions' => ['class' => 'page-item'],
                        'disabledListItemSubTagOptions' => ['class' => 'page-link disabled'],
                    ],
                    'dataProvider' => $dataProvider,
                    'layout' => '{pager}',
                    //'options' => ['class' => 'card-tools']
                ]) ?>
            </div>
        </div>
        <?php Pjax::end()?>
        <!-- /Виджет -->
    </div>

    <div class="row">
        <!-- Создание новго -->
        <div class="mb-5">
            <?= Html::a('Добавить', Url::to('yura/create'), ['class' => 'btn btn-xl btn-outline-primary'])?>
        </div>
        <!-- /Создание новго -->
    </div>
</div>









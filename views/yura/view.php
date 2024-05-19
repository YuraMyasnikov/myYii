<?php
    /**
     * @var \app\controllers\YuraController $dataProvider;
     * @var \app\models\Yura $model
     */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

?>

<h2 class="mb-2">Страница <?= $model->first_name .' '. $model->last_name ?></h2>

<div>
    <?php echo Html::img(
        "@web/$model->image",
        ['style' => 'border-radius: 50%;width: 100px;height: 100px;margin-right: 10px;object-fit: cover; ']
    )?>
</div>
<?php echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'created_at:datetime',
        'first_name',
        'last_name',
        'email',
        'description',
        'city_id',
        [
            'attribute' =>'busy',
            'value' => function ($data) {
               return ($data->busy == true) ? "Есть работа" : "Безработный";
            }
        ],
        'position_id'
    ],
]);?>
<div class="">
    <?php echo Html::a('Назад', Url::to('/'), ['class' => 'btn btn-lg btn-outline-secondary']) ?>
</div>

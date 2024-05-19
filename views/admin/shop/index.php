<?php
/**
 *  @var \app\controllers\admin\ShopController $model
 */

use yii\helpers\Url;
?>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Активная</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Категории</a>
        <ul class="dropdown-menu">
            <?php foreach ($model as $category): ?>
                <li>
                    <a class="dropdown-item" href="<?php echo Url::to(['/admin/shop/category', 'id' => $category->id]) ?>">
                        <?= $category->name ?>
                    </a>
                </li>
            <?php endforeach; ?>
            <li><a class="dropdown-item" href="#">Действие</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Отделенная ссылка</a></li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Ссылка</a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled">Отключенная</a>
    </li>
</ul>



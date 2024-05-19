<?php

/** @var yii\web\View $this */
/** @var string $content */
use app\models\shop\viewModels\Models;

use app\assets\AppAsset;
use app\assets\NodeModulesAsset;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\bootstrap5\Breadcrumbs;

$categories = Models::getCategories();

/*AppAsset::register($this);*/
\app\assets\MyAsset::register($this);
NodeModulesAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);



?>

<?php $this->beginPage() ?>
    <!doctype html>
    <meta name="description" content="Morden Bootstrap HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <html lang="<?= Yii::$app->language ?>" class="h-100">

    <head>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>

    <body>
    <?php $this->beginBody() ?>

    <div class="container-fluid">

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?=Url::to(['shop/index']) ?>">Навбар</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?=Url::to(['shop/index']) ?>">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= Url::to(['admin/shop/index'])?>">AdminShop</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Категории
                            </a>
                            <ul class="dropdown-menu">
                                <?php foreach ($categories as $category):?>

                                <li>
                                    <a class="dropdown-item" href="<?=Url::to(['shop/category', 'id'=>$category->id]) ?>">
                                        <?= $category->name?>
                                    </a>
                                </li>

                                <?php endforeach;?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Отключенная</a>
                        </li>

                    </ul>

                    <?php if(Yii::$app->user->isGuest):?>

                            <a class="m-1" href="<?=Url::to(['user/register']) ?>">регистрация</a>

                            <a class="m-1" href="<?=Url::to(['user/login']) ?>">войти</a>

                    <?php else:?>

                            <a class="m-1" href="<?=Url::to(['user/logout']) ?>">выйти</a>

                            <a class="m-1" href="<?=Url::to(['basket/index']) ?>">корзина</a>

                            <a class="m-1" href="<?=Url::to(['order/index']) ?>">order</a>

                    <?php endif;?>
<!--                    <form class="d-flex" role="search">-->
<!--                        <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Поиск">-->
<!--                        <button class="btn btn-outline-success" type="submit">Поиск</button>-->
<!--                    </form>-->
                </div>
            </div>
        </nav>

        <div class="container">
            <!-- Start header area -->
            <header class="">

            </header>
            <!-- End header area -->

            <div class="row">
              <div class="d-flex justify-content-center mt-3 mb-4">
                <?php echo
                Breadcrumbs::widget([
                    'activeItemTemplate' => "<li style='font-size: large' class=\"breadcrumb-item active\" aria-current=\"page\">{link}</li>\n",
                    'itemTemplate' => '<li class="breadcrumb-item">{link}</li>',
                    'links' => (isset($this->params['breadcrumbs'])) ? $this->params['breadcrumbs'] : [],
                ])?>
              </div>
            </div>
        </div>
        <div class="container">
            <?= $content?>
        </div>
    </div>
    <!-- Start footer section -->
    <footer> </footer>
    <!-- End footer section -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dropdownElement = document.querySelector('.dropdown-toggle');
            var myDropdown = new bootstrap.Dropdown(dropdownElement);
        });
    </script>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>



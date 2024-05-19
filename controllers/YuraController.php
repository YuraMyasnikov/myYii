<?php

namespace app\controllers;

use app\models\viewModels\YuraViewModel;
use app\models\Yura;
use app\models\YuraSearch;
use app\service\UserService;
use yii\web\Controller;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class YuraController extends Controller
{
    public function actionIndex()
    {
        $this->view->title = 'My GridView';
        $searchModel = new YuraSearch();
        $viewModel = new YuraViewModel();
        if (Yii::$app->request->isPjax){
            dd(3333);
        }

        $dataProvider = $searchModel->search(Yii::$app->request->get());

        return $this->render('index', ['dataProvider' => $dataProvider, 'searchModel' => $searchModel, 'viewModel' => $viewModel]);
    }

    public function actionCreate()
    {
        $model = new Yura();
//        $viewModel = YuraViewModel::initWithModel($model); //нахуй он нужен?
        $viewModel = new YuraViewModel;
//        $viewModel::initWithModel($model);
        $userService = new UserService();

        $this->view->title = $viewModel->getTitleCreate($model);
        $viewModel->getScenarioCreate($model);
        $this->view->params['breadcrumbs'] = [
          /*['label'=> $this->view->title, 'url'=>'create'],*/
          ['label'=> $this->view->title]
        ];

        if (Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            if ($model->validate()){

                $avatar = UploadedFile::getInstance($model,'image');
                $gallery = UploadedFile::getInstances($model,'images');
                $model = $userService->store($model, $avatar, $gallery);

                Yii::$app->session->setFlash('success', "Дабавлен {$model->first_name}");
                return $this->redirect('/');
            }

            Yii::$app->session->setFlash('error', "Валидация не пройдена");
            return $this->redirect('create');
        }

        return $this->render('create',compact(['model','viewModel']) );
    }

    public function actionView($id)
    {
        $model = Yura::findOne($id);
        $this->view->title = "$model->first_name $model->last_name";
        $this->view->params['breadcrumbs'] = [
            ['label'=> "Страница {$this->view->title}"],

        ];

        return $this->render("view", compact('model'));
    }

    public function actionUpdate($id)
    {
        $model = Yura::findOne($id);
        /*$viewModel = YuraViewModel::initWithModel($model);*/
        $viewModel = new YuraViewModel();
        $userService = new UserService();
        $viewModel->getScenarioUpdate($model);
        $this->view->title = $viewModel->getTitleUpdate($model);

        $this->view->params['breadcrumbs'] = [ ['label'=> $this->view->title] ];
        if ($model->load(Yii::$app->request->post())){
            if ($model->validate()) {

                $avatar = UploadedFile::getInstance($model, 'image');
                $gallery = UploadedFile::getInstances($model, 'images');
                $userService->store($model, $avatar, $gallery);
               /* dd($avatar,$gallery,$userService);*/
                // устанавливаем чтото в сессию, редиректим и тд
                return $this->redirect(['yura/update','id'=>$id]);
            }
        }
        return $this->render("update", compact(['model','viewModel']));
    }

    public function actionDelete($id)
    {
        $model = Yura::findOne($id);
        $model->delete();
        $this->redirect('/');
    }
}



